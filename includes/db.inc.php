<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open(dirname(__FILE__) . '/../racing.db');
      }
   }
   $db = new MyDB();