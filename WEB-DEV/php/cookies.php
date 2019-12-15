<?php
  $cookie_name = "TestCookie";
  $cookie_value = "Testing the cookie system in PHP";

  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/", "localhost", false, true);

  //print_r($_COOKIE["TestCookie"]);
  //echo $_COOKIE["TestCookie"];

  $cookie_name = "UserInfo";
  $cookie_value = "Bishal Raktim";

  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/", "localhost", false, true);

  //print_r($_COOKIE);

  //check if the specific cookie has been set

  setcookie("UserInfo", "", time() - 3600, "/", "localhost"); //this will delete the cookie

  if (isset($_COOKIE["UserInfo"])) {
    echo "Welcome back, ".$_COOKIE["UserInfo"];
  }

  else {
    echo "Welcome, new user!";
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PHP Cookies</title>

  </head>
  <body>

    <script>

    </script>
  </body>
</html>
