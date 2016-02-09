<?php
namespace Gravityforms_SharpSpring_Forms\Publics\Controller;

/**
 * Public Styles
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

if( !class_exists( 'Public_Styles' ) ) {
  class Public_Styles {

    /**
     * Initialize the class
     *
     * @uses  add_action()
     * @since 1.0.0
     */
    public function __construct() { 
      add_action( 'wp_enqueue_scripts', array( $this, 'public_styles' ) );
    } // end __construct

    /**
     * Public Styles
     *
     * @uses   wp_register_style()
     * @uses   wp_enqueue_style()
     * @since  1.0.0
     * @return void
     */
    public function public_styles() {
      wp_register_style( GFSSF_PRE_FIX . '_public', GFSSF_PLUGIN_URL . 'includes/view/css/styles.css', array(), GFSSF_VERSION, 'all' );
      wp_enqueue_style(  GFSSF_PRE_FIX . '_public' );
    } // end public_styles

  }
} // end Public_Styles