<?php
$idUser = $_GET['idUser'];
$idUser = filter_var($idUser, FILTER_SANITIZE_MAGIC_QUOTES);
/*echo "idUser = $idUser";
die();*/
$mysql = mysqli_connect("localhost", "raktimbishal", "RaKtim@12345","mytest");

if (!$mysql) {
  echo "Error: Unable to connect to MySQL" . PHP_EOL;
  echo "Debugging errno " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error " . mysqli_connect_error() . PHP_EOL;
  exit();
}

/*echo "Success! Able to connect to MySQL." . PHP_EOL . "<br>";
echo "Connection Information: " . mysqli_get_host_info($mysql) . PHP_EOL . "<br><br>";*/

$string = "SELECT * FROM user WHERE idUser=$idUser";
//$string = "UPDATE user SET firstName='Raktim', lastName='Bishal', password='000111' WHERE idUser=1";

$record = mysqli_query($mysql, $string);

if (!$record) {
  echo "Error! Unable to select user info from database: " . mysqli_error() . PHP_EOL;
}
else {
  //we were able to grab the record from MySQL
  while ($row = mysqli_fetch_array($record)) {
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $emailAddress = $row['emailAddress'];
    $password = $row['password'];
  }
}
//die();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edit Record</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  </head>
  <body>
    <div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a href="" class="navbar-brand">My Records</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-1" aria-expanded="false">
          <span class="sr-only">Toggle naviagation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-1">
          <ul class="nav navbar-nav">
            <li><a href="view-records.php">View Records</a></li>
            <li><a href="insert-records.php">Insert New Record</a></li>
          </ul>
        </div>

      </div>

    </div>

    <div class="container">

      <h1>Edit Record</h1>

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
            $errors.= "Please enter your first name.<br><br>";
          }
        }

        else {
          $errors.= "You forget to enter your first name.<br><br>";
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
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error!</strong>The following errors occured:<br><br><?php echo $errors; ?>
        </div>
        <?php
        }

        else {
          // update code for database
          $update = "UPDATE user SET firstName='$firstName', lastName='$lastName',
          emailAddress='$emailAddress', password='$password' WHERE idUser=$idUser";

          if (!mysqli_query($mysql, $update)) {
            echo "Error " . mysqli_error() . PHP_EOL;
          }
          else {
            ?>
            <div class="alert alert-success">
              <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
              <strong>Success!</strong>&nbsp;Your form was submitted!
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
            <input type="text" name="firstName" class="form-control"
            value="<?php if ($firstName) { echo "$firstName"; } ?>" required>
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
            <input type="email" name="emailAddress" class="form-control"
            value="<?php if ($emailAddress) { echo "$emailAddress"; } ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label for="password" class="col-sm-2 control-label">Password:</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control"
            value="<?php if ($password) { echo "$password"; } ?>" required>
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
