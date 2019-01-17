# Rest

This is an example structure of a hybrid rest api both for app and web app usage purposes.

### Creating A Method

Create a {module}.php named Controller object extended to Pointer object and create your base like the following.

```
class Controller extends Pointer{

  public static function request(Request $request){
    $method = $request::method();
    switch ($method) {
      case 'Test':
        return self::test($request);
      default:
        return new Result(false, "Incorrect method has been called.");
    }
  }
  /*
  * A handler activates the request function, you can override it. 
  */

  private static function test(Request $request){
    self::data("Awesome, the test method is working!");
    return new Result(true);
  }
  /*
  * A method always should return a Result object.
  */
  
}
```

### Creating A Request

```
$REQUEST = new Request(
  "{moduleName}",
  "{methodName}",
  "{version}",
  []
);
```

### Creating A Handler

```
$HANDLER = new Handler($REQUEST, "path/to/version/folders");
```

# Details

### Request Object

These are the detailed ways you can use Request object in a Controller object.

```
$REQUEST::module(); //returns {moduleName} (string).

$REQUEST::method(); //returns {methodName} (string).

$REQUEST::version(); //returns {version} (string).

$REQUEST::data(); //returns data[] (array).
 — ALSO —
/* You can set the data of a request by passing an array */
$REQUEST::data([]); //will set and return the data.
```

### Response Object

You can get all of the data as an **array** or **json** from the _Response_ object.

```
$RESPONSE = $HANDLER::response();

/* You can get the response as an array. */
print_r($RESPONSE::array());

/* Or you can echo the json response like following. */
echo $RESPONSE::json();
```
