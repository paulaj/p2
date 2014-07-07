<?php
      $numWords = 0;
      $password='';
      $comment = ' ';

      $wordList= Array(
        "Dog",
        "Cat",
        "Mouse",
        "Frog",
        "These",
        "Words",
        "are",
        "not",
        "random");
      
      foreach ($_POST as $key => $value) {
        if ($key=="numWords"){
           $numWords= $_POST[$key];
        }
      }
       
      

       if ($numWords > 0) {
        $comment ='You asked for '. $numWords. ' words';

        for ($i=0; $i < $numWords; $i++){
          $wordIndex = rand(0,$numWords-1);

          if ($i==0){
            $password .= $wordList[$wordIndex];
          }
          else {
            $password .= "-".$wordList[$wordIndex];
          }
          
        }
      }
       
?>
