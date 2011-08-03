<?php

use ErrorExceptions\ErrorExceptions;

class ConfigurationException extends LogicException {}
class DisabledFeatureException extends ConfigurationException {}
class OpenBaseDirException extends DisabledFeatureException {}
class SafeModeException extends DisabledFeatureException {}
class URLFileAccessDisabledException extends ConfigurationException {}

ErrorExceptions::addMultipleCoreExceptions(array(
    E_WARNING => array(
        '/function is disabled/' => 'DisabledFeatureException',
        '/has been disabled for security reasons/' => '',
        '/open(_|\s)basedir/i' => 'OpenBaseDirException',
        '/safe(_|\s)mode/i' => 'SafeModeException',
        '/Unable to access .*/' => 'SafeModeException',
    ),
));