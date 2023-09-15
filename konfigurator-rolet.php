<?php 
/*
 * Plugin Name:       Konfigurator rolet
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Sebastian Nieroda
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       konfigurator-rolet
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Check if WooCommerce is active
 **/
if ( 
  !in_array( 
    'woocommerce/woocommerce.php', 
    apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) 
  ) 
){
    exit;
}

if(!defined('SN_KFG_PATH'))
{
    define('SN_KFG_PATH' , plugin_dir_path(__FILE__));
}
if(!defined('SN_KFG_DIR'))
{
    define('SN_KFG_DIR' , __FILE__);
}
if(!defined('SN_KFG_URL'))
{
    define('SN_KFG_URL' , plugin_dir_url(__FILE__));
}


class SN_KFG_Install{
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
        $this->include();
        
    }

    private function include()
    {
        require_once SN_KFG_PATH.'includes/konfigurator.php';
        $kfg = new SN_KFG();
        
        
    }
}

// Init plugin after woocommerce is initialized
function init_plugin_sn_kfg(){
    SN_KFG_Install::instance();
}

add_action('plugin_loaded' , 'init_plugin_sn_kfg');