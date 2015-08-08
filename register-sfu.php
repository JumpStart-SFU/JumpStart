<?php
/**
 * @file
 */

require_once('include/database/database-basic.php');
require_once('include/database/database-users.php');
require_once('include/database/validate.php');

$conn = db_connect();

if (isset($_POST['username']) &&
    isset($_POST['fullname']) &&
    isset($_POST['password']) &&
    isset($_POST['sex'])) {
  
  $username = sanitize_string($_POST['username']);
  $fullname = sanitize_string($_POST['fullname']);
  $password = sanitize_string($_POST['password']);
  $sex = sanitize_string($_POST['sex']);
  $interest_1 = sanitize_string($_POST['interest-1']);
  $interest_2 = sanitize_string($_POST['interest-2']);
  $interest_3 = sanitize_string($_POST['interest-3']);
  
  $data = array(
    "username" => sanitize_MySQL($conn, $username),
    "fullname" => sanitize_MySQL($conn, $fullname),
    "password" => sanitize_MySQL($conn, $password),
    "sex" => sanitize_MySQL($conn, $sex),
    "interest-1" => sanitize_MySQL($conn, $interest_1),
    "interest-2" => sanitize_MySQL($conn, $interest_2),
    "interest-3" => sanitize_MySQL($conn, $interest_3),                               
  );
  
  db_table_user_insert($conn, 'users_sfu', $data);
  
  // Mail isn't working
  /*
  $to = $username . '@sfu.ca';
  $subject = 'hi';
  $body = 'i am body';
  $headers = 'From: admin@jumpstart.ca';
  
  if (mail($to, $subject, $body, $headers)) {
    print 'mail sent';
  }
  
  else {
    print 'mail not sent';
  }
  */
}

else {
  print "no data received";
}

?>