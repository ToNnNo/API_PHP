<?php

ini_set('display_errors', true);
error_reporting(E_ALL);
ini_set('date.timezone', 'Europe/Paris');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, PATCH, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: *');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    exit(0);
}

return [
    'root_directory' => __DIR__
];
