<?php
      $numWords = 0;
      $password='';
      $comment = '';
      $addNumber = false;
      $addSymbol = false;
      $capitalizeFirst = false;

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
      
      foreach ($_POST as $key => $value) {
        if ($key=="numWords"){
           $numWords= $_POST[$key];
        }
        else if ($key=="addNumber"){
          $addNumber=true;
          $comment .= $key. " is " . $value. "</br>";
        }
        else if ($key=="addSymbol"){
          $addSymbol=true;
          $comment .= $key ." is ". $value. "</br>";
        }
        else if ($key=="capitalizeFirst"){
          $capitalizeFirst=true;
          $comment .= $key ." is ". $value. "</br>";
        }
      }
       
      
       $currentWord= "";
       if ($numWords > 0) {
        $comment .='You asked for '. $numWords. ' words';

        for ($i=0; $i < $numWords; $i++){
          $wordIndex = rand(0, sizeof($wordList) -1);
          $currentWord= $wordList[$wordIndex];
          
          

          if ($i==0){
            if($capitalizeFirst){
              $currentWord = ucfirst($currentWord);
            }
            $password .= $currentWord;
            //echo "At 0 and word is ". $password . "</br>";
          }
          else if ($i == $numWords -1){
            $password .= "-". $currentWord ;

            if($addNumber){
              $password.= rand(0, 9);
            }

            if($addSymbol){
               $password.= $symbolList[rand(0, sizeof($symbolList) -1)];
            }
             //echo "At 0 and word is ". $password . "</br>"; 
          }

          else {
            $password .= "-".$currentWord ;
            //echo "At ".$i. ", Index at ".$wordIndex." and word is ". $password . "</br>";
          }
          
        }
      }
       
?>
