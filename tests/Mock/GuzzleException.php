<?php


namespace HalniqueTest\Slack\Mock;


/**
 * @method string getMessage()
 * @method \Throwable|null getPrevious()
 * @method mixed getCode()
 * @method string getFile()
 * @method int getLine()
 * @method array getTrace()
 * @method string getTraceAsString()
 */
class GuzzleException extends \RuntimeException implements \GuzzleHttp\Exception\GuzzleException
{
}