<?php

/**
 * MVC pattern 
 */

abstract class AOLOnPage {
  abstract public function view($data);
  abstract public function control($data);
  abstract public function model();
}

/**
 * Interface of restful connection data method
 */

interface AOLOnRESTData{
  public function getData();
  //public function setData();
  //public function deleteData();
}

?>
