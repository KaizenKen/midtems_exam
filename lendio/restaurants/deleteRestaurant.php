<?php
  require_once "../core/dbConfig.php";
  require_once "../core/models.php";
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
  <h1>Are you sure you want to delete the following restaurant?</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Location</th>
    </tr>
    <tr>
      <td><?php echo $getRestaurantById['restaurant_id'] ?></td>
      <td><?php echo $getRestaurantById['restaurant_name'] ?></td>
      <td><?php echo $getRestaurantById['restaurant_location'] ?></td>
    </tr>
  </table>
  <form action="../core/handleForms.php?restaurantID=<?php echo $getRestaurantById['restaurant_id']?>" method="post">
    <p>
      <input type="submit" name="deleteRestaurant" value="Yes">
    </p>
  </form>
</body>
</html>