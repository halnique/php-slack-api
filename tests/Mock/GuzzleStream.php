<?php


namespace HalniqueTest\Slack\Mock;


use Psr\Http\Message\StreamInterface;

class GuzzleStream implements StreamInterface
{
    public $stream = '';

    public function __toString()
    {
        return $this->stream;
    }

    public function close()
    {
    }

    public function detach()
    {
        return $this->stream;
    }

    public function getSize()
    {
        return strlen($this->stream);
    }

    public function tell()
    {
        return 0;
    }

    public function eof()
    {
        return true;
    }

    public function isSeekable()
    {
        return true;
    }

    public function seek($offset, $whence = SEEK_SET)
    {
    }

    public function rewind()
    {
    }

    public function isWritable()
    {
        return true;
    }

    public function write($string)
    {
        return strlen($string);
    }

    public function isReadable()
    {
        return true;
    }

    public function read($length)
    {
        return $this->stream;
    }

    public function getContents()
    {
        return $this->stream;
    }

    public function getMetadata($key = null)
    {
        return null;
    }
}