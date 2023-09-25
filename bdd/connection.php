<?php

const HOST = "localhost";
const DATABASE = "mediablabla";
const PORT = "8888";
const USERNAME = "root";
const PASSWORD = "root";

function getPDOConnection()
{
    $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8', HOST, PORT, DATABASE);

    try {
        $pdo = new PDO($dsn, USERNAME, PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        var_dump($e);
        exit();
    }

    return $pdo;
}
