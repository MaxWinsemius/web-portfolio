<?php
require_once "settings.php";
require_once "classes/Files/Files.php";
require_once "classes/Files/File.php";
require_once "classes/Files/Content.php";
require_once "classes/Files/FunctionFile.php";
require_once "classes/Database/Database.php";
require_once "classes/Ajax/Ajax.php";

try {

    $files = new \campers\Files\Files();
    $files->setFiles();

    $db = new campers\Database\Database();

}catch (Exception $e){
    $error = "Oops, try to fix your error please: " . $e->getMessage() . " on line " . $e->getLine() . " of " . $e->getFile();
    print_r($error);
}