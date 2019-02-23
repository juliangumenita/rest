<?php
  spl_autoload_register(function($class){
    require_once("../class/$class.php");
  });
  /*
    It is better to initialize a spl_autoload_register in the base execution
    file in order to make every file accessible trough here.
  */

  $request = new Request(
    "Test",
    "Register",
    "1.0",
    [
      "username" => "{email}",
      "password" => "{password}",
      "email" => "{email}"
    ]
  );
  /*
    —> {moduleName}
        * A module is a set of methods. Create a {moduleName}Request.php file in
        * ./{version}/ folder in order to automatically work with it.
        ! Or you can use any path to keep version folders.

    —> {methodName}
        * A method is a public function used in a module.

    —> {version}

    —> data[]
        * This, represents the data that will sent as a request.
  */

  $handler = new Handler($request, "../version/");
  /*
  * Create a Handler.
  * A Handler handles the requirement of a Controller class automatically
  * based on the version used and makes it easier to return a json or an array.
  */
  $response = $handler::response();
  print_r($response::array());
  /*
    Example response.
    - [RESULT]
    —>   [SUCCESS] : (true/false)
    —>   [MESSAGE] : (string)
    —>   [CODE] : (string)

    - [DATA] : (array)
  */

?>
