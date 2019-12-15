<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Contact Form</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  </head>
  <body>
    <div class="container">

      <h1>Contact Us</h1>

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

        if (!empty($_POST["message"])) {
          $message = filter_var($_POST["message"], FILTER_SANITIZE_MAGIC_QUOTES);
          //echo $message."<br>";
        }

        else {
          $errors.= "You forget to enter your message.<br><br>";
        }

        if ($errors) {

        ?>
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error!</strong>The following errors occured:<br><br><?php echo $errors; ?>
        </div>
        <?php
        }

        //email section
        else {
          $from = $emailAddress;
          $to = "raktimyatri@gmail.com";
          $subject = "Final Message!";
          $body = "Following are the details of the concerned
          applicant:<br><br> $firstName<br> $lastName<br> $emailAddress<br> $message";
          $headers = "From: $from";

          if (mail($to, $subject, $body, $headers)) {
            ?>
            <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong>&nbsp;Your form was submitted! We will be in touch!
            </div>
            <?php
          }

          else {
            ?>
            <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong>There was an error sending the email. Please try again later!
            </div>
            <?php
          }
        } // end of email section

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
            <input type="text" name="lastName" class="form-control" required>
          </div>
        </div>

        <div class="form-group">
          <label for="emailAddress" class="col-sm-2 control-label">Email Address:</label>
          <div class="col-sm-10">
            <input type="email" name="emailAddress" class="form-control" required>
          </div>
        </div>

        <div class="form-group">
          <label for="message" class="col-sm-2 control-label">Message:</label>
          <div class="col-sm-10">
            <textarea name="message" class="form-control" rows="6" required></textarea>
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
