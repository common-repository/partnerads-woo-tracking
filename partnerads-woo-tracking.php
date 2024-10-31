<?php
/*
Plugin Name: Partner-Ads TrackingCode
Plugin URI: http://dabasys.dk/plugins.php
Description: Adds the partner-ads.dk tracking code to your thank you page on a woocommerce webshop.
Author: Tommy Maersk
Author URI: http://dabasys.dk
Version: 1.5
*/

/***********
 * Globals
 */
$dtpa_plugname = "Partner-Ads TrackingCode";
$dtpa_site_url = site_url();
// retrievber plugin settings from options table
$dtpa_options = get_option('dtpa_settings');

/***********
 * Includes
 */
include('includes/scripts.php'); // js/css
include('includes/admin-page.php'); // admin page
/***********
 * Menu & Settings Links
 */
function dtpa_plugin_add_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=dtpa-options">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'dtpa_plugin_add_settings_link' );
function dtpa_add_options_link() {
    global $dtpa_plugname;
    add_options_page($dtpa_plugname,$dtpa_plugname,'manage_options','dtpa-options','dtpa_options_page');
}
add_action('admin_menu','dtpa_add_options_link');

?>
