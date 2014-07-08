<?php
      $numWords = 0;
      $password='';
      $error = '';
      $addNumber = false;
      $addSymbol = false;
      $capitalizeFirst = false;
      $separator="-";
      $includeWord= false;
      $favoriteWord='';
      $camelCase=false;


      $wordList= Array(
        "dog",
        "cat",
        "mouse",
        "frog",
        "these",
        "words",
        "are",
        "not",
        "random");

      $symbolList= Array(
        "~",
        "!",
        "@",
        "#",
        "$",
        "%",
        "^",
        "&",
        "*");
      
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //Number of Words
        if(empty($_POST["numWords"])){
          $error .= "You did not specify number of words. </br>";
        }
        else{
          if  (preg_match("/^[1-9]*$/",$_POST["numWords"])){
            $numWords= $_POST["numWords"];
          }
          else{
            $error .= " Please only enter numbers from 1-9 </br>";
          }
        }

        if(!empty($_POST["separator"])){
           if($_POST["separator"] == "hyphens"){
            $separator = "-";
           }
           else if ($_POST["separator"] == "spaces"){
            $separator = " ";
           }
           else{
            $separator="";
            $camelCase = true;
           }
        }
        


        //Include favorite word
        if(!empty($_POST["includeWord"])){
           if(!empty($_POST["favoriteWord"])){
            $favoriteWord=$_POST["favoriteWord"];
            if ($camelCase){
              $favoriteWord = ucfirst($favoriteWord);
            }
            $includeWord= true;
           }
           else{
            $error .= " If you want your favorite word included, you have to enter it. </br>";
           }
        }
         //Add a number
        if(!empty($_POST["addNumber"])){
           $addNumber=true;
        }
        //Add Symbol
        if(!empty($_POST["addSymbol"])){
           $addSymbol=true;
        }
        //Capitalize First Letter
        if(!empty($_POST["capitalizeFirst"])){
           $capitalizeFirst=true;
        }
      }

      // foreach ($_POST as $key => $value) {
      //   if ($key=="numWords"){
      //      $numWords= $_POST[$key];
      //   }
      //   else if ($key=="addNumber"){
      //     $addNumber=true;
      //     $comment .= $key. " is " . $value. "</br>";
      //   }
      //   else if ($key=="addSymbol"){
      //     $addSymbol=true;
      //     $comment .= $key ." is ". $value. "</br>";
      //   }
      //   else if ($key=="capitalizeFirst"){
      //     $capitalizeFirst=true;
      //     $comment .= $key ." is ". $value. "</br>";
      //   }
      // }
       
      
       $currentWord= "";
       if ($numWords > 0) {
        

        for ($i=0; $i < $numWords; $i++){
          $wordIndex = rand(0, sizeof($wordList) -1);
          $currentWord= $wordList[$wordIndex];
          if ($camelCase){
              $currentWord = ucfirst($currentWord);
          }
          
          
          if ($i==0){
            if($capitalizeFirst){
              $currentWord = ucfirst($currentWord);
            }
            $password .= $currentWord;
            //echo "At 0 and word is ". $password . "</br>";
          }
          else if ($i == $numWords -1){
            if($includeWord){
              $currentWord = $favoriteWord;
            }
            $password .= $separator. $currentWord ;

            if($addNumber){
              $password.= rand(0, 9);
            }

            if($addSymbol){
               $password.= $symbolList[rand(0, sizeof($symbolList) -1)];
            }
             
          }

          else {
            $password .= $separator.$currentWord ;
          }
          
        }
      }
       
?>
