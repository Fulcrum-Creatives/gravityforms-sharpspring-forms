<?php
namespace Gravityforms_SharpSpring_Forms\Publics;
use Gravityforms_SharpSpring_Forms\Publics\Controller as Controller;

/**
 * Public Instantiate
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

if( !class_exists( 'Public_Init' ) ) {
  class Public_Init {

    /**
     * Initialize the class
     *
     * @since 1.0.0
     */
    public function __construct() {
      if( !is_admin() ) {
        $public_scripts = new Controller\Public_Scripts();
        $public_styles  = new Controller\Public_Styles();
      }
    } // end __construct
  }
} // end Public_Init