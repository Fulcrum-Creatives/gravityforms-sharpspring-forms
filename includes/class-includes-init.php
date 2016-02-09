<?php
namespace Gravityforms_SharpSpring_Forms\Includes;
use Gravityforms_SharpSpring_Forms\Includes\Controller as Controller;

/**
 * Includes Instantiate
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

if( !class_exists( 'Includes_Init' ) ) {
  class Includes_Init {

    /**
     * Initialize the class
     *
     * @since 1.0.0
     */
    public function __construct() {
      $this->post_types();
    } // end __construct

    /**
     * Post Types
     *
     * @since      Version
     * @return     Return
     */
    protected function post_types() {
      $test_args = array(
        'menu_position'   => NULL,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'supports'        => array( 'title', 'editor' ),
      );
      register_extended_post_type( 'test', $test_args );
    } // end post_types

  }
} // end Includes_Init