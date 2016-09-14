<article class="wrap-planche" id="planche_<?php echo $numero_planche; ?>">
	<h1 class="is-none"><?php echo $planche_title; ?></h1>
	<p class="is-none"><?php echo $planche_excerpt; ?></p>	

	<div class="planche">
		<?php
		if ($isMobile) {
			echo '<img src="'.$planche_full_url.'" class="lazy planche__img" alt="'.$planche_title.'">';
		} else {
			foreach($planche_dessins  as $bloc) {
				$animation = $bloc['animation'];
				$style = $bloc['styles'];
				$url = $bloc['dessin']['sizes']['large'];
				
				if ($url) {
					$output = '<img ';
					$animation ? $output .= 'data-anim-class="'.$animation.'"' : '';
					$output .= 'class="animated lazy planche__img is-hidden" ';
					$output .= 'data-src="'.$url.'" ';
					$output .= 'alt="'.$planche_title.'" ';
					$style ? $output .= 'style="'.$style.'"' : '';
					$output .= ' />';

					echo $output;
				}
			}
		}	
		?>	
	</div>	

	<?php include(locate_template('page-templates-parts/share.php')); ?>
</article>