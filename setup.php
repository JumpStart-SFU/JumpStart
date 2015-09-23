<?php
/**
 * Basic setup files.
 * Place this in same folder as index.php
 */

require_once('include/database/database-basic.php');
require_once('include/setup/setup-admin.php');
require_once('include/setup/setup-school.php');
require_once('include/setup/setup-users.php');

/**
 * Setup website with assumption on blank state.
 */
function initialise_JumpStart() {
  $conn = db_connect();
  
  // Create tables
  setup_admin_create_tables($conn);
  setup_users_create_tables($conn);
  setup_school_create_tables($conn);
}
?>
