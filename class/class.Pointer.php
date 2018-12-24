<?php
  class Pointer{
    public static function request(Request $REQUEST){
      $METHOD = $REQUEST::method();
      switch ($METHOD) {
        default:
          return new Result(false, "Incorrect method has been called.");
        break;
      }
    }

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
    * Functions below just intented to be
    * made for this Controller to be working.
    *
    */

    public static function control(Request $REQUEST, $REQUIRED_KEYS = []){
      if(!empty($REQUIRED_KEYS)){
        foreach ($REQUIRED_KEYS as $KEY) {
          if(is_null($REQUEST::data($KEY))){
            return new Result(false, "Missing keys.");
          }
        }
      }

      return new Result(true);
    }
  }
?>
