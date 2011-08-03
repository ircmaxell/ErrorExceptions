<?php

require_once 'lib/ErrorExceptions/ErrorExceptions.php';
error_reporting(E_ALL | E_DEPRECATED);
$handler = new ErrorExceptions\ErrorExceptions(E_ALL | E_DEPRECATED);
$handler->register();

try {
    strpos('test', 'bar', 10);
} catch (Exception $e) {
    // Not executed, since it's an incidental error
    var_dump(get_class($e));
}

try {
    fopen('bar.baz.biz', 'r');
} catch (FileNotFoundException $e) {
    // Caught it!
    var_dump(get_class($e));
}
