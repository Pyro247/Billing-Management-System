<?php
  include_once './includes/functions.php';

  spl_autoload_register(function($classname){
    $path = "classes/";
    $extensions = ".php";
    $fullPath = $path. $classname . $extensions;

    include_once $fullPath;
  });
?>