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

  $deletingUser = getUserById($pdo, $_GET['userID']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deleting User</title>
  <link rel="stylesheet" href="../core/style.css?<?php echo time()?>">
</head>
<body>
  <?php
    if($sessionType !== 'Admin'){
      if($sessionID !== $deletingUser['user_id']){
        echo 'Access Forbidden!';
        header('refresh:2; url=viewUsers.php');
        exit;
      }
    }
  ?>
  <a href="viewUsers.php">Go Back</a>
  <h1>Are you sure you want to delete "<?php echo $deletingUser['user_name']?>"?</h1>
  <form class="userDiv" action="../core/handleForm.php?userID=<?php echo $deletingUser['user_id']?>" method="post">
    <p>Name: <?php echo $deletingUser['user_name']?></p>
        <p>User Type: <?php echo $deletingUser['user_type']?>#<?php echo $deletingUser['user_id']?></p>
        <p>Contact Number: <?php echo $deletingUser['user_contact']?></p>
        <p>Address: <?php echo $deletingUser['user_address']?></p>
        <p>Date Created: <?php echo $deletingUser['date_created']?></p>
        <p>Last Edited By: 
        <?php
          $editor = getUserById($pdo, $deletingUser['edited_by']);
          if($deletingUser['edited_by'] == null){
            echo '';
          }
          else if($deletingUser['edited_by'] == $sessionID){
            echo 'You';
          }
          else {
            echo $editor['user_name'];
          }
        ?>
        </p>
        <p>Date Edited: <?php echo $deletingUser['date_edited']?></p>
        <input type="submit" name ="deleteUser" value="Delete">
  </form>
</body>
</html>