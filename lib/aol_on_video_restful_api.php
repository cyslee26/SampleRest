<?php

/*
 * AOL ON Video Search REST data implemenataion class
 * AOL On Video Document: https://support.aolonnetwork.com/API/Videos
 */
require_once 'aol_on_video_core.php';

class VideoSearch implements AOLOnRESTData{
  const base_url = "http://api.5min.com/search/";
  private $SearchTerm;

  public function __construct($search_term) {
    $this->SearchTerm = $search_term;
  }
  
  public function getData() {
    
    $url = $this->buildSearchURL($this->SearchTerm);
   
    
    $ch = curl_init( $url );
 
    // Configuring curl options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the transfer as a string of the return value
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    
    // Getting results
    $result =  curl_exec($ch); // Getting jSON result string
    
    return $result;
  }
  
  private function buildSearchURL($search_term){
    $encoded_search_term = urlencode($search_term);
    return self::base_url . $encoded_search_term . "/videos.json";
  }

}

?>
