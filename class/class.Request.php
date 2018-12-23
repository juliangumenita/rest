<?php
  class Request{
    private static $MODULE;
    private static $METHOD;
    private static $VERSION;
    private static $DATA;

    public function __construct($MODULE, $METHOD, $VERSION, $DATA = []){
      self::$MODULE = $MODULE;
      self::$METHOD = $METHOD;
      self::$VERSION = $VERSION;
      self::$DATA = $DATA;
  	}

    public static function module(){
      return self::$MODULE;
    }
    public static function method(){
      return self::$METHOD;
    }
    public static function version(){
      return self::$VERSION;
    }

    public static function data($KEY = NULL){
      if(is_null($KEY)){
        return self::$DATA;
      }
      else{
        if(!isset(self::$DATA[$KEY])){
          return NULL;
        }
        return self::$DATA[$KEY];
      }
      return NULL;
    }

    public static function json($KEY = NULL){
      return json_encode($DATA);
    }
  }
?>
