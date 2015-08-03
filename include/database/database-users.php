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
  /*
  db_create_table($conn, $table, array(
    "username varchar(32) NOT NULL",
    "password text NOT NULL",
    "fullname text NOT NULL",
    "gender varchar(32) NOT NULL",
    "interest-1 text",
    "interest-2 text",
    "interest-3 text",
    "PRIMARY KEY (username)",
  ));
  */
  
  print "Inserting data into table $table <br />";
  
  $username = $data['username'];
  $fullname = $data['fullname'];
  $password = $data['password']; // hash this
  $sex = $data['sex'];
  $interest_1 = $data['interest-1'];
  $interest_2 = $data['interest-2'];
  $interest_3 = $data['interest-3'];
  
  $query = sanitize_MySQL($conn, "INSERT INTO $table VALUES ('$username', '$fullname', '$password', '$sex', '$interest_1', '$interest_2', '$interest_3')");
  
  print "Inserting the following query: <br />";
  print "$query <br />";
  
  $result = $conn->query($query);
  
  if (!($result)) {
    die("Database access failed: " . $conn->error . "<br />");
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
}

/**
 * Deletes a user from the database
 * Returns TRUE if succeeded
 * FALSE if otherwise
 */
function db_delete_user($conn, $table, $username) {
}

?>