<?php
  //Initializing  my Array
  $wordList = Array();

  //The sites I'll be scraping
  $sources= Array(
  	"http://www.paulnoll.com/Books/Clear-English/words-05-06-hundred.html",
  	"http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html", 
  	"http://www.paulnoll.com/Books/Clear-English/words-09-10-hundred.html" );

  //Going to do this for every site
  foreach ( $sources as $index => $url){
  	//Get the contents of the site as a string and match the string against my regex
  	$source = file_get_contents($url);
  	preg_match_all("/<li>(.*?)<\/li>/s", $source, $result);

  	//For every word that's in my second result array (The one that only includes the strings matching the "()" section)"
  	foreach ( $result[1] as $key => $value){
  		//Strip all the punctuation
  		$value = preg_replace("/[[:punct:]]/", "", $value);
  		//lower case that word
  		$value = strtolower($value);
  		//remove whitespace
  		$value = trim($value);
  		//add that word to the end of my array
  		array_push( $wordList, $value);
	}

  }

  //I was going to scrape a list of punctuation, but I actually think this will do. 
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


  //Used to make sure 80 and 88 had punctuation and uppercase taken away 
  // $words="Test: ";
  // $words .= $wordList[88];
  // $words .= $wordList[80];

 


  

       
?>
