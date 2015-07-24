<?php
/**
 *
 */

require_once('include/database/database.php');

db_connect();
$activate = TRUE;

$email = $_POST['email'];
$password = $_POST['password'];







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