<?php
  spl_autoload_register(function($CLASS){
    require_once(dirname(__FILE__) . "/class/class." . $CLASS . ".php");
  });

  $MODULE = "{moduleName}";
  /*
  * A module is a set of methods. Create a {moduleName}Request.php file in
  * ./{version}/ folder in order to automatically work with it.
  * You can find an example Controller (Method Class) named ModuleRequest.php
  */
  $METHOD = "{methodName}";
  /*
  * A method is a public function used in a module.
  */
  $VERSION = "{version}";
  $DATA = [];
  /*
  * This, represents the data that will sent as a request.
  */

  $REQUEST = new Request(
    $MODULE,
    $METHOD,
    $VERSION,
    $DATA
  );

  $HANDLER = new Handler($REQUEST);
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
