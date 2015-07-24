<?php
/**
 *
 */

require_once('include/database/database.php');
$conn = db_connect();

if (isset($_POST['username']) &&
    isset($_POST['fullname']) &&
    isset($_POST['password'])) {

  $data = array(
    "username" => $_POST['username'],
    "fullname" => $_POST['fullname'],
    "password" => $_POST['password'],
    "sex" => $_POST['sex'],
  );
  
  print "inserting into data<br />";

  db_table_user_insert($conn, 'users_sfu', $data);
}

?>