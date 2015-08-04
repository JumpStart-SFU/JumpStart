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
    print ("Something went wrong<br/>");
  }
  
  if (empty($table)) {
    print "Empty array!<br/>";
    
  }
  
  if (empty($detail)) {
    print ("Query is empty!<br/>");
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
function db_create_entry($conn, $table, $data, $column = NULL) {
  if ($conn->connect_error) {
    print ("Something went wrong");
  }
  
  $query = "INSERT INTO $table $column VALUES $data";
  $result = $conn->query($query);
  
  if (!$result) {
    die("Database access failed: " . $conn->error);
  }
}

/**
 *
 */
function db_update_entry($conn, $table, $detail) {
  if ($conn->connect_error) {
    print ("Something went wrong");
  }
}

/**
 *
 */
function db_delete_entry($conn, $table, $detail) {
  if ($conn->connect_error) {
    print ("Something went wrong");
  }
  
  $query = "INSERT INTO $table $column VALUES $data";
  $result = $conn->query($query);
  
  if (!$result) {
    die("Database access failed: " . $conn->error);
  }
}

?>
