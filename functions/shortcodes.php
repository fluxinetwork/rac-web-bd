<?php
// Galerie Shortcode

function galerie_func( $atts ) {
	$images = get_field('galerie_images');
	if( $images ):
		$output = '<ul class="list-reset partenaires inline-list">';
		foreach( $images as $image ):
			$output .= '<li><img src="'.$image['sizes']['medium'].'" alt="'.$image['alt'].'" />';
			if ( $image['caption'] ) {
				$output .= '<div class="legende light group w12"><p>'.$image['caption'].'</p></div>';
			}
			$output .= '</li>';
		endforeach;
		$output .= '</ul>';
	endif;
	return $output;

}
add_shortcode( 'galerie', 'galerie_func' );

// Contact

function contact_shortcode( $atts ) {
	extract(shortcode_atts(array(
      'numero' => 1,
   	), $atts));

   	$contacts = get_field('contacts');

   	$imgID = $contacts[ $numero ]['avatar'];
   	$imgURL = wp_get_attachment_image_src( $imgID, 'medium' );

	$txt1 = $contacts[ $numero ]['txt_1'];
	$txt2 = $contacts[ $numero ]['txt_2'];

	$output = '<div class="contact clearfix">';
	$output .= '<span class="pointe"></span>';
	$output .= '<img src="'.$imgURL[0].'" class="contact__img">';
	$output .= '<p class="contact__txt1"><strong>'.$txt1.'</strong></p>';
	$output .= '<p class="contact__txt2">'.$txt2.'</p>';
	$output .= '</div>';

	return $output;

}
add_shortcode( 'contact', 'contact_shortcode' );

// Creative Commons

function creative_commons_shortcode( $atts ) {
   	$creative_commons = get_field('creative_commons');

   	$output = '<ul class="list-reset cc-list">';

   	foreach ($creative_commons as $cc) {
   		$picto_url = $cc['cc_img'];
   		$txt = $cc['cc_txt'];

   		$output .= '<li>';
   		$output .= '<img src="'.$picto_url.'">';
   		$output .= $txt;
   		$output .= '</li>';
   	}

   	$output .= '</ul>';

	return $output;

}
add_shortcode( 'creative_commons', 'creative_commons_shortcode' );

// Credits

function credits_shortcode( $atts ) {
   	$creative_commons = get_field('creative_commons');

   	$output = '<ul class="list-reset inline-list credits">';
	$output .= '<li><span class="icon-pencil"></span><p class="credits_txt1"><strong>Coordination<br> et écriture</strong></p><p class="credits_txt2">Marc Mossalgue</p></li>';
	$output .= '<li><span class="icon-pictures"></span><p class="credits_txt1"><strong>Illustrations</strong></p><p class="credits_txt2">Audrey Collomb<br><a href="http://www.audreycollomb.fr/" target="_blank">site web</a></p></li>';
	$output .= '<li><span class="icon-browser"></span><p class="credits_txt1"><strong>Site internet</strong></p><p class="credits_txt2">Thibaut Caroli<br>& Yann Rolland</p></li>';
   	$output .= '</ul>';

	return $output;

}
add_shortcode( 'credits', 'credits_shortcode' );






