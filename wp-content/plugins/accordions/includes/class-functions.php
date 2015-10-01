<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access


class class_accordions_functions  {
	
	
    public function __construct(){
		
		
		//$this->settings_page = new accordions_Settings();
		
		
		//add_action( 'admin_menu', array( $this, 'admin_menu' ), 12 );
       //add_action('admin_menu', array($this, 'create_menu'));
    }
	




		
	public function accordions_themes($themes = array())
		{

			$themes = array(
							'flat'=>'Flat',												
							);
			
			foreach(apply_filters( 'accordions_themes', $themes ) as $theme_key=> $theme_name)
				{
					$theme_list[$theme_key] = $theme_name;
				}

			
			return $theme_list;

		}
	
		
	public function accordions_themes_dir($themes_dir = array())
		{
			$main_dir = accordions_plugin_dir.'themes/';
			
			$themes_dir = array(
							'flat'=>$main_dir.'flat',							
																		
							);
			
			foreach(apply_filters( 'accordions_themes_dir', $themes_dir ) as $theme_key=> $theme_dir)
				{
					$theme_list_dir[$theme_key] = $theme_dir;
				}

			
			return $theme_list_dir;

		}


	public function accordions_themes_url($themes_url = array())
		{
			$main_url = accordions_plugin_url.'themes/';
			
			$themes_url = array(
							'flat'=>$main_url.'flat',													
													
							);
			
			foreach(apply_filters( 'accordions_themes_url', $themes_url ) as $theme_key=> $theme_url)
				{
					$theme_list_url[$theme_key] = $theme_url;
				}

			return $theme_list_url;

		}
		
	}
	
new class_accordions_functions();