<?php

/*
* @Author 		ParaTheme
* @Folder	 	accordions/templates
* @version     	2.0.3

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
		
	$accordions_title = apply_filters( 'accordions_filter_title', $accordions_title );

	$html.= '<div class="accordions-head">'.$accordions_title;

	$html.= '<i class="accordion-icons accordion-plus '.$accordions_icons.'"></i>';
	$html.= '<i class="accordion-icons accordion-minus '.$accordions_icons.'"></i>';		

	$html.= '</div>'; //accordions-head