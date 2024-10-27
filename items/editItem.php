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
  <h1>Editing Item: <?php echo $getItemById['item_name']?></h1>
  <form action="../core/handleForms.php?restaurantID=<?php echo $restaurantID?>&itemID=<?php echo $itemID?>" method="post">
    <p>Name: <input type="text" name="name" value="<?php echo $getItemById['item_name'] ?>"></p>
    <p>Price: <input type="text" name="price" value="<?php echo $getItemById['item_price'] ?>"></p>
    <input type="submit" name="editItem">
  </form>
</body>
</html>