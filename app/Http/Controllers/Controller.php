<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function send_android_notification_new($deviceToken,$message,$noti_type = "") {
        return "s";
        if (!defined('API_ACCESS_KEY')) {
          define('API_ACCESS_KEY' ,'AAAAuVOzMUY:APA91bE0naZRRYjdvkFjC9XoOER_EhVTGemZbGFb-yYz9aRsw7_5GhbS7nv6vHhzLrUr43yiBO_4nH-76JwcQnlQP_UXWqzFbFiWknV6eIVvIFbh-EsQGNkEIB6H2_XKQtM9lHnubXKu');
        }
        // print_r($type); die;

        $noti_message_structure = array('sound' =>1,
                    'message'=>array("noti_type" => $noti_type, 'message' => $message),
                    'notifykey'=>"HOME_KEY",
                    //"title" => "SocietyApp",
                    'body'=>$message,
                  );

        $registrationIds = $deviceToken;

       /* $fields = array(
          'registration_ids' => array($registrationIds),
          'notification' => $noti_message_structure,
          'alert' => $message,

          'sound' => 'default',
          'Notifykey' => $noti_type,
          "click_action" => "HOME_KEY",
          'data' => $noti_message_structure,
          "android" => (object)array("priority" => "high")
        );
*/

        $fields = 
           [
          'registration_ids' => array($registrationIds),
          'notification' => [
            'title' => "Bookys",
            'body' => $message,
            'sound' => 'default',
            'Notifykey' => $noti_type,
            
          ],
           'alert' => $message,
           'click_action' => "HOME_KEY",
           'data' => $noti_message_structure,
           "android" => (object)array("priority" => "high")
        ];

        $headers = array(
          'Authorization: key=' . API_ACCESS_KEY,
          'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields) );
        $result = curl_exec($ch);

        if($result == FALSE) {
          die('Curl failed: ' . curl_error($ch));
        }

        curl_close( $ch );

        return  $result;
    }
}
