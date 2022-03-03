<?php
/**
 * Theme sprecific functions and definitions
 */

/**
 * Fire the wp_body_open action.
 *
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 */
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}

/* Theme setup section
------------------------------------------------------------------- */

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) $content_width = 1170; /* pixels */

// Add theme specific actions and filters
// Attention! Function were add theme specific actions and filters handlers must have priority 1
if ( !function_exists( 'jardiwinery_theme_setup' ) ) {
	add_action( 'jardiwinery_action_before_init_theme', 'jardiwinery_theme_setup', 1 );
	function jardiwinery_theme_setup() {

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Custom header setup
		add_theme_support( 'custom-header', array('header-text'=>false));

		// Custom backgrounds setup
		add_theme_support( 'custom-background');

		// Supported posts formats
		add_theme_support( 'post-formats', array('gallery', 'video', 'audio', 'link', 'quote', 'image', 'status', 'aside', 'chat') );

		// Autogenerate title tag
		add_theme_support('title-tag');

		// Add user menu
		add_theme_support('nav-menus');

		// WooCommerce Support
		add_theme_support( 'woocommerce' );

		// Add wide and full blocks support
		add_theme_support( 'align-wide' );

		// Register theme menus
		add_filter( 'jardiwinery_filter_add_theme_menus',		'jardiwinery_add_theme_menus' );

		// Register theme sidebars
		add_filter( 'jardiwinery_filter_add_theme_sidebars',	'jardiwinery_add_theme_sidebars' );

		// Add theme required plugins
		add_filter( 'jardiwinery_filter_required_plugins',		'jardiwinery_add_required_plugins' );

		// Init theme after WP is created
		add_action( 'wp',									'jardiwinery_core_init_theme' );

		// Add theme specified classes into the body
		add_filter( 'body_class', 							'jardiwinery_body_classes' );

		// Add data to the head and to the beginning of the body
		add_action('wp_head',								'jardiwinery_head_add_page_meta', 1);
		add_action('wp_head',								'jardiwinery_head_add_page_preloader_styles', 9);
		add_action('before',								'jardiwinery_body_add_gtm');
		add_action('before',								'jardiwinery_body_add_toc');
		add_action('before',								'jardiwinery_body_add_page_preloader');

		// Add data to the head and to the beginning of the body
		add_action('wp_footer',								'jardiwinery_footer_add_views_counter');
		add_action('wp_footer',								'jardiwinery_footer_add_theme_customizer');
		
		if (function_exists('jardiwinery_footer_add_scroll_to_top')){
            add_action('wp_footer',								'jardiwinery_footer_add_scroll_to_top');
        }

		add_action('wp_footer',								'jardiwinery_footer_add_custom_html');
		add_action('wp_footer',								'jardiwinery_footer_add_gtm2');

		// Set list of the theme required plugins
		jardiwinery_storage_set('required_plugins', array(
			'essgrids',
			'revslider',
			'mailchimp',
			'trx_utils',
			'trx_updater',
			'visual_composer',
			'woocommerce',
			'elegro-payment',
			'product-delivery-date-for-woocommerce-lite',
			'contact_form_7',
			'wp-gdpr-compliance',
			)
		);

        // Set list of the theme required custom fonts from folder /css/font-faces
        // Attention! Font's folder must have name equal to the font's name
        jardiwinery_storage_set('required_custom_fonts', array(
                'Amadeus'
            )
        );
        

	}
}


// Add/Remove theme nav menus
if ( !function_exists( 'jardiwinery_add_theme_menus' ) ) {
	function jardiwinery_add_theme_menus($menus) {
		return $menus;
	}
}


// Add theme specific widgetized areas
if ( !function_exists( 'jardiwinery_add_theme_sidebars' ) ) {
	function jardiwinery_add_theme_sidebars($sidebars=array()) {
		if (is_array($sidebars)) {
			$theme_sidebars = array(
				'sidebar_main'		=> esc_html__( 'Main Sidebar', 'jardiwinery' ),
				'sidebar_footer'	=> esc_html__( 'Footer Sidebar', 'jardiwinery' )
			);
			if (function_exists('jardiwinery_exists_woocommerce') && jardiwinery_exists_woocommerce()) {
				$theme_sidebars['sidebar_cart']  = esc_html__( 'WooCommerce Cart Sidebar', 'jardiwinery' );
			}
			$sidebars = array_merge($theme_sidebars, $sidebars);
		}
		return $sidebars;
	}
}


// Add theme required plugins
if ( !function_exists( 'jardiwinery_add_required_plugins' ) ) {
	function jardiwinery_add_required_plugins($plugins) {
		$plugins[] = array(
			'name' 		=> esc_html__( 'JardiWinery Utilities' , 'jardiwinery'),
			'version'	=> '3.2.3',					// Minimal required version
			'slug' 		=> 'trx_utils',
			'source'	=> jardiwinery_get_file_dir('plugins/install/trx_utils.zip'),
			'required' 	=> true
		);
		return $plugins;
	}
}

