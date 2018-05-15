<?php
require_once "includes/initialize.php";

header("Content-Type: application/json", true);
if(isset($_GET['ID'])) {
    //echo str_replace("\\", "", json_encode($articles->getArticle($_GET['ID'])));
    echo json_encode($articles->getArticle($_GET['ID']));
}