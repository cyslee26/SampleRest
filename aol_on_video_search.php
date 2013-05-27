<?php
/*
 * 
 */
 
require_once './lib/aol_on_video_page_api.php';

//set up search term for page
$video_search_page = new SearchVideoPage();

//get search result from model
$search_result = $video_search_page->model();

//process data for the search page displaying
$search_result_array = $video_search_page->control($search_result);

//display search result output in json format
$video_search_page->view($search_result_array);

exit(0);
?>
