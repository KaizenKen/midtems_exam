<?php
  require_once 'dbConfig.php';

  function getTable($pdo, $table){
    $sql = "SELECT * FROM $table";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery){
      return $stmt->fetchAll();
    }
  }

  function getRestaurantById($pdo, $id){
    $sql = "SELECT * FROM restaurants WHERE restaurant_id = ? ";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);

    if ($executeQuery){
      return $stmt->fetch();
    }
  }

  function addRestaurant($pdo, $name, $location){
    $sql = "INSERT INTO restaurants(restaurant_name, restaurant_location) VALUES(?,?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$name, $location]);

    if ($executeQuery){
      return true;
    }
  }

  function editRestaurant($pdo, $id, $name, $location){
    $sql = 
    "UPDATE restaurants SET restaurant_name = ?, restaurant_location = ? WHERE restaurant_id = ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$name, $location, $id]);

    if ($executeQuery){
      return true;
    }
  }

  function deleteRestaurant($pdo, $id){
    $sql = "DELETE FROM items WHERE restaurant_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery1 = $stmt->execute([$id]);

    $sql = "DELETE FROM restaurants WHERE restaurant_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery2 = $stmt->execute([$id]);

    if ($executeQuery1 && $executeQuery2){
      return true;
    }
  }

  function getItemsByRestaurantId($pdo, $id){
    $sql = "SELECT * FROM items WHERE restaurant_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);

    if ($executeQuery){
      return $stmt->fetchAll();
    }
  }

  function getItemById($pdo, $id){
    $sql = "SELECT * FROM items WHERE item_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);

    if ($executeQuery){
      return $stmt->fetch();
    }
  }

  function addItem($pdo, $id, $name, $price){
    $sql = "INSERT INTO items(restaurant_id, item_name, item_price) VALUES(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id, $name, $price]);

    if ($executeQuery){
      return true;
    }
  }

  function deleteItem($pdo, $id){
    $sql = "DELETE FROM items WHERE item_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);

    if ($executeQuery){
      return true;
    }
  }

  function editItem($pdo, $id, $name, $price){
    $sql = 
    "UPDATE items SET item_name = ?, item_price = ? WHERE item_id = ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$name, $price, $id]);

    if ($executeQuery){
      return true;
    }
  }

  function addCustomer($pdo, $name, $password){
    $sql = "INSERT INTO customers(customer_name, customer_password) VALUES(?,?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$name, $password]);

    if ($executeQuery){
      return true;
    }
  }

  function getCustomerById($pdo, $id){
    $sql = "SELECT * FROM customers WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);

    if ($executeQuery){
      return $stmt->fetch();
    }
  }

  function editCustomer($pdo, $id, $name, $contact, $address){
    $sql = 
    "UPDATE customers SET customer_name = ?, customer_contact = ?, customer_address = ? WHERE customer_id = ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$name, $contact, $address, $id]);

    if ($executeQuery){
      return true;
    }
  }

  function deleteCustomer($pdo, $id){
    $sql = "DELETE FROM customers WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);

    if ($executeQuery){
      return true;
    }
  }

  function addRider($pdo, $name, $password){
    $sql = "INSERT INTO riders(rider_name, rider_password) VALUES(?,?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$name, $password]);

    if ($executeQuery){
      return true;
    }
  }

  function checkIfExists($pdo, $name, $userType){
    if($userType == 'customers'){
      $tableItem = 'customer_name';
    } else if($userType == 'riders'){
      $tableItem = 'rider_name';
    }

    $sql = "SELECT * FROM $userType WHERE $tableItem = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$name]);

    if ($executeQuery){
      return $stmt->fetchAll();
    }
  }
?>