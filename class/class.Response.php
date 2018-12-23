<?php
  class Response{
    private static $RESULT;
    private static $DATA;

    public function __construct($RESULT = [], $DATA = []){
      self::$RESULT = $RESULT;
      self::$DATA = $DATA;
  	}

    public static function result(){
      return self::$RESULT;
    }
    public static function data(){
      return self::$DATA;
    }
    public static function array(){
      return array(
        "RESULT" => self::$RESULT,
        "DATA" => self::$DATA
      );
    }
    public static function json(){
      return json_encode(
        self::array(),
        JSON_UNESCAPED_UNICODE
      );
    }
  }
?>
