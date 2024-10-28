<?php
  require_once 'core/dbConfig.php';
  require_once 'core/models.php';

  session_start();

  if(isset($_SESSION['username'])){
    header('location: index.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In or Sign Up to Continue</title>
  <link rel="stylesheet" href="core/style.css?<?php echo time()?>">
</head>
<body class = "login-page">
  <form action="core/handleForm.php" method="post">
    <h1>Log In</h1>
    <p>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username">
    </p>
    <p>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
    </p>
    <p>
      <label for="usertype1">User Type:</label>
      <select name="usertype" id="usertype1">
        <option value="">-</option>
        <option value="Customer">Customer</option>
        <option value="Rider">Rider</option>
        <option value="Admin">Admin</option>
      </select>
    </p>
    <input type="submit" name="login" value="Log In">
  </form>
  <p>or</p>
  <form action="core/handleForm.php" method="post">
    <h1>Sign Up</h1>
    <p>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username">
    </p>
    <p>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
    </p>
    <p>
      <label for="usertype2">User Type:</label>
      <select name="usertype" id="usertype2">
        <option value="">-</option>
        <option value="Customer">Customer</option>
        <option value="Rider">Rider</option>
      </select>
    </p>
    <input type="submit" name="signup" value="Sign Up">
  </form>
</body>
</html>