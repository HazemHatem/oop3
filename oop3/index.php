<?php
session_start();

require_once "vendor/autoload.php";

App\Session::set("auth", [
    "id" => "1",
    "name" => "Ahmed",
    "logged_in" => true,
    "permission" => ["admin"]
]);

var_dump(App\Session::get("auth"));

$response = new App\Response();

$response->setContent('<h1>Hello, World!</h1>');

$response->setStatusCode(200);

$response->setHeader('Content-Type', 'text/html');
$response->setHeader('X-Powered-By', 'PHP');

echo $response->send();


$req = new App\Request();

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

App\Database::connect();
App\Database::Deletedb("test_db");
App\Database::Createdb("test_db");
App\Database::CreateTable("test_table", "id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255)");
App\Database::Select("SELECT * FROM test_table");
App\Database::query("INSERT INTO test_table (name) VALUES ('John')");
App\Database::query("INSERT INTO test_table (name) VALUES ('Jane')");
App\Database::Select("SELECT * FROM test_table");
App\Database::query("DELETE FROM test_table WHERE id = 1");
App\Database::query("UPDATE test_table SET name = 'John Doe' WHERE id = 2");
App\Database::Select("SELECT * FROM test_table");
App\Database::close();
