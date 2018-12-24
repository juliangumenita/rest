<?php
  spl_autoload_register(function($CLASS){
    require_once("../class/class." . $CLASS . ".php");
  });
  /*
    It is better to initialize a spl_autoload_register in the base execution
    file in order to make every file accessible trough here.
  */

  $REQUEST = new Request(
    "Test",
    "Register",
    "1.0",
    [
      "USERNAME" => "{email}",
      "PASSWORD" => "{password}",
      "EMAIL" => "{email}"
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

  $HANDLER = new Handler($REQUEST, "../version/");
  /*
  * Create a Handler.
  * A Handler handles the requirement of a Controller class automatically
  * based on the version used and makes it easier to return a json or an array.
  */
  $RESPONSE = $HANDLER::response();
  print_r($RESPONSE::array());
  /*
    Example response.
    - [RESULT]
    —>   [SUCCESS] : (true/false)
    —>   [MESSAGE] : (string)
    —>   [CODE] : (string)

    - [DATA] : (array)
  */

?>
