<?php
error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1); # Display errors on page (instead of a log file)
?>
<!DOCTYPE html>
<html>

<head>
  <title>Password Generator</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <?php require 'logic.php'; ?>

  <style type="text/css">
     body{
      width:99%;
    }
    img{
      width: 100%;
    }
   
    .main-panel{
      margin-top:10px;
      background-color: white;
      border-color: #5bc0de;
    }

    h1{
      color: #5bc0de;
    }



  </style>

</head>
<body>
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
  <div class=" main-panel panel panel-default">
  <div class="panel-body">
  <div class="row">
    </br>
    <h1 class="text-center">XKCD Password Generator</h1></br></div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-5">   
      </br>
      <h3 class="text-center">Password Parameters</h3>
      <div class="row">
        <div class="panel panel-default">
          <div class="panel-body">
           <form method='POST' action='index.php'>
              <input class="form-control"  type='text' name='numWords' placeholder="How many words should your password contain?"><br>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="addNumber" value="true">Add a number<br>
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="addSymbol" value="true">Add a symbol <br>
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="capitalizeFirst" value="true">Capitalize first letter <br>
                </label>
              </div>
              <button type='submit' class="btn btn-info"> Generate my Password! </button><br> 
            </form>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <h3>Your Shiny New Password:</h3>
        <div class="panel panel-default">
          <div class="panel-body">
            <h1 class="result"> <?php echo $password; ?></h1>
          </div>
        </div>
      </div>
    </div>

    </br>
    <div class="col-md-5">
      <h3 class="text-center"> The Comic That Inspired This </h3>
      <div class="panel panel-default">
        <div class="panel-body">
          <img src="images/password_strength.png" alt="Comic #939">
        </div>
      </div>
    </div>
    <div class="col-md-1"> </div>
  </div>
  </div>
</div>
</div>
<div class="col-md-1"></div>
</div>
</body>
</html>