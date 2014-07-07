<?php
error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1); # Display errors on page (instead of a log file)
?>
<!DOCTYPE html>
<html>
<head>
  <title>Password Generator</title>
</head>
<body>
  <h1>XKCD Password Generator</h1>
  <p>
      
      <form method='POST' action='index.php'>
        How many words do you want your password to have? <br>
        <input type='text' name='numWords'><br>
        <input type='submit' value='Generate my Password!'><br>
      </form>

      <?php
      $numWords = 0;
      if ($_POST['numWords']){
        $numWords= $_POST['numWords'];
      }
       
      
      
       ?>


       <?php
       if ($numWords > 0) {
        echo 'You asked for '. $numWords. ' words';
      }
       
       ?>
  </p>
</body>
</html>