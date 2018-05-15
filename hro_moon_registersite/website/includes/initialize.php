<?php
if(!isset($_SESSION['sesStart'])) {
    session_start();
    $_SESSION['sesStart'] = true;
}

require_once "settings.php";
require_once "classes/Pages/Pages.php";
require_once "classes/Pages/Page.php";
require_once "classes/Database/DB.php";
require_once "classes/Authentication/Register.php";
require_once "classes/Authentication/Authentication.php";
require_once "classes/Registration/Registrations.php";

try {
    $db = new \moonconsultancy\database\db(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DBNAME);
    $pdo = $db->getPDOInstance();
    if(isset($loadingSource)) {
        if($loadingSource == "index") {
            //get raw page data to readable data
            $fileContents = json_decode(file_get_contents(DATA_PATH . 'pages.json'));
            $pages = new \moonconsultancy\Pages\Pages();
            $pages->setPages($fileContents);
        }
    }
}catch (Exception $e){
    $error = "Oops, try to fix your error please: " . $e->getMessage() . " on line " . $e->getLine() . " of " . $e->getFile();
    print_r($error);
}