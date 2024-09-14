<?php


class Request
{
    private $get;
    private $post;
    private $server;
    private $session;
    private $files;
    private $cookie;
    private $header;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
        $this->session = $_SESSION;
        $this->files = $_FILES;
    }

    public function get($key)
    {
        return $this->get[$key] ?? null;
    }

    public function post($key)
    {
        return $this->post[$key] ?? null;
    }

    public function server($key)
    {
        return $this->server[$key] ?? null;
    }

    public function session($key)
    {
        return $this->session[$key] ?? null;
    }

    public function files($key)
    {
        return $this->files[$key] ?? null;
    }

    public function cookie($key)
    {
        return $this->cookie[$key] ?? null;
    }

    public function header($key)
    {
        return $this->header[$key] ?? null;
    }

    public function GetAll()
    {
        return $this->get;
    }

    public function PostAll()
    {
        return $this->post;
    }

    public function ServerAll()
    {
        return $this->server;
    }

    public function SessionAll()
    {
        return $this->session;
    }

    public function FilesAll()
    {
        return $this->files;
    }

    public function CookieAll()
    {
        return $this->cookie;
    }

    public function HeaderAll()
    {
        return $this->header;
    }
}
