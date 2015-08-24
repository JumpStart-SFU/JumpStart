<?php
/**
 *
 */

/**
 * Connects to the database
 */
function db_connect() {
  $hostname = "localhost";
  $username = "jumpstart";
  $password = "asdasd";
  $database = "jumpstart";
  date_default_timezone_set("America/Vancouver");
  $conn = new mysqli($hostname, $username, $password, $database);
  
    // Connection error
  if ($conn->connect_error) {
    die ($conn->connect_error);
  }
  
  return $conn;
}

/**
 * Create a new table
 */
function db_create_table($conn, $table, $detail) {
  if ($conn->connect_error) {
    print "Something went wrong with the connection<br/>";
  }
  
  if (!(empty($table) && empty($detail))) {
    $query = "CREATE TABLE IF NOT EXISTS $table (";
    $query .= $detail[0]; 
  
    for ($x = 1; $x < count($detail); $x++) {
      $query .= ", ";
      $query .= $detail[$x];
    }
    
    $query .= ")";
    $result = $conn->query($query);
  
    if (!($result)) {
      die("Database access failed: " . $conn->error);
    }
  }
}

/**
 * Inserts data into table
 */
function db_insert($conn, $table, $data, $column = NULL, $isRepeat = TRUE) {
  if ($conn->connect_error) {
    print "Something went wrong with the connection<br/>";
  }

  if (!(empty($table) && empty($data))) {
    if ($isRepeat == TRUE || !(db_check_duplicate($conn, $table, current($data), current($column)))) {
      $query = "INSERT INTO $table ";
    
      // $column is an array
      if (is_array($column)) {
        $query .= "(";
      
        foreach ($column as $entry) {
          $query .= "$entry, ";
        }
        $query = trim($query, ', ') . ") ";
      }
    
      else {
        $query .= "$column ";
      }
    
      // $data is an array
      if (is_array($data)) {
        $query .= "VALUES (";
        
        foreach ($data as $entry) {
          $query .= "'$entry', ";
        }
        $query = trim($query, ', ') . ")";
      }
    
      else {
        $query .= "VALUES ('$data')";
      }
    
      $result = $conn->query($query);
      if (!($result)) {
        die("Database access failed: " . $conn->error);
      }
    }
  }
}

/**
 * Updates the data in the table
 */
function db_update($conn, $table, $new_data, $old_data) {
  if ($conn->connect_error) {
    print "Something went wrong with the connection<br/>";
  }
  
  if (!(empty($table) && empty($new_data) && empty($old_data))) {
    $query = "UPDATE $table SET $new_data WHERE $old_data";
    $result = $conn->query($query);
  
    if (!($result)) {
      die("Database access failed: " . $conn->error);
    }
  }
}

/**
 * Deletes data
 */
function db_delete($conn, $table, $column, $value) {
  if ($conn->connect_error) {
    print "Something went wrong with the connection<br/>";
  }
  
  if (!(empty($table) && empty($column) && empty($value))) {
    $query = "DELETE FROM $table WHERE ";
    $query .= "$column = $value";
    $result = $conn->query($query);
  
    if (!($result)) {
      die("Database access failed: " . $conn->error);
    }
  }
}

/**
 * Returns TRUE if there is a duplicate
 */
function db_check_duplicate($conn, $table, $data, $column) {
  if ($conn->connect_error) {
    print "Something went wrong with the connection<br/>";
  }
  
  $query = "SELECT id FROM `$table` WHERE $column = '$data'";
  $result = $conn->query($query);
  
  if ($result->num_rows > 0) {
    return TRUE;
  }
  
  else {
    return FALSE;
  }
}

?>
