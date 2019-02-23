<?php
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: *');

  spl_autoload_register(function($class){
    require_once("../class/$class.php");
  });

  $JSON = file_get_contents("php://input");
  $controller = json_decode($JSON, true);

  $data["module"] = (isset($controller["module"])) ? $controller["module"] : null;
  $data["method"] = (isset($controller["method"])) ? $controller["method"] : null;
  $data["version"] = (isset($controller["version"])) ? $controller["version"] : null;
  $data["data"] = (isset($controller["data"])) ? $controller["data"] : [];

  $request = new Request(
    $data["module"],
    $data["method"],
    $data["version"],
    $data["data"]
  );

  $handler = new Handler($request, "../version/");
  $response = $handler::response();
  /*
  * Create a Handler.
  * A Handler handles the requirement of a Controller class automatically
  * based on the version used and makes it easier to return a json or an array.
  */
  echo $response::json();
  /*
    Example response.
    - [RESULT]
    —>   [SUCCESS] : (true/false)
    —>   [MESSAGE] : (string)
    —>   [CODE] : (string)

    - [data] : (array)
  */
?>
