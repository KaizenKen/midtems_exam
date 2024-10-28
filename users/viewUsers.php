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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users List</title>
  <link rel="stylesheet" href="../core/style.css?<?php echo time()?>">
</head>
<body>
  <a href="../index.php">Go Back</a>
  <h1>Users List</h1>
  <?php
    $getAllUsers = getAllUsers($pdo);
    foreach($getAllUsers as $row){?>
      <div class="userDiv">
        <p>Name: <?php echo $row['user_name']?></p>
        <p>User Type: <?php echo $row['user_type']?>#<?php echo $row['user_id']?></p>
        <p>Contact Number: <?php echo $row['user_contact']?></p>
        <p>Address: <?php echo $row['user_address']?></p>
        <p>Date Created: <?php echo $row['date_created']?></p>
        <p>Last Edited By: 
        <?php
          $editor = getUserById($pdo, $row['edited_by']);
          if($row['edited_by'] == null){
            echo '';
          }
          else if($row['edited_by'] == $sessionID){
            echo 'You';
          }
          else {
            echo $editor['user_name'];
          }
        ?>
        </p>
        <p>Date Edited: <?php echo $row['date_edited']?></p>

        <a href="editUser.php?userID=<?php echo $row['user_id']?>">Edit</a>
        <a href="deleteUser.php?userID=<?php echo $row['user_id']?>">Delete</a>
      </div>
    <?php }?>
</body>
</html>