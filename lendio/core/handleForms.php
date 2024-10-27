<?php
  require_once 'dbConfig.php';
  require_once 'models.php';

  if(isset($_POST['addRestaurant'])) {
    $query = addRestaurant($pdo, $_POST['name'], $_POST['location']);

    if($query){
      header(header: 'location: ../restaurants/viewRestaurants.php');
    } else{
      echo 'Add Restaurant Failed';
    }
  }

  if(isset($_POST['deleteRestaurant'])) {
    $query = deleteRestaurant($pdo, $_GET['restaurantID']);

    if($query){
      header(header: 'location: ../restaurants/viewRestaurants.php');
    } else{
      echo 'Delete Restaurant Failed';
    }
  }

  if(isset($_POST['editRestaurant'])) {
    $query = editRestaurant($pdo, $_GET['restaurantID'], $_POST['name'], $_POST['location']);

    if($query){
      header(header: 'location: ../restaurants/viewRestaurants.php');
    } else{
      echo 'Edit Restaurant Failed';
    }
  }

  if(isset($_POST['addItem'])) {
    $query = addItem($pdo, $_GET['restaurantID'], $_POST['name'], $_POST['price']);

    if($query){
      header(header: 'location: ../items/displayItems.php?restaurantID='. $_GET['restaurantID']);
    } else{
      echo 'Add Restaurant Failed';
    }
  }

  if(isset($_POST['deleteItem'])) {
    $query = deleteItem($pdo, $_GET['itemID']);

    if($query){
      header(header: 'location: ../items/displayItems.php?restaurantID='.$_GET['restaurantID']);
    } else{
      echo 'Delete Restaurant Failed';
    }
  }

  if(isset($_POST['editItem'])) {
    $query = editItem($pdo, $_GET['itemID'], $_POST['name'], $_POST['price']);

    if($query){
      header(header: 'location: ../items/displayItems.php?restaurantID='.$_GET['restaurantID']).'&itemID='.$_GET['itemID'];
    } else{
      echo 'Edit Restaurant Failed';
    }
  }

  if(isset($_POST['editCustomer'])){
    $query = editCustomer($pdo, $_GET['ID'], $_POST['name'], $_POST['contact'], $_POST['address']);

    if($query){
      header('location: ../customers/viewCustomers.php');
    } else {
      echo 'Edit Customer Failed';
    }
  }

  if(isset($_POST['deleteCustomer'])){
    $query = deleteCustomer($pdo, $_GET['ID']);

    if($query){
      header('location: ../customers/viewCustomers.php');
    } else {
      echo 'Delete Customer Failed';
    }
  }

  if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    $query = checkIfExists($pdo, $name, $userType);

    if(count($query) != 0){
      header('location: ../attempt.php?result=2');
    } else {
        if($userType == 'customers'){
          $query = addCustomer($pdo, $name, $password);

          if($query){
            header('location: ../attempt.php?result=1');
          } else {
            header('location: ../attempt.php?result=0');
          }
        } else if($userType == 'riders'){
          $query = addRider($pdo, $name, $password);

          if($query){
            header('location: ../attempt.php?result=1');
          } else {
            header('location: ../attempt.php?result=0');
          }
        }
      }
  }

  else{
    echo 'Unknown Action';
  }
?>