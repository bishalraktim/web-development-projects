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

  $string = "INSERT INTO user (firstName, lastName, emailAddress, password) VALUES ('Bishal',
  'Raktim', 'raktimyatri@gmail.com', 'abcd1234'),
  ('Hari', 'Sharma', 'sharmahari@gmail.com', 'abc000'),
  ('Shyam', 'Gurung', 'gshyamt8@gmail.com', 'etes41'),
  ('Arun', 'Maharjan', 'arm78@gmail.com', 'ranamagar41'),
  ('Ram', 'Pariwar', 'magarrana40@gmail.com', 'ast411'),
  ('Raju', 'Thapa', 'thapar41@gmail.com', 'patiram00')";

  if (!mysqli_query($mysql, $string)) {
    echo "Error " . mysqli_error() . PHP_EOL;
  }
  else {
    echo "Success! Record successfully inserted!";
  }

  mysqli_close($mysql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MySQL Connect</title>
  </head>
  <body>

  </body>
</html>
