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

  $editingOrder = getOrderById($pdo, $_GET['orderID']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editing Order</title>
  <link rel="stylesheet" href="../core/style.css?<?php echo time()?>">
</head>
<body>
  <?php
    if($editingOrder == ''){
      echo 'This order does not exists!';
      header('refresh:2; url=viewOrders.php');
      exit;
    }

    if($sessionType !== 'Admin'){
      if($sessionID !== $editingOrder['customer_id']){
        echo 'Access Denied!';
        header('refresh:2; url=viewOrders.php');
        exit;
      }
    }

    if($editingOrder['delivery_status'] == 1){
      echo "Can not edit orders that is en route!";
      header('refresh:2; url=viewOrders.php');
      exit;
    }
    if($editingOrder['delivery_status'] == 2){
      echo 'Can not edit completed orders!';
      header('refresh:2; url=viewOrders.php');
      exit;
    }
  ?>
  <a href="viewOrders.php">Go Back</a>
  <h1>Editing Order: ID-<?php echo $editingOrder['order_id']?></h1>
  <form class="editing-form" action="../core/handleForm.php?orderID=<?php echo $editingOrder['order_id']?>" method="post">
    <p>
      <label for="itemid">Item:</label>
      <select name="itemid" id="itemid">
        <option value="1">1-pc Chicken Joy</option>
        <option value="2">Jolly Spaghetti</option>
      </select>
    </p>
    <input type="submit" name="editOrder" value="Confirm">
  </form>
</body>
</html>