]<?php
/*
  Plugin Name: Civicrm Code Generator for civimembers or events
  Description: Civicrm Members Or Events
  program in a random language.
  Version: 0.1
  Author: manish
  Author URI: example.com
*/

/*
 *
 * author@manish
 */

function civimembers_install() {

  return ;
}
register_activation_hook(__FILE__, 'civimembers_install');

function civimembers_uninstall() {

  return ;
}

register_deactivation_hook(__FILE__, 'civimembers_uninstall');


function civimembers_get_civicrm_members($id) {

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

function civievents_get_list(){
  require_once "wp-content/plugins/civicrm/civicrm.settings.php";
  require_once 'CRM/Core/Config.php';
  $params = array(
    'version' => 3,
    'page' => 'CiviCRM',
    'q' => 'civicrm/ajax/rest',
    'sequential' => 1,
  );
   $result = civicrm_api('Event', 'get', $params);
   $k = 0;
   /* CRM_Core_Error::debug( '$result', $result ); */
   while($result)
     {
      echo $list["$k"]['title'];
      if($k=2){
        break;
     }
      $k++;
    }
  //  return $result;
}

/*
   [civieventlist limit=""]
   call back function for add_shortcode for function civievents_get_list.
 */
 add_shortcode('civieventlist','civievents_get_list');

  ?>
