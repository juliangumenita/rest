<?php
  class Pointer{
    public static function request(Request $request){
      $method = $request::method();
      switch ($method) {
        default:
          return new Result(false, "Incorrect method has been called.");
        break;
      }
    }

    public static $data;
    public static function data($set = NULL){
      if(!is_null($set)){
        self::$data = $set;
        return $set;
      }
      return self::$data;
    }

    /*
    *
    * Functions below just intented to be
    * made for this Controller to be working.
    *
    */

    public static function control(Request $request, $requiredKeys = []){
      if(!empty($requiredKeys)){
        foreach ($requiredKeys as $key) {
          if(is_null($request::data($key))){
            return new Result(false, "Missing keys.");
          }
        }
      }

      return new Result(true);
    }
  }
?>
