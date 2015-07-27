<?php
/**
 *
 */

/**
 * Sanitizes string
 */
function sanitize_string($input) {
  print "sanitizing input <br />";
  $input = stripslashes($input);
  $input = strip_tags($input);
  $input = htmlentities($input);
  print "input sanitized <br />";
  return $input;
}

/**
 * Sanitizes MySQL inputs
 */
function sanitize_MySQL($conn, $input) {
  print "sanitizing MySQL input <br />";
  //$input = $conn->real_escape_string($input);
  $input = sanitize_string($input);
  return $input;
}

?>