<?php

extract(require_once "../config.php");

require_once $root_directory . "/bdd/connection.php";
require_once $root_directory . "/helper/response.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $pdo = getPDOConnection();

    $sql = "SELECT title, description, image, tags, createdAt FROM article";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $articles = $stmt->fetchAll();

    http_response_code(200);
    echo json_response($articles);
} else {
    http_response_code(405);
    echo json_response(['code' => 405, 'message' => "Method Not Allowed"]);
}
