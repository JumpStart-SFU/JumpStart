<?php
/**
 * @file
 * Profile page
 */

require_once('include/database/database-basic.php');
require_once('include/partial/header.php');
require_once('include/partial/sidebar.php');

$conn = db_connect();

?>
<!DOCTYPE html>
<html>
<head>
  <!-- META STUFF -->
  <meta name="viewport" content="width-device-width, initial-scale=1" />
  <title><?php //echo ($name) ?></title>
  <!-- CSS Stuff -->
  <link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body>
  <p>Hello World!</p>
</body>
</html>