<?php

/**
 * Reads from a database of users
 * Describes all the users
 */
function db_table_user_describe($table_user, $id) {
  $query = "SELECT * FROM $table_user";
  $result = $conn->query($query);
  
  if (!$result) {
    die("Database access failed: " . $conn->error);
  }
  
  $rows = $result->num_rows;
  
  // Displaying the table
  for ($x = 0; $x < $rows; $x++) {
    
    
  }
  
}
  
  
    return $user;
}

/**
 * Insert into the database an array for a new user
 * Assumes input has not been sanitised
 * Returns TRUE if succeeded
 * FALSE if otherwise
 */
function db_table_user_insert($table, $data) {
  $query = "INSERT";
  $result = $conn->query($query);
  
  if (!$result) {
    die("Database access failed: " . $conn->error);
  }

}

/**
 * Updates the database with the new details
 * Assumes input has not been sanitised
 * Returns TRUE if succeeded
 * FALSE if otherwise
 */
function database_update_user($table, $data) {
    $id = data['id'];
}

/**
 * Deletes a user from the database
 * Returns TRUE if succeeded
 * FALSE if otherwise
 */
function database_delete_user($table, $id) {
    
}

?>