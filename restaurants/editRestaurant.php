<?php
  require_once '../core/dbConfig.php';
  require_once '../core/models.php';
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
  <a href="viewRestaurants.php">Go Back</a>
  <?php $getRestaurantById = getRestaurantById($pdo, $_GET['ID'])?>
  <h1>Editing Restaurant: <?php echo $getRestaurantById['restaurant_name']?></h1>
  <form action="../core/handleForms.php?restaurantID=<?php echo $getRestaurantById['restaurant_id'] ?>" method="post">
    <p>Name: <input type="text" name="name" value="<?php echo $getRestaurantById['restaurant_name'] ?>"></p>
    <p>Location: <input type="text" name="location" value="<?php echo $getRestaurantById['restaurant_location'] ?>"></p>
    <input type="submit" name="editRestaurant">
  </form>
</body>
</html>