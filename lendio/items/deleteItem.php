<?php
  require_once '../core/dbConfig.php';
  require_once '../core/models.php';

  $restaurantID = $_GET['restaurantID'];
  $itemID = $_GET['itemID']
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
  <a href="displayItems.php?restaurantID=<?php echo $restaurantID?>">Go Back</a>
  <?php $getItemById = getItemById($pdo, $itemID)?>
  <h1>Are you sure you want to delete the following item?</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
    </tr>
    <tr>
      <td><?php echo $getItemById['item_id']?></td>
      <td><?php echo $getItemById['item_name']?></td>
      <td><?php echo $getItemById['item_price']?></td>
    </tr>
  </table>
  <form action="../core/handleForms.php?restaurantID=<?php echo $restaurantID?>&itemID=<?php echo $itemID?>" method="post">
    <p>
      <input type="submit" name="deleteItem" value="Yes">
    </p>
  </form>
</body>
</html>