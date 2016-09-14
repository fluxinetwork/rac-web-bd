<?php
/**
 * Register & enqueue styles
 */
function enqueue_styles() {

    /* REGISTER */
    
    wp_register_style( 'main-css', get_template_directory_uri() . '/app/css/main.css', array(), null );
    
    /* ENQUEUE */
    
    wp_enqueue_style('main-css');

}
add_action('wp_enqueue_scripts', 'enqueue_styles', 100);


/**
 * Register & enqueue scripts
 */
function enqueue_scripts() { 

    /* REGISTER */
    
	
    wp_register_script( 'modernizr', get_template_directory_uri() . '/app/js/vendors/modernizr.full.js', array(), null, false );
    wp_register_script( 'jQuery', get_template_directory_uri() . '/app/js/vendors/jquery-1.11.3.min.js', array(), null, false );
    wp_register_script( 'waypoints', get_template_directory_uri() . '/app/js/vendors/waypoints.min.js', array(), null, true );
	wp_register_script( 'lazyload', get_template_directory_uri() . '/app/js/vendors/jquery.unveil.js', array(), null, true );
    wp_register_script( 'mousewheel', get_template_directory_uri() . '/app/js/vendors/jquery.mousewheel.min.js', array(), null, true );
	
    wp_register_script( 'main-js', get_template_directory_uri() . '/app/js/main.js', array('jQuery','waypoints','lazyload','mousewheel'), null, true );
    
    /* ENQUEUE */
    
    wp_enqueue_script('main-js');

}
add_action('wp_enqueue_scripts', 'enqueue_scripts', 100);


/**
 * Google Analytics
 * UA-code is set in config.php
 */
function google_analytics() { ?>

    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>');ga('send','pageview');
    </script>

<?php }

if (GOOGLE_ANALYTICS_ID && GOOGLE_ANALYTICS_ID!='') {
  add_action('wp_footer', 'google_analytics', 20);
}
