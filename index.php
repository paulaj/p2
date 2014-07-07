<?php
error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1); # Display errors on page (instead of a log file)
?>
<!DOCTYPE html>
<html>
<head>
  <title>Password Generator</title>
  <?php require 'logic.php'; ?>
</head>
<body>
  <h1>XKCD Password Generator</h1>
  <h2> <?php
        echo $password;
       ?></h2>
  <p>
      
      <form method='POST' action='index.php'>
        How many words do you want your password to have? <br>
        <input type='text' name='numWords'><br>
        <input type="checkbox" name="addNumber" value="true">Add a number<br>
        <input type="checkbox" name="addSymbol" value="true">Add a symbol <br>
        <input type="checkbox" name="capitalizeFirst" value="true">Capitalize first letter <br>
        <input type='submit' value='Generate my Password!'><br>

      </form>


       <?php
        echo $comment;
       ?>
  </p>
</body>
</html>