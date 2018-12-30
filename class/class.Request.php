<?php
  class Request{
    private static $module;
    private static $method;
    private static $version;
    private static $data;

    public function __construct($module, $method, $version, $data = []){
      self::$module = $module;
      self::$method = $method;
      self::$version = $version;
      self::$data = $data;
  	}

    public static function module(){
      return self::$module;
    }
    public static function method(){
      return self::$method;
    }
    public static function version(){
      return self::$version;
    }

    public static function data($key = NULL){
      if(is_null($key)){
        return self::$data;
      }
      else{
        if(!isset(self::$data[$key])){
          return NULL;
        }
        return self::$data[$key];
      }
      return NULL;
    }
  }
?>
