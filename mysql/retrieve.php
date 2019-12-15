<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>RetrievingData</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  </head>

  <body>
    <div class="container">

      <h1>Retrieving Data from a Table</h1>
      <?php
        $mysql = mysqli_connect("localhost", "raktimbishal", "RaKtim@12345","mytest");

        if (!$mysql) {
          echo "Error: Unable to connect to MySQL" . PHP_EOL;
          echo "Debugging errno " . mysqli_connect_errno() . PHP_EOL;
          echo "Debugging error " . mysqli_connect_error() . PHP_EOL;
          exit();
        }

        /*echo "Success! Able to connect to MySQL." . PHP_EOL . "<br>";
        echo "Connection Information: " . mysqli_get_host_info($mysql) . PHP_EOL . "<br><br>";*/

        $string = "SELECT * FROM user";
        $query = mysqli_query($mysql, $string);

        if (!$query) {
          echo "Error " . mysqli_error() . PHP_EOL;
        }
        else {
          echo "<table class=\"table table-striped table-bordered table-hover\">";
          echo "<thead>";
          echo "<tr>";
          echo "<th>First Name</th>";
          echo "<th>Last Name</th>";
          echo "<th>Email Address</th>";
          echo "<th>Password</th>";
          echo "</tr>";
          echo "</thead>";

          echo "<tbody>";
          while ($row = mysqli_fetch_array($query)) {
            if ($row['emailAddress'] == 'raktimbishal@gmail.com') {
              echo "<tr class='success'>";
            }
            else {
              echo "<tr class='danger'>";
            }
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['emailAddress'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";
        }

        mysqli_close($mysql);
      ?>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!-- Bootstrap: Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>

    </script>
  </body>
</html>
