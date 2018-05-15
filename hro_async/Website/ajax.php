<?php
require_once "includes/initialize.php";

$ajax = new \campers\Ajax\Ajax();

if(isset($_POST['type'])) {

    switch ($_POST['type']) {

        case "":
            //Type is empty
            echo "{ \"error\": \"No type given\" }";
            break;

        case "loadAllCampers":
            //get all campers
            echo $ajax->getAllCampers();
            break;

        case "loadCampersOnDate":
            //get campers that aren't reserved on this date
            if(isset($_POST['date']) && !empty($_POST['date'])) {
                echo $ajax->loadCampersOnDate($_POST['date']);
            } else {
                echo "{ \"error\": \"No date given\" }";
            }
            break;

        case "reserveCamper":
            //insert in database
            $db->executeQuery("INSERT INTO `reservation` (`date`, `camperID`) VALUES ('" . $_POST['date'] . "', '" . $_POST['camper'] . "');");
            break;

        default:
            //Unknown type
            echo "{ \"error\": \"Unknown type\" }";
            break;

    }
} else {
    //no type given
    echo "{ \"error\": \"No type given\" }";
}