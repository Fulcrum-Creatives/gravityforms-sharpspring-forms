<?php
namespace Gravityforms_SharpSpring_Forms;
use Gravityforms_SharpSpring_Forms\Includes\Classes as Includes;
use Gravityforms_SharpSpring_Forms\Admin\Classes    as Admin;
use Gravityforms_SharpSpring_Forms\Helpers\Classes  as Helpers;

/**
 * Activation
 *
 * Called on plugin activation
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

if( !class_exists( 'GFSSF_Activation' ) ) {
  class GFSSF_Activation {

    /**
     * Initialize the class
     *
     * @since 1.0.0
     */
    public function init() {
      flush_rewrite_rules();
    } // end init

  }
} // end GFSSF_Activation
$activation = new GFSSF_Activation();
register_activation_hook( GFSSF_PLUGIN_FILE, array( $activation, 'init' ) );