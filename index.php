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

    body{ width:99%; }
    img{ 
      width: 100%; 
      display: block;
      margin-left: auto;
      margin-right: auto;
    }   
    h1,h3{ color: #5bc0de; }
    .main-panel{
      margin-top:30px;
      background-color: white;
      border-color: #5bc0de;
    }
    .result{  
      word-wrap:break-word;
      width:90%;
    }
    #favorite{
      width:45%;
      margin-left:5%;
      margin-top:1%;
    }

    
  </style>

</head>
<body>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class=" main-panel panel panel-default">
        <div class="panel-body">
            </br>
            <h1 class="text-center">XKCD Password Generator</h1>
            <h4 class="text-center">Creates XKCD style passwords</h4></br>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-5">   
              </br>
              <h3 class="text-center">Password Parameters</h3>
              <div class="row">
                <div class="panel panel-default">
                  <div class="panel-body">
                   <form method='POST' action='index.php'>
                      <input class="form-control"  type='text' name='numWords' maxlength="2" placeholder="How many words [1-99] should your password contain?"><br>
                      
                       Separate words with: 
                     <label class="radio-inline">
                        <input type="radio" name="separator"  value="hyphens" checked> Hyphens
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="separator" value="spaces"> Spaces
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="separator" value="camelCase"> CamelCase
                      </label>

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
                          <input type="checkbox" name="capitalizeFirst" value="true">Capitalize first letter of this password <br>
                        </label>
                      </div>
                                          
                      <div class="checkbox">

                        <label>
                          <input type="checkbox" id="includeFavorite" name="includeWord" value="true"> Include your favorite word [20 characters max]<br> 
                        </label>
                        <input class="form-control" id="favorite" type='text' name='favoriteWord' maxlength="20" placeholder="Enter your favorite word " disabled ="true"><br>
                          
                      </div>
                      <button type='submit' class="btn btn-info"> Generate my Password! </button><br> 
                    </form>
                  </div>
                </div>
              </div>
              <div class="row">
                <h3>Your Shiny New Password:</h3>
                <div class="panel panel-default">
                  <div class="panel-body">
                    <?php if ($error==''): ?>
                    <h2 class="result text-center"> <?php echo $password; ?></h2>
                    <?php else: ?>
                    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div> 
                    <?php endif; ?>
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
    <div class="col-md-1"></div>
  </div>
</body>

<script type="text/javascript">
  $("#includeFavorite").click(function(){
    console.log($("#includeFavorite")[0].checked)
    if ($("#includeFavorite")[0].checked){
      console.log("clicked");
         $("#favorite")[0].disabled = false;
      }
    else{
      console.log("unclicked");
        $("#favorite")[0].disabled = true;
        $("#favorite")[0].value = "";
      }
    }
  );

  </script>
</html>