<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open(dirname(__FILE__) . '/../racing.db');
      }
   }
   $db = new MyDB();
   
function formatMilliseconds($milliseconds) {
    $seconds = floor($milliseconds / 1000);
    $minutes = floor($seconds / 60);
    $milliseconds = $milliseconds % 1000;
    $seconds = $seconds % 60;
    $minutes = $minutes % 60;

    $format = '%u:%02u.%03u';
    $time = sprintf($format, $minutes, $seconds, $milliseconds);
    return rtrim($time, '0');
}