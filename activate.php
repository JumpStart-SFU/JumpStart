<?php

$activate = FALSE;

// Submit
if (isset($_POST('email')) &&
    isset($_POST('activate_code'))) {
  
  
  
  
}

// Success activation
if ($activate) {
  // redirect to profile page
}

// Failed activate to whatever
elseif (!($activate)) {
  
}

?>

<html lang="en">
<head>
  <!-- META STUFF -->
  <title>Activation</title>
  <!-- CSS Stuff -->
</head>
<body>
  <form action="activate.php">
    <h1>Enter your email address</h1>
    <input type="email" name="email" placeholder="john@jumpstart.com" /><br />
    <h1>Enter your code</h1>
    <input type="password" name="activate_code" /><br />
    <input type="submit" value="Activate" />
  </form>
</body>
</html>