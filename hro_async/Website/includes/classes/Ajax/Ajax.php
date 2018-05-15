<?php

namespace Ajax;

class Ajax {
    private $api, $apiObject, $db;

    /**
     * Setup basic data
     */
    public function __construct()
    {
        $this->api = file_get_contents("http://docent.cmi.hr.nl/moora/imp03/api-2015/campers");
        $this->apiObject = json_decode($this->api);

        global $db;
        $this->db = $db;
    }

    /**
     * Get all campers from api
     *
     * @return string
     */
    public function getAllCampers()
    {
        $array = array();
        foreach($this->apiObject as $camper) {
            $camper->show = 'block';
            array_push($array, $camper);
        }
        return json_encode($array);
    }

    /**
     * Filter campers based on the date
     *
     * @param $date
     * @return string
     * @throws \Exception
     */
    public function loadCampersOnDate($date)
    {
        //create array
        $allowedCampers = array();
        //set date format the same as api date
        $parsedDate = intval(substr($date, 0, 4) . substr($date, 5, 2) . substr($date, 8, 2));

        //check for api reservations
        $i = 0;
        foreach ($this->apiObject as $camper){
            if($camper->datesHired == false) {
                array_push($allowedCampers, $i);
            } else {
                if(!in_array($parsedDate, $camper->datesHired)) {
                    array_push($allowedCampers, $i);
                }
            }

            $i++;
        }

        //get reservations from database
        $databaseReservations = $this->db->getAsArray("SELECT `camperID` FROM `reservation` WHERE `date` = '" . $date . "'");
        $dbReservations = array();
        foreach($databaseReservations as $databaseReservation) {
            array_push($dbReservations, $databaseReservation['camperID']);
        }

        //compare database vs api
        $allowedCampers = array_diff($allowedCampers, $dbReservations);

        //create json
        $json = "[";
        $i = 0;

        foreach ($this->apiObject as $camper) {

            $camper->show = "none";
            if(in_array($i, $allowedCampers)) {
                $camper->show = "block";
            }

            //write json
            if($i != 0) {
                $json .= ",";
            }
            $json .= json_encode($camper);
            $i++;
        }

        $json .= "]";

        return $json;
    }
}