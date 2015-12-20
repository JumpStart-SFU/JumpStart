<?php
/**
 * @file
 * Profile page
 */

require_once('include/database/database-basic.php');
require_once('include/backend/backend_general.php');

$conn = db_connect();

?>
<!DOCTYPE html>
<html>
<head>
  <!-- META STUFF -->
  <meta name="viewport" content="width-device-width, initial-scale=1" />
  <title><?php print $_COOKIE['username']; ?> | Conextus</title>
  <!-- CSS Stuff -->
  <link rel="stylesheet" type="text/css" href="css/index.css" />
  <link rel="shortcut icon" href="http://sstatic.net/stackoverflow/img/favicon.ico">
</head>
<body>
  <?php require_once('include/partial/header.php'); ?>
  <?php require_once('include/partial/sidebar.php'); ?>
  
  <div class="main-content">
    <div class="profile-picture">
      <img src= "" alt ="your-photo" height="50" width="50" />
    </div>
    
    <div class="profile">
      <div class="banner">
        <?php print 'Full Name'; ?>
      </div>
    
      <div class="personal">
        <div class="gender">
          <?php ?>
        </div>
      </div>
    
      <div class="school">
        <div class="campus">
          <?php print 'Simon Fraser University'; ?>
        </div>
        
        <div class="year">
          <?php print 'Third Year'; ?>
        </div>
        
        <div class="faculty">
          <?php print 'School of Engineering Science'; ?>
        </div>
        
        <div class="concentration">
          <?php print 'Computer Engineering'; ?>
        </div>
      </div>
    
      <div class="personality">
        <div class="mbti">
          MBTI: 
        </div>
        
        <div class="">
          Personality:
        </div>
      </div>
    </div>
  
    <div class="summary">
      <p>
        <?php print 'about me'; ?>
      </p>
    </div>
  </div>
  <?php include_once 'include/partial/footer.php'; ?>
</body>
</html>