<?php
  class Handler{
    private static $result;
    private static $data;
    public function __construct(Request $request, $path = NULL){
      $pointer =  (is_null($path)) ? "version/" : $path;
      $filePath = $pointer . $request::version() . "/" . $request::module() . "Request.php";
      $fileExists = file_exists($filePath);
      if($fileExists){
        require_once($filePath);
      }
      /*
        - If file exist, then include it.
        - Every main {moduleName}Request.php file is a Controller class.
      */

      $data = $request::data();
      $handler
        = ($fileExists)
        ? new Controller
        : NULL;
      self::$result
        = (!is_null($handler))
        ? $handler::request($request)
        : new Result(false, "Incorrect file path.");
      self::$data
        = (self::$result::success())
        ? $handler::data()
        : NULL;
        /*
          - If module exists in defined version, require it.
          - If Module Handler set, execute it and get the result.
          - If the result is successful, get the data from the Handler.
        */
    }

    public static function response(){
      return new Response(
        self::$result::array(),
        self::$data
      );
    }
  }
?>
