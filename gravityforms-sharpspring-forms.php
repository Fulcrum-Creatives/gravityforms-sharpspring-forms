<?php
/**
 * Gravity_Forms_SharpSpring_Forms
 * 
 * @package     Gravity Forms add-on: SharpSpring Forms
 * @author      Fulcrum Creatives <dev@fulcrumcreatives.com>
 * @copyright   Copyright (c) 2016, Fulcrum Creatives
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * 
 * @wordpress-plugin
 * Plugin Name:       Gravity Forms add-on: SharpSpring Forms
 * Plugin URI:        https://github.com/Fulcrum-Creatives/gravityforms-sharpspring-forms
 * Description:       Plugin Description
 * Version:           1.0.0
 * Author:            Fulcrum Creatives
 * Author URI:        http://fulcrumcreatives.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/Fulcrum-Creatives/gravityforms-sharpspring-forms
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) { die; }

if ( class_exists( 'GFForms' ) ) {
  GFForms::include_addon_framework();
  class GFSharpSpringForms extends GFAddOn {
    protected $_version = '1.0'; 
    protected $_min_gravityforms_version = '1.9';
    protected $_slug = 'sharpspring_forms';
    protected $_path = 'gravityforms-sharpspring-forms/gravityforms-sharpspring-forms.php';
    protected $_full_path = __FILE__;
    protected $_title = 'Gravity Forms add-on: SharpSpring Forms';
    protected $_short_title = 'SharpSpring Forms';

    /**
     * Admin Init
     *
     * @uses   init_admin()
     * @since  1.0.0
     * @return void
     */
    public function init_admin() {
      parent::init_admin();
      $this->form_settings_fields($form);
    }

    /**
     * Frontend init
     *
     * @uses   init_frontend()
     * @uses   add_filter()
     * @since  1.0.0
     * @return void
     */
    public function init_frontend() {
      parent::init_frontend();
      add_filter( 'gform_get_form_filter', array( $this, 'add_ss_tracking'), 10, 2 );
    }

    /**
     * From Settings Fields
     *
     * Creates form settings tab and fields
     *
     * @param  array $form the form array
     * @since  1.0.0
     * @return void
     */
    public function form_settings_fields($form) {
      return array(
        array(
          "title"  => "SharpSpring Form Tracking Code",
          "fields" => array(
            array(
              "label"   => "SharpSpring Form Tracking Code",
              "type"    => "textarea",
              "name"    => "sharpspring_form_tracking_code",
              "tooltip" => "Enter the entire SharpSpring Form Tracking Code",
              "class"   => "medium mt-position-right"
            ),
          )
        )
      );
    }

    /**
     * Add Form Tracking Code
     *
     * Adds the form tracking code after the form on the frontend
     *
     * @param  string $form_string The form output
     * @param  array $form the form array
     * @since  1.0.0
     * @return void
     */
    public function add_ss_tracking($form_string, $form) {
      $settings = $this->get_form_settings($form);
      $form_id  = $form['id'];
      $tracking = $settings["sharpspring_form_tracking_code"];
      if( !empty($tracking) ) {
        $escaped = htmlentities(str_replace( array( "__ss_noform.push(['endpoint', '", "']);"), array('start', 'end'), $tracking));
        preg_match_all('!https?://\S+!', $escaped, $tracking_url);
        $tracking_url = str_replace("end", "", $tracking_url[0]);
        preg_match('/start(.*?)end/', $escaped, $endpoint);
        $form_string .= "
<script type=\"text/javascript\">
var __ss_noform = __ss_noform || [];
__ss_noform.push(['baseURI', '$tracking_url[0]']);
__ss_noform.push(['form', 'gform_$form_id', '$endpoint[1]']);
</script>
<script type=\"text/javascript\" src=\"$tracking_url[1]\" ></script>";
      }
      return $form_string;
    }
  }
  new GFSharpSpringForms();
}