//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'jardiwinery_importer_set_options' ) ) {
    add_filter( 'trx_utils_filter_importer_options', 'jardiwinery_importer_set_options', 9 );
    function jardiwinery_importer_set_options( $options=array() ) {
        if ( is_array( $options ) ) {
            // Save or not installer's messages to the log-file
            $options['debug'] = false;
            // Prepare demo data
            if ( is_dir( JARDIWINERY_THEME_PATH . 'demo/' ) ) {
                $options['demo_url'] = JARDIWINERY_THEME_PATH . 'demo/';
            } else {
                $options['demo_url'] = esc_url( jardiwinery_get_protocol().'://demofiles.ancorathemes.com/jardiwinery/' ); // Demo-site domain
            }

            // Required plugins
            $options['required_plugins'] =  array(
                'essential-grid',
                'revslider',
                'mailchimp-for-wp',
                'trx_utils',
                'js_composer',
                'woocommerce',
                'contact-form-7'
            );

            $options['theme_slug'] = 'jardiwinery';

            // Set number of thumbnails to regenerate when its imported (if demo data was zipped without cropped images)
            // Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
            $options['regenerate_thumbnails'] = 3;
            // Default demo
            $options['files']['default']['title'] = esc_html__( 'Jardiwinery Demo', 'jardiwinery' );
            $options['files']['default']['domain_dev'] = esc_url('http://jardi.dv.ancorathemes.com'); // Developers domain
            $options['files']['default']['domain_demo']= esc_url('http://jardiwinery.ancorathemes.com'); // Demo-site domain

        }
        return $options;
    }
}


// Add data to the head and to the beginning of the body
//------------------------------------------------------------------------

// Add theme specified classes to the body tag
if ( !function_exists('jardiwinery_body_classes') ) {
	function jardiwinery_body_classes( $classes ) {

		$classes[] = 'jardiwinery_body';
		$classes[] = 'body_style_' . trim(jardiwinery_get_custom_option('body_style'));
		$classes[] = 'body_' . (jardiwinery_get_custom_option('body_filled')=='yes' ? 'filled' : 'transparent');
		$classes[] = 'article_style_' . trim(jardiwinery_get_custom_option('article_style'));
		
		$blog_style = jardiwinery_get_custom_option(is_singular() && !jardiwinery_storage_get('blog_streampage') ? 'single_style' : 'blog_style');
		$classes[] = 'layout_' . trim($blog_style);
		$classes[] = 'template_' . trim(jardiwinery_get_template_name($blog_style));
		
		$body_scheme = jardiwinery_get_custom_option('body_scheme');
		if (empty($body_scheme)  || jardiwinery_is_inherit_option($body_scheme)) $body_scheme = 'original';
		$classes[] = 'scheme_' . $body_scheme;

		$top_panel_position = jardiwinery_get_custom_option('top_panel_position');
		if (!jardiwinery_param_is_off($top_panel_position)) {
			$classes[] = 'top_panel_show';
			$classes[] = 'top_panel_' . trim($top_panel_position);
		} else 
			$classes[] = 'top_panel_hide';
		$classes[] = jardiwinery_get_sidebar_class();

		if (jardiwinery_get_custom_option('show_video_bg')=='yes' && (jardiwinery_get_custom_option('video_bg_youtube_code')!='' || jardiwinery_get_custom_option('video_bg_url')!=''))
			$classes[] = 'video_bg_show';

		if (jardiwinery_get_theme_option('page_preloader')!='')
			$classes[] = 'preloader';

		return $classes;
	}
}


// Add page meta to the head
if (!function_exists('jardiwinery_head_add_page_meta')) {
	function jardiwinery_head_add_page_meta() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1<?php if (jardiwinery_get_theme_option('responsive_layouts')=='yes') echo ', maximum-scale=1'; ?>">
		<meta name="format-detection" content="telephone=no">
	
		<link rel="profile" href="//gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php
	}
}

// Page preloader
if ( !function_exists('jardiwinery_head_add_page_preloader_styles') ) {
    function jardiwinery_head_add_page_preloader_styles() {
        if (($preloader=jardiwinery_get_theme_option('page_preloader'))!='') {
            $clr = jardiwinery_get_scheme_color('bg_color');
            $custom_style = "#page_preloader { background-color: <?php echo esc_attr($clr); ?>; background-image:url(<?php echo esc_url($preloader); ?>); background-position:center; background-repeat:no-repeat; position:fixed; z-index:1000000; left:0; top:0; right:0; bottom:0; opacity: 0.8; }";
            wp_add_inline_style('jardiwinery-main-style', $custom_style);
        }
    }
}

// Add gtm code to the beginning of the body 
if (!function_exists('jardiwinery_body_add_gtm')) {
	function jardiwinery_body_add_gtm() {
		echo jardiwinery_get_custom_option('gtm_code');
	}
}

