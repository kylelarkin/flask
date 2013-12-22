<?php
/**
 * Registers Editor Styles
 */
function flask_add_editor_styles() {
    add_editor_style( 'css/editor-style.css' );
}
add_action( 'init', 'flask_add_editor_styles' );

/**
 * Remove theme/plugin editor
 */
define( 'DISALLOW_FILE_EDIT', true );

/**
 * Add custom logo to Wordpress Login page(s). Logo should be no bigger than 323 pixels wide by 67 pixels high
 */
function flask_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background: url('<?php bloginfo( 'template_directory' ) ?>/img/wp-login-logo-flask.png') no-repeat 0 0;
			margin: 0 0 0 23px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'flask_login_logo' );