<?php
/**
 * @file
 */

require_once('include/database/database-basic.php');
require_once('include/database/database-users.php');
require_once('include/database/validate.php');

$conn = db_connect();
$fail = NULL;

if (isset($_POST['username']) ||
    isset($_POST['fullname']) ||
    isset($_POST['password_1']) ||
    isset($_POST['sex'])) {
  $table = 'users_sfu';
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];
  $sex = $_POST['sex'];
  $interest_1 = $_POST['interest-1'];
  $interest_2 = $_POST['interest-2'];
  $interest_3 = $_POST['interest-3'];
  
  $fail = validate_username($username);
  $fail .= validate_password($password_1, $password_2);
  $fail .= validate_fullname($fullname);
  $fail .= validate_sex($sex);
  
  // No errors
  if ($fail === "") {
    $data = array(
      "username" => sanitize_MySQL($conn, $username),
      "fullname" => sanitize_MySQL($conn, $fullname),
      "password" => sanitize_MySQL($conn, crypt($password_1, 'moneys')),
      "sex" => sanitize_MySQL($conn, $sex),
      "interest-1" => sanitize_MySQL($conn, $interest_1),
      "interest-2" => sanitize_MySQL($conn, $interest_2),
      "interest-3" => sanitize_MySQL($conn, $interest_3),
    );
    
    /*
    // Mail isn't working
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
  
    db_table_user_insert($conn, $table, $data);
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
    <h1>Select a Campus</h1>
    <select>
      <option label="SFU" value="sfu" selected>Simon Fraser University</option>
      <option label="UBC" value="ubc">University of British Columbia</option>
    </select>
    <br />
    <?php print $fail; ?>
    <form action="register.php" method="post" onSubmit="return validate(this)">
      <fieldset>
        <p>Enter your student id</p>
        <input type="text" name="username" maxlength="32" placeholder="Enter your computing id" />@sfu.ca<br/>
        <p>Enter your password</p>
        <input type="password" name="password_1" placeholder="Enter your password" /><br/>
        <p>Re-enter your password</p>
        <input type="password" name="password_2" placeholder="Re-enter your password" /><br/>
        <p>Enter full name</p>
        <input type="text" name="fullname" placeholder="John Adam" /><br />
        <p>Enter your gender</p>
        <input type="radio" name="sex" value="Male" />Male <br />
        <input type="radio" name="sex" value="Female" />Female <br/>
        <input type="radio" name="sex" value="Other" />Other <br/>
      </fieldset>
      <fieldset>
        <p>What is your interest? Name three</p>
        <input type="text" name="interest-1" placeholder="Interest 1" /><br /><!-- goal: have auto-complete with pre-defined interest -->
        <input type="text" name="interest-2" placeholder="Interest 2" /><br />
        <input type="text" name="interest-3" placeholder="Interest 3" /><br />
      </fieldset>
      <br />
      <input type="submit" value="Register" />
    </form>
  </body>
</html>