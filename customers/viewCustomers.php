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
  <h1>Customers</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Contact</th>
      <th>Address</th>
      <th>Date Joined</th>
      <th>Actions</th>
    </tr>
    <?php $getTable = getTable($pdo, 'customers')?>
    <?php foreach ($getTable as $row) {?>
    <tr>
      <td><?php echo $row['customer_id'] ?></td>
      <td><?php echo $row['customer_name'] ?></td>
      <td><?php echo $row['customer_contact'] ?></td>
      <td><?php echo $row['customer_address'] ?></td>
      <td><?php echo $row['customer_joined'] ?></td>
      <td>
        <a href="editCustomer.php?customerID=<?php echo $row['customer_id']?>">Edit</a>
        <a href="deleteCustomer.php?customerID=<?php echo $row['customer_id']?>">Delete</a>
      </td>
    </tr>
    <?php }?>
  </table>
</body>
</html>