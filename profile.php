<?php
/**
 *
 */

require_once('include/database/database-basic.php');
require_once('include/database/database-users.php');
require_once('include/database/validate.php');

$conn = db_connect();
$activate = TRUE;

$email = sanitize_string($_POST['email']);
$password = sanitize_MySQL($conn, $_POST['password']);

if (substr($email, -6) === '@sfu.ca') {
  $username = sanitize_MySQL($conn, substr($email, 0, -6));
}

$result = db_table_user_read($conn, 'users_sfu', $password);

if ($result) {
  var_dump($result);
  print $result->username;
  
  print $result->username;
}

else {
  print 'no result';
}



// Verify activation
/*
if (!($activate)) {
  
  // redirect to activation page
  header("Location: activate.php");
  exit;
}
*/

?>

<html lang=en>
<head>
    <!-- META STUFF -->
    <title><?php //echo ($name) ?></title>
    <!-- CSS Stuff -->
</head>
<body>
  <p>HelloWorld</p>
</body>
</html>