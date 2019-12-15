<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DeleteRecords</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  </head>
  <body>
    <h1>Delete Record</h1>
    <?php
      $mysql = mysqli_connect("localhost", "raktimbishal", "RaKtim@12345","mytest");
      $idUser = $_GET['idUser'];
      $idUser = filter_var($idUser, FILTER_SANITIZE_MAGIC_QUOTES);

      if (!$mysql) {
        echo "Error: Unable to connect to MySQL" . PHP_EOL;
        echo "Debugging errno " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error " . mysqli_connect_error() . PHP_EOL;
        exit();
      }

      //echo "Success! Able to connect to MySQL." . PHP_EOL . "<br>";
      //echo "Connection Information: " . mysqli_get_host_info($mysql) . PHP_EOL . "<br><br>";

      //$string = "DELETE FROM user WHERE emailAddress='raktimbishal@gmail.com'";
      $string = "DELETE FROM user WHERE idUser=$idUser";

      if (!mysqli_query($mysql, $string)) {
        echo "Error " . mysqli_error() . PHP_EOL;
      }
      else {
        ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
          <strong>Success!</strong>&nbsp;The record was deleted successfully!
          <a href="view-records.php">Click here</a> to view updated records.
        </div>
        <?php
      }
      mysqli_close($mysql);
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!-- Bootstrap: Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>

    </script>
  </body>
</html>
