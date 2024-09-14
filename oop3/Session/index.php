<?php
session_start();

require_once "Session.php";

Session::set("auth", [
    "id" => "1",
    "name" => "Ahmed",
    "logged_in" => true,
    "permission" => ["admin"]
]);

var_dump(Session::get("auth"));
