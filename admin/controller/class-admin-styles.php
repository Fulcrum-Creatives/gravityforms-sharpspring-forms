<?php
namespace Gravityforms_SharpSpring_Forms\Admin\Controller;

/**
 * Admin Styles
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

if( !class_exists( 'Admin_Styles' ) ) {
	class Admin_Styles {

		/**
		 * Initialize the class
		 *
		 * @uses  add_action()
		 * @since 1.0.0
		 */
		public function __construct() { 
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );
		} // end __construct

		/**
		 * Admin Styles
		 *
		 * @uses   wp_register_style()
		 * @uses   wp_enqueue_style()
		 * @since  1.0.0
		 * @return void
		 */
		public function admin_styles() {
			wp_register_style( GFSSF_PRE_FIX . '_admin', GFSSF_PLUGIN_URL . 'admin/view/css/styles.css', array(), GFSSF_VERSION, 'all' );
			wp_enqueue_style(  GFSSF_PRE_FIX . '_admin' );
		} // end admin_styles
	}
} // end Admin_Styles