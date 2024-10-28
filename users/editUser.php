<?php
  require_once '../core/dbConfig.php';
  require_once '../core/models.php';

  session_start();
  if(isset($_SESSION['username'])){
    $sessionName = $_SESSION['username'];
    $sessionType = $_SESSION['usertype'];
    $sessionID = $_SESSION['userid'];

  } else {
    header('location: login.php');
  }


  $editingUser = getUserById($pdo, $_GET['userID']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editing User</title>
  <link rel="stylesheet" href="../core/style.css?<?php echo time()?>">
</head>
<body>
  <?php
    if($sessionType !== 'Admin'){
      if($sessionID !== $editingUser['user_id']){
        echo 'Access Forbidden!';
        header('refresh:2; url=viewUsers.php');
        exit;
      }
    }
  ?>
  <a href="viewUsers.php">Go Back</a>
  <h1>Editing User: <?php echo $editingUser['user_name']?>(<?php echo $editingUser['user_type']?>#<?php echo $editingUser['user_id']?>)</h1>
  <form class="editing-form" action="../core/handleForm.php?userID=<?php echo $editingUser['user_id']?>" method="post">
    <p>
      <label for="username">User Name:</label>
      <input type="text" name="username" id="username" value="<?php echo $editingUser['user_name']?>">
    </p>
    <p>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" value="<?php echo $editingUser['user_password']?>">
    </p>
    <p>
      <label for="contact">Contact Number:</label>
      <input type="text" name="contact" id="contact" value="<?php echo $editingUser['user_contact']?>">
    </p>
    <p>
      <label for="address">Address:</label>
      <input type="text" name="address" id="address" value="<?php echo $editingUser['user_address']?>">
    </p>
    <input type="submit" name="editUser" value="Confirm">
  </form>
</body>
</html>