<?php
session_start();

require_once "Request.php";


$req = new Request();

echo $req->get('name');
echo "<br>";

echo $req->server('REQUEST_URI');
echo "<br>";

echo $req->server('REQUEST_METHOD');
echo "<br>";

echo $req->post('name');
echo "<br>";

echo $req->session('name');
echo "<br>";

echo $req->files('name');
echo "<br>";

echo $req->cookie('name');
echo "<br>";

echo $req->header('name');
echo "<br>";

echo "<pre>";
print_r($req->GetAll());
echo "</pre>";

echo "<pre>";
print_r($req->PostAll());
echo "</pre>";

echo "<pre>";
print_r($req->ServerAll());
echo "</pre>";

echo "<pre>";
print_r($req->SessionAll());
echo "</pre>";

echo "<pre>";
print_r($req->FilesAll());
echo "</pre>";

echo "<pre>";
print_r($req->CookieAll());
echo "</pre>";

echo "<pre>";
print_r($req->HeaderAll());
echo "</pre>";
