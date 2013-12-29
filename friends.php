

<?php
include('lib/config.php');


$accesstoken = $_REQUEST['accesstoken'];
$user_id = $_REQUEST['user_id'];

  require_once('facebook-php-sdk-master/src/facebook.php');

  $config = array(
    'appId' => $fbapp_key,
    'secret' => $fbapp_secret,
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  //var_dump($facebook);
  $user_id = $facebook->getUser();
?>
<html>
  <head></head>
  <body>

  <?php
    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        $user_friends = $facebook->api('/me/friends','GET');
        var_dump($user_friends);
        //echo "Name: " . $user_profile['name'];

      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl(); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl();
      echo 'Please <a href="' . $login_url . '">login.</a>';

    }


  ?>

  </body>
</html>

?>