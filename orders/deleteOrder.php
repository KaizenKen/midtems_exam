<?php
  require_once '../core/dbConfig.php';
  require_once '../core/models.php';

  session_start();
  if(isset($_SESSION['username'])){
    $sessionName = $_SESSION['username'];
    $sessionType = $_SESSION['usertype'];
    $sessionID = $_SESSION['userid'];

  } else {
    header('location: ../login.php');
  }

  $deletingOrder = getOrderById($pdo, $_GET['orderID'])
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deleting Order</title>
  <link rel="stylesheet" href="../core/style.css?<?php echo time()?>">
</head>
<body>
  <?php
    if($deletingOrder == ''){
      echo 'This order does not exists!';
      header('refresh:2; url=viewOrders.php');
      exit;
    }

    if($sessionType !== 'Admin'){
      if($sessionID !== $deletingOrder['customer_id']){
        echo 'Access Denied!';
        header('refresh:2; url=viewOrders.php');
        exit;
      }
    }

    if($deletingOrder['delivery_status'] == 1){
      echo "Can not delete orders that is en route!";
      header('refresh:2; url=viewOrders.php');
      exit;
    }
    if($deletingOrder['delivery_status'] == 2){
      echo 'Can not delete completed orders!';
      header('refresh:2; url=viewOrders.php');
      exit;
    }
  ?>
  <a href="viewOrders.php">Go Back</a>
  <h1>Are you sure to delete the following:</h1>
  <form class="userDiv" action="../core/handleForm.php?orderID=<?php echo $deletingOrder['order_id']?>" method="post">
    <p>Order ID: <?php echo $deletingOrder['order_id']?></p>
    <p>Ordered Items: <?php echo $deletingOrder['ordered_items']?></p>
    <p>Date Ordered: <?php echo $deletingOrder['date_ordered']?></p>
    <p>Last Edited By: 
      <?php
        $editor = getUserById($pdo, $deletingOrder['edited_by']);
        if($deletingOrder['edited_by'] == null){
          echo '';
        }
        else if($deletingOrder['edited_by'] == $sessionID){
          echo 'You';
        }
        else {
          echo $editor['user_name'];
        }
      ?>
    </p>
    <p>Date Edited: <?php echo $deletingOrder['date_edited']?></p>
    <input type="submit" name ="deleteOrder" value="Delete">
  </form>
</body>
</html>