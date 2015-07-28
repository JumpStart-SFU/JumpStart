<?php
/**
 *
 */

/**
 * Sanitizes string
 */
function sanitize_string($input) {
  $input = stripslashes($input);
  $input = strip_tags($input);
  $input = htmlentities($input);
  return $input;
}

/**
 * Sanitizes MySQL inputs
 */
function sanitize_MySQL($conn, $input) {
  $input = $conn->real_escape_string($input);
  $input = sanitize_string($input);
  return $input;
}

?>