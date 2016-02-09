<?php
use Gravityforms_SharpSpring_Forms\Includes\Classes as Includes;
use Gravityforms_SharpSpring_Forms\Admin\Classes    as Admin;
use Gravityforms_SharpSpring_Forms\Helpers\Classes  as Helpers;
/**
 * Template Functions
 *
 * @package    Gravityforms_SharpSpring_Forms
 * @subpackage Gravityforms_SharpSpring_Forms/Helpers
 * @author     Fulcrum Creatives <dev@fulcrumcreatives.com>
 * @copyright  Copyright (c) 2016, Fulcrum Creatives
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since      1.0.0
 */

// If this file is called directly, abort.
if( !defined( 'WPINC' ) ) { die; }

/**--------------------------------------------------------
 * Helpers
 *---------------------------------------------------------*/
/**
 * Register Post Type
 *
 * @param      string $name   The post type name
 * @param      string $plural A custom plural version of the post type name
 * @param      array  $labels The labels used for the post type
 * @param      array  $args   The arguments for the post type
 * @since      1.0.0
 * @return     void
 */
if( !function_exists( 'gfssf_register_post_type') ) {
  function gfssf_register_post_type( $name, $plural = '', $labels = array(), $args = array() ) {
    $gfssf_register_post_type = new Helpers\Register_Post_Types( $name, $plural, $labels, $args );
    return $gfssf_register_post_type->register();
  }
} // end gfssf_register_post_type
/**--------------------------------------------------------
 * Admin
 *---------------------------------------------------------*/

/**--------------------------------------------------------
 * Includes
 *---------------------------------------------------------*/