<?php
  class Controller extends Pointer{
    public static function request(Request $REQUEST){
      $METHOD = $REQUEST::method();
      switch ($METHOD) {
        case 'Test':
          return self::test($REQUEST);
        break;
        case 'Register':
          return self::register($REQUEST);
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

    private static function test(Request $REQUEST){
      self::data(array("Awesome, the test method is working!"));
      return new Result(true);
    }

    /*
    *
    * EXAMPLE SITUATIONS
    *
    */

    private static function register(Request $REQUEST){
      $RESULT = self::control($REQUEST, array(
        "USERNAME",
        "PASSWORD",
        "EMAIL"
      ));
      /*
      * self::control will take the Request object as the first parameter.
      * The seconda parameter will be an array to check if a key is set.
      */

      if($RESULT::success()){

        self::data(array(
          "TOKEN" => "ExKjEQvcNFbsneOVGU7f"
        ));
        $RESULT::message("The user registered successfully.");
        $RESULT::code("REGISTER_SUCESSFUL");
        /*
        * self::data will set the response that is wanted to be displayed.
        */

      }

      /* If an error occures, the result will be an error automatically. */
      return $RESULT;
    }
  }
?>
