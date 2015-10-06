<?php
/**
 * Basic backend functions
 */

/**
 * Converts an email address into a username
 */
function backend_general_convert_to_username($email) {
  $username = strstr($email, '@', TRUE);
  return $username;
}

/**
 * Converts an email address into its domain (without the .ca or .com)
 */
function backend_general_convert_to_domain($email) {
  $domain = strstr(substr(
      (strstr($email, '@')), 1
    ), '.'. TRUE);
  
  return $domain;
}

/**
 * Sets cookie
 */
function backend_general_set_cookie() {
}

/**
 * Removes cookie
 */
function backedn_general_remove_cookie() {
}

?>