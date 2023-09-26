<?php

extract(require_once "../config.php");

require_once $root_directory . "/bdd/connection.php";
require_once $root_directory . "/helper/response.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* récupère et decode les valeurs envoyer dans le corps de la requête */
    $post = json_decode(file_get_contents('php://input'), true);

    $data = [];
    $data['title'] = $post['title'] ?? null;
    $data['author'] = $post['author'] ?? null;
    $data['description'] = $post['description'] ?? null;
    $data['tags'] = $post['tags'] ?? null;
    $data['createdAt'] = (new DateTime())->format('Y-m-d H:i:s');

    $pdo = getPDOConnection();

    $keys = array_keys($data);

    $sql = "INSERT INTO article (`title`, `author`, `description`, `tags`, `createdAt`) VALUE (:title, :author, :description, :tags, :createdAt)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    http_response_code(201);
    echo json_response();
} else {
    http_response_code(405);
    echo json_response(['code' => 405, 'message' => "Method Not Allowed"]);
}
