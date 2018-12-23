<?php
  class Controller{
    public static function request(Request $REQUEST){
      $METHOD = $REQUEST::method();
      switch ($METHOD) {
        case 'Method':
          return self::method($REQUEST);
        break;
        default:
          return new Result(false, "Incorrect method has been called.");
        break;
      }
    }
    /*
    *
    * Create all of your methods here.
    *
    */

    public static $DATA;
    public static function data($SET = NULL){
      if(!is_null($SET)){
        self::$DATA = $SET;
        return $SET;
      }
      return self::$DATA;
    }
    /*
    *
    * This part displays the returned data.
    *
    */

    private static function method(Request $REQUEST){
      $RESULT = self::control($REQUEST, false);
      /* The above function takes three arguments.
      *
      * 1 - Request Object.
      * 2 - Required keys. (array)
      * 3 - A bool representing the need of validating the token. (true/false)
      *
      */
      if($RESULT::success()){

        /*
        *
        * If the general error checking is
        * successful, code can continue.
        *
        */

        self::data([]);
        /* Here define the data that will return from the call if necessary. */
      }
      return $RESULT;
    }

    /*
    *
    * Functions below just intented to be
    * made for this Controller to be working.
    *
    */

    private static function control(Request $REQUEST, $TOKEN_REQUIRED = true, $REQUIRED_KEYS = []){
      $RESULT = new Result(false);

      foreach ($REQUIRED_KEYS as $KEY) {
        if(is_null($REQUEST::data($KEY))){
          $RESULT::message("Missing keys.");
          return $RESULT;
        }
      }

      if($TOKEN_REQUIRED){
        if(is_null($REQUEST::data("TOKEN"))){
          $RESULT::message("Missing token.");
          return $RESULT;
        }
        /*
        *
        * Validate token here.
        * By creating another function below and using
        * your Database class.
        *
        */
      }

      $RESULT::success(true);
      return $RESULT;
    }
  }
?>
