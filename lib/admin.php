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
 * Remove extra menus from wp admin. via http://sixrevisions.com/wordpress/how-to-customize-the-wordpress-admin-area/
 */
// function remove_menu_items() {
//   global $menu;
//   $restricted = array(__('Posts'), __('Comments'));
//   end ($menu);
//   while (prev($menu)){
//     $value = explode(' ',$menu[key($menu)][0]);
//     if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
//       unset($menu[key($menu)]);}
//     }
//   }
// add_action('admin_menu', 'remove_menu_items');

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