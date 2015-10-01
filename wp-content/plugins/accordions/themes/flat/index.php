<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access	
		
	include accordions_plugin_dir.'/templates/variables.php';
	include accordions_plugin_dir.'/templates/scripts.php';		

	$html.= '<div id="accordions-'.$post_id.'" class="'.$accordions_class.' '.$accordions_themes.'">';
	
	
	
	foreach ($accordions_content_title as $index => $accordions_title)
	{
			
			if(empty($accordions_hide[$index]))
				{
					include accordions_plugin_dir.'/templates/header.php';
					
					include accordions_plugin_dir.'/templates/content.php';
	
					
				}
			


		}
		
							
	$html.= '</div>';


	
	



	$html .= '<style type="text/css">
	
	#accordions-'.$post_id.' .accordions-head{
		color:'.$accordions_items_title_color.';
		font-size:'.$accordions_items_title_font_size.';
		background:'.$accordions_default_bg_color.';
		}		
	
	#accordions-'.$post_id.' .ui-accordion-header-active{
		background: '.$accordions_active_bg_color.';

		}';


			
		$html .= '#accordions-'.$post_id.' .accordions-head .accordion-icons{
			left: 10px;
			
			}
			#accordions-'.$post_id.' .child-accordion .accordions-head .accordion-icons{
			left: 10px;
			
			}					
			';
			
		
		
	
	$html .= '</style>';	




	if(!empty($accordions_custom_css))
		{
			$html .= '<style type="text/css">'.$accordions_custom_css.'</style>
					';	
		}

