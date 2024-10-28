<?php
  require_once 'dbConfig.php';
  require_once 'models.php';

  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    if($username == '' || $password == ''){
      echo "Username or Password can't be empty!";
      header('refresh:2; url=../login.php');
    } else {
      $query = checkIfExists($pdo, $username, $usertype);
      if($query){
        $query2 = checkPassword($pdo, $username, $password,   $usertype);
        if($query2){
          session_start();
          $_SESSION['username'] = $username;
          $_SESSION['usertype'] = $usertype;

          $getUserByName = getUserByName($pdo,  $username, $usertype);
          $_SESSION['userid'] = $getUserByName['user_id'];

          header('location: ../index.php');
        } else {
          echo 'Incorrect Username or Password!';
          header('refresh:2; url=../login.php');
        }
      } else {
        echo 'The Username: "'.$username.'" with the user type: "'.$usertype.'" does not exists!';
        header('refresh:2; url=../login.php');
      }
    }
  }

  if(isset($_POST['logout'])){
    session_start();
    session_unset();
    session_destroy();

    header('location: ../login.php');
  }

  if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];
    
    if($username == ''|| $password == ''){
      echo "Username or Password can't be empty!";
      header('refresh:2; url=../login.php');
    } else {
      $query = checkIfExists($pdo, $username, $usertype);
      
      if(!$query){
        $query = addUser($pdo, $username, $password, $usertype);

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = $usertype;

        $getUserByName = getUserByName($pdo,  $username, $usertype);
        $_SESSION['userid'] = $getUserByName['user_id'];

        header('location: ../index.php');
      } else {
        echo 'The Username: "'.$username.'" with the user type: "'.$usertype.'" already exists!';
        header('refresh:2; url=../login.php');
      }
    }
  }

  if(isset($_POST['editUser'])){
    $userId = $_GET['userID'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $query = editUser($pdo, $userId, $username, $password, $contact, $address);

    if($query){
      header('location: ../users/editUser.php?userID='.$userId);
    } else {
      echo 'Editing User Failed!';
      header('refresh:2; url=../users/viewUsers.php');
    }
  }
?>