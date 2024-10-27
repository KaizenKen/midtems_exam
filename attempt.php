<?php
  require_once 'core/dbConfig.php';
  require_once 'core/models.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    if(isset($_GET['result'])){
      $attempt = $_GET['result'];
      if($attempt == 0){
        echo 'Sign in failed. Please try again.';
        header('refresh:2; url=login.php');
      } else if($attempt == 1){
        echo 'Sign in success! Redirecting back to Login page.';
        header('refresh:2; url=login.php');
      } else if($attempt == 2){
        echo 'User Name already exists! Please try again.';
        header('refresh:2; url=login.php');
      }
    }
  ?>
</body>
</html>