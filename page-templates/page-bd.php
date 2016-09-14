<?php
/*
Template Name: Page BD
*/
?>

<?php
get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post(); 

		$category = get_the_category();
		$cat_id = $category[0]->term_id;
		$cat_name = $category[0]->name;

		$hero_img_url = get_field('image_intro');
		if (is_front_page()) {
			$page_title = get_bloginfo('name');
		} else {
			$page_title = get_the_title();
		}
?>

<div class="hero" style="background-image: url('<?php echo $hero_img_url; ?>');">
	<div class="wrap-resume">
		<div class="resume">
			<p class="resume__cat"><?php echo $cat_name; ?></p>
			<h1 class="resume__titre"><?php echo $page_title; ?></h1>
			<h2 class="resume__txt p"><?php echo get_the_excerpt(); ?></h2>
		</div>
	</div>
</div>

<section class="wrap-bd">	

    <?php 		
	$args = array(
		'post_type' => 'planche', 
		'order' => 'ASC', 
		'posts_per_page' => '-1',
		'cat' => $cat_id
	);
			
	$planches = new WP_Query( $args );
	$numero_planche = 1;
			
	if ( $planches->have_posts() ) : 
		while ( $planches->have_posts() ) :
			$planches->the_post();	
			$planche_url = get_permalink();

			// contenu txt
			$planche_title = get_field('planche_titre');
			$planche_excerpt = get_the_excerpt();

			// planche complète
			$planche_full = get_field('planche_full');
			if ($isMobile) {
				$planche_full_url = $planche_full['sizes']['medium'];
			} else {
				$planche_full_url = $planche_full['sizes']['large'];
			}
			$planche_dl_url = $planche_full['url'];

			// dessins
			$planche_dessins = get_field('planche_dessins');
			include(locate_template('page-templates-parts/planche.php'));

			$numero_planche ++;
		endwhile;	
	else :
		echo $cat_id;
	endif;
	wp_reset_postdata();	
    ?>
   
</section>

<?php
	endwhile;
endif;
get_footer();
?>