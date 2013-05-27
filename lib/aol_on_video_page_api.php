<?php

/*
 * AOL On Video Page API Class
 */
require_once 'aol_on_video_core.php';
require_once 'aol_on_video_restful_api.php';

class SearchVideoPage extends AOLOnPage {
  private $search_term;
  
  public function __construct() {
    if(isset($_POST['search_term']) ){
      $this->search_term = $_POST['search_term'];
    }
    else{
      $this->search_term = $_GET['search_term'];
    }
  }
  
  public function view($data_array){
    echo json_encode($data_array);
  }
  
  public function control($data){
   if(empty($data)){
      return '';
    }
    //-------------------------------------------------------------------------
    // json item keys
    // "id", "title","description","category","channel","keywords",
    // "image","videoOwner","videoOwnerId","duration","pubDate",
    // "player":{"url","source"}, "geoRestriction","expDate","renditions",
    // "videoUrl", "studioName","views","rating","deviceRestriction"
    //-------------------------------------------------------------------------
    $json_obj = json_decode($data);
    
    $result = array();
    $result['fields'] = array('image_link', 'title', 'video_owner');
    foreach($json_obj->items as $array_item){
      $item['image_link']  = '<a href="'.$array_item->videoUrl.'"><img class="video_thumb_image" src="'.$array_item->image.'" /></a>';
      $item['title'] = $array_item->title;
      $item['video_owner']  = $array_item->videoOwner;
      $result['result'][] = $item;
    }
    
    return $result;
  }
  
  public function model(){
    // create VideoSearch object
    $video_search = new VideoSearch($this->search_term);
    
    // Return RESTful data result
    return $video_search->getData();
  }
  
}
?>
