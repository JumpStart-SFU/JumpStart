<html lang = en>
<head>
    <!-- META STUFF -->
    <title>JumpStart | Register</title>
    <!-- CSS Stuff -->
</head>
<body>
    <h1>Select a Campus</h1>
    <select>
        <option value="sfu">Simon Fraser University (SFU)</option>
    </select>
<?php
// If SFU is chosen, the following registeration will be updated to suit the campus respectively
$campus_file = "register-sfu.php";
?>
  <form action="<?php echo ($campus_file); ?>" method="post">
    <fieldset>
      <h1>Personal Information</h1>
      <p>Enter your student id</p>
      <input type="text" name="username" placeholder="Enter your computing id" />@sfu.ca<br/>
      <p>Enter full name</p>
      <input type="text" name="fullname" placeholder="John Adam" /><br />
      <p>Enter your password</p>
      <input type="password" name="password" placeholder="Enter your password" /><br/>
      <p>Re-enter your password</p>
      <input type="password" name="" placeholder="Re-enter your password" /><br/>
      <p>Enter your gender</p>
      <input type="radio" name="sex" value="male" />Male <br />
      <input type="radio" name="sex" value="female" />Female <br/>
      <input type="radio" name="sex" value="other" />Other <br/>
    </fieldset>
    <fieldset>
      <h1>Personality</h1>
      <p>What is your personality</p>
      <select>
        <option>A</option>
      </select>
    </fieldset>
    <input type="submit" value="Register" />
  </form>
</body>
</html>