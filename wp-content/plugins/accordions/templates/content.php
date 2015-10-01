<?php

/*
* @Author 		ParaTheme
* @Folder	 	accordions/templates
* @version     	2.0.3

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
		
	$accordions_content = apply_filters( 'accordions_filter_content', $accordions_content_body[$index] );	
	
	$html.= '<div style="font-size:'.$accordions_items_content_font_size.';color:'.$accordions_items_content_color.'" class="accordion-content">'.wpautop(do_shortcode($accordions_content));
	$html.= '</div>'; //accordion-content