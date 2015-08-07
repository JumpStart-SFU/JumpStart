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
  $username = $data['username'];
  $fullname = $data['fullname'];
  $password = $data['password']; // hash this
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