<?php

if (class_exists('Google_Client', false)) {
    // Prevent error with preloading in PHP 7.4
    // @see https://github.com/googleapis/google-api-php-client/issues/1976
    return;
}

$classMap = [
    'WPMSGoogle\\Client' => 'Google_Client',
    'WPMSGoogle\\Service' => 'Google_Service',
    'WPMSGoogle\\AccessToken\\Revoke' => 'Google_AccessToken_Revoke',
    'WPMSGoogle\\AccessToken\\Verify' => 'Google_AccessToken_Verify',
    'WPMSGoogle\\Model' => 'Google_Model',
    'WPMSGoogle\\Utils\\UriTemplate' => 'Google_Utils_UriTemplate',
    'WPMSGoogle\\AuthHandler\\Guzzle6AuthHandler' => 'Google_AuthHandler_Guzzle6AuthHandler',
    'WPMSGoogle\\AuthHandler\\Guzzle7AuthHandler' => 'Google_AuthHandler_Guzzle7AuthHandler',
    'WPMSGoogle\\AuthHandler\\Guzzle5AuthHandler' => 'Google_AuthHandler_Guzzle5AuthHandler',
    'WPMSGoogle\\AuthHandler\\AuthHandlerFactory' => 'Google_AuthHandler_AuthHandlerFactory',
    'WPMSGoogle\\Http\\Batch' => 'Google_Http_Batch',
    'WPMSGoogle\\Http\\MediaFileUpload' => 'Google_Http_MediaFileUpload',
    'WPMSGoogle\\Http\\REST' => 'Google_Http_REST',
    'WPMSGoogle\\Task\\Retryable' => 'Google_Task_Retryable',
    'WPMSGoogle\\Task\\Exception' => 'Google_Task_Exception',
    'WPMSGoogle\\Task\\Runner' => 'Google_Task_Runner',
    'WPMSGoogle\\Collection' => 'Google_Collection',
    'WPMSGoogle\\Service\\Exception' => 'Google_Service_Exception',
    'WPMSGoogle\\Service\\Resource' => 'Google_Service_Resource',
    'WPMSGoogle\\Exception' => 'Google_Exception',
];

foreach ($classMap as $class => $alias) {
    class_alias($class, $alias);
}

/**
 * This class needs to be defined explicitly as scripts must be recognized by
 * the autoloader.
 */
class Google_Task_Composer extends \WPMSGoogle\Task\Composer
{
}

if (\false) {
  class Google_AccessToken_Revoke extends \WPMSGoogle\AccessToken\Revoke {}
  class Google_AccessToken_Verify extends \WPMSGoogle\AccessToken\Verify {}
  class Google_AuthHandler_AuthHandlerFactory extends \WPMSGoogle\AuthHandler\AuthHandlerFactory {}
  class Google_AuthHandler_Guzzle5AuthHandler extends \WPMSGoogle\AuthHandler\Guzzle5AuthHandler {}
  class Google_AuthHandler_Guzzle6AuthHandler extends \WPMSGoogle\AuthHandler\Guzzle6AuthHandler {}
  class Google_AuthHandler_Guzzle7AuthHandler extends \WPMSGoogle\AuthHandler\Guzzle7AuthHandler {}
  class Google_Client extends \WPMSGoogle\Client {}
  class Google_Collection extends \WPMSGoogle\Collection {}
  class Google_Exception extends \WPMSGoogle\Exception {}
  class Google_Http_Batch extends \WPMSGoogle\Http\Batch {}
  class Google_Http_MediaFileUpload extends \WPMSGoogle\Http\MediaFileUpload {}
  class Google_Http_REST extends \WPMSGoogle\Http\REST {}
  class Google_Model extends \WPMSGoogle\Model {}
  class Google_Service extends \WPMSGoogle\Service {}
  class Google_Service_Exception extends \WPMSGoogle\Service\Exception {}
  class Google_Service_Resource extends \WPMSGoogle\Service\Resource {}
  class Google_Task_Exception extends \WPMSGoogle\Task\Exception {}
  class Google_Task_Retryable extends \WPMSGoogle\Task\Retryable {}
  class Google_Task_Runner extends \WPMSGoogle\Task\Runner {}
  class Google_Utils_UriTemplate extends \WPMSGoogle\Utils\UriTemplate {}
}
