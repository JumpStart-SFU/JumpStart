<?php
/**
 * Setup for users
 */

require_once('include/database/database-basic.php');

/**
 * Create tables relating to users
 */
function setup_users_create_tables($conn = NULL) {
  if ($conn === NULL) {
    $conn = db_connect();
  }
  
  // User
  db_create_table($conn, 'users', array(
    "uid int UNIQUE NOT NULL AUTO_INCREMENT",
    "status boolean NOT NULL DEFAULT '0'",
    "username varchar(32) NOT NULL",
    "password varchar(60) NOT NULL",
    "email varchar(64) NOT NULL",
    "PRIMARY KEY (uid)",
  ));
  
  // Insert default adminstrator 'admin'
  db_insert($conn, 'users', array('admin', 'marshmellow', 'jinn@sfu.ca'), array('username', 'password', 'email'));
  
  // Profile
  db_create_table($conn, 'users_profile', array(
    "uid int NOT NULL",
    "fullname varchar(64)",
    "age int",
    "sex char(4)",
    "title char(64)",
    "PRIMARY KEY (uid)",
  ));
  
  // School
  db_create_table($conn, 'users_campus', array(
    "uid int NOT NULL",
    "campus_tid int",
    "faculty_tid int",
    "major_tid int",
    "edu_type_tid int",
    "PRIMARY KEY (uid)",
  ));
  
  // Interest
  db_create_table($conn, 'users_interest', array(
    "uid int NOT NULL",
    "interest1_tid int",
    "interest2_tid int",
    "interest3_tid int",
    "PRIMARY KEY (uid)",
  ));
  
  // Settings
  db_create_table($conn, 'users_settings', array(
    "uid int NOT NULL",
    "newsletter boolean NOT NULL DEFAULT '1'",
    "language varchar(32) NOT NULL DEFAULT 'ENGLISH'",
    "PRIMARY KEY (uid)",
  ));
  
  // Activation table
  db_create_table($conn, 'users_activate', array(
    "uid int NOT NULL",
    "email varchar(64) NOT NULL",
    "access_code varchar(12) NOT NULL",
    "PRIMARY KEY (uid)",
  ));
}
?>
