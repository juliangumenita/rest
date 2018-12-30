<?php
  class Controller extends Pointer{
    public static function request(Request $request){
      $method = $request::method();
      switch ($method) {
        case 'Test':
          return self::test($request);
        break;
        case 'Register':
          return self::register($request);
        break;
        default:
          return new Result(false, "Incorrect method has been called.");
        break;
      }
    }
    /*
    * Create a public static function named request in order to make a
    * switch state call. The handler will fire it.
    */

    private static function test(Request $request){
      self::data(array("Awesome, the test method is working!"));
      return new Result(true);
    }

    /*
    *
    * EXAMPLE SITUATIONS
    *
    */

    private static function register(Request $request){
      $result = self::control($request, array(
        "username",
        "password",
        "email"
      ));
      /*
      * self::control will take the Request object as the first parameter.
      * The seconda parameter will be an array to check if a key is set.
      */

      if($result::success()){

        self::data(array(
          "token" => "ExKjEQvcNFbsneOVGU7f"
        ));
        $result::message("The user registered successfully.");
        $result::code("REGISTER_SUCESSFUL");
        /*
        * self::data will set the response that is wanted to be displayed.
        */

      }

      /* If an error occures, the result will be an error automatically. */
      return $result;
    }
  }
?>
