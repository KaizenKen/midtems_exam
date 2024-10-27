<?php
  require_once 'core/dbConfig.php';
  require_once 'core/models.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Lendio Delivery Service</h1>
  <div class="divs">
    <a href="customers/viewCustomers.php">Customers</a>
    <a href="riders/viewRiders.php">Riders</a>
    <a href="admins/viewAdmins.php">Admins</a>
  </div>

  <div class="divs">
    <a href="">Orders</a>
    <a href="restaurants/viewRestaurants.php">Restaurants</a>
  </div>
</body>
</html>