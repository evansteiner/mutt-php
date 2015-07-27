<?php

  class controller {

    var $method;
    var $request;
    var $target;
    var $isExtended;

    function __construct() {
      $this->method = $_SERVER['REQUEST_METHOD'];
      $this->request = $_SERVER['REQUEST_URI'];
      $this->target = $this->translateURI();
      $this->isExtended = $this->getExtension();
    }

    function translateURI() {
      $request = $this->request;
      if($request != '/' . PROJECT_DIRECTORY) {
        $url = explode(PROJECT_DIRECTORY, $request);
        $target = array_pop($url);
        return PROJECT_DIRECTORY.'views/'.$target;
      }  
    }

    function getExtension() {
      $request = $this->request;
      $extension = substr($request, strrpos($request, '/') + 1);

      if(file_exists('mutt/controllers/local/' . $extension)){
        return 'found extension in local';
      }

      elseif(file_exists('mutt/controllers/core/' . $extension)){
        return 'found extension in core';
      }      
    }
  }