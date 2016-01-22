# ErrorExceptions
A library for converting core PHP errors into ErrorExceptions

Installation
============
Clone the latest iteration from github
````Bash
$ git clone https://github.com/iroegbu/ErrorExceptions.git
````
Then require
````PHP
require_once 'lib/ErrorExceptions/ErrorExceptions.php';
````

Usage
=====

````PHP
try {
    fopen('bar.baz.biz', 'r');
} catch (FileNotFoundException $e) {
    // "Warning: No such file or directory in..." becomes an instance of FileNotFoundException
    var_dump(get_class($e));
}
````
