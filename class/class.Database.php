<?php
  class Database{
    private static $_HOST = "localhost";
    private static $_USERNAME = "root";
    private static $_PASSWORD = "";
    private static $_DATABASE = "database";
    /* You can change connection strings here. */


    private static $CONNECTED = false;
    private static $CONNECTION;


    public function __construct(){
      self::$CONNECTION = @mysqli_connect(
        self::$_HOST,
        self::$_USERNAME,
        self::$_PASSWORD,
        self::$_DATABASE
      );
      if(!mysqli_connect_errno(self::$CONNECTION)){
        mysqli_set_charset(self::$CONNECTION, "utf8");
        /* Sets the default charset to UTF8. */
        self::$CONNECTED = true;
      }
  	}


    public static function connected(){
      return self::$CONNECTED;
    }


    public static function secure($STRING){
      if(self::connected()){
        return @mysqli_real_escape_string(self::$CONNECTION, $STRING);
      } return false;
    }
    /* Returns a secure string for risky areas. */


    public static function execute(){
      if(self::connected()){
        $ARGS = func_get_args();
        foreach ($ARGS as $ARG) {
          is_string($ARG){
            @mysqli_query(self::$CONNECTION,$QUERY);
          }
        }
        return true;
      } return false;
    }
    /* Only executes the query, good for heavy usage. */

    private static function returnCount(string $QUERY){
      $RESULT = @mysqli_query(self::$CONNECTION,$QUERY);
      if($RESULT){
        $COUNT = mysqli_num_rows($RESULT);
        return $COUNT;
      } return 0;
    }
    public static function count(string $QUERY){
      if(self::connected()){
        return self::returnCount($QUERY);
      } return false;
    }
    /* Returns the count of rows; if not successful, returns 0. */


    private static function returnFetch(string $QUERY){
      $RESULT = @mysqli_query(self::$CONNECTION,$QUERY);
      if($RESULT){
        $ROW = @mysqli_fetch_array($RESULT,MYSQLI_ASSOC);
        return $ROW;
      } return NULL;
    }
    public static function fetch(string $QUERY){
      if(self::connected()){
        return self::returnFetch($QUERY);
      } return false;
    }
    /* Fetches only one row from query. */


    private static function returnSuccess(string $QUERY){
      return @mysqli_query(self::$CONNECTION,$QUERY);
    }
    public static function success(string $QUERY){
      if(self::connected()){
        return self::returnSuccess($QUERY);
      } return false;
    }
    /* Returns true if the query successfully executed. */


    private static function returnMultiple(string $QUERY){
      $RESULT = @mysqli_query(self::$CONNECTION,$QUERY);
      if($RESULT){
        $ARRAY = [];
        while($ROW = @mysqli_fetch_array($RESULT,MYSQLI_ASSOC)) {
          @array_push($ARRAY, $ROW);
        }
        return $ARRAY;
      } return false;
    }
    public static function multiple(string $QUERY){
      if(self::connected()){
        return self::returnMultiple($QUERY);
      } return false;
    }
    /* Fetches multiple rows from query and puts them into an array. */
  }
?>
