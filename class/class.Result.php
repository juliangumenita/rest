<?php
  class Result{
    private static $SUCCESS;
    private static $CODE;
    private static $MESSAGE;

    public function __construct($SUCCESS = false, $MESSAGE = NULL, $CODE = NULL){
      self::$SUCCESS = $SUCCESS;
      self::$MESSAGE = $MESSAGE;
      self::$CODE = $CODE;
  	}

    public static function success($SET = NULL){
      if(!is_null($SET)){
        self::$SUCCESS = $SET;
        return $SET;
      }
      return self::$SUCCESS;
    }
    public static function message($SET = NULL){
      if(!is_null($SET)){
        self::$MESSAGE = $SET;
        return $SET;
      }
      return self::$MESSAGE;
    }
    public static function code($SET = NULL){
      if(!is_null($SET)){
        self::$CODE = $SET;
        return $SET;
      }
      return self::$CODE;
    }

    public static function array(){
      return array(
        "SUCCESS" => self::$SUCCESS,
        "CODE" => self::$CODE,
        "MESSAGE" => self::$MESSAGE
      );
    }
  }
?>
