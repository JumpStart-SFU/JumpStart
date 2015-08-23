<?php
/**
 * @file
 *
 * Signs out the user by removing all cookies
 *
 */

$username = $_COOKIE['username'];
$password = $_COOKIE['password'];
$table = $_COOKIE['table'];

// Destroy cookies
setcookie('username', $username, time() - 2592000, '/');
setcookie('password', $password, time() - 2592000, '/');
setcookie('table', $table, time() - 2592000, '/');

header("Location: index.php");
die();
