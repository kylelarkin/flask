<?

// Define own Jquery file and enqueue in footer
function flask_scripts_init() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js','','',false);
    wp_enqueue_script( 'jquery' );
}
add_action('wp_enqueue_scripts', 'flask_scripts_init');

// Add custom navigation to theme and adds Primary Navigation menu
function flask_menus_init() {
	register_nav_menus(
		array(
				'primary-header-menu' => __( 'Primary Header Menu' )
			)
	);
	wp_create_nav_menu( 'Primary Navigation', array( 'slug' => 'primary-nav' ) );
}
add_action( 'init', 'flask_menus_init' );

// Registers Primary Widget Area
function flask_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'twentyten' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'flask_widgets_init' );

// Registers Editor Styles
function flask_add_editor_styles() {
    add_editor_style( 'css/editor-style.css' );
}
add_action( 'init', 'flask_add_editor_styles' );

// Remove theme/plugin editor
define( 'DISALLOW_FILE_EDIT', true );

// Set Permalinks to Posttype on Theme Activation
if (get_option('permalink_structure') == '') {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
}

// Add Pagename Variable for Body Class paramter
function flask_page_name() {
	if( is_page( basename( get_permalink() ) ) ){
		$page_slug = "pagename-" . basename( get_permalink() );
	}else { $page_slug = ''; }
	return $page_slug;
}

// Add custom logo to Wordpress Login page(s). Logo should be no bigger than 323 pixels wide by 67 pixels high
function flask_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background: url('<?php bloginfo( 'template_directory' ) ?>/img/wp-login-logo-flask.png') no-repeat 0 0;
			margin: 0 0 0 23px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'flask_login_logo' );

// Register theme support for post thumbnails/featured images + example
add_theme_support( 'post-thumbnails' );
//add_image_size( $name, $width, $height, $hard_crop[boolean] );

// Template for comments and pingbacks. Via _s @since 1.0
if ( ! function_exists( '_s_comment' ) ) :
	function _s_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p><?php _e( 'Pingback:', '_s' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', '_s' ), ' ' ); ?></p>
		<?php
				break;
			default :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<footer>
					<div class="comment-author vcard">
						<?php echo get_avatar( $comment, 40 ); ?>
						<?php printf( __( '%s <span class="says">says:</span>', '_s' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</div><!-- .comment-author .vcard -->
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _e( 'Your comment is awaiting moderation.', '_s' ); ?></em>
						<br />
					<?php endif; ?>

					<div class="comment-meta commentmetadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
						<?php
							/* translators: 1: date, 2: time */
							printf( __( '%1$s at %2$s', '_s' ), get_comment_date(), get_comment_time() ); ?>
						</time></a>
						<?php edit_comment_link( __( '(Edit)', '_s' ), ' ' );
						?>
					</div><!-- .comment-meta .commentmetadata -->
				</footer>

				<div class="comment-content"><?php comment_text(); ?></div>

				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
			</article><!-- #comment-## -->

		<?php
				break;
		endswitch;
	}
endif; // ends check for _s_comment()

?>