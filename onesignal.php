<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "------------------------------",
      notifyButton: {
        enable: true,
      },
    });
  });
</script>

<?php
// UK.OS.P.API v1.0

// 

function sendMessage($apiid, $restapikey, $mesaj, $url){
    $content = array(
        "en" => $mesaj
        );

    $fields = array(
        'app_id' => $apiid,
        'included_segments' => array('All'),
        'data' => array("foo" => "bar"),
        'large_icon' =>"",
        'contents' => $content,
        'url' => $url
    );

    $fields = json_encode($fields);
  
    print("\nJSON sent:\n");
    print($fields);

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                 'Authorization: Basic '.$restapikey));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_POST, TRUE);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

      $response = curl_exec($ch);
      curl_close($ch);

      return $response;
  }

  $response = sendMessage("//API id", "//Rest API Key", "//Mesaj", "//Url");
  $return["allresponses"] = $response;
  $return = json_encode( $return);
  print("\n\nJSON received:\n");
  print($return);
  print("\n");
?>
