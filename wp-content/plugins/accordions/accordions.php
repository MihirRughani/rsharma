<?php
/*
Plugin Name: Accordions
Plugin URI: http://paratheme.com/items/accordions-html-css3-responsive-accordion-grid-for-wordpress/
Description: Fully responsive and mobile ready accordion grid for wordpress.
Version: 1.7
Author: paratheme
Author URI: http://paratheme.com
License: Custom support@paratheme.com
License URI: http://paratheme.com/copyright/
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class Accordions{
	
	public function __construct(){

		define('accordions_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
		define('accordions_plugin_dir', plugin_dir_path( __FILE__ ) );
		define('accordions_wp_url', 'https://wordpress.org/plugins/accordions/' );
		define('accordions_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/accordions' );
		define('accordions_pro_url','http://paratheme.com/items/accordions-html-css3-responsive-accordion-grid-for-wordpress/' );
		define('accordions_demo_url', 'http://paratheme.com' );
		define('accordions_conatct_url', 'http://paratheme.com/contact' );
		define('accordions_qa_url', 'http://paratheme.com/qa/' );
		define('accordions_plugin_name', 'Accordions' );
		define('accordions_plugin_version', '1.7' );
		define('accordions_customer_type', 'free' );	 // pro & free	
		define('accordions_share_url', 'https://wordpress.org/plugins/accordions/' );
		define('accordions_tutorial_video_url', '//www.youtube.com/embed/h2wNFJaaY8s?rel=0' );

		require_once( plugin_dir_path( __FILE__ ) . 'includes/accordions-meta.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/accordions-functions.php');
		
		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-functions.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-shortcodes.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-settings.php');		
		
				

		add_action( 'wp_enqueue_scripts', array( $this, 'accordions_front_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'accordions_admin_scripts' ) );


		}
	
	
	public function accordions_install(){
		
		do_action( 'accordions_action_install' );
		
		}		
		
	public function accordions_uninstall(){
		
		do_action( 'accordions_action_uninstall' );
		}		
		
	public function accordions_deactivation(){
		
		do_action( 'accordions_action_deactivation' );
		}
	
	
	public function accordions_front_scripts(){


		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script('jquery-ui-accordion');		
		//wp_enqueue_style('jquery-ui', accordions_plugin_url.'css/jquery-ui.css'); // ssl issue
		wp_enqueue_style('jquery-ui', plugin_dir_url( __FILE__ ). 'css/jquery-ui.css');
		
		//wp_enqueue_style('accordions_style', accordions_plugin_url.'css/style.css'); // ssl issue
		wp_enqueue_style('accordions_style', plugins_url( 'css/style.css', __FILE__ ));

		}

	public function accordions_admin_scripts(){
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		//wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('accordions_admin_js', plugins_url( '/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_script('jquery.tablednd.js', plugins_url( '/js/jquery.tablednd.js' , __FILE__ ) , array( 'jquery' ));
		
		//wp_enqueue_style('accordions_admin_style', accordions_plugin_url.'admin/css/style.css'); // ssl issue
		wp_enqueue_style('accordions_admin_style', plugins_url( 'admin/css/style.css', __FILE__ ));
		
		//ParaAdmin
		//wp_enqueue_style('ParaAdmin', accordions_plugin_url.'ParaAdmin/css/ParaAdmin.css'); // ssl issue	
		wp_enqueue_style('ParaAdmin', plugins_url( 'ParaAdmin/css/ParaAdmin.css', __FILE__ ));	
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'accordions_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		

		}
	
	
	
	
	
	}

new Accordions();
