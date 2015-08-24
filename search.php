<?php
/**
 * @file
 * Search page
 */

require_once('include/database/database-basic.php');
require_once('include/partial/header.php');
require_once('include/partial/sidebar.php');
require_once('include/backend/backend_search.php');

$conn = db_connect();

?>
<!DOCTYPE html>
<html>
<head>
  <!-- META STUFF -->
  <meta name="viewport" content="width-device-width, initial-scale=1" />
  <title>Search | JumpStart</title>
  <!-- CSS Stuff -->
  <link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body>
  <h2>Search</h2>
  
  <form action="search.php" method="get">
    <fieldset>
      <p>School</p>
      <select>
        <option label="SFU" value="sfu">Simon Fraser University</option>
        <option label="UBC" value="ubc">University of British Columbia</option>
      </select>
      
      <p>Faculty</p>
      <select>
        <option></option>
      </select>
    </fieldset>
    
    <fieldset>
      <p>Personality</p>
      <select>
        <option></option>
      </select>
    </fieldset>
    
    <input type="hidden" name="form" value="form_sent" />
    <input type="submit" value="Search" />
  </form>
  
  <?php if (isset($_GET['form'])): ?>
    <h2>Search Results</h2>
    <?php $data = backend_search_get_profiles($conn, $_GET); ?>
  <?php endif; ?>
  <br/>
  
  <?php include_once 'include/partial/footer.php'; ?>
</body>
</html>