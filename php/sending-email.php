<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sending Mail</title>
  </head>
  <body>
    <?php
    $from = "raktimbishal@gmail.com";
    $to = "raktimyatri@gmail.com";
    $subject = "Testing Email from PHP";
    $body = "Hi there, this is the final testing email sent using PHP programming language.";
    $headers = "From:".$from;
    $cc = "CC: sharmaprabha56@gmail.com"."\r\n";

    if (mail($to, $subject, $body, $headers, $cc)) {
      echo "Email sent successfully!";
    }

    else {
      echo "There was an error sending email!";
    }
    ?>

    <script>

    </script>
  </body>
</html>
