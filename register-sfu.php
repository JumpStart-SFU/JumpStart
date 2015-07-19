<?php

require_once('include/database/database-field.php')

if (isset($_POST('email'))) {
    $user_id = $_POST('email');
}

if (isset($_POST('password'))) {
    $password = $_POST('password'); // will need to hash the password
}

if (isset($_POST('email'))) {
    $sex = $_POST('sex');
}






?>