# Rest

This is an example structure of a hybrid rest api both for app and web app usage purposes.

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

### Response Object
You can get all of the data as an **array** or **json** from the *Response* object.

```
$RESPONSE = $HANDLER::response();

/* You can get the response as an array. */
print_r($RESPONSE::array());

/* Or you can echo the json response like following. */
echo $RESPONSE::json();
```

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
