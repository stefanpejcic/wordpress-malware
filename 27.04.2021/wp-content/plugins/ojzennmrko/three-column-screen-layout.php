<?php
/**
	Plugin Name: Three Column Screen Layout
	Plugin URI: http://wordpress.org/plugins/three-column-screen-layout/
	Description: Three, four and five column screen layouts for the post editor.
	Version: 4.2
	Author: Chad Hovell
	Author URI: http://www.chadhovell.com.au
	Text Domain: three-column-screen-layout
	License: GPLv2 or later

	Copyright 2016 Chad Hovell (email: chadhovell@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
*/

if (!class_exists('Three_Column_Screen_Layout')) {
	class Three_Column_Screen_Layout {

		public function __construct() {
			register_activation_hook(__FILE__, array($this, 'activate'));
			register_deactivation_hook(__FILE__, array($this, 'deactivate'));
			if (function_exists('get_bloginfo') && version_compare(get_bloginfo('version'), '3.4') >= 0) {
				global $pagenow;
				if (is_admin() && in_array($pagenow, array('post.php', 'post-new.php'))) {
					add_action('admin_head', array($this, 'admin_head'));
					add_action('admin_footer', array($this, 'admin_footer'));
					add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
				}
			}
		}
		
		public function activate() {
			global $wpdb;
			if ($wpdb->get_results(sprintf("SELECT * FROM %s WHERE option_name = '_site_transient_update_plugins' AND option_value LIKE '%%three-column-screen-layout%%';", $wpdb->options))) {
				$wpdb->query(sprintf("UPDATE %s SET meta_value = replace(meta_value, 's:8:\"advanced\"', 's:5:\"side3\"') WHERE meta_key LIKE 'meta-box-order_%%';", $wpdb->usermeta));
			}
		}
		
		public function deactivate() {
			global $wpdb;
			$wpdb->query(sprintf("UPDATE %s SET meta_value = replace(meta_value, 's:5:\"side3\"', 's:6:\"normal\"'), meta_value = replace(meta_value, 's:5:\"side4\"', 's:6:\"normal\"') WHERE meta_key LIKE 'meta-box-order_%%';", $wpdb->usermeta));
		}
		
		public function admin_head() {
			ob_start();
			add_screen_option('layout_columns', array('max'=>24, 'default'=>2));
		}
		
		public function admin_footer() {
			$this->splice_columns(ob_get_clean());
		}
		
		public function admin_scripts() {
			wp_enqueue_style('Three_Column_Screen_Layout-style', plugins_url('/style.min.css?v=4.2', __FILE__));
		}

		protected function create_metabox($i) {
			global $post_type;
			global $post;
			ob_start();
			$name = sprintf('side%d', $i);
			do_action('do_meta_boxes', $post_type, $name, $post);
			do_meta_boxes($post_type, $name, $post);
			return sprintf('<div id="postbox-container-%d" class="postbox-container">%s</div>', $i, ob_get_clean());
		}
		
		protected function splice_columns($content) {
			$pref_start = 		strpos($content, 'class="screen-layout"');
			$pref_end = 		strpos($content, 'id="screenoptionnonce"', $pref_start);
			$postbody_start = 	strpos($content, 'id="post-body"', $pref_start);
			$columns_start = 	strpos($content, 'metabox-holder columns-', $postbody_start) + 23;
			$container_start = 	strpos($content, '<div id="postbox-container-2"', $postbody_start);
			
			if ($pref_start && $pref_end && $postbody_start && $columns_start && $container_start) {
				$pref_old = substr($content, $pref_start, $pref_end - $pref_start);
				$pref_val = preg_match("/value='(\d+)'[\r\n\s]+checked/", $pref_old, $matches) ? $matches[1] : 2;
				$pref_new = preg_replace('/(>)[^<]*(<label)/', '$1$2', $pref_old);
				$pref_new = preg_replace('/(\/>)[\r\n\s]+[^<]*[\s]+(<\/label>)\s*/', '$1<span class="columns-prefs-icon"></span>$2', $pref_new);
				
				if ($pref_new != $pref_old) {
					$content = substr_replace($content, $this->create_metabox(3).$this->create_metabox(4), $container_start, 0);
					$content = substr_replace($content, $pref_val, $columns_start, 1);
					$content = substr_replace($content, $pref_new, $pref_start, $pref_end - $pref_start);
				}
			}
			echo $content;
		}
	}
	
	$Three_Column_Screen_Layout = new Three_Column_Screen_Layout();
}
?>
