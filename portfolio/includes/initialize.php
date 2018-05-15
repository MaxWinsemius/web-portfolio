<?php
require_once "settings.php";
require_once "Classes/Database/DB.php";
require_once "Classes/Articles.php";

try {
    $db = new \portfolio\database\DB(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DBNAME);

    $articles = new \portfolio\Articles($db);
}catch (Exception $e){
    $error = "Oops, try to fix your error please: " . $e->getMessage() . " on line " . $e->getLine() . " of " . $e->getFile();
    print_r($error);
}