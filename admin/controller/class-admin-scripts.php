<?php
namespace Gravityforms_SharpSpring_Forms\Admin\Controller;

/**
 * Admin Scripts
 *
 * @package     Gravityforms_SharpSpring_Forms
 * @subpackage  Gravityforms_SharpSpring_Forms/Admin/Classes
 * @author      Fulcrum Creatives <dev@fulcrumcreatives.com>
 * @copyright   Copyright (c) 2016, Fulcrum Creatives
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 */

// If this file is called directly, abort.
if( !defined( 'WPINC' ) ) { die; }

if( !class_exists( 'Admin_Scripts' ) ) {
  class Admin_Scripts {

    /**
     * Initialize the class
     *
     * @uses  add_action()
     * @since 1.0.0
     */
    public function __construct() { 
      add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
    } // end __construct()

    /**
     * Enqueue Scripts
     *
     * @uses   wp_register_script()
     * @uses   wp_enqueue_script()
     * @since  1.0.0
     * @return void
     */
    public function admin_scripts() {
      wp_register_script( GFSSF_PRE_FIX . '_admin_js', GFSSF_PLUGIN_URL . 'admin/view/js/scripts.js', array(), GFSSF_VERSION, true );
      wp_enqueue_script(  GFSSF_PRE_FIX . '_admin_js' );
    } // end admin_scripts()
  }
} // end Admin_Scripts