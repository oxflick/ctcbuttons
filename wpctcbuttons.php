<?php

/*
* Plugin Name: CTC Buttons
* Plugin URI: http://www.oxanaweb.com
* Description: Make buttons off and on for declare intent
* Version: 1.0
* Author: Oxana Web
* Author URI: http://www.oxanaweb.com
* Licence: GPL2
*
*/


$plugin_url = WP_PLUGIN_URL . '/wpctcbuttons';
/*
* Add a link to our plugin in the admin menu
* under Settongs
*
*/

//Direct access to this file is not permitted
if (!defined('ABSPATH')){
    exit("Do not access this file directly.");
}

function wpctcbuttons_menu() {

  add_options_page(
      'CTC Buttons',
      'Declare Buttons',
      'manage_options',
      'wpctcbuttons',
      'wpctcbuttons_options_page'
  );
}
add_action('admin_menu', 'wpctcbuttons_menu');

/*
create a table in DB after activation of the plugin
*/

global $ctcbuttons_db_version;
$ctcbuttons_db_version = '1.0';

function ctcbuttons_install() {
	global $wpdb;
	global $ctcbuttons_db_version;

	$table_name = $wpdb->prefix . 'ctcbuttons';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		addedtime datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		ctcbuttonsleaguename text NOT NULL,
        ctcbuttonsstatus varchar(50) NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'ctcbuttons_db_version', $ctcbuttons_db_version );
}

register_activation_hook( __FILE__, 'ctcbuttons_install' );




function wpctcbuttons_options_page() {
	if ( !current_user_can( 'manage_options')) {
		wp_die("You can not have enough rights to do it");
	
	}
	global $wpdb;
	global $plugin_url;
	global $wp_ctcbuttons_table;


	$table_name = $wpdb->prefix . 'ctcbuttons';

    if ( isset( $_POST['Addleague_form_submitted'])) {
    	$hidden_field = esc_html( $_POST['Addleague_form_submitted']);
    
        if( $hidden_field == 'Y') {
        	$wpctcbuttons_leaguename = esc_html( $_POST['ctcbuttons_leaguename']);
            $wpctcbuttons_status = esc_html( $_POST['status']);
        
            $table_name = $wpdb->prefix . 'ctcbuttons';

            $wpdb->insert(
            $table_name,
              array(
                'addedtime' => current_time( 'mysql'),
                'ctcbuttonsleaguename' => $wpctcbuttons_leaguename,
                'ctcbuttonsstatus' => $wpctcbuttons_status,

              	)

            );
        }

    }

    if ( isset( $_POST['updated_form_submitted'] ) ) {
    	$hidden_name = esc_html( $_POST['updated_form_submitted']);

    	if( $hidden_name == "CH" ) {
    		$wpctcbuttons_namechange = esc_html( $_POST['ctcleaguename']);
    		$wpctcbuttons_change = esc_html( $_POST['status']);
    	
    	    $wpctcbuttons_id = substr($wpctcbuttons_namechange, -1);


            $table_name = $wpdb->prefix . 'ctcbuttons';

            $wpdb->update( 
            $table_name, 
               array( 
                'ctcbuttonsstatus' => $wpctcbuttons_change,
                ),
                array(
                'id' => $wpctcbuttons_id,
                ) 
            );
        }
    }	

	require( 'inc/options-page-wrapper.php');
}

function ctcbuttons_shortcode( $atts, $content = null ) {
    
    global $wpdb;
	global $plugin_url;
	global $wp_ctcbuttons_table;
    
    if ( isset( $_POST['updated_form_submitted'] ) ) {
    	$hidden_name = esc_html( $_POST['updated_form_submitted']);

    	if( $hidden_name == "CH" ) {
    		$wpctcbuttons_namechange = esc_html( $_POST['ctcleaguename']);
    		$wpctcbuttons_change = esc_html( $_POST['status']);
    	
    	    $wpctcbuttons_id = substr($wpctcbuttons_namechange, -1);


            $table_name = $wpdb->prefix . 'ctcbuttons';

            $wpdb->update( 
            $table_name, 
               array( 
                'ctcbuttonsstatus' => $wpctcbuttons_change,
                ),
                array(
                'id' => $wpctcbuttons_id,
                ) 
            );
        }
    }

    ob_start();

	require( 'inc/front-end-ctcbuttons.php');
    
    $content = ob_get_clean();

    return $content;

}
add_shortcode( 'ctcbuttons', 'ctcbuttons_shortcode');

function buttons_shortcode( $atts, $content = null ) {
    global $wpdb;
	global $plugin_url;
	global $wp_ctcbuttons_table;

    ob_start();

	require( 'inc/front-end-buttons.php');
    
    $content = ob_get_clean();

    return $content;
}
add_shortcode( 'buttons', 'buttons_shortcode');	

function wpctcbuttons_styles() {
	wp_enqueue_style( 'wpctcbuttons', plugins_url( 'wpctcbuttons/wpctcbuttons.css'));
}
add_action( 'admin_head', 'wpctcbuttons_styles');

?>