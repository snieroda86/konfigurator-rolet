<?php 
class SN_KFG{
	 protected static $instance;
    // Singleton 
    public static function instance()
    {
        if ( is_null(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
       add_filter('woocommerce_settings_tabs_array', array($this , 'custom_woocommerce_settings_tabs'), 50);
       add_action('woocommerce_settings_tabs_custom_tab', array($this , 'custom_woocommerce_settings_tab_content'));
       add_action('woocommerce_update_options_custom_tab', array($this, 'custom_woocommerce_save_settings'));
    }

    public function custom_woocommerce_settings_tabs($tabs) {
	    $tabs['custom_tab'] = __('Konfigurator', 'konfigurator-rolet'); 
	    return $tabs;
	}

	public function custom_woocommerce_settings_tab_content() {
	   require_once SN_KFG_PATH.'templates/admin/konfigurator-settings.php';
	}

	public function custom_woocommerce_save_settings() {
	    if (isset($_POST['kgf_nonce']) && !wp_verify_nonce($_POST['kgf_nonce'], 'save_kgf_settings')) {
		    return;
		} 

		update_option('sn_kgf_settings' , $_POST['sn_kgf_settings'] );

	}
}