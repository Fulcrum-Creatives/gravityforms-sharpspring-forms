<?php
namespace Gravityforms_SharpSpring_Forms;
use Gravityforms_SharpSpring_Forms\Includes\Classes as Includes;
use Gravityforms_SharpSpring_Forms\Admin\Classes    as Admin;
use Gravityforms_SharpSpring_Forms\Helpers\Classes  as Helpers;

/**
 * Unistall
 *
 * Called on plugin activation
 *
 * @package    Package
 * @subpackage Package/SubPackage
 * @author     Author <dev@fulcrumcreatives.com>
 * @copyright  Copyright (c) 2016, Author
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since      1.0.0
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) { die; }

// If uninstall is not called from WordPress, exit.
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) { exit(); }

if( !class_exists( 'GFSSF_Unistall' ) ) {
  class GFSSF_Unistall {

    /**
     * Initialize the class
     *
     * @since 1.0.0
     */
    public function init() {
      flush_rewrite_rules();
    } // end init

  }
} // end GFSSF_Unistall