<?php
  $mysql = mysqli_connect("localhost", "raktimbishal", "RaKtim@12345","mytest");

  if (!$mysql) {
    echo "Error: Unable to connect to MySQL" . PHP_EOL;
    echo "Debugging errno " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error " . mysqli_connect_error() . PHP_EOL;
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>InsertRecord</title>

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
        if (!empty($_POST["firstName"])) {
          $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_MAGIC_QUOTES);
          //echo "Your first name is $firstName";
          //echo "Your first name is:" . $firstName;

          //echo $firstName."<br>";
          if($firstName=="") {
            $errors.= "Please enter your firstName.<br><br>";
          }
        }

        else {
          $errors.= "You forget to enter your firstName.<br><br>";
        }

        if (!empty($_POST["lastName"])) {
          $lastName = filter_var($_POST["lastName"], FILTER_SANITIZE_MAGIC_QUOTES);
          //echo $lastName."<br>";

          if($lastName=="") {
            $errors.= "Please enter your last name.<br><br>";
          }
        }

        else {
          $errors.= "You forget to enter your last name.<br><br>";
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

        if (!empty($_POST["password"])) {
          $password = filter_var($_POST["password"], FILTER_SANITIZE_MAGIC_QUOTES);
          //echo $message."<br>";
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
          $insert = "INSERT INTO user (firstName, lastName, emailAddress, password)
          VALUES ('$firstName', '$lastName', '$emailAddress', '$password')";

          if (!mysqli_query($mysql, $insert)) {
            echo "Error " . mysqli_error() . PHP_EOL;
          }

          else {
            ?>
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
              <strong>Success!</strong>&nbsp;The record was inserted successfully!
              <a href="view-records.php">Click here</a> to view all records.
            </div>
            <?php
          }
        }

      } // form isset test
      ?>


      <form name="myForm" class="form-horizontal" role="form" action="#" method="post">

        <div class="form-group">
          <label for="firstName" class="col-sm-2 control-label">First Name:</label>
          <div class="col-sm-10">
            <input type="text" name="firstName" class="form-control" required>
          </div>
        </div>

        <div class="form-group">
          <label for="lastName" class="col-sm-2 control-label">Last Name:</label>
          <div class="col-sm-10">
            <input type="text" name="lastName" class="form-control"
            value="<?php if ($lastName) { echo "$lastName"; } ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label for="emailAddress" class="col-sm-2 control-label">Email Address:</label>
          <div class="col-sm-10">
            <input type="email" name="emailAddress" class="form-control" required>
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
