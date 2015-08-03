<?php
/**
 *
 */

require_once('include/database/database-basic.php');
require_once('include/database/database-users.php');

db_connect();
$activate = TRUE;

$email = sanitize_string($_POST['email']);
$password = sanitize_string($_POST['password']);

if (substr($email, -6) === '@sfu.ca') {
  $username = substr($email, 0, -6);
}





// Verify activation
if (!($activate)) {
  
  // redirect to activation page
  header("Location: activate.php");
  exit;
}

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