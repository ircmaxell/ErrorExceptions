<?php

use ErrorExceptions\ErrorExceptions;

class ConflictException extends LogicException {}
class DeprecatedException extends LogicException {}
class InvalidCallbackException extends LogicException {}
class InvalidClassException extends LogicException {}
class InvalidImplementationException extends LogicException {}
class InvalidInputException extends RuntimeException {}
class InvalidReturnValueException extends LogicException {}
class InvalidScopeException extends LogicException {}
class InvalidValueException extends LogicException {}
class OutOfMemoryException extends RuntimeException {}
class NotSupportedException extends RuntimeException {}
class OutputException extends RuntimeException {}
class ParseException extends LogicException {}
class PHPCoreException extends LogicException {}
class ReferenceException extends LogicException {}
class StrictException extends LogicException {}
class TypeConversionException extends LogicException {}
class UndefinedConstantException extends LogicException {}
class UndefinedVariableException extends LogicException {}
class UnknownErrorException extends RuntimeException {}
class WTFException extends LogicException {}

ErrorExceptions::addMultipleCoreExceptions(array(
    E_DEPRECATED => array(
        '/./' => 'DeprecatedException',
    ),
    E_NOTICE => array(
        '/Constant .* already defined/' => 'LogicException',
        '/Exceptions must be derived from the Exception/' => 'InvalidClassException',
        '/failed to (flush|delete|delete and flush) buffer/' => 'OutputException',
        '/(modify|assign|get) property of non-object/' => 'LogicException',
        '/(Illegal|Corrupt) member variable name/' => 'ParseException',
        '/Indirect modification of overloaded property/' => 'LogicException',
        '/(Object|Array) .* to string conversion/' => 'TypeConversionException',
        '/Object of class .* could not be converted to/' => 'TypeConversionException',
        '/undefined constant/i' => 'UndefinedConstantException',
        '/undefined (property|variable)/i' => 'UndefinedVariableException',
        '/Undefined offset/' => 'OutOfBoundsException',
        '/Uninitialized string offset/' => 'OutOfBoundsException',

    ),
    E_RECOVERABLE_ERROR => array(
        '/__toString\(\) must return a string/' => 'InvalidReturnValueException',
        '/Argument \d+ passed to .* must/' => 'InvalidArgumentException',
        '/Cannot get arguments for calling closure/' => 'LogicException',
        '/Closure object cannot have properties/' => 'LogicException',
        '/Instantiation of .* is not allowed/' => 'LogicException',
        '/Object of class .* could not be converted to/' => 'TypeConversionException',
    ),
    E_STRICT => array(
        '/Accessing static property .* as non static/' => 'StrictException',
        '/Creating default object from empty value/' => 'UndefinedVariableException',
        '/Non-static method .* be called statically/' => 'StrictException',
        '/Redefining already defined constructor/' => 'ParseException',
        '/Resource .* used as offset/' => 'TypeConversionException',
        '/Static function .* should not be abstract/' => 'ParseException',
    ),
    E_WARNING => array(
        '/__toString\(\) must return a string/' => 'InvalidReturnValueException',
        '/a COM object/i' => 'com_exception',
        '/Argument \d+ not passed to function/' => 'OutOfBoundsException',
        '/bad type specified while parsing parameters/' => 'PHPCoreException',
        '/called from outside a class/' => 'InvalidScopeException',
        '/Can only handle single dimension variant arrays/' => 'com_exception',
        '/Cannot add element to the array/' => 'RuntimeException',
        '/Cannot add (user|internal) functions to return value/' => 'PHPCoreException',
        '/Cannot convert to (real|ordinal) value/' => 'TypeConversionException',
        '/Cannot (read|write) property of object - .* handler defined/' => 'PHPCoreException',
        '/Cannot redeclare class/' => 'InvalidClassException',
        '/Cannot unset offset in a non-array variable/' => 'LogicException',
        '/Cannot use a scalar value as an array/' => 'TypeConversionException',
        '/class .* is undefined/' => 'InvalidClassException',
        '/Class .* not found/' => 'InvalidClassException',
        '/Class constants cannot be defined/' => 'LogicException',
        '/Clone method does not require arguments/' => 'ParseException',
        '/Constants may only evaluate to scalar values/' => 'InvalidValueException',
        '/converting from PHP array to VARIANT/' => 'TypeConversionException',
        '/Could not convert string to unicode/i' => 'InvalidInputException',
        '/Could not execute/' => 'LogicException',
        '/Could not find a factory/' => 'PHPCoreException',
        '/could not obtain parameters for parsing/' => 'PHPCoreException',
        '/expected to be a reference/' => 'ReferenceException',
        '/expects the argument .* to be a valid callback/' => 'InvalidCallbackException',
        '/expects parameter \d+ to be a valid callback/' => 'InvalidCallbackException',
        '/failed allocating/i' => 'OutOfMemoryException',
        '/failed to allocate/i' => 'OutOfMemoryException',
        '/first parameter has to be/i' => 'InvalidArgumentException',
        '/First parameter must either be/' => 'InvalidArgumentException',
        '/function is not supported/' => 'BadFunctionCallException',
        '/handler .* did not return a/' => 'LogicException',
        '/Illegal offset type/' => 'LogicException',
        '/Illegal string offset/' => 'OutOfBoundsException',
        '/Illegal type returned from/' => 'InvalidReturnValueException',
        '/Indirect modification of overloaded element/' => 'LogicException',
        '/Input variable nesting level exceeded/' => 'InvalidInputException',
        '/invalid .* ID/i' => 'InvalidArgumentException',
        '/Invalid callback/' => 'InvalidCallbackException',
        '/invalid date/'   => 'InvalidArgumentException',
        '/Invalid error type specified/' => 'DomainException',
        '/Illegal offset type/' => 'DomainException',
        '/invalid parameter given for/i' => 'DomainException',
        '/Invalid scanner mode/' => 'DomainException',
        '/is no longer supported/' => 'DeprecatedException',
        '/is not a valid mode for/' => 'DomainException',
        '/is not a valid .* resource/' => 'DomainException',
        '/is not implemented/' => 'InvalidImplementationException',
        '/is only valid for years between/i' => 'OutOfRangeException',
        '/is too long for/' => 'DomainException',
        '/may not be negative/i'    => 'OutOfRangeException',
        '/(modify|assign|get) property of non-object/' => 'LogicException',
        '/must be a name of .* class/' => 'InvalidClassException',
        '/must be greather than/' => 'RangeException',
        '/must not return itself/' => 'InvalidReturnValueException',
        '/must return a/' => 'InvalidReturnValueException',
        '/no .* resource supplied/' => 'InvalidArgumentException',
        '/no function context/' => 'LogicException',
        '/not a dispatchable interface/' => 'BadMethodCallException',
        '/not supported on this platform/' => 'NotSupportedException',
        '/Nothing returned from/' => 'InvalidReturnValueException',
        '/object doesn\'t support property references/' => 'ReferenceException',
        '/only one varargs specifier/' => 'PHPCoreException',
        '/output handler .* conflicts with/' => 'ConflictException',
        '/Parameter wasn\'t passed by reference/' => 'ReferenceException',
        '/POST Content-Length of/' => 'InvalidInputException',
        '/POST length does not match Content-Length/' => 'InvalidInputException',
        '/request_startup.* failed/' => 'PHPCoreException',
        '/should be >/' => 'RangeException',
        '/The magic method .* must have public/' => 'ParseException',
        '/The use statement with non-compound name/' => 'ParseException',
        '/this code not yet written/i' => 'WTFException',
        '/timestamp value must be a positive value/i' => 'InvalidArgumentException',
        '/type library constant .* already defined/i' => 'LogicException',
        '/Unable to find typeinfo using/i' => 'RuntimeException',
        '/Unknown .* list entry type in/' => 'PHPCoreException',
        '/Unspecified error/' => 'UnknownErrorException',
        '/Variable passed to .* is not an/' => 'DomainException',
        '/variant is not an/' => 'InvalidArgumentException',
        '/variant: failed to copy from/' => 'TypeConversionException',
        '/Wrong parameter count for/' => 'InvalidArgumentException',
        '/year out of range/i' => 'OutOfRangeException',
        '/zval: conversion from/' => 'TypeConversionException',
    ),
));