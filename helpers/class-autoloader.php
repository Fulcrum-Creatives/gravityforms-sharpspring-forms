<?php
namespace Gravityforms_SharpSpring_Forms\Helpers; 
/**
 * Autoloader
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

if( !class_exists( 'Autoloader' ) ) {
  class Autoloader {

    /**
     * The directory path to your classes.
     * No leading or training slashed required.
     * 
     * @var string $dir the directory containing the classes to load
     */
    public $dir;

    /**
     * Initialize the class
     *
     * @uses       spl_autoload_register()
     * @since      1.0.0
     */
    public function __construct( $dir ) {
      $this->dir = $dir;
      spl_autoload_register( array( $this, 'autoloader') );
    } // end __construct

    /**
     * Autoloader
     *
     * @uses       glob()
     * @since      1.0.0
     * @return     void
     */
    public function autoloader() {
      foreach( glob( GFSSF_PLUGIN_DIR . $this->dir .'/*.php' ) as $filename ) {
        require_once $filename;
      }
    } // end autoloder
  }
} // end Autoloader

/**
 * Autoloader
 *
 * Load classes in specifided directory
 *
 * @version    1.0.0
 * @uses       Autoloader() helpers/class-autoload.php
 * @param      string $dir the directory pointing to the classes
 * @return     void
 */
if( !function_exists( 'gfssf_autoloader') ) {
  function gfssf_autoloader( $dir ) {
    $gfssf_autoloader = new Autoloader( $dir );
  }
} // end gfssf_autoloader