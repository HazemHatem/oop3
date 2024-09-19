<?php

namespace App;

class Response
{
    private $content;
    private $statusCode;
    private $headers = [];

    public function __construct($content = '', $statusCode = 200)
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function setHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    private function sendHeaders()
    {
        http_response_code($this->statusCode);

        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }
    }

    public function send()
    {
        $this->sendHeaders();
        return $this->content;
    }
}
