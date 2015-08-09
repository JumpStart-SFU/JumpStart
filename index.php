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

// Form was submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
  $activate = FALSE;
  $username = NULL;
  $table = NULL;
  $email = sanitize_MySQL($conn, $_POST['email']);
  $password = sanitize_MySQL($conn, $_POST['password']);

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
  
  // Match found
  if ($result) {
    /*
    if (!($activate)) {
  
      // redirect to activation page
      header("Location: activate.php");
      exit;
    }
    */
    
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


<html>
<head>
  <!-- META STUFF -->
  <meta name="description" content="Meet new friends on your local campus!" />
  <title>JumpStart</title>
  <!-- CSS Stuff -->
  <link rel="css/index.css" type="text/css" />
</head>
<body>
  <form action="index.php" method="post">
    <input type="email" name="email" placeholder="Enter your campus email" /><br/>
    <input type="password" name="password" placeholder="Enter your password" /><br/>
    <a href="register.php"><input type="button" value="Register" /></a>
    <input type="submit" value="Log in" /><br/>
  </form>
</body>
</html>