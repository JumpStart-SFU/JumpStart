<?php
/**
 * @file
 * 
 */
require_once('include/database/database-basic.php');
require_once('include/database/database-users.php');
require_once('include/database/validate.php');
require_once('include/backend/backend_general.php');

$conn = db_connect();

$activate = FALSE;
$username = NULL;
$table = NULL;
$email = NULL;
$password = NULL;


if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
  $username = $_COOKIE['username'];
  $password = $_COOKIE['password'];
  
  $result = db_table_user_read($conn, 'users', $username, $password);
  
  // Redirects to profile
  if ($result) {
    header("Location: profile.php");
    die();
  }
  
  // Destroy the cookies
  else {
    setcookie('username', $username, time() - 2592000, '/');
    setcookie('password', $password, time() - 2592000, '/');
  }
}

// Form was submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = sanitize_MySQL($conn, $_POST['email']);
  $password = crypt(sanitize_MySQL($conn, $_POST['password']), $email); // Encrypt password
  $username = backend_general_convert_to_username($email);
  $result = db_table_user_read($conn, 'users', $username, $password);
  
  if ($result) {
    setcookie('username', $username, NULL, '/');
    setcookie('password', $password, NULL, '/');
    
    // redirect to the user's profile
    header("Location: profile.php");
    die();
  }
  
  // No match
  else {
    print "Incorrect username or password!";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <!-- META STUFF -->
  <meta name="description" content="Meet new friends on your local campus!" />
  <meta name="viewport" content="width-device-width, initial-scale=1" />
  <title>Conextus</title>
  <!-- CSS Stuff -->
  <link rel="stylesheet" type="text/css" href="css/index.css" />
  <link rel="shortcut icon" href="http://sstatic.net/stackoverflow/img/favicon.ico">
</head>
<body>
  <?php require_once('include/partial/header.php'); ?>
  
  <div class="form">
    <form id="login" action="index.php" method="post">
      <input type="email" name="email" placeholder="Enter your campus email" /><br/>
      <input type="password" name="password" placeholder="Enter your password" /><br/>
      
      <input type="submit" value="Sign in" /><br/>
      <a href="register.php"><input type="button" value="Create an Account" /></a>
    </form>
  </div>
  <?php include_once 'include/partial/footer.php'; ?>
</body>
</html>