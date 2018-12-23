<?php
  class Handler{
    private static $RESULT;
    private static $DATA;
    public function __construct(Request $REQUEST){

      $PATH = "version/" . $REQUEST::version() . "/" . $REQUEST::module() . "Request.php";
      $FILE_EXIST = file_exists($PATH);
      if($FILE_EXIST){
        require_once($PATH);
      }
      /*
        - If file exist, then include it.
        - Every main {moduleName}Request.php file is a Controller class.
      */

      $DATA = $REQUEST::data();
      $HANDLER
        = ($FILE_EXIST)
        ? new Controller
        : NULL;
      self::$RESULT
        = (!is_null($HANDLER))
        ? $HANDLER::request($REQUEST)
        : new Result(false, "Incorrect module has been called.");
      self::$DATA
        = (self::$RESULT::success())
        ? $HANDLER::data()
        : NULL;
        /*
          - If module exists in defined version, require it.
          - If Module Handler set, execute it and get the result.
          - If the result is successful, get the data from the Handler.
        */
    }

    public static function response(){
      return new Response(
        self::$RESULT::array(),
        self::$DATA
      );
    }
  }
?>
