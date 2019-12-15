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

  //$string = "UPDATE user SET firstName='Raktim', lastName='Bishal', password='000111' WHERE idUser=1";

  $string = "INSERT INTO user (idUser, firstName, lastName, emailAddress, password)
  VALUES (1, 'Bishal', 'Raktim', 'raktimbishal@gmail.com', 'abc@AF740'),
  (2, 'Kriti', 'Thapa', 'kritithapa40@gmail.com', 'kriti999'),
  (3, 'Sita', 'Sundash', 'sita78@gmail.com', '7777edh')
  ON DUPLICATE KEY UPDATE
  firstName=VALUES(firstName), lastName=VALUES(lastName),
  emailAddress=VALUES(emailAddress), password=VALUES(password)";

  if (!mysqli_query($mysql, $string)) {
    echo "Error " . mysqli_error() . PHP_EOL;
  }
  else {
    echo "Success! Record successfully updated!";
  }

  mysqli_close($mysql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Updating MySQL Database</title>
  </head>
  <body>

  </body>
</html>
