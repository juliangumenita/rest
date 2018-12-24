# Rest

This is an example structure of a hybrid rest api both for app and web app usage purposes.

## Getting Started

1 - ) Access all of your files trough a autoloader or using *spl_autoload_register* like shown.

2 - ) You can use the example files, the **endpoint.php** file can be used as a request api right away.

3 - ) **standalone.php** file shows how you can create a request without sending a json request.

4 - ) A folder named 'version' and subfolders named {version} should be present in the same level as the api file.

TO-DO: Create an option to make 'standalone' requests trough a different folder.

## How It Works

1 - ) Create a **Request** object.
*It holds the information we are sending.*

2 - ) Pass the *Request* object to **Handler** object.
*It will process the request and execute it.*

3 - ) Get **Response** object from *Handler* and get the response values or convert them to json.

### Creating A Module and Methods

Using the example file, create a file named {moduleName}Request.php *a Controller object*, the handler will be looking for a file named that under the {version} folder.
You can create your own methods, but just do not forget to add the switch case to the **response** function and return a *Result* object.
For example, go see the file named ModuleRequest.php under 'version/1.0/'

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
$HANDLER = new Handler($REQUEST);
```

### Getting Response object and displaying it.
You can get all of the data as an **array** or **json** from the *Response* object.

```
$RESPONSE = $HANDLER::response();

print_r($RESPONSE::array());

/* Or you can echo the json response like following. */
// echo $RESPONSE::json();
```

# Details

### TO-DO: Add details and create examples. 
