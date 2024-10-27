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
  <h1>Are you sure you want to delete the following customer?</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Contact</th>
      <th>Address</th>
    </tr>
    <tr>
      <td><?php echo $getCustomerByID['customer_id']?></td>
      <td><?php echo $getCustomerByID['customer_name']?></td>
      <td><?php echo $getCustomerByID['customer_contact']?></td>
      <td><?php echo $getCustomerByID['customer_address']?></td>
    </tr>
  </table>
  <form action="../core/handleForms.php?ID=<?php echo $customerID?>" method="post">
    <p><input type="submit" name="deleteCustomer"></p>
  </form>
</body>
</html>