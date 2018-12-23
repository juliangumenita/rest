<?php
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: *');

  spl_autoload_register(function($CLASS){
    require_once(dirname(__FILE__) . "/class/class." . $CLASS . ".php");
  });

  $JSON = file_get_contents("php://input");
  $CONTROLLER = json_decode($JSON, true);

  $DATA["MODULE"] = (isset($CONTROLLER["MODULE"])) ? $CONTROLLER["MODULE"] : NULL;
  $DATA["METHOD"] = (isset($CONTROLLER["METHOD"])) ? $CONTROLLER["METHOD"] : NULL;
  $DATA["VERSION"] = (isset($CONTROLLER["VERSION"])) ? $CONTROLLER["VERSION"] : NULL;
  $DATA["DATA"] = (isset($CONTROLLER["DATA"])) ? $CONTROLLER["DATA"] : [];

  $REQUEST = new Request(
    $DATA["MODULE"],
    $DATA["METHOD"],
    $DATA["VERSION"],
    $DATA["DATA"]
  );

  $HANDLER = new Handler($REQUEST);
  $RESPONSE = $HANDLER::response();
  /*
  * Create a Handler.
  * A Handler handles the requirement of a Controller class automatically
  * based on the version used and makes it easier to return a json or an array.
  */
  echo $RESPONSE::json();
  /*
    Example response.
    - [RESULT]
    —>   [SUCCESS] : (true/false)
    —>   [MESSAGE] : (string)
    —>   [CODE] : (string)

    - [DATA] : (array)
  */
?>
