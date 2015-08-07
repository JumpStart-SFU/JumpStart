<?php
/**
 * Basic setup files.
 * Place this in same folder as index.php
 */

/**
 * Setup website with assumption on blank state.
 */
function initialise_JumpStart() {
  require_once('include/database/database-basic.php');
  $conn = db_connect();

  // Create table for SFU
  db_create_table($conn, 'users_sfu', array(
    "username varchar(32) UNIQUE NOT NULL",
    "password text NOT NULL",
    "fullname text NOT NULL",
    "gender varchar(32) NOT NULL",
    "interest_1 text",
    "interest_2 text",
    "interest_3 text",
    "PRIMARY KEY (username)",
  ));
  
  // Create table for UBC
  db_create_table($conn, 'users_ubc', array(
    "username varchar(32) UNIQUE NOT NULL",
    "password text NOT NULL",
    "fullname text NOT NULL",
    "gender varchar(32) NOT NULL",
    "interest_1 text",
    "interest_2 text",
    "interest_3 text",
    "PRIMARY KEY (username)",
  ));
  
  // Users for activation
  db_create_table($conn, 'users_activate', array(
    "username varchar(32) NOT NULL",
    "password text NOT NULL",
    "table_name varchar(32) NOT NULL",
    "access_code varchar(12) NOT NULL",
    "PRIMARY KEY (username)",
  ));
}

?>
