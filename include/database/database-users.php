<?php
/**
 *
 */

/**
 * Insert into the database an array for a new user
 * Assumes input has not been sanitised
 * Returns TRUE if succeeded
 * FALSE if otherwise
 */
function db_table_user_insert($conn, $table, $data) {
  if ($conn->connect_error) {
    print "Something went wrong with the connection<br/>";
  }
  
  if (!(empty($table) && empty($data))) {
    $username = $data['username'];
    $fullname = $data['fullname'];
    $password = crypt($data['password'], $username);
    $sex = $data['sex'];
    $interest_1 = $data['interest-1'];
    $interest_2 = $data['interest-2'];
    $interest_3 = $data['interest-3'];
  
    $query = sanitize_MySQL($conn, "INSERT INTO $table VALUES ('$username', '$fullname', '$password', '$sex', '$interest_1', '$interest_2', '$interest_3')");
  
    $result = $conn->query($query);
  
    if (!($result)) {
      die("Database access failed: " . $conn->error . "<br />");
    }
  }
}

/**
 * Reads the user's data (but not password) based on their username and passwprd
 * Gets the user details based 
 */
function db_table_user_read($conn, $table, $username, $password) {
  if ($conn->connect_error) {
    print "Something went wrong with the connection<br/>";
  }
  
  $result = NULL;
  
  if (!(empty($table) && empty($username) && empty($password))) {
    $password = crypt($password, $username);
    
    $query = "SELECT username, fullname, sex, interest_1, interest_2, interest_3 ";
    $query .= "FROM $table WHERE (username = '$username' AND password = '$password')";
    $result = $conn
      ->query($query)
      ->fetch_assoc();
  }
  
  return $result;
}

function db_table_user_readAll($conn, $table, $username) {
}

/**
 * Updates the database with the new details
 * Assumes input has not been sanitised
 * Returns TRUE if succeeded
 * FALSE if otherwise
 */
function db_table_user_update($conn, $table, $old_data, $new_data) {
}

/**
 * Deletes a user from the database
 * Returns TRUE if succeeded
 * FALSE if otherwise
 */
function db_table_user_delete($conn, $table, $username) {
}

?>