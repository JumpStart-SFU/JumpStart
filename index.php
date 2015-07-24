<?php

?>

<html lang=en>
<head>
  <!-- META STUFF -->
  <meta name="description" content="Meet new friends on your local campus!" />
  <title>JumpStart</title>
  <!-- CSS Stuff -->
  <link rel="css/index.css" type="text/css" />
</head>
<body>
  <form action="profile.php" method="post">
    <input type="email" name="email" placeholder="Enter your campus email" /><br/>
    <input type="password" name="password" placeholder="Enter your password" /><br/>
    <a href="register.php"><input type="button" value="Register" /></a>
    <input type="submit" value="Log in" /><br/>
  </form>
</body>
</html>