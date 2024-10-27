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
  <h1>Riders</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Contact</th>
      <th>Actions</th>
    </tr>
    <?php $getTable = getTable($pdo, 'riders')?>
    <?php foreach ($getTable as $row) { ?>
    <tr>
      <td><?php echo $row['rider_id']?></td>
      <td><?php echo $row['rider_name']?></td>
      <td><?php echo $row['rider_contact']?></td>
      <td>
        <a href="editRider.php?ID=<?php echo $row['rider_id']?>">Edit</a>
        <a href="deleteRider.php?ID=<?php echo $row['rider_id']?>">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>