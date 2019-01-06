<?php
  class Reporter{
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "database";
    private static $table = "error";
    /* You can change connection strings here. */

    public static function init(){
      error_reporting(0);
    }
    /*
    * You should initialize this method at the beginning of a file.
    */

    public static function catch(){
      $error = error_get_last();
      if(!is_null($error)){
        self::log($error);
      }
    }
    /*
    * You should initialize this method at the end of a file.
    * If an error occurs, it will send the log to the database.
    */

    private static function log($error){
      $connection = @mysqli_connect(
        self::$host,
        self::$username,
        self::$password,
        self::$database
      );
      $table = self::$table;

      $type = $error["type"];
      $message = $error["message"];
      $file = str_replace('\\', "/", $error["file"]);
      $line = $error["line"];
      $content = trim(file($file)[$line - 1]);
      $date = date("Y-m-d H:i:s");

      @mysqli_query(
        $connection,
        "INSERT INTO $table (type, message, file, line, content, created_date) VALUES ('$type', '$message', '$file', '$line', '$content', '$date');"
      );
    }
    /*
    * This method sends a query to the database.
    * You can modify it accordingly to your needs.
    */
  }
?>
