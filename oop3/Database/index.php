<?php

require_once "Database.php";

Database::connect();
Database::Deletedb("test_db");
Database::Createdb("test_db");
Database::CreateTable("test_table", "id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255)");
Database::Select("SELECT * FROM test_table");
Database::query("INSERT INTO test_table (name) VALUES ('John')");
Database::query("INSERT INTO test_table (name) VALUES ('Jane')");
Database::Select("SELECT * FROM test_table");
Database::query("DELETE FROM test_table WHERE id = 1");
Database::query("UPDATE test_table SET name = 'John Doe' WHERE id = 2");
Database::Select("SELECT * FROM test_table");
Database::close();
