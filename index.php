<?php
/**
 * @file
 * 
 */
require_once('setup.php');
require_once('include/database/database-basic.php');
require_once('include/database/database-users.php');
require_once('include/database/validate.php');

initialise_JumpStart();
$conn = db_connect();

$activate = FALSE;
$username = NULL;
$table = NULL;
$email = NULL;
$password = NULL;


if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
  $username = $_COOKIE['username'];
  $password = $_COOKIE['password'];
  $table = $_COOKIE['table'];
  
  $result = db_table_user_read($conn, $table, $username, $password);
  
  if ($result) {
    header("Location: profile.php");
    die();
  }
  
  // Destroy the cookies
  else {
    setcookie('username', $username, time() - 2592000, '/');
    setcookie('password', $password, time() - 2592000, '/');
    setcookie('table', $table, time() - 2592000, '/');
    
  }
}


// Form was submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = sanitize_MySQL($conn, $_POST['email']);
  $password = crypt(sanitize_MySQL($conn, $_POST['password']), 'moneys'); // Encrypt password

  if (substr($email, -7) === '@sfu.ca') {
    $username = sanitize_MySQL($conn, substr($email, 0, -7));
    $table = 'users_sfu';
  }
  
  elseif (substr($email, -7) === '@ubc.ca') {
    $username = sanitize_MySQL($conn, substr($email, 0, -7));
    $table = 'users_ubc';
  }
  
  else {
    $username =  NULL;
    $password = NULL;
    $table = NULL;
  }
  
  $result = db_table_user_read($conn, $table, $username, $password);
  
  if ($result) {
    setcookie('username', $username, NULL, '/');
    setcookie('password', $password, NULL, '/');
    setcookie('table', $table, NULL, '/');
    
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
  <title>JumpStart</title>
  <!-- CSS Stuff -->
  <link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body>
  <div class="homepage-main-logo">
    <img src="" />
  </div>
  <div class="form">
    <form action="index.php" method="post">
      <input type="email" name="email" placeholder="Enter your campus email" /><br/>
      <input type="password" name="password" placeholder="Enter your password" /><br/>
      <a href="register.php"><input type="button" value="Register" /></a>
      <input type="submit" value="Log in" /><br/>
    </form>
  </div>
  <?php include_once 'include/partial/footer.php'; ?>
</body>
</html>