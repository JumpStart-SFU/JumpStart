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
  
  if (empty($table)) {
    print "Empty array!<br/>";
    
  }
  
  if (empty($detail)) {
    print "Query is empty!<br/>";
  }
  
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

/**
 *
 */
function db_insert_entry($conn, $table, $data) {
  if ($conn->connect_error) {
    print "Something went wrong with the connection<br/>";
  }
  
  if (empty($table)) {
    print "Empty array!<br/>";
    
  }
  
  if (empty($detail)) {
    print "Query is empty!<br/>";
  }
  
  $query = "INSERT INTO $table $column VALUES $data";
  $result = $conn->query($query);
  
  if (!$result) {
    die("Database access failed: " . $conn->error);
  }
  
  // $data is an array
  if (is_array($data)) {
    $query = "INSERT INTO $table VALUES ('$data[0]";
    
    for ($x = 1; $x < count($data); $x++) {
      $query .= ", ";
      $query .= $detail[$x];
    }
    $query .= ")";
  }
  
  // $data is a variable
  else {
    $query = "INSERT INTO $table VALUES ('$data');"
  }
  
  $result = $conn->query($query);
  
  if (!($result)) {
    die("Database access failed: " . $conn->error);
  }
}

/**
 * Updates the table
 */
function db_update_entry($conn, $table, $new_data, $old_data) {
  if ($conn->connect_error) {
    print "Something went wrong with the connection<br/>";
  }
  
  if (empty($table)) {
    print "Empty table<br/>";
    
  }
  
  if (empty($detail)) {
    print "Query is empty!<br/>";
  }
  
  $query = "UPDATE $table SET $new_data WHERE $old_data";
  $result = $conn->query($query);
  
  if (!($result)) {
    die("Database access failed: " . $conn->error);
  }
}

/**
 *
 */
function db_delete_entry($conn, $table, $column, $value) {
  if ($conn->connect_error) {
    print ("Something went wrong");
  }
  
  if (empty($table)) {
    print "Empty table!<br/>";
    
  }
  
  if (empty($column)) {
    print '$column is empty!<br/>';
  }
  
  $query = "DELETE FROM $table WHERE ";
  $query .= "$column = $value";
  $result = $conn->query($query);
  
  if (!$result) {
    die("Database access failed: " . $conn->error);
  }
}

?>
