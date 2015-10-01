<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access


class class_accordions_shortcodes  {
	
	
    public function __construct()
    {
		
		add_shortcode( 'accordions', array( $this, 'accordions_display' ) );

    }
	
	public function accordions_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(
					'id' => "",
	
					), $atts);
	
				$html = '';
				$post_id = $atts['id'];
	
				$accordions_themes = get_post_meta( $post_id, 'accordions_themes', true );
				
				$class_accordions_functions = new class_accordions_functions();
				$accordions_themes_dir = $class_accordions_functions->accordions_themes_dir();
				$accordions_themes_url = $class_accordions_functions->accordions_themes_url();

				//var_dump($accordions_themes_url);
				
				
				echo '<link  type="text/css" media="all" rel="stylesheet"  href="'.$accordions_themes_url[$accordions_themes].'/style.css" >';				

				include $accordions_themes_dir[$accordions_themes].'/index.php';				
	
				return $html;
	
	
	}

}


new class_accordions_shortcodes();