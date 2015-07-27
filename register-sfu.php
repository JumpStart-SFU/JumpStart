<?php
/**
 *
 */
require_once('include/database/database.php');

print "Entered into register-sfu.php <br />";

$conn = db_connect();

if (isset($_POST['username']) &&
    isset($_POST['fullname']) &&
    isset($_POST['password']) &&
    isset($_POST['sex'])) {
  print "Getting info from form <br />";

  $data = array(
    "username" => $_POST['username'],
    "fullname" => $_POST['fullname'],
    "password" => $_POST['password'],
    "sex" => $_POST['sex'],
    "interest-1" => $_POST['interest-1'],
    "interest-2" => $_POST['interest-2'],
    "interest-3" => $_POST['interest-3'],                               
  );
  
  print "inserting into data<br />";

  db_table_user_insert($conn, 'users_sfu', $data);
}

else {
  print "no data received";
}

?>