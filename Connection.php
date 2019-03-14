<?php

  class Connection
  {
      private $strDatabaseName  = "assignment";
      private $strUsername      = "root";
      private $strPassword      = "root";
      private $strServerName    = "localhost";

      public $objConnection;

      /**
       * database connectivity
       * User constructor.
       */
      public function __construct()
      {
          if (!isset($this->objConnection)) {
              $this->objConnection = mysqli_connect($this->strServerName, $this->strUsername, $this->strPassword, $this->strDatabaseName);
              if (!$this->objConnection) {
                  echo 'Cannot connect to database server';
                  exit;
              }
          }
          return $this->objConnection;
      }
  }


?>
