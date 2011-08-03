<?php

use ErrorExceptions\ErrorExceptions;

class CurlException extends LogicException {}
class DNSException extends IOException {}
class FileNotFoundException extends IOException {}
class IOException extends RuntimeException {}
class InvalidFileNameException extends InvalidPathException {}
class InvalidLockException extends IOException {}
class InvalidNetworkAddressException extends InvalidPathException {}
class InvalidPathException extends IOException {}
class InvalidProtocolException extends InvalidURLException {}
class InvalidStreamException extends IOException {}
class InvalidURLException extends InvalidPathException {}
class NotReadableException extends IOException {}
class NotWritableException extends IOException {}
class PartialWriteException extends WriteFailureException {}
class ReadFailureException extends IOException {}
class SSLException extends IOException {}
class StatException extends IOException {}
class StreamFilterException extends IOException {}
class StreamWrapperException extends IOException {}
class WriteFailureException extends IOException {}


ErrorExceptions::addMultipleCoreExceptions(array(
    E_NOTICE => array(
        '/:\/\/ was never changed, nothing to restore/' => 'StreamWrapperException',
        '/path was truncated to/' => 'InvalidPathException',
        '/send of \d+ bytes failed/' => 'WriteFailureException',
    ),
    E_WARNING => array(
        '/:\/\/ never existed, nothing to restore/' => 'StreamWrapperException',
        '/Attempt to close cURL handle from a callback/' => 'CurlException',
        '/bytes more data than requested/' => 'OverflowException',
        '/call the CURL/i' => 'CurlException',
        '/cannot peek or fetch OOB data/' => 'ReadFailureException',
        '/cannot read from a stream opened in/' => 'InvalidStreamException',
        '/cannot seek/' => 'IOException',
        '/cannot use stream opened in mode/' => 'InvalidStreamException',
        '/cannot write OOB data/' => 'WriteFailureException',
        '/Could not build curl_slist/' => 'CurlException',
        '/could not extract hash key from/' => 'SSLException',
        '/could not read .* data from stream/' => 'IOException',
        '/cURL handle/' => 'CurlException',
        '/CURLOPT/' => 'InvalidArgumentException',
        '/Failed opening .* for (inclusion|highlighting)/' => 'NotReadableException',
        '/failed to bind to/' => 'IOException',
        '/Failed to resolve/' => 'DNSException',
        '/filename cannot be empty/' => 'InvalidFileNameException',
        '/file handle is not writable/' => 'NotWritableException',
        '/File name is longer than the maximum/' => 'InvalidFileNameException',
        '/getaddrinfo failed/' => 'DNSException',
        '/gethostbyname failed/' => 'DNSException',
        '/Invalud curl configuration option/' => 'CurlException',
        '/Invalid IP address/' => 'InvalidNetworkAddressException',
        '/invalid URL/' => 'InvalidURLException',
        '/No such file or directory/' => 'FileNotFoundException',
        '/protocol .* disabled in curl/i' => 'InvalidProtocolException',
        '/Protocol .* already defined/' => 'StreamWrapperException',
        '/There was an error mcode=/' => 'CurlException',
        '/this stream does not support SSL/' => 'SSLException',
        '/unable to allocate stream/' => 'IOException',
        '/Unable to find the wrapper/' => 'StreamWrapperException',
        '/Unable to include uri/' => 'IOException',
        '/Unable to include .* (URI|request)/' => 'IOException',
        '/Unable to register wrapper/' => 'StreamWrapperException',
        '/Unable to restore original .* wrapper/' => 'StreamWrapperException',
        '/Unable to unregister protocol/' => 'StreamWrapperException',
        '/URI lookup failed/' => 'DNSException',
    ),
));