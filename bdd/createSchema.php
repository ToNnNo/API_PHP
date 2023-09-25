<?php

require_once "connection.php";

$sql = <<<TABLE
CREATE TABLE IF NOT EXISTS `article` (
    `id` int NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `author` varchar(255),
    `description` text,
    `image` varchar(255),
    `tags` varchar(255),
    `createdAt` datetime,
    PRIMARY KEY (`id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


TABLE;

$pdo = getPDOConnection();

if($pdo->exec($sql) !== false) {
    echo "Create Schema: Complete";
}
