<?php
namespace Gravityforms_SharpSpring_Forms\Publics\Controller;

/**
 * Public Scripts
 *
 * @package     Gravityforms_SharpSpring_Forms
 * @subpackage  Gravityforms_SharpSpring_Forms/Public/Classes
 * @author      Fulcrum Creatives <dev@fulcrumcreatives.com>
 * @copyright   Copyright (c) 2016, Fulcrum Creatives
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 */

// If this file is called directly, abort.
if( !defined( 'WPINC' ) ) { die; }

if( !class_exists( 'Public_Scripts' ) ) {
  class Public_Scripts {

    /**
     * Initialize the class
     *
     * @uses  add_action();
     * @since 1.0.0
     */
    public function __construct() { 
      add_action( 'wp_enqueue_scripts', array( $this, 'public_scripts' ) );
    } // end __construct

    /**
     * Enqueue Scripts
     *
     * @uses   wp_register_script()
     * @uses   wp_enqueue_script()
     * @since  1.0.0
     * @return void
     */
    public function public_scripts() {
      wp_register_script( GFSSF_PRE_FIX . '-public-js', GFSSF_PLUGIN_URL . 'includes/view/js/scripts.js', array(), GFSSF_VERSION, true );
      wp_enqueue_script(  GFSSF_PRE_FIX . '-public-js' );
    } // end public_scripts

  }
} // end Public_Scripts