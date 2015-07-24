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
 * Creates a new table
 */
function db_create_table($conn, $table, $detail) {
  if ($conn->connect_error) {
    print ("Something went wrong");
  }
  print "create table";
  
  $query = "CREATE TABLE IF NOT EXISTS $table (";
  $query .= $detail[$x];
  
  for ($x = 1; $x < count($detail); $x++) {
    $query .= ", ";
    $query .= $detail[$x];
  }
  $query .= ")";
  
  $result = $conn->query($query);
  
  if (!$result) {
    die("Database access failed: " . $conn->error);
  }
}

/**
 * Insert into the database an array for a new user
 * Assumes input has not been sanitised
 * Returns TRUE if succeeded
 * FALSE if otherwise
 */
function db_table_user_insert($conn, $table, $data) {
  // If table does not exist yet
  /*
  db_create_table($conn, $table, array(
    "username varchar(32) NOT NULL",
    "password text NOT NULL",
    "fullname text NOT NULL",
    "gender varchar(32) NOT NULL",
    "PRIMARY KEY (uid)"
  )); */
  
  $username = $data['username'];
  $fullname = $data['fullname'];
  $password = $data['password']; // hash this
  $sex = $data['sex'];
  
  $query = "INSERT INTO $table (username, fullname, password, sex) ";
  $query .= "VALUES ('$username', '$fullname', '$password', '$sex')";
  
  print "Inserting the following query: <br />";
  print "$query <br />";
  
  $result = $conn->query($query);
  
  if (!($result)) {
    die("Database access failed: " . $conn->error);
  }
  
  print ("Insert was successful!");

}

/**
 * Updates the database with the new details
 * Assumes input has not been sanitised
 * Returns TRUE if succeeded
 * FALSE if otherwise
 */
function db_update_user($conn, $table, $data) {
    $id = data['id'];
}

/**
 * Deletes a user from the database
 * Returns TRUE if succeeded
 * FALSE if otherwise
 */
function db_delete_user($conn, $table, $id) {
    
}

?>

