<?php
  include 'storedInfo.php';
  
  //use curl to send query to the Google Books API
  $searchurl = "https://www.googleapis.com/books/v1/volumes?q=hunt+inauthor:jordan&key=" . $myAPIKey;
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $searchurl);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
  $result = json_decode(curl_exec($curl));
  echo "Title: " . $result->items[0]->volumeInfo->title . "<br>";
  echo "Subtitle: " . $result->items[0]->volumeInfo->subtitle . "<br>";
  echo "Author: " . $result->items[0]->volumeInfo->authors[0] . "<br>";
  echo "Published Date: " . $result->items[0]->volumeInfo->publishedDate . "<br>";
  echo "Description: " . $result->items[0]->volumeInfo->description . "<br>";
  echo "Link: " . $result->items[0]->selfLink;
  curl_close($curl);
?>
