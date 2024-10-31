<?php
/**
* Plugin Name: OC Age Verification
* Description: Using This Plugin You will Check a visitors age before allowing them to view your website. 
* Version: 1.0
* Author: Ajay Radadiya
* License: A "GNUGPLv3" license name 
*/

if (!defined('ABSPATH')) {
  die('-1');
}
if (!defined('OCAVP_PLUGIN_NAME')) {
  define('OCAVP_PLUGIN_NAME', 'Age Verification');
}
if (!defined('OCAVP_PLUGIN_VERSION')) {
  define('OCAVP_PLUGIN_VERSION', '1.0.0');
}
if (!defined('OCAVP_PLUGIN_FILE')) {
  define('OCAVP_PLUGIN_FILE', __FILE__);
}
if (!defined('OCWDD_PLUGIN_DIR')) {
  define('OCWDD_PLUGIN_DIR',plugins_url('', __FILE__));
}

if (!defined('OCAVP_DOMAIN')) {
  define('OCAVP_DOMAIN', 'ocavp');
}

//Main class
if (!class_exists('OCAVP_main')) {

  class OCAVP_main {

    protected static $OCAVP_instance;

    //Add JS and CSS on Backend
    function OCAVP_load_admin_script_style() {
      wp_enqueue_media();
      wp_enqueue_style( 'ocavp_admin_css', OCWDD_PLUGIN_DIR . '/assets/css/ocavp-admin-css.css', false, '1.0.0' );
      wp_enqueue_script( 'ocavp_admin_js', OCWDD_PLUGIN_DIR . '/assets/js/ocavp-admin-js.js', false, '1.0.0' );
    }

     //Add JS and CSS on Frontend
    function OCAVP_load_script_style() {
      wp_enqueue_style( 'ocavp_front_css', OCWDD_PLUGIN_DIR . '/assets/css/ocavp-front-css.css', false, '1.0.0' );
      wp_enqueue_script( 'ocavp_front_js', OCWDD_PLUGIN_DIR . '/assets/js/ocavp-front-js.js', false, '1.0.0' );
    }

    function init() {
      add_action('admin_enqueue_scripts', array($this, 'OCAVP_load_admin_script_style'));
      add_action( 'wp_enqueue_scripts',  array($this, 'OCAVP_load_script_style'));
    }

    //Load all includes files
    function includes() {

      //Plugin Settings
      include_once('admin/ocavp-all-settings.php');

      //For Front
      include_once('front/ocavp-front-action.php');
    }

    //Plugin Rating
    public static function OCAVP_do_activation() {
      set_transient('ocavp-first-rating', true, MONTH_IN_SECONDS);
    }

    public static function OCAVP_instance() {
      if (!isset(self::$OCAVP_instance)) {
        self::$OCAVP_instance = new self();
        self::$OCAVP_instance->init();
        self::$OCAVP_instance->includes();
      }
      return self::$OCAVP_instance;
    }

  }

  add_action('plugins_loaded', array('OCAVP_main', 'OCAVP_instance'));

  register_activation_hook(OCAVP_PLUGIN_FILE, array('OCAVP_main', 'OCAVP_do_activation'));
}
