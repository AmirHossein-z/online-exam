<?php
//Error handling functions

class customException extends Exception {
    public $getMessage = 'Exception';
    
    public function sqlErrorMessage() {
      //error message
      $errorMsg = $this->getMessage().' There is a SQL error!';
      return $errorMsg;
    }
  }
  

/**
 * return a sql error
 * @param string $exception
 * @return void
 */

  set_exception_handler('myException');