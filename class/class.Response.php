<?php
  class Response{
    private static $result;
    private static $data;

    public function __construct($result = [], $data = []){
      self::$result = $result;
      self::$data = $data;
  	}

    public static function result(){
      return self::$result;
    }
    public static function data(){
      return self::$data;
    }
    public static function array(){
      return array(
        "result" => self::$result,
        "data" => self::$data
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
