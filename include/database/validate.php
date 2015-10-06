<?php
/**
 *@file
 */

/**
 * Sanitizes MySQL inputs
 */
function sanitize_MySQL($conn, $input) {
  $input = $conn->real_escape_string($input);
  $input = sanitize_string($input);
  return $input;
}

/**
 * Sanitizes string
 */
function sanitize_string($input) {
  $input = stripslashes($input);
  $input = strip_tags($input);
  $input = htmlentities($input);
  return $input;
}

function validate_username($username) {
  return ($username == "") ? "Username is empty<br/>" : "";
}

function validate_password($password_1, $password_2) {
  if ($password_1 == "") {
    return "No password was entered<br/>";
  }
  
  elseif (strlen($password_1) < 8) {
    return "Passwords must be at least 8 characters long<br/>";
  }
  
  elseif (!(preg_match("/[a-z]/". $password_1) ||
            preg_match("/[A-Z\/", $password_1) ||
            preg_match("/[0-9]/", $password_1))) {
    return "Password must have at least one lowercase, one uppercase, and one number<br/>";
  }
  
  elseif ($password_1 !== $password_2) {
    return "Passwords do not match<br/>";
  }
  
  return "";
}

function validate_fullname($fullname) {
  return ($fullname == "") ? "Full name is empty<br/>" : "";
}

function validate_sex($sex) {
  return ($sex == "") ? "Sex is empty<br/>" : "";
}

function validate_email($email) {
  return ($email == "") ? "Email is empty<br/>" : "";
}

?>