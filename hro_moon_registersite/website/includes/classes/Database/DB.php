<?php namespace moonconsultancy\database;
use moonconsultancy\Mail\Mail;

/**
 * Class DB
 * @package moonconsultancy\database
 */
class DB {
    private $host, $username, $password, $db_name, $pdoClass, $pdo;

    /**
     * @param $host
     * @param $username
     * @param $password
     * @param $db_name
     */
    public function __construct($host, $username, $password, $db_name)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
        $this->pdo = $this->getPDOInstance();
    }

    /**
     * @return \PDO
     * @throws \Exception
     */
    public function getPDOInstance()
    {
        try {
            $this->pdoClass = new \PDO("mysql:dbname=$this->db_name;host=$this->host", $this->username, $this->password);
            $this->pdoClass->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $this->pdoClass;
        } catch (\PDOException $e) {
            throw new \Exception("DB Connect failed: " . $e->getMessage());
        }

    }

    /**
     * Executes the query without giving values back
     *
     * @param $query
     * @return bool
     * @throws \Exception
     */
    public function executeQuery($query)
    {
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            return true;
        } catch (\PDOException $e) {
            throw new \Exception("DB insert failed: " . $e->getMessage());
        }
    }

    /**
     * insert a query and receive something from it
     *
     * @param $query
     * @return array
     * @throws \Exception
     */
    public function receiveQuery($query)
    {
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (\PDOException $e) {
            throw new \Exception("DB insert failed: " . $e->getMessage());
        }
    }

    /**
     * Get the last registered ID for registration purposes
     *
     * @return string
     * @throws \Exception
     */
    private function getLastId()
    {
        try {
            return $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            throw new \Exception("DB insert failed: " . $e->getMessage());
        }
    }

    /**
     * Registers person into db
     *
     * @param $register
     * @throws \Exception
     */
    public function clientRegister($register)
    {
        $sql = "INSERT INTO `Clients` (`Name`," .
            "`Initals`, " .
            "`CallName`, " .
            "`Sex`, " .
            "`Street_And_Number`, " .
            "`ZIP_Code`, " .
            "`City`, " .
            "`Birthday`, " .
            "`Phone`, " .
            "`Mobile`, " .
            "`Email`, " .
            "`BSN_Option`, " .
            "`BSN`, " .
            "`Martial`, " .
            "`IP`, " .
            "`GPName`, " .
            "`GPStreet_And_Number`, " .
            "`GPZIP_Code`, " .
            "`GPCity`, " .
            "`GPPhone`, " .
            "`REFName`, " .
            "`REFStreet_And_Number`, " .
            "`REFZIP_Code`, " .
            "`REFCity`, " .
            "`REFPhone`, " .
            "`IName`, " .
            "`ICity`, " .
            "`IDate`, " .
            "`IPolisnmr`, " .
            "`IPolis`, " .
            "`Children`, " .
            "`SBasis`, " .
            "`SLagerBijzonderVormend`, " .
            "`SLagerBeroeps`, " .
            "`SMiddelbaarVoortgezet`, " .
            "`SMiddelbaarBeroeps`, " .
            "`SHogerVoortgezet`, " .
            "`SHogerBeroeps`, " .
            "`SVoorbereidendWetenschappelijk`, " .
            "`SWetenschappelijk`, " .
            "`CurrentStudy`, " .
            "`CurrentJob`, " .
            "`Sickness`, " .
            "`SicknessExpl`, " .
            "`Divorced`, " .
            "`DivorcedAge`, " .
            "`SocialContacts`, " .
            "`FreeTimeExpl`, " .
            "`BelieveExpl`, " .
            "`Medics`, " .
            "`SUAlcohol`, " .
            "`SUAlcoholExpl`, " .
            "`SUDrugs`, " .
            "`SUDrugsExpl`, " .
            "`SUTabacco`, " .
            "`SUTabaccoExpl`, " .
            "`SUGamble`, " .
            "`SUGambleExpl`, " .
            "`SUCoffee`, " .
            "`SUCoffeeExpl`, " .
            "`SUInternetComputer`, " .
            "`SUInternetComputerExpl`, " .
            "`SUOther`, " .
            "`SUOtherExpl`, " .
            "`SUProblematic`, " .
            "`EarlierHelp`, " .
            "`RERelation`, " .
            "`REFamily`, " .
            "`REContOthers`, " .
            "`REChildren`, " .
            "`REWorkStudy`, " .
            "`RESadness`, " .
            "`REAgression`, " .
            "`REPsychStressed`, " .
            "`REPhysStressed`, " .
            "`REUncertain`, " .
            "`REForced`, " .
            "`REScared`, " .
            "`REMourning`, " .
            "`RESex`, " .
            "`RESleep`, " .
            "`REIllusions`, " .
            "`REThinkSuicide`, " .
            "`REActionSuicide`, " .
            "`REEating`, " .
            "`RELawbreaking`, " .
            "`REOther`, " .
            "`PhysicalComplaints`, " .
            "`PhysicalComplaintsExpl`, " .
            "`Complaints`, " .
            "`WhatToChange`, " .
            "`WhatIsGood`, " .
            "`DeclarationGP`) " .
            "VALUES ('".$register->toHtmlValid($_POST['Name'])."'," .
            " '".$register->toHtmlValid($_POST['Initials'])."'," .
            " '".$register->toHtmlValid($_POST['CallName'])."'," .
            " '".($_POST['Sex'] == 'Male' ? 1 : 0)."'," .
            " '".$register->toHtmlValid($_POST['Street_And_Number'])."'," .
            " '".$register->toHtmlValid($_POST['ZIPCode'])."'," .
            " '".$register->toHtmlValid($_POST['City'])."'," .
            " '".$register->toHtmlValid($_POST['Birthday'])."'," .
            " '".$register->toHtmlValid($_POST['Phone'])."'," .
            " '".$register->toHtmlValid($_POST['Mobile'])."'," .
            " '".$register->toHtmlValid($_POST['Email'])."'," .
            " '".$register->toHtmlValid($_POST['BSN_Option'])."'," .
            " '".$register->toHtmlValid($_POST['BSN'])."'," .
            " '".$register->toHtmlValid($_POST['Martial'])."'," .
            " '".$_SERVER['REMOTE_ADDR']."'," .
            " '".$register->toHtmlValid($_POST['GPName'])."'," .
            " '".$register->toHtmlValid($_POST['GPStreet_And_Number'])."'," .
            " '".$register->toHtmlValid($_POST['GPZIP_Code'])."'," .
            " '".$register->toHtmlValid($_POST['GPCity'])."'," .
            " '".$register->toHtmlValid($_POST['GPPhone'])."'," .
            " '".$register->toHtmlValid($_POST['REFName'])."'," .
            " '".$register->toHtmlValid($_POST['REFStreet_And_Number'])."'," .
            " '".$register->toHtmlValid($_POST['REFZIP_Code'])."'," .
            " '".$register->toHtmlValid($_POST['REFCity'])."'," .
            " '".$register->toHtmlValid($_POST['REFPhone'])."'," .
            " '".$register->toHtmlValid($_POST['IName'])."'," .
            " '".$register->toHtmlValid($_POST['ICity'])."'," .
            " '".$register->toHtmlValid($_POST['IDate'])."'," .
            " '".$register->toHtmlValid($_POST['IPolisnmr'])."'," .
            " '".(isset($_POST['IPolis']) ? 1 : 0)."'," .
            " '".(isset($_POST['Children']) ? 1 : 0)."'," .
            " '".(isset($_POST['SBasis']) ? 1 : 0)."'," .
            " '".(isset($_POST['SLagerBijzonderVormend']) ? 1 : 0)."'," .
            " '".(isset($_POST['SLagerBeroeps']) ? 1 : 0)."'," .
            " '".(isset($_POST['SMiddelbaarVoortgezet']) ? 1 : 0)."'," .
            " '".(isset($_POST['SMiddelbaarBeroeps']) ? 1 : 0)."'," .
            " '".(isset($_POST['SHogerVoortgezet']) ? 1 : 0)."'," .
            " '".(isset($_POST['SHogerBeroeps']) ? 1 : 0)."'," .
            " '".(isset($_POST['SVoorbereidendWetenschappelijk']) ? 1 : 0)."'," .
            " '".(isset($_POST['SWetenschappelijk']) ? 1 : 0)."'," .
            " '".$register->toHtmlValid($_POST['CurrentStudy'])."'," .
            " '".$register->toHtmlValid($_POST['CurrentJob'])."'," .
            " '".(isset($_POST['Sickness']) ? 1 : 0)."'," .
            " '".$register->toHtmlValid($_POST['SicknessExpl'])."'," .
            " '".(isset($_POST['Divorced']) ? 1 : 0)."'," .
            " '".$register->toHtmlValid($_POST['DivorcedAge'])."'," .
            " '".$register->toHtmlValid($_POST['SocialContacts'])."'," .
            " '".$register->toHtmlValid($_POST['FreeTimeExpl'])."'," .
            " '".$register->toHtmlValid($_POST['BelieveExpl'])."'," .
            " '".(isset($_POST['Medics']) ? 1 : 0)."'," .
            " '".(isset($_POST['SUAlcohol']) ? 1 : 0)."'," .
            " '".$register->toHtmlValid($_POST['SUAlcoholExpl'])."'," .
            " '".(isset($_POST['SUDrugs']) ? 1 : 0)."'," .
            " '".$register->toHtmlValid($_POST['SUDrugsExpl'])."'," .
            " '".(isset($_POST['SUTabacco']) ? 1 : 0)."'," .
            " '".$register->toHtmlValid($_POST['SUTabaccoExpl'])."'," .
            " '".(isset($_POST['SUGamble']) ? 1 : 0)."'," .
            " '".$register->toHtmlValid($_POST['SUGambleExpl'])."'," .
            " '".(isset($_POST['SUCoffee']) ? 1 : 0)."'," .
            " '".$register->toHtmlValid($_POST['SUCoffeeExpl'])."'," .
            " '".(isset($_POST['SUInternetComputer']) ? 1 : 0)."'," .
            " '".$register->toHtmlValid($_POST['SUInternetComputerExpl'])."'," .
            " '".(isset($_POST['SUOther']) ? 1 : 0)."'," .
            " '".$register->toHtmlValid($_POST['SUOtherExpl'])."'," .
            " '".(isset($_POST['SUProblematic']) ? 1 : 0)."'," .
            " '".(isset($_POST['EarlierHelp']) ? 1 : 0)."'," .
            " '".(isset($_POST['RERelation']) ? 1 : 0)."'," .
            " '".(isset($_POST['REFamily']) ? 1 : 0)."'," .
            " '".(isset($_POST['REContOthers']) ? 1 : 0)."'," .
            " '".(isset($_POST['REChildren']) ? 1 : 0)."'," .
            " '".(isset($_POST['REWorkStudy']) ? 1 : 0)."'," .
            " '".(isset($_POST['RESadness']) ? 1 : 0)."'," .
            " '".(isset($_POST['REAgression']) ? 1 : 0)."'," .
            " '".(isset($_POST['REPsychStressed']) ? 1 : 0)."'," .
            " '".(isset($_POST['REPhysStressed']) ? 1 : 0)."'," .
            " '".(isset($_POST['REUncertain']) ? 1 : 0)."'," .
            " '".(isset($_POST['REForced']) ? 1 : 0)."'," .
            " '".(isset($_POST['REScared']) ? 1 : 0)."'," .
            " '".(isset($_POST['REMourning']) ? 1 : 0)."'," .
            "'".(isset($_POST['RESex']) ? 1 : 0)."'," .
            "'".(isset($_POST['RESleep']) ? 1 : 0)."'," .
            "'".(isset($_POST['REIllusions']) ? 1 : 0)."'," .
            "'".(isset($_POST['REThinkSuicide']) ? 1 : 0)."'," .
            "'".(isset($_POST['REActionSuicide']) ? 1 : 0)."'," .
            "'".(isset($_POST['REEating']) ? 1 : 0)."'," .
            "'".(isset($_POST['RELawBreaking']) ? 1 : 0)."'," .
            "'".(isset($_POST['REOther']) ? 1 : 0)."'," .
            "'".(isset($_POST['PhysicalComplaints']) ? 1 : 0)."'," .
            "'".$register->toHtmlValid($_POST['PhysicalComplaintsExpl'])."'," .
            "'".$register->toHtmlValid($_POST['Complaints'])."'," .
            "'".$register->toHtmlValid($_POST['WhatToChange'])."'," .
            "'".$register->toHtmlValid($_POST['WhatIsGood'])."'," .
            "'".(isset($_POST['DeclarationGP']) ? 1 : 0)."');";
        $this->executeQuery($sql);

        //set ID for later usage
        $id = $this->getLastId();
        $_SESSION['personID'] = $id;

        //insert children
        if(!empty($_POST['NameChild']) || !empty($_POST['AgeChild']) || isset($_POST['NameChild']) || isset($_POST['AgeChild'])) {
            $i = 0;
            $sql = "INSERT INTO `Childeren` (`clientID`, `Name`, `Age`) VALUES ";
            foreach($_POST['NameChild'] as $name) {
                if($i > 0) {
                    $sql .= ", ";
                }
                $sql .= "('" . $id . "','" . (!empty($name) ? $name : 9999) . "','" . (!empty($_POST['AgeChild'][$i]) ? $_POST['AgeChild'][$i] : 9999) . "')";
                $i++;
            }
            $sql .= ";";
            $this->executeQuery($sql);
        }

        //insert family
        if(!empty($_POST['familyPerson']) || isset($_POST['familyPerson'])) {
            $i = 0;
            $sql = "INSERT INTO `Family` (`ClientID`, `Person`, `Name`, `Age`, `JobStudy`) VALUES ";
            foreach($_POST['familyPerson'] as $person) {
                if($i > 0) {
                    $sql .= ", ";
                }
                $sql .= "('" . $id . "', '" . $person . "', '" . (!empty($_POST['familyName'][$i]) ? $_POST['familyName'][$i] : 999) . "', '" . (!empty($_POST['familyAge'][$i]) ? $_POST['familyAge'][$i] : 999) . "', '" . (!empty($_POST['familyJob'][$i]) ? $_POST['familyJob'][$i] : 999) . "')";
                $i++;
            }
            $sql .= ";";
            $this->executeQuery($sql);
        }

        //insert medics
        if(!empty($_POST['medicsName']) || isset($_POST['medicsName']) || !empty($_POST['medicsAmount']) || isset($_POST['medicsAmount']) || !empty($_POST['medicsFrequency']) || isset($_POST['medicsFrequency'])) {
            $i = 0;
            $sql = "INSERT INTO `Medics` (`ClientID`, `Name`, `Amount`, `Frequency`) VALUES ";
            foreach($_POST['medicsName'] as $name) {
                if($i > 0) {
                    $sql .= ", ";
                }
                $sql .= "('" . $id . "', '" . (!empty($name) ? $name : 9999) . "', '" . (!empty($_POST['medicsAmount'][$i]) ? $_POST['medicsAmount'][$i] : 999) . "', '" . (!empty($_POST['medicsFrequency'][$i]) ? $_POST['medicsFrequency'][$i] : 999) . "')";
                $i++;
            }
            $sql .= ";";
            $this->executeQuery($sql);
        }

        //insert prev help
        if(!empty($_POST['helpName']) || isset($_POST['helpName']) || !empty($_POST['helpCity']) || isset($_POST['helpCity']) || !empty($_POST['helpYear']) || isset($_POST['helpYear'])) {
            $i = 0;
            $sql = "INSERT INTO `PrevHelp` (`ClientID`, `Name`, `City`, `Year`) VALUES ";
            foreach($_POST['helpName'] as $name) {
                if($i > 0) {
                    $sql .= ", ";
                }
                $sql .= "('" . $id . "', '" . (!empty($name) ? $name : 9999) . "', '" . (!empty($_POST['helpCity'][$i]) ? $_POST['helpCity'][$i] : 999) . "', '" . (!empty($_POST['helpYear'][$i]) ? $_POST['helpYear'][$i] : 999) . "')";
                $i++;
            }
            $sql .= ";";
            $this->executeQuery($sql);
        }
    }

    /**
     * Add appointments
     */
    public function addAppointment()
    {
        $i = 0;
        $sql = "INSERT INTO `appointment` (`clientID`, `day`, `dayPart`) VALUES ";
        foreach($_POST['day'] as $day) {
            if($i > 0) {
                $sql .= ", ";
            }
            $sql .= "('" . $_SESSION['personID'] . "', '" . $day . "', '" . $_POST['dayPart'][$i] . "')";
            $i++;
        }
        $sql .= ";";
        $this->executeQuery($sql);
    }

    public function insertTags()
    {
        foreach($_POST['Tags'] as $tagID) {
            $sql = "INSERT INTO `ClientToTag` (`ClientID`, `TagID`) VALUES ('" . $_SESSION['personID'] . "', '" . $tagID . "');";
            $this->executeQuery($sql);
        }
    }

}