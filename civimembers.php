<?php
  /*
   Plugin Name: Civicrm Code Generator for civimembers or events
   Description: Civicrm Members Or Events
   program in a random language.
   Version: 0.1
   Author: manish
   Author URI: example.com
  */
$helloworld_table_name = "helloworldsnippets";

  /*
  * 
  * author@manish
  */

function civimembers_install() {

   global $wpdb, $helloworld_table_name;

   return ;
 }
  register_activation_hook(__FILE__, 'civimembers_install');

function civimembers_uninstall() {

}

register_deactivation_hook(__FILE__, 'civimembers_uninstall');


function civimembers_get_civicrm_members( $id ) {

     require_once "wp-content/plugins/civicrm/civicrm.settings.php";

     require_once 'CRM/Core/Config.php';
    
     $params = array(
         'version' => 3,
         'page' => 'CiviCRM',
         'q' => 'civicrm/ajax/rest',
         'sequential' => 1,
         'id' =>$id['id'],
         );
     $result = civicrm_api('Event', 'get', $params);

     return $result["values"][0]["description"];
   }

  /*
   [civievents id="your Event id"]
   call back function for add_shortcode
  */

  add_shortcode('civievents','civimembers_get_civicrm_members');

  ?>
