<?php
/**
 * Setup for admin
 */

require_once('include/database/database-basic.php');

/**
 * Create tables relating to admin stuff
 */
function setup_admin_create_tables($conn = NULL) {
  if ($conn === NULL) {
    $conn = db_connect();
  }
  
  db_create_table($conn, 'admin_roles', array(
    "role_tid int UNIQUE NOT NULL AUTO_INCREMENT",
    "status boolean NOT NULL DEFAULT '1'",
    "name varchar(32) NOT NULL",
    "description text",
    "PRIMARY KEY (role_tid)",
  ));
  
  setup_admin_insert_default($conn);
}

/**
 * Insert default values into predefined tables
 */
function setup_admin_insert_default($conn) {
  db_insert($conn, 'admin_roles', array('adminstrator', 'An adminstrator is the person who wields the power of the web and has total control of the site. With great power comes great responsibility.'), array('name', 'description'));
}
?>
