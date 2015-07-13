<html lang = en>
<head>
    <!-- META STUFF -->
    <title>JumpStart | Register</title>
    <!-- CSS Stuff -->
</head>
<body>
    <h1>Select a Campus</h1>
    <select>
        <option value = "sfu">Simon Fraser University (SFU)</option>
    </select>
<?php
// If SFU is chosen, the following registeration will be updated to suit the campus respectively
$campus_file = "register-sfu.php";
?>
    <form action = "<?php echo ($campus_file) ?>" method = "post">
        <fieldset>
            <h1>Personal Information</h1>
            <input type = "email" name = "email" placeholder = "Enter your campus email" /><br/>
            <input type = "password" name = "password-1" placeholder = "Enter your password" /><br/>
            <input type = "password" name = "password-2" placeholder = "Re-enter your password" /><br/>
            <input type = "radio" name = "sex" value = "male" />Male <br/>
            <input type = "radio" name = "sex" value = "female" />Female <br/>
            <input type = "radio" name = "sex" value = "other" />Other <br/>
        </fieldset>
        <fieldset>
            <h1>Personality</h1>
            <select>
                <option>A</option>
            </select>
        </fieldset>
        <input type = "submit" value = "Register" />
    </form>
</body>
</html>