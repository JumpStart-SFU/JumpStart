<html lang = en>
<head>
    <!-- META STUFF -->
    <title>JumpStart | Register</title>
    <!-- CSS Stuff -->
</head>
<body>
  <h1>Select a Campus</h1>
  <select>
    <option label="SFU" value="sfu" selected>Simon Fraser University</option>
    <option label="UBC" value="ubc">University of British Columbia</option>
  </select>
  <br />
<?php
// If SFU is chosen, the following registeration will be updated to suit the campus respectively
$campus_file = "register-sfu.php";
?>
  <form action="<?php echo ($campus_file); ?>" method="post">
    <fieldset>
      <p>Enter your student id</p>
      <input type="text" name="username" placeholder="Enter your computing id" />@sfu.ca<br/>
      <p>Enter your password</p>
      <input type="password" name="password" placeholder="Enter your password" /><br/>
      <p>Re-enter your password</p>
      <input type="password" name="" placeholder="Re-enter your password" /><br/>
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