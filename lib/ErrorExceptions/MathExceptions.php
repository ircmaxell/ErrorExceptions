<?php

use ErrorExceptions\ErrorExceptions;

class ZeroDivisionException extends MathException {}
class MathException extends LogicException {}

ErrorExceptions::addMultipleCoreExceptions(array(
    E_WARNING => array(
        '/Division by zero/'                 => 'ZeroDivisionException',
        '/Square root of a negative number/' => 'MathException',
    ),
));