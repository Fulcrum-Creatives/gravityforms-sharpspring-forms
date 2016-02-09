<?php
namespace Gravityforms_SharpSpring_Forms\Admin;
use Gravityforms_SharpSpring_Forms\Admin\Controller as Controller;

/**
 * Admin Instantiate
 *
 * @package    Package
 * @subpackage Package/SubPackage
 * @author     Fulcrum Creatives <dev@fulcrumcreatives.com>
 * @copyright  Copyright (c) 2016, Fulcrum Creatives
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since      1.0.0
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) { die; }

if( !class_exists( 'Admin_Init' ) ) {
  class Admin_Init {

    /**
     * Initialize the class
     *
     * @since 1.0.0
     */
    public function __construct() {
      $admin_scripts = new Controller\Admin_Scripts();
      $admin_styles  = new Controller\Admin_Styles();
    } // end __construct

  }
} // end Admin_Init