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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Orders</title>
  <link rel="stylesheet" href="../core/style.css?<?php echo time()?>">
</head>
<body>
  <a href="../index.php">Go Back</a>
  <h1>Viewing Orders</h1>
  <form action="../core/handleForm.php" method="post">
    <h2>Place New Order:</h2>
    <p>
      <label for="restaurant">Restaurant:</label>
      <select name="restaurantid" id="restaurant">
        <option value="1">Jollibee</option>
      </select>
    </p>
    <p>
      <label for="item">Item:</label>
      <select name="itemid" id="item">
        <option value="1">1-pc Chicken Joy</option>
        <option value="2">Jolly Spaghetti</option>
      </select>
    </p>
    <input type="submit" name="placeOrder">
  </form>
  <?php
    if($sessionType == 'Admin'){
      $getOrders = getAllOrders($pdo);
    }
    else {
      $getOrders = getOrdersByUserId($pdo, $sessionID);
    }

    foreach($getOrders as $row){?>
      <div class="userDiv">
        <p>Order ID: <?php echo $row['order_id']?></p>
        <p>Ordered By: 
          <?php
          $getUserById = getUserById($pdo, $row['customer_id']);

          echo $getUserById['user_name'];
          ?>
        </p>
        <p>Rider: 
          <?php
            if($row['rider_id'] == ''){
              echo '';
            }
            else {
              $getUserById = getUserById($pdo, $row['rider_id']);

              echo $getUserById['user_name'];
            }
          ?>
        </p>
        <p>Ordered Items: 
          <?php
            if($row['ordered_items'] == ''){
              echo '';
            }
            else {
              $itemName = getItemById($pdo, $row['ordered_items']);
              echo $itemName['item_name'];
            }
          ?>
        </p>
        <p>Delivery Status: 
          <?php
            $deliveryStatus = $row['delivery_status'];
            if($deliveryStatus == 1){
              echo 'En Route';
            }
            else if($deliveryStatus == 2){
              echo 'Delivered';
            }
            else {
              echo 'Processing';
            }
          ?>
        </p>
        <p>Date Ordered: <?php echo $row['date_ordered']?></p>
        <p>Edited By: 
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
        <a href="editOrder.php?orderID=<?php echo $row['order_id']?>">Edit</a>
        <a href="deleteOrder.php?orderID=<?php echo $row['order_id']?>">Delete</a>
      </div>
    <?php }?>
</body>
</html>