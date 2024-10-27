<?php
  require_once '../core/dbConfig.php';
  require_once '../core/models.php';

  $restaurantID = $_GET['restaurantID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <a href="../restaurants/viewRestaurants.php">Go Back</a>
  <?php $getItemsByRestaurantId = getItemsByRestaurantId($pdo, $restaurantID)?>
  <?php $restaurantName = getRestaurantById($pdo, $restaurantID)?>
  <h1>Items under <?php echo $restaurantName['restaurant_name']?></h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Actions</th>
    </tr>
    <?php foreach ($getItemsByRestaurantId as $row) {?>
    <tr>
      <td><?php echo $row['item_id']?></td>
      <td><?php echo $row['item_name']?></td>
      <td><?php echo $row['item_price']?></td>
      <td>
        <a href="editItem.php?restaurantID=<?php echo $restaurantID?>&itemID=<?php echo $row['item_id']?>">Edit</a>
        <a href="deleteItem.php?restaurantID=<?php echo $restaurantID?>&itemID=<?php echo $row['item_id']?>">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </table>
  <form action="../core/handleForms.php?restaurantID=<?php echo $_GET['restaurantID']?>" method="post">
    <h2>Add Item</h2>
    <p>Name: <input type="text" name="name"></p>
    <p>Price: <input type="number" name="price"></p>

    <input type="submit" name="addItem">
  </form>
</body>
</html>