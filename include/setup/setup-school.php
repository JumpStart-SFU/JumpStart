<?php
/**
 *
 */

require_once('include/database/database-basic.php');

/**
 * Create tables relating to school
 */
function setup_school_create_tables($conn = NULL) {
  if ($conn === NULL) {
    $conn = db_connect();
  }
  
  db_create_table($conn, 'campus', array(
    "campus_tid int UNIQUE NOT NULL AUTO_INCREMENT",
    "status boolean NOT NULL DEFAULT '0'",
    "name varchar(128) NOT NULL",
    "abbr varchar(12) NOT NULL",
    "description text",
    "PRIMARY KEY (campus_tid)",
  ));
  
  db_create_table($conn, 'campus_faculty', array(
    "faculty_tid int UNIQUE NOT NULL AUTO_INCREMENT",
    "status boolean NOT NULL DEFAULT '0'",
    "name varchar(128) NOT NULL",
    "campus_tid int NOT NULL",
    "short_name varchar(16)",
    "edu_type_tid int",
    "description text",
    "PRIMARY KEY (faculty_tid)",
  ));
  
  db_create_table($conn, 'campus_major', array(
    "major_tid int NOT NULL AUTO_INCREMENT",
    "status boolean NOT NULL DEFAULT '0'",
    "name varchar(64) NOT NULL",
    "campus_tid int NOT NULL",
    "PRIMARY KEY (major_tid)",
  ));
  
  db_create_table($conn, 'campus_education_type', array(
    "edu_type_tid int UNIQUE NOT NULL AUTO_INCREMENT",
    "name varchar(64) NOT NULL",
    "description text",
    "PRIMARY KEY (edu_type_tid)",
  ));
  
  setup_school_insert_default($conn);
}

/**
 * Insert default values into predefined tables
 */
function setup_school_insert_default($conn) {
  if ($conn === NULL) {
    $conn = db_connect();
  }
  
  $campus = array(
    'SFU' => array(
      'Simon Fraser University',
      'SFU',
    ),
    
    'UBC' => array(
      'University of British Columbia',
      'UBC',
    ),
  );
  
  $education_type = array(
    'Business',
    'Computer Science',
    'Engineering',
    'Life Science',
    'Mathematics',
    'Others',
    'Physical Science',
    'Social Science',
    'Vocational',
    'Profession',
  );
  
  foreach ($campus as $entry) {
    db_insert($conn, 'campus', $entry, array('name', 'abbr'));
  }
  
  foreach ($education_type as $type) {
    db_insert($conn, 'campus_education_type', array($type), array('name'));
  }
}
?>
