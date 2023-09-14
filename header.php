<!doctype html>
<html class="no-js">

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<title>
	<?php
	if ( is_front_page() ) :
		bloginfo('name');
		print(' | Accueil');
	else :
		wp_title('');
		print(' | ');
		bloginfo('name');
	endif;
	?>
	</title>

	<?php wp_head(); ?>

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/app/js/vendors/respond.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/app/js/vendors/selectivizr-min.js"></script>
	<![endif]-->

</head>

<?php include(TEMPLATEPATH.'/app/inc/bodyclass.php'); ?>
<body <?php body_class($bodyclass); ?> >

	<div class="wrap-main">

		<nav class="nav">
			<a href="https://reseauactionclimat.org" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logo-rac.jpg" class="logo-rac"></a>
			<ul class="nav__primary">
				<li class="nav-item has-dropdown">
					<a href="" class="nav-item__lien">Lire la BD</a>
					<div class="wrap-dropdown">
						<ul class="nav-dropdown">
							<li class="nav-dropdown__item"><a href="" class="nav-dropdown__item__lien">Introduction</a></li>
							<li class="nav-dropdown__item"><a href="" class="nav-dropdown__item__lien">Transports</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item"><a href="" class="nav-item__lien">A propos</a></li>
			</ul>
			<div class="nav__share">
				<a href="" class="button--round js-share" data-url="<?php echo get_bloginfo('url)') ?>" data-network="facebook"><span class="icon-facebook"></span></a>
				<a href="" class="button--round js-share" data-url="<?php echo get_bloginfo('url)') ?>" data-network="twitter"><span class="icon-twitter"></span></a>
				<a href="<?php bloginfo('tempalte_url'); ?>/app/img/planetman-web-bd.zip" target="_blank" class="button">Télécharger</a>
			</div>
		</nav>
