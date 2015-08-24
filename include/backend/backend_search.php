<?php
/**
 * @file
 *
 * Functions that helps look to search for matches
 *
 */

/**
 * Get the profiles based on search criteria
 */
function backend_search_get_profiles($conn, $data = NULL) {
  // Get all profiles
  
  $result = db_read($conn, 'users_sfu');
  $rows = $result->num_rows;
  
  for ($x = 0; $x < $rows; $x++) {
    $result->data_seek($x);
    $row = $result->fetch_assoc();
    print 'Full name: ' . $row['fullname'] . '<br/>';
    
    for ($y = 1; $y < 4; $y++) {
      if (!(empty($row['interest_' . $y]))) {
        print "Interest $y: " . $row['interest_' . $y] . '<br/>';
      }
    }
  }
  
}

/**
 *
 */
function backend_search_school($conn, $table, $faculty = NULL, $concentration = NULL, $year = NULL) {
  if ($campus == 'sfu') {
    $table = 'users_sfu';
  }
  
  elseif ($campus == 'ubc') {
    $table = 'users_ubc';
  }
}
