<?php
  require_once '../core/dbConfig.php';
  require_once '../core/models.php';

  $customerID = $_GET['customerID'];
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
  <?php $getCustomerByID = getCustomerById($pdo, $customerID)?>
  <a href="viewCustomers.php">Go Back</a>
  <h1>Editing Customer: <?php echo $getCustomerByID['customer_name']?></h1>
  <form action="../core/handleForms.php?ID=<?php echo $customerID?>" method="post">
    <p>Name: <input type="text" name="name" value="<?php echo $getCustomerByID['customer_name'] ?>"></p>
    <p>Contact: <input type="text" name="contact" value="<?php echo $getCustomerByID['customer_contact'] ?>"></p>
    <p>Address: <input type="text" name="address" value="<?php echo $getCustomerByID['customer_address'] ?>"></p>
    <input type="submit" name="editCustomer">
  </form>
</body>
</html>