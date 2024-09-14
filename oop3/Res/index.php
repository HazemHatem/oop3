<?php

require_once "Response.php";
$response = new Response();

$response->setContent('<h1>Hello, World!</h1>');

$response->setStatusCode(200);

$response->setHeader('Content-Type', 'text/html');
$response->setHeader('X-Powered-By', 'PHP');

echo $response->send();
