<?php
/*
Plugin Name: BurnFeed Email Subscription Lite
Author URI: http://wpfruits.com/
Description: Adds a floating follow button to FeedBurner using WordPRess sites. The same follow button which appears on WP.COM blogs. Use Follow Plugin if your don't use FeedBurner
Version: 1.0.0
Author: wpfruits, tikendramaitry
Author URI: http://wpfruits.com/
Licence: GNU GPL Version 3
*/

require_once('ffm-admin.php');
require_once('ffm-widget.php');

function ffm_main_init(){
	register_setting( 'ffm_plugin_options', 'ffm_options', 'ffm_options_validate' );
	if(is_admin()){
		wp_enqueue_style($handle = 'ffm-admin', plugins_url( 'css/ffm-style-admin.css' , __FILE__ ), $deps = array(), $ver = '1.0.0', $media = 'all');
		
		
	}
}
add_action('admin_init', 'ffm_main_init' );

function ffm_options_validate($input) {
	return $input;
}

function ffm_enqueue_css(){
	if(!is_admin()){
		wp_enqueue_style($handle = 'ffm-front', plugins_url( 'css/ffm-style.css' , __FILE__ ), $deps = array(), $ver = '1.0.0', $media = 'all');
		
	}
}
add_action('wp_print_styles', 'ffm_enqueue_css');


function ffm_script_enqueqe() {
	wp_enqueue_script('jquery');
	if(!is_admin()){
		wp_enqueue_script('ffm-front',plugins_url( 'js/ffm-componet.js' , __FILE__ ),array('jquery'),'1.0.0' );
	}
}
add_action('init', 'ffm_script_enqueqe');

function ffm_defaults(){
    $default = array(
		'ffm_feed_url' => 'tiks_in',
		'ffm_feed_pop_btn_text' => 'Follow',
		'ffm_feed_subs_text' => 'Subscribe',
		'ffm_feed_pre_content' =>'Get every new post delivered to your inbox',
		'ffm_feed_post_content' =>'Join millions of other followers'
	);
	return $default;
}

// get ffm version
function ffm_get_version(){
	if ( ! function_exists( 'get_plugins' ) )
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$plugin_file = basename( ( __FILE__ ) );
	return $plugin_folder[$plugin_file]['Version'];
}

// Runs when plugin is activated and creates new database field
register_activation_hook(__FILE__,'ffm_plugin_install');
function ffm_plugin_install() {
	add_option('ffm_options', ffm_defaults());
	ffm_plugin_activate();
}	
add_action('admin_init', 'ffm_plugin_redirect');
function ffm_plugin_activate() {
	add_option('ffm_plugin_do_activation_redirect', true);
}

function ffm_plugin_redirect() {
	if (get_option('ffm_plugin_do_activation_redirect', false)) {
		delete_option('ffm_plugin_do_activation_redirect');
		wp_redirect('admin.php?page=ffm-settings');
	}
}
?>