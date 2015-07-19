<?php

/**
 * Performs initial setup
 */
function db_setup() {
  // Create database (if it doesn't already exist)
  $sql = "CREATE DATABASE IF NOT EXISTS jumpstart";
  
  // Create SFU table of users
  db_add_table('user_sfu', array(
    "uid SMALLINT NOT NULL", "username varchar(32) NOT NULL", "password varchar(32) NOT NULL", "PRIMARY KEY (uid)"
  ));
}

/**
 * Connects to the database
 */
function db_connect() {
  $servername = "localhost";
  $username = "jumpstart";
  $password = "Pokemon2015";
  $database = "jumpstart"

  // Create connection
  $conn = new mysqli($servername, $username, $password);
  
  // If database does not exist, performs setup
  if (!(mysql_select_db($database))) {
    db_setup();
  }
  
  // Connection error
  if ($conn->connect_error) {
    die ($conn->connect_error);
  }
}

/**
 * Adds a new table
 */
function db_add_table($table, $detail) {
  $query = "CREATE TABLE $table (";
  $query .= $detail[$x];
  
  for ($x = 1; $x < count($detail); $x++) {
    $query .= ",";
    $query .= $detail[$x];
  }
  
  $query .= ")";
  
  $result = $conn->query($query);
  if (!$result) {
    die("Database access failed: " . $conn->error);
  }
}

/**
 * Drops the table
 */
function db_drop_table($table) {
  $query = "DROP TABLE $table";
  $result = $conn->query($query);
  
  if (!$result) {
    die("Database access failed: " . $conn->error);
  }
}

?>