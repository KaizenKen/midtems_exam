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
  <a href="../index.php">Go Back</a>
  <h1>Restaurants</h1>

  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Location</th>
      <th>Items</th>
      <th>Actions</th>
    </tr>
    <?php $getTable = getTable($pdo, 'restaurants')?>
    <?php foreach ($getTable as $row) {?>
    <tr>
      <td><?php echo $row['restaurant_id'] ?></td>
      <td><?php echo $row['restaurant_name'] ?></td>
      <td><?php echo $row['restaurant_location'] ?></td>
      <td><a href="../items/displayItems.php?restaurantID=<?php echo $row['restaurant_id']?>">List</a></td>
      <td>
        <a href="../restaurants/editRestaurant.php?ID=<?php echo $row['restaurant_id']?>">Edit</a>
        <a href="../restaurants/deleteRestaurant.php?ID=<?php echo $row['restaurant_id']?>">Delete</a>
      </td>
    </tr>
    <?php }?>
  </table>

  <form action="../core/handleForms.php" method="post">
    <h2>Add Restaurant</h2>
    <p>Name: <input type="text" name="name"></p>
    <p>Location: <input type="text" name="location"></p>

    <input type="submit" name="addRestaurant">
  </form>
</body>
</html>