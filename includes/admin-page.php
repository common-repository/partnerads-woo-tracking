<?php
function dtpa_options_page() {
    
    global $dtpa_options;
    global $dtpa_plugname;
    global $dtpa_site_url;
    ob_start(); ?>
<div class="wrap">
    <h2><?php echo $dtpa_plugname; ?></h2>
     <?php if (is_plugin_active( 'woocommerce/woocommerce.php')) { ?>
    <p>Enter your ProgramID from <a href="http://www.partner-ads.com/dk/klikbanner.php?partnerid=12476&bannerid=17193" target=_blank>Partner-Ads</a>, in order to insert it into the tracking code on the thank you page.
        </p>
    
    
    <form method="POST" action="options.php">
        <?php settings_fields('dtpa_settings_group'); ?>
        <h4><?php _e("Enable","dtpa_domain"); ?></h4>
        <p>
            <input type="checkbox" name="dtpa_settings[enable]" id="dt_settings[enable]" value="1" <?php checked("1",$dtpa_options['enable']); ?>>
            <label class="description" for="dtpa_settings[enable]" ><?php _e("Enable PartnerAds Tracking","dtpa_domain"); ?></label>
            
        </p>
        
        
        <h4><?php _e("Partner-Ads Tracking Code Gen","dtpa_domain"); ?></h4>
        <p>The ProgramID can be found in the url when you click "Programmer" and then select the program - on the partner-ads admin page. Most likely is it a 4 digit number.</p>
        <p>
            <input id="dt_settings[programid]" name="dtpa_settings[programid]" type="text" value="<?php echo $dtpa_options['programid']; ?>">
            <label class="description" for="dtpa_settings[programid]"><?php _e("Insert your Partner-Ads ProgramID","dtpa_domain"); ?></label>
            
        </p>
        
     
        
        
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e("Submit","dtpa_domain"); ?>">
        </p>
    
    </form>
     <?php } else {
         echo "<a href='https://wordpress.org/plugins/woocommerce/' target=_blank>WooCommerce</a> is needed for the plugin to work!";
     } ?>
    <p>
        This plugin was made by <a href="http://dabasys.com" target="_blank">DaBaSys.com</a> - as a feature like this was needed, and we wanted to share it with the world ;)
        
    </p>
</div>
<?php
echo ob_get_clean();
}

function dtpa_register_settings() {
    register_setting('dtpa_settings_group', 'dtpa_settings');
}
add_action('admin_init','dtpa_register_settings');

?>