<?php
  require_once 'core/dbConfig.php';
  require_once 'core/models.php';

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
  <title>Main Menu</title>
  <link rel="stylesheet" href="core/style.css?<?php echo time()?>">
</head>
<body>
  <h1>Welcome, <?php echo $sessionName?>(<?php echo $sessionType?>#<?php echo $sessionID?>)</h1>
  <table>
    <tr>
      <th>Registered Users</th>
      <th>Orders</th>
      <th>Restaurants</th>
    </tr>
    <tr>
      <td><a href="users/viewUsers.php">View Users</a></td>
      <td><a href="">View Orders</a></td>
      <td><a href="">View Restaurants</a></td>
    </tr>
  </table>
  <form action="core/handleForm.php" method="post">
    <input type="submit" name="logout" value="Log Out">
  </form>
</body>
</html>