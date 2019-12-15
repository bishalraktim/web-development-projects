<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Filtering Inputs</title>
  </head>
  <body>
    <?php
    $email          = "bishal.bishal.raktim@gmail.com'";
    $emailValidated = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!empty($emailValidated)) {
      echo "Validated Email = $emailValidated";
    }

    else {
      echo "Email is not valid!";
    }
    ?>
  </body>
</html>
