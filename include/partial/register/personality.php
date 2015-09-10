<?php
/**
 * @file
 */
$mbti_array = array();

?>

<div>
  <h1>Personality</h1>
  <fieldset>
    <p>What is your MBTI?</p>
    <select>
      <?php foreach ($mbti_array as $mbti): ?>
        <option><?php print $mbti; ?></option>
      <?php endforeach; ?>
    </select>
    
    <p>What is your interest?</p>
    <input type="text" name="interest-1" placeholder="Interest 1" /><br/>
    <input type="text" name="interest-2" placeholder="Interest 2" /><br/>
    <input type="text" name="interest-3" placeholder="Interest 3" /><br/>
  </fieldset>
</div>
