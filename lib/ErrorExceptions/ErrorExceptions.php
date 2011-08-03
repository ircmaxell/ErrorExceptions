<?php

namespace ErrorExceptions;

use ErrorException;

require_once 'ConfigurationExceptions.php';
require_once 'CoreExceptions.php';
require_once 'IOExceptions.php';
require_once 'MathExceptions.php';

class ErrorExceptions {

    protected $callbacks = array();
    protected $errors = E_ALL;
    protected static $coreExceptions = array();
    protected $exceptions = array();
    protected $failureCallbacks = array();
    protected $lastError = array();
    protected $registered = false;

    public static function addMultipleCoreExceptions(array $exceptions) {
        static::$coreExceptions = array_merge_recursive_correct(
            $exceptions, static::$coreExceptions
        );
    }

    public function __construct($errorLevel = E_ALL) {
        $this->errors = $errorLevel;
        $this->exceptions = static::$coreExceptions;
    }

    public function addCallback($callback) {
        if (is_callable($callback)) {
            $this->callbacks[] = $callback;
        }
    }

    public function addFailureCallback($callback) {
        if (is_callable($callback)) {
            $this->failureCallbacks[] = $callback;
        }
    }

    public function addException($errNo, $regex, $exception) {
        if (!isset($this->exceptions[$errNo])) {
            $this->exceptions[$errNo] = array();
        }
        $this->exceptions[$errNo][$regex] = $exception;
    }

    public function addMultipleExceptions(array $exceptions) {
        $this->exceptions = array_merge_recursive_correct(
            $exceptions, $this->exceptions
        );
    }

    public function handleError($errNo, $errStr, $errFile, $errLine) {
        if (!$this->registered) {
            return true;
        }
        $this->lastError = array(
            'type' => $errNo,
            'message' => $errStr,
            'file' => $errFile,
            'line' => $errLine
        );
        $exception = $this->lookupError($errNo, $errStr, $errFile, $errLine);
        if ($exception && class_exists($exception)) {
            $previous = new ErrorException(
                $errStr,
                0,
                $errNo,
                $errFile,
                $errLine
            );
            throw new $exception($errStr, $errNo, $previous);
        }
        return $exception;
    }

    public function handleShutdown() {
        if (!$this->registered) {
            return true;
        }
        $error = error_get_last();
        if (!is_null($error) && $error != $this->lastError) {
            $this->callFailedCallbacks(
                $error['type'], $error['message'], $error['file'], $error['line']
            );
        }
    }

    public function register() {
        set_error_handler(
            array($this, 'handleError'), $this->errors
        );
        register_shutdown_function(array($this, 'handleShutdown'));
        $this->registered = true;
    }

    public function unregister() {
        restore_error_handler();
        $this->registered = false;
    }

    protected function callFailedCallbacks($errNo, $errStr, $errFile, $errLine) {
        foreach ($this->failureCallbacks as $callback) {
            if (call_user_func($callback, $errNo, $errStr, $errFile, $errLine)) {
                return true;
            }
        }
        return false;
    }

    protected function lookupError($errNo, $errStr, $errFile, $errLine) {
        foreach ($this->callbacks as $callback) {
            $exception = call_user_func($callback, $errNo, $errStr);
            if ($exception && class_exists($exception)) {
                return $exception;
            }
        }
        if (!isset($this->exceptions[$errNo])) {
            return false;
        }
        foreach ($this->exceptions[$errNo] as $regex => $exception) {
            if (preg_match($regex, $errStr)) {
                return $exception;
            }
        }
        return $this->callFailedCallbacks($errNo, $errStr, $errFile, $errLine);
    }

}

function array_merge_recursive_correct(array $array1, array $array2) {
    foreach ($array2 as $key => $value) {
        if (isset($array1[$key]) && is_array($array1[$key]) && is_array($value)) {
            $array1[$key] = array_merge_recursive_correct($array1[$key],
                $array2[$key]);
        } else {
            $array1[$key] = $value;
        }
    }
    return $array1;
}