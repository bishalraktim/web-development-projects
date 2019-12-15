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

  //mysqli_close($mysql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Insert Admin</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  </head>
  <body>

    <div class="container">

      <h1>Insert Record</h1>

      <?php
      $errors = "";

      if (isset ($_POST["submit"])) {
        //echo "Form submitted successfully! <br>";
        if (!empty($_POST["username"])) {
          $username = filter_var($_POST["username"], FILTER_SANITIZE_MAGIC_QUOTES);
          //echo "Your first name is $firstName";
          //echo "Your first name is:" . $firstName;

          //echo $firstName."<br>";
          if($username=="") {
            $errors.= "Please enter your username.<br><br>";
          }
        }

        else {
          $errors.= "You forget to enter your username.<br><br>";
        }

        if (!empty($_POST["emailAddress"])) {
          $emailAddress = filter_var($_POST["emailAddress"], FILTER_SANITIZE_EMAIL);
          //echo $emailAddress."<br>";
          if($emailAddress=="") {
            $emailAddress.= "Please enter your email address.<br><br>";
          }
          else {
            if (!filter_var($emailAddress, FILTER_SANITIZE_EMAIL)) {
              $errors.="Email address is not a valid. Please enter a valide email address.<br><br>";
            }
          }
        }

        else {
          $errors.= "You forget to enter your email address.<br><br>";
        }

        $password_test = "abcdef123";
        if (!empty($_POST["password"])) {
          $password = filter_var($_POST["password"], FILTER_SANITIZE_MAGIC_QUOTES);
          $password_hash = crypt($password, '21h@76%12A&d!_57h');
          echo "password = $password" . PHP_EOL;
          echo "password_hash = $password_hash" . PHP_EOL;

          if ($password_hash == crypt($password_test, '21h@76%12A&d!_57h')) {
            echo "Password matched! Hooray!" . PHP_EOL;
          }
          else {
            echo "Sorry! Password doesn't match!" . PHP_EOL;
          }

        }

        else {
          $errors.= "You forget to enter your password.<br><br>";
        }


        if ($errors) {

        ?>
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
          <strong>Error!</strong>The following errors occured:<br><br><?php echo $errors; ?>
        </div>
        <?php
        }


        else { //update code for database
          $string = "INSERT INTO admin (username, emailAddress, password)
          VALUES ('$username', '$emailAddress', '$password_hash')";

          if (!mysqli_query($mysql, $string)) {
            echo "Error " . mysqli_error() . PHP_EOL;
          }

          else {
            ?>
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
              <strong>Success!</strong>&nbsp;The record was inserted successfully!
              <a href="retrieve.php">Click here</a> to view all records.
            </div>
            <?php
          }
        }

      } // form isset test
      ?>


      <form name="myForm" class="form-horizontal" role="form" action="#" method="post">

        <div class="form-group">
          <label for="username" class="col-sm-2 control-label">Username:</label>
          <div class="col-sm-10">
            <input type="text" name="username" class="form-control" required>
          </div>
        </div>

        <div class="form-group">
          <label for="emailAddress" class="col-sm-2 control-label">Email Address:</label>
          <div class="col-sm-10">
            <input type="text" name="emailAddress" class="form-control" required>
          </div>
        </div>

        <div class="form-group">
          <label for="password" class="col-sm-2 control-label">Password:</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" required>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2">
            <button type="submit" name="submit" class="btn btn-primary">Submit Form</button>
          </div>
        </div>

      </form>
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
