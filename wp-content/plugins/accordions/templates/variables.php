<?php

/*
* @Author 		ParaTheme
* @Folder	 	accordions/templates
* @version     	2.0.3

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
		
								
		
		$accordions_themes = get_post_meta( $post_id, 'accordions_themes', true );		
		$accordions_bg_img = get_post_meta( $post_id, 'accordions_bg_img', true );
		$accordions_icons = get_post_meta( $post_id, 'accordions_icons', true );
		$accordions_icons_minus = get_post_meta( $post_id, 'accordions_icons_minus', true );				
		
		$accordions_default_bg_color = get_post_meta( $post_id, 'accordions_default_bg_color', true );	
		$accordions_active_bg_color = get_post_meta( $post_id, 'accordions_active_bg_color', true );
		
		$accordions_items_title_color = get_post_meta( $post_id, 'accordions_items_title_color', true );			
		$accordions_items_title_font_size = get_post_meta( $post_id, 'accordions_items_title_font_size', true );		

		$accordions_items_content_color = get_post_meta( $post_id, 'accordions_items_content_color', true );
		$accordions_items_content_font_size = get_post_meta( $post_id, 'accordions_items_content_font_size', true );
		
		$accordions_ribbon_name = get_post_meta( $post_id, 'accordions_ribbon_name', true );		
		
		$accordions_content_title = get_post_meta( $post_id, 'accordions_content_title', true );	
		$accordions_content_body = get_post_meta( $post_id, 'accordions_content_body', true );
		
		$accordions_hide = get_post_meta( $post_id, 'accordions_hide', true );		
		$accordions_custom_css = get_post_meta( $post_id, 'accordions_custom_css', true );				
		
