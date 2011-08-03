<?php

require_once 'lib/ErrorExceptions/ErrorExceptions.php';
error_reporting(E_ALL | E_DEPRECATED);
$handler = new ErrorExceptions\ErrorExceptions(E_ALL | E_DEPRECATED);
$handler->register();

$s = microtime(true);
try {
    strpos('test', 'bar', 10);
} catch (Exception $e) {
    var_dump(get_class($e));
}
$e = microtime(true);

echo "Completed in ". ($e - $s) . " Seconds\n";