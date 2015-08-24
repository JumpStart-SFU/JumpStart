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
  
  // Create table to index various tables
  db_create_table($conn, 'table_campus', array(
    "machine_name varchar(64)",
    "name varchar(32) NOT NULL",
    "label varchar(16) NOT NULL",
    "location text NOT NULL",
    "id int NOT NULL AUTO_INCREMENT",
    "PRIMARY KEY (id)"
  ));
  
  $campus_array = array(
    'SFU' => array(
      'machine_name' => 'users_sfu',
      'name' => 'Simon Fraser University',
      'label' => 'SFU',
      'location' => 'BC, Canada',
    ),
    
    'UBC' => array(
      'machine_name' => 'users_ubc',
      'name' => 'University of British Columbia',
      'label' => 'UBC',
      'location' => 'BC, Canada',
    ),
  );
  
  foreach ($campus_array as $campus) {
    db_insert($conn, 'table_campus', $campus, array(
      'machine_name', 'name', 'label', 'location',
    ), FALSE);
    
    db_create_table($conn, $campus['machine_name'], array(
      "id int NOT NULL AUTO_INCREMENT",
      "username varchar(32) UNIQUE NOT NULL",
      "fullname text NOT NULL",
      "password varchar(60) NOT NULL",
      "sex varchar(8) NOT NULL",
      "interest_1 text",
      "interest_2 text",
      "interest_3 text",
      "PRIMARY KEY (id)",
    ));
  }
  
  // Users for activation
  db_create_table($conn, 'users_activate', array(
    "id int UNIQUE NOT NULL AUTO_INCREMENT",
    "username varchar(32) NOT NULL",
    "password varchar(60) NOT NULL",
    "table_name varchar(32) NOT NULL",
    "access_code varchar(12) NOT NULL",
    "PRIMARY KEY (username)",
  ));
}

?>
