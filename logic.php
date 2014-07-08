<?php
require 'scrape.php';

//All the fun variables the user will be helping me with!
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


//If the user has posted 
if ($_SERVER["REQUEST_METHOD"] == "POST"){

  //How many words did s/he want?
  if(empty($_POST["numWords"])){
    if ($_POST["numWords"] == 0) {
      $error .= "You should really ask for a password longer than 0 words...";
    }
    else{
      $error .= "You did not specify number of words. </br>";
    }
  }
  else{

    //make sure thats a number!
    if  (preg_match("/^[0-9]*$/",$_POST["numWords"])){
      if ($_POST["numWords"] == 0) {
        $error .= "You should really ask for a password longer than 0 words...";
      }
      $numWords= $_POST["numWords"];
    }
    else{
      $error .= " Please only enter numbers from 1-9 </br>";
    }
  }

  //If they chose a separator, set our seperator 
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
  

  //Do they want to include their favorite word?
  if(!empty($_POST["includeWord"])){
    if(!empty($_POST["favoriteWord"])){

      $favoriteWord=$_POST["favoriteWord"];
      $includeWord= true;

      //So I don't have to do this later
      if ($camelCase){
        $favoriteWord = ucfirst($favoriteWord);
      }
    }
   
    else{
      $error .= " If you want your favorite word included, you have to enter it. </br>";
    }
  }
   
  //Do we add a number?
  if(!empty($_POST["addNumber"])){
     $addNumber=true;
  }
  //Do we add a Symbol?
  if(!empty($_POST["addSymbol"])){
     $addSymbol=true;
  }
  //Do we capitalize the first letter of our password?
  if(!empty($_POST["capitalizeFirst"])){
     $capitalizeFirst=true;
  }



 
/* OKAY EVERYTHING IS SET!
  LET'S GET TO MAKING THIS PASSWORD!
*/ 
  if ($numWords > 0) {

    //we need to make changes only to our current word, so we make a variable for it  
    $currentWord= "";

    for ($i=0; $i < $numWords; $i++){
      //Give me a random word and set currentword to that word each time around the loop
      $wordIndex = rand(0, sizeof($wordList) -1);
      $currentWord= $wordList[$wordIndex];

      //Capitalize it if every word should be capitalized
      if ($camelCase){
          $currentWord = ucfirst($currentWord);
      }
      
      //if there's only one word
      if ($numWords == 1) {
        //use the favorite word instead
        if($includeWord){
          $currentWord = $favoriteWord;
        }
        //If the user wants it capitalised, do it
        if($capitalizeFirst){
          $currentWord = ucfirst($currentWord);
        }
        $password .= $currentWord;

        //Add a number if we need to
        if($addNumber){
          $password.= rand(0, 9);
        }

        //Add a symbol if we need to!
        if($addSymbol){
           $password.= $symbolList[rand(0, sizeof($symbolList) -1)];
        }

      }

      //If its the first word
      else if ($i==0){
        if($capitalizeFirst){
          $currentWord = ucfirst($currentWord);
        }
        $password .= $currentWord;
      }

      //If its the last word
      else if ($i == $numWords -1){
        //use the favorite word instead
        if($includeWord){
          $currentWord = $favoriteWord;
        }

        $password .= $separator. $currentWord ;

        //Add a number if we need to
        if($addNumber){
          $password.= rand(0, 9);
        }

        //Add a symbol if we need to!
        if($addSymbol){
           $password.= $symbolList[rand(0, sizeof($symbolList) -1)];
        }
      }

      //If its not the last or first word or only word, and we capitalized it if we needed to up there, just add it to the password
      else {
        $password .= $separator.$currentWord ;
      } 
    }
  }

}      
?>
