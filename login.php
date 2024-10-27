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

  <form action="core/handleForms.php" method="post">
    <h2>Log In</h2>

    <p>Name: <input type="text" name=""></p>
    <p>Password: <input type="text" name=""></p>
    <p>Account Type: <select name="">
      <option value="">Customer</option>
      <option value="">Rider</option>
      <option value="">Admin</option>
    </select></p>

    <input type="submit" name="login" value="Login">
  </form>

  <p>Or</p>

  <form action="core/handleForms.php" method="post">
    <h2>Sign Up</h2>
    <p>Name: <input type="text" name="name"></p>
    <p>Password: <input type="password" name="password"></p>
    <p>Account Type: <select name="userType">
      <option value="customers">Customer</option>
      <option value="riders">Rider</option>
    </select></p>

    <input type="submit" name="signup" value="Sign Up">
  </form>
</body>
</html>