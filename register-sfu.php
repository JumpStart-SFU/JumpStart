<?php
/**
 *
 */
require_once('include/database/database-basic.php');
require_once('include/database/database-users.php');
require_once('include/database/validate.php');

$conn = db_connect();

if (isset($_POST['username']) &&
    isset($_POST['fullname']) &&
    isset($_POST['password']) &&
    isset($_POST['sex'])) {
  
  $data = array(
    "username" => sanitize_MySQL($conn, $_POST['username']),
    "fullname" => sanitize_MySQL($conn, $_POST['fullname']),
    "password" => sanitize_MySQL($conn, $_POST['password']),
    "sex" => sanitize_MySQL($conn, $_POST['sex']),
    "interest-1" => sanitize_MySQL($conn, $_POST['interest-1']),
    "interest-2" => sanitize_MySQL($conn, $_POST['interest-2']),
    "interest-3" => sanitize_MySQL($conn, $_POST['interest-3']),                               
  );
  db_table_user_insert($conn, 'users_sfu', $data);
}

else {
  print "no data received";
}

?>