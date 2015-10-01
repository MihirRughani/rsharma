<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
		
		


		$accordions_class = 'accordions';
		
		$html.= '<script>
				jQuery(document).ready(function($)
				{
					
					$("#accordions-'.$post_id.'.accordions").accordion({
						collapsible: true,
						heightStyle: "content",
						animated: "swing",
						active: "",';
						
						$html.= 'changestart: function(event, ui) {
							child.accordion("activate", false); 
						}
					});
					
					var child = $(".child-accordion").accordion({
						active:true,';

						$html.= 'heightStyle: "content",
						collapsible: true,
						animated: "swing",

					});
				})

				</script>';
