<?php
  $mysql = mysqli_connect("localhost", "raktimbishal", "RaKtim@12345","mytest");

  if (!$mysql) {
    echo "Error: Unable to connect to MySQL" . PHP_EOL;
    echo "Debugging errno " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error " . mysqli_connect_error() . PHP_EOL;
    exit();
  }

  echo "Success! Able to connect to MySQL." . PHP_EOL . "<br>";
  echo "Connection Information: " . mysqli_get_host_info($mysql) . PHP_EOL . "<br><br>";

  //$string = "DELETE FROM user WHERE emailAddress='raktimbishal@gmail.com'";
  $string = "DELETE FROM user WHERE idUser=2";

  if (!mysqli_query($mysql, $string)) {
    echo "Error " . mysqli_error() . PHP_EOL;
  }
  else {
    echo "Success! Record successfully deleted!";
  }

  mysqli_close($mysql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DeleteRecords</title>
  </head>
  <body>

  </body>
</html>
