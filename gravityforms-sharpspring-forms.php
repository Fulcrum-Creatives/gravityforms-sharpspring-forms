<?php
namespace Gravityforms_SharpSpring_Forms;

use Gravityforms_SharpSpring_Forms\Helpers as Helpers;
use Gravityforms_SharpSpring_Forms\Admin as Admin;
use Gravityforms_SharpSpring_Forms\Publics as Publics;
use Gravityforms_SharpSpring_Forms\Includes as Includes;

/**
 * Gravityforms_SharpSpring_Forms
 * 
 * @package     Plugin Name
 * @author      Fulcrum Creatives <dev@fulcrumcreatives.com>
 * @copyright   Copyright (c) 2016, Fulcrum Creatives
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * 
 * @wordpress-plugin
 * Plugin Name:       Gravityforms_SharpSpring_Forms
 * Plugin URI:        https://github.com/Fulcrum-Creatives/gravityforms-sharpspring-forms
 * Description:       Plugin Description
 * Version:           1.0.0
 * Author:            Fulcrum Creatives
 * Author URI:        http://fulcrumcreatives.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gfssf
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/Fulcrum-Creatives/gravityforms-sharpspring-forms
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) { die; }

if( !class_exists( 'GFSSF' ) ) {
  class GFSSF {
    
    /**
     * Instance of the class
     *
     * @since 1.0.0
     * @var Instance of GFSSF class
     */
    private static $instance;

    /**
     * Instance of the plugin
     *
     * @since 1.0.0
     * @static
     * @staticvar array 
     * @return Instance
     */
    public static function instance() {
      if ( !isset( self::$instance ) && ! ( self::$instance instanceof GFSSF ) ) {
        self::$instance = new GFSSF;
        self::$instance->define_constants();
        add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
        self::$instance->includes();
        self::$instance->init = new Includes\Includes_Init();
        if( !is_admin() ) {
          self::$instance->public_init = new Publics\Public_Init();
        }
        if( is_admin() ) {
          self::$instance->admin_init = new Admin\Admin_Init();
        }
      }
    return self::$instance;
    }

    /**
     * Define the plugin constants
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function define_constants() {
      // Plugin Version
      if ( !defined( 'GFSSF_VERSION' ) ) {
        define( 'GFSSF_VERSION', '1.0.0' );
      }
      // GFSSF
      if ( !defined( 'GFSSF_PRE_FIX' ) ) {
        define( 'GFSSF_PRE_FIX', 'gfssf' );
      }
      // Plugin Directory
      if ( !defined( 'GFSSF_PLUGIN_DIR' ) ) {
        define( 'GFSSF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
      }
      // Plugin URL
      if ( !defined( 'GFSSF_PLUGIN_URL' ) ) {
        define( 'GFSSF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
      }
      // Plugin Root File
      if ( !defined( 'GFSSF_PLUGIN_FILE' ) ) {
        define( 'GFSSF_PLUGIN_FILE', __FILE__ );
      }
    }

    /**
     * Load the required files
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function includes() {
      // Autoloader
      if ( file_exists( DPM_PLUGIN_DIR . 'helpers/class-autoloader.php' ) ) {
        require_once DPM_PLUGIN_DIR . 'helpers/class-autoloader.php';
      }
      // Helpers
      Helpers\dpm_autoloader( 'helpers/classes' );
      Helpers\dpm_autoloader( 'helpers/vendor/classes' );
      // Template Functions
      if ( file_exists( DPM_PLUGIN_DIR . 'helpers/template-functions.php' ) ) {
        include DPM_PLUGIN_DIR . 'helpers/template-functions.php';
      }
      // Includes
      Helpers\dpm_autoloader( 'includes/controller' );
      Helpers\dpm_autoloader( 'includes/model' );
      Helpers\dpm_autoloader( 'includes/vendor/classes' );
      if ( file_exists( DPM_PLUGIN_DIR . 'includes/class-includes-init.php' ) ) {
        include DPM_PLUGIN_DIR . 'includes/class-includes-init.php';
      }
      // Public
      if( !is_admin() ) {
        Helpers\dpm_autoloader( 'public/controller' );
        Helpers\dpm_autoloader( 'public/model' );
        Helpers\dpm_autoloader( 'public/vendor/classes' );
        if ( file_exists( DPM_PLUGIN_DIR . 'public/class-public-init.php' ) ) {
          include DPM_PLUGIN_DIR . 'public/class-public-init.php';
        }
      }
      // public
      if( is_admin() ) {
        Helpers\dpm_autoloader( 'admin/controller' );
        Helpers\dpm_autoloader( 'admin/model' );
        Helpers\dpm_autoloader( 'admin/vendor/classes' );
        if ( file_exists( DPM_PLUGIN_DIR . 'admin/class-admin-init.php' ) ) {
          include DPM_PLUGIN_DIR . 'admin/class-admin-init.php';
        }
      }
      // Activation
      if ( file_exists( DPM_PLUGIN_DIR . 'admin/class-admin-init.php' ) ) {
        include DPM_PLUGIN_DIR . 'activation.php';
      }
    }

    /**
     * Load the plugin text domain for translation.
     *
     * @since  1.0.0
     * @access public
     */
    public function load_textdomain() {
      $gfssf_lang_dir = dirname( plugin_basename( GFSSF_PLUGIN_FILE ) ) . '/languages/';
      $gfssf_lang_dir = apply_filters( 'gfssf_lang_dir', $gfssf_lang_dir );
      $locale = apply_filters( 'plugin_locale',  get_locale(), 'textdomain' );
      $mofile = sprintf( '%1-%2.mo', 'textdomain', $locale );
      $mofile_local  = $gfssf_lang_dir . $mofile;
      if ( file_exists( $mofile_local ) ) {
        load_textdomain( 'textdomain', $mofile_local );
      } else {
        load_plugin_textdomain( 'textdomain', false, $gfssf_lang_dir );
      }
    }

    /**
     * Throw error on object clone
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function __clone() {
      _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'textdomain' ), '1.6' );
    }

    /**
     * Disable unserializing of the class
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function __wakeup() {
      _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'textdomain' ), '1.6' );
    }

  }
} // end GFSSF
/**
 * Return the instance 
 *
 * @since 1.0.0
 * @return object The Safety Links instance
 */
function GFSSF_Run() {
  return GFSSF::instance();
} // end GFSSF_Run
//GFSSF_Run();