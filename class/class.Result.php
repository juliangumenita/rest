<?php
  class Result{
    private static $success;
    private static $code;
    private static $message;

    public function __construct($success = false, $message = null, $code = null){
      self::$success = $success;
      self::$message = $message;
      self::$code = $code;
  	}

    public static function success($set = null){
      if(!is_null($set)){
        self::$success = $set;
        return $set;
      }
      return self::$success;
    }
    public static function message($set = null){
      if(!is_null($set)){
        self::$message = $set;
        return $set;
      }
      return self::$message;
    }
    public static function code($set = null){
      if(!is_null($set)){
        self::$code = $set;
        return $set;
      }
      return self::$code;
    }

    public static function array(){
      return array(
        "success" => self::$success,
        "code" => self::$code,
        "message" => self::$message
      );
    }
  }
?>
