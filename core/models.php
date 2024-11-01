<?php
  require_once 'dbConfig.php';

  function checkIfExists($pdo, $username, $usertype){
    $sql = "SELECT * FROM users WHERE user_name = ? AND user_type = ?";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$username, $usertype]);

    if($execute){
      if($stmt->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  function checkPassword($pdo, $username, $password, $usertype){
    $sql = "SELECT * FROM users WHERE user_name = ? AND user_password = ? AND user_type = ?";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$username, $password, $usertype]);

    if($execute){
      if($stmt->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  function addUser($pdo, $username, $password, $usertype){
    $sql = "INSERT INTO users(user_name, user_password, user_type) VALUES(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$username, $password, $usertype]);

    if($execute){
      return true;
    }
  }

  function getUserByName($pdo, $username, $usertype){
    $sql = "SELECT * FROM users WHERE user_name = ? AND user_type = ?";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$username, $usertype]);

    if($execute){
      return $stmt->fetch();
    }
  }

  function getUserById($pdo, $id){
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$id]);

    if($execute){
      return $stmt->fetch();
    }
  }

  function getAllUsers($pdo){
    $sql = "SELECT * from users";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute();

    if($execute){
      return $stmt->fetchAll();
    }
  }

  function editUser($pdo, $id, $username, $password, $contact, $address){
    $sql = "UPDATE users SET user_name = ?, user_password = ?, user_contact = ?, user_address = ? WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$username, $password, $contact, $address, $id]);

    if($execute){
      session_start();
      $editorId = $_SESSION['userid'];

      $sql2 = "UPDATE users SET edited_by = ?, date_edited = CURRENT_TIMESTAMP WHERE user_id = ?";
      $stmt2 = $pdo->prepare($sql2);
      $execute2 = $stmt2->execute([$editorId, $id]);

      if($execute2){
        return true;
      }
    }
  }

  function deleteUser($pdo, $id){
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$id]);

    if($execute){
      return true;
    }
  }

  function getAllOrders($pdo){
    $sql = "SELECT * from orders";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute();

    if($execute){
      return $stmt->fetchAll();
    }
  }

  function getOrdersByUserId($pdo, $id){
    $sql = "SELECT * from orders WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$id]);

    if($execute){
      return $stmt->fetchAll();
    }
  }

  function getOrderById($pdo, $id){
    $sql = "SELECT * from orders WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$id]);

    if($execute){
      return $stmt->fetch();
    }
  }

  function getAllOrderedItems($pdo, $orderId, $customerId){
    $sql = "SELECT * FROM orders WHERE order_id = ? AND customer_id = ?";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$orderId, $customerId]);

    if($execute){
      return $stmt->fetchAll();
    }
  }

  function getItemById($pdo, $id){
    $sql = "SELECT * FROM items WHERE item_id = ?";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$id]);

    if($execute){
      return $stmt->fetch();
    }
  }

  function placeNewOrder($pdo, $userId, $itemId){
    $sql = "INSERT INTO orders(customer_id, ordered_items) VALUES(?,?);";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$userId, $itemId]);

    if($execute){
      return true;
    }
  }

  function deleteOrder($pdo, $id){
    $sql = "DELETE FROM orders WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$id]);

    if($execute){
      return true;
    }
  }

  function editOrder($pdo, $itemId, $orderId){
    $sql = 'UPDATE orders SET ordered_items = ? WHERE order_id = ?';
    $stmt = $pdo->prepare($sql);
    $execute = $stmt->execute([$itemId, $orderId]);

    if($execute){
      session_start();
      $sessionId = $_SESSION['userid'];

      $sql = "UPDATE orders SET edited_by = ?, date_edited = current_timestamp WHERE order_id = ?";
      $stmt = $pdo->prepare($sql);
      $execute2 = $stmt->execute([$sessionId, $orderId]);

      if($execute2){
        return true;
      }
    }
  }
?>