// Add TOC anchors to the beginning of the body 
if (!function_exists('jardiwinery_body_add_toc')) {
	function jardiwinery_body_add_toc() {
		// Add TOC items 'Home' and "To top"
		if (jardiwinery_get_custom_option('menu_toc_home')=='yes' && function_exists('jardiwinery_sc_anchor'))
			jardiwinery_show_layout(jardiwinery_sc_anchor(array(
				'id' => "toc_home",
				'title' => esc_html__('Home', 'jardiwinery'),
				'description' => esc_html__('{{Return to Home}} - ||navigate to home page of the site', 'jardiwinery'),
				'icon' => "icon-home",
				'separator' => "yes",
				'url' => esc_url(home_url('/'))
				)
			)); 
		if (jardiwinery_get_custom_option('menu_toc_top')=='yes' && function_exists('jardiwinery_sc_anchor'))
			jardiwinery_show_layout(jardiwinery_sc_anchor(array(
				'id' => "toc_top",
				'title' => esc_html__('To Top', 'jardiwinery'),
				'description' => esc_html__('{{Back to top}} - ||scroll to top of the page', 'jardiwinery'),
				'icon' => "icon-double-up",
				'separator' => "yes")
				)); 
	}
}

// Add page preloader to the beginning of the body
if (!function_exists('jardiwinery_body_add_page_preloader')) {
	
	function jardiwinery_body_add_page_preloader() {
		if (($preloader=jardiwinery_get_theme_option('page_preloader'))!='') {
			?><div id="page_preloader"></div><?php
		}
	}
}


// Add data to the footer
//------------------------------------------------------------------------

// Add post/page views counter
if (!function_exists('jardiwinery_footer_add_views_counter')) {
	
	function jardiwinery_footer_add_views_counter() {
		// Post/Page views counter
		get_template_part(jardiwinery_get_file_slug('templates/_parts/views-counter.php'));
	}
}

// Add theme customizer
if (!function_exists('jardiwinery_footer_add_theme_customizer')) {
	
	function jardiwinery_footer_add_theme_customizer() {
		// Front customizer
		if (jardiwinery_get_custom_option('show_theme_customizer')=='yes') {
            require_once JARDIWINERY_FW_PATH . 'core/core.customizer/front.customizer.php';
		}
	}
}



// Add custom html
if (!function_exists('jardiwinery_footer_add_custom_html')) {
	
	function jardiwinery_footer_add_custom_html() {
		?><div class="custom_html_section"><?php
			echo jardiwinery_get_custom_option('custom_code');
		?></div><?php
	}
}

// Add gtm code
if (!function_exists('jardiwinery_footer_add_gtm2')) {
	
	function jardiwinery_footer_add_gtm2() {
		echo jardiwinery_get_custom_option('gtm_code2');
	}
}

function jardiwinery_wpb_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'jardiwinery_wpb_move_comment_field_to_bottom' );

// Add theme required plugins
if ( !function_exists( 'jardiwinery_add_trx_utils' ) ) {
    add_filter( 'trx_utils_active', 'jardiwinery_add_trx_utils' );
    function jardiwinery_add_trx_utils($enable=true) {
        return true;
    }
}


// Return text for the "I agree ..." checkbox
if ( ! function_exists( 'jardiwinery_trx_utils_privacy_text' ) ) {
    add_filter( 'trx_utils_filter_privacy_text', 'jardiwinery_trx_utils_privacy_text' );
    function jardiwinery_trx_utils_privacy_text( $text='' ) {
        return jardiwinery_get_privacy_text();
    }
}

/* GET, POST, COOKIE, SESSION manipulations
----------------------------------------------------------------------------------------------------- */

// Strip slashes if Magic Quotes is on
if (!function_exists('jardiwinery_stripslashes')) {
    function jardiwinery_stripslashes($val) {
        static $magic = 0;
        if ($magic === 0) {
            $magic = version_compare(phpversion(), '5.4', '>=')
                || (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()==1)
                || (function_exists('get_magic_quotes_runtime') && get_magic_quotes_runtime()==1)
                || strtolower(ini_get('magic_quotes_sybase'))=='on';
        }
        if (is_array($val)) {
            foreach($val as $k=>$v)
                $val[$k] = jardiwinery_stripslashes($v);
        } else
            $val = $magic ? stripslashes(trim($val)) : trim($val);
        return $val;
    }
}

// Add class trx_utils_activated
if(!function_exists('jardiwinery_add_body_class')) {
    if(!function_exists ( 'trx_utils_require_shortcode')){
        add_filter( 'body_class', 'jardiwinery_add_body_class' );
        function jardiwinery_add_body_class($classes){
            $classes[] = 'default_theme';
            return $classes;
        }
    }
}

// Include framework core files
//-------------------------------------------------------------------
require_once trailingslashit( get_template_directory() ) . 'fw/loader.php';
?>
