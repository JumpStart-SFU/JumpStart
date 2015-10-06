<?php
/**
 * @file
 */

require_once('include/database/database-basic.php');
//require_once('include/database/database-basic.php');
require_once('include/backend/backend_general.php');
require_once('include/database/validate.php');

$conn = db_connect();
$fail = NULL;

if (isset($_POST['email']) ||
    isset($_POST['fullname']) ||
    isset($_POST['password_1']) ||
    isset($_POST['sex'])) {
  $email = $_POST['email'];
  $fullname = $_POST['fullname'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];
  $sex = $_POST['sex'];
  
  $fail = validate_email($email);
  $fail .= validate_password($password_1, $password_2);
  $fail .= validate_fullname($fullname);
  $fail .= validate_sex($sex);
  
  // No errors
  if ($fail === "") {
    $username = sanitize_MySQL($conn, backend_general_convert_to_username($email));
    $email = sanitize_MySQL($conn, $email);
    $password = sanitize_MySQL($conn, crypt($password_1, $email));
    $fullname = sanitize_MySQL($conn, $fullname);
    $sex = sanitize_MySQL($conn, $sex);
    $campus = sanitize_MySQL($conn, backend_general_convert_to_domain($email));
    
    //$uid = db_insert($conn, 'users', array($username, $password, $email), array('username', 'password', 'email'), FALSE, TRUE);
    //db_insert($conn, 'users_profile', array($uid, $fullname, $sex), array('uid', 'fullname', 'sex'));
    
    exit;
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- META STUFF -->
    <meta name="viewport" content="width-device-width, initial-scale=1" />
    <title>JumpStart | Register</title>
    <!-- CSS Stuff -->
    <link rel="stylesheet" type="text/css" href="css/index.css" />
  </head>
  <script src="js/register.js">
    function validate(form) {
      fail = validateUsername(form.username.value);
      fail += validatePassword(form.password.value, form.password.value);
      fail += validateFullname(form.fullname.value);
      fail += validateSex(form.sex.value);
      
      if (fail == "") {
        return true;
      }
      
      else {
        alert(fail);
        return false;
      }
    }
  </script>
  
  <body>
    <?php print $fail; ?>
    <form action="register.php" method="post" onSubmit="return validate(this)">
      <input type="text" name="fullname" placeholder="Full Name"/><br/>
      <input type="email" name="email" maxlength="64" placeholder="Enter your campus Email"/><br/>
      <input type="password" name="password_1" placeholder="Password" /><br/>
      <input type="password" name="password_2" placeholder="Re-enter your password" /><br/>
      <input type="radio" name="sex" value="Male" />Male 
      <input type="radio" name="sex" value="Female" />Female 
      <input type="radio" name="sex" value="Other" />Other
      <br/>
      
      <p class="small-print">By clicking 'Register', you agree to our terms &amp; conditions, and to our Cookie policies.</p>
      
      <input type="submit" value="Register"/>
    </form>
    <?php include_once 'include/partial/footer.php'; ?>
  </body>
</html>