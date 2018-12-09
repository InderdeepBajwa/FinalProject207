<?php

  // Database connections
  function getConnection() {
    // Create Connection
    $connection = new mysqli("localhost", "root", "", "vhlblog");

    // Check Connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }
    return $connection;
  }

  function runSafeQuery($query, $params) {
    $connection = getConnection();
    // Prepare
    $statement = $connection->prepare($query);
    // Check if prepare failed
    if($statement == false) {
      die("Prepare failed: " . $connection->error);
    }

    // Bind parameters
    if (count($params) > 0) {
      $statement->bind_param(...$params);
    }
    if ($statement->error) {
      die("Bind failed: " . $statement->error);
    }
    $success = $statement->execute();
    if ($success == false) {
      die("Execute failed: " . $statement->error);
    }

    $result = $statement->get_result();
    $connection->close();

    $results = [];

    while ($result && $row = $result->fetch_array()) {
      $results[] = $row;
    }

    return $results;


  }

 ?>
