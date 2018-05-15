<?php namespace moonconsultancy\Authentication;

/**
 * Class Register
 * @package moonconsultancy\Authentication
 */
class Register {

    private $allowFinish = true, $return = "",
        $errors = ['children'=>false, 'origin'=>false, 'medics'=>false, 'earlierHelp'=>false];
    public $sql = "", $finish = false;

    /**
     * Check if input is date valid
     *
     * @param $input
     * @return bool
     */
    private function checkDate($input)
    {

        return (checkdate(intval(substr($input,5,2)),intval(substr($input,8,2)),intval(substr($input, 0, 4))) ? true : false);
    }

    /**
     * Dynamic function to check if text is filled and under the max length.
     *
     * @param $input
     * @param $maxLength
     * @return bool
     */
    private function checkInput($input,$maxLength)
    {
//        return (isset($input) && strlen($input) <= $maxLength ? true : false);
        if(isset($input) && strlen($input) <= $maxLength) {
            return true;
        } else {
            $this->allowFinish = false;
            return false;
        }
    }

    /**
     * Checks if input is under max length and text
     *
     * @param $input
     * @param $maxLength
     * @return bool
     */
    private function checkText($input,$maxLength)
    {
        return ($this->checkInput($input,$maxLength) && preg_match("/^[a-zA-Z0-9 ,.-;\-']*$/", $input) ? true : false);
    }

    /**
     * Checks if input is under max length and ONLY text
     *
     * @param $input
     * @param $maxLength
     * @return bool
     */
    private function checkTextOnly($input, $maxLength)
    {
        return (($this->checkInput($input,$maxLength) && preg_match("/^[a-zA-Z ,.;\-'\"]*$/", $input)) ? true : false);
    }

    /**
     * Check if input is mail valid
     *
     * @param $input
     * @return bool
     */
    private function checkEmail($input)
    {
        return ((filter_var($input, FILTER_VALIDATE_EMAIL) && $this->checkInput($input,255)) ? true : false);
    }

    /**
     * Checks if input is an number
     *
     * @param $input
     * @param $maxLength
     * @return bool
     */
    private function checkNumber($input,$maxLength)
    {
        return (($this->checkInput($input,$maxLength) && preg_match("/^[0-9]*$/", $input)) ? true : false);
    }

    /**
     * Checks if input is an valid dutch ZIP code
     *
     * @param $input
     * @return bool
     */
    private function checkZip($input)
    {
        $numbers = substr($input,0,4);
        $letters = substr($input,4,2);

        return (($this->checkNumber($numbers,4) && $this->checkTextOnly($letters,2) && $this->checkInput($input,6)) ? true : false);
    }


    public function toHtmlValid($input)
    {
        if(!empty($input)) {
            return htmlentities($input, ENT_QUOTES);
        }
    }

    /**
     * Checks all data. Alot of repeatment, maybe having to change that up in an later stage
     *
     * @return string
     */
    public function checkData()
    {
        foreach ($_POST as $key => $value) {
            //required textOnly
            if ($key == 'Name'|| $key == 'CallName' ||
                $key == 'City' || $key == 'IName') {
                if(!$this->checkTextOnly($value,200 ,$key) || strlen($value) == 0) {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","' . ERROR_BORDER . '");';
                    $this->allowFinish = false;
                } else {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","solid 1px #F0F0F0");';
                }
            }

            //required text
            elseif($key == 'Street_And_Number' || $key == 'IPolisnmr') {
                if(!$this->checkText($value,200) ||  strlen($value) == 0) {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","' . ERROR_BORDER . '");';
                    $this->allowFinish = false;
                } else {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","solid 1px #F0F0F0");';
                }
            }

            //required Date
            elseif($key == 'Birthday') {
                if(!$this->checkDate($value) ||  strlen($value) == 0) {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","' . ERROR_BORDER . '");';
                    $this->allowFinish = false;
                } else {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","solid 1px #F0F0F0");';
                }
            }

            //required number
            elseif($key == 'BSN') {
                if(!$this->checkNumber($value,11) ||  strlen($value) == 0) {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","' . ERROR_BORDER . '");';
                    $this->allowFinish = false;
                } else {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","solid 1px #F0F0F0");';
                }
            }

            //required email
            elseif($key == 'Email') {
                if(!$this->checkEmail($value) ||  strlen($value) == 0) {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","' . ERROR_BORDER . '");';
                    $this->allowFinish = false;
                } else {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","solid 1px #F0F0F0");';
                }
            }

            //required ZIP
            elseif($key == 'ZIPCode') {
                if(!$this->checkZip($value) || strlen($value) == 0) {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","' . ERROR_BORDER . '");';
                    $this->allowFinish = false;
                } else {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","solid 1px #F0F0F0");';
                }
            }

            //not required textOnly
            elseif($key == 'GPName' || $key == 'Initials'  || $key == 'GPCity' || $key == 'REFName' || $key == 'REFCity' || $key == 'ICity') {
                if(!$this->checkTextOnly($value,($key == 'Initials') ?  20 : 200,$key) && strlen($value) > 0) {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","' . WARNING_BORDER . '");';
                } else {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","solid 1px #F0F0F0");';
                }
            }

            //not required text
            elseif($key == 'GPStreet_And_Number' || $key == 'REFStreet_And_Number') {
                if(!$this->checkNumber($value,($key == 'IPolisnmr' ? 11 : 200)) && strlen($value) > 0) {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","' . WARNING_BORDER . '");';
                } else {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","solid 1px #F0F0F0");';
                }
            }

            //not required date
            elseif($key == 'IDate') {
                if(!$this->checkDate($value) && strlen($value) > 0) {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","' . WARNING_BORDER . '");';
                } else {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","solid 1px #F0F0F0");';
                }
            }

            //not required number
            elseif($key == 'GPPhone' || $key == 'Phone' || $key == 'Mobile' || $key == 'REFPhone' || $key == 'DivorcedAge') {
                if(!$this->checkNumber($value,$key == 'DivorcedAge' ? 2 : 10) && strlen($value) > 0) {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","' . WARNING_BORDER . '");';
                } else {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","solid 1px #F0F0F0");';
                }
            }

            //not required ZIP
            elseif($key == 'GPZIP_Code' || $key == 'REFZIP_Code') {
                if(!$this->checkZip($value) && strlen($value) > 0) {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","' . WARNING_BORDER . '");';
                } else {
                    $this->return .= '$("[name=\'' . $key . '\']").css("border","solid 1px #F0F0F0");';
                }
            }

            //check family composition
            elseif($key == 'NameChild') {
                foreach($value as $key1 => $value1) {
                    if (!$this->checkTextOnly($value1, 200) && strlen($value1) > 0) {
                        $this->errors['children'] = true;
                    }
                }
            }
            elseif ($key == 'AgeChild') {
                foreach($value as $key1 => $value1) {
                    if(!$this->checkNumber($value1,4) && strlen($value1) > 0) {
                        $this->errors['children'] = true;
                    }
                }
            }

            //check family of origin
            elseif($key == 'familyName' || $key == 'familyJob') {
                foreach($value as $key1 => $value1) {
                    if (!$this->checkTextOnly($value1, 200) && strlen($value1) > 0) {
                        $this->errors['origin'] = true;
                    }
                }
            }
            elseif($key == 'familyAge') {
                foreach($value as $key1 => $value1) {
                    if (!$this->checkNumber($value1, 3) && strlen($value1) > 0) {
                        $this->errors['origin'] = true;
                    }
                }
            }

            //check medics
            elseif($key == 'medicsName' || $key == 'medicsAmount' || $key == 'medicsFrequency') {
                foreach($value as $key1 => $value1) {
                    if (!$this->checkText($value1, 200) && strlen($value1) > 0) {
                        $this->errors['medics'] = true;
                    }
                }
            }

            //check earlier help
            elseif($key == 'helpName' || $key == 'helpCity') {
                foreach($value as $key1 => $value1) {
                    if (!$this->checkTextOnly($value1, 200) && strlen($value1) > 0) {
                        $this->errors['earlierHelp'] = true;
                    }
                }
            }
            elseif($key == 'helpYear') {
                foreach($value as $key1 => $value1) {
                    if (!$this->checkNumber($value1, 4) && strlen($value1) > 0) {
                        $this->errors['earlierHelp'] = true;
                    }
                }
            }

            //Turn border back to normal
            else {
                $this->return .= '$("[name=\'' . $key . '\']").css("border","solid 1px #F0F0F0");';
            }
        }

        //checks radio buttons
        if(!isset($_POST['Sex'])) {
            $this->return .= '$("#sex").css("border","' . ERROR_BORDER . '");';
            $this->allowFinish = false;
        } else {
            $this->return .= '$("#sex").css("border","solid 1px #F0F0F0");';
        }

        if(!isset($_POST['BSN_Option'])) {
            $this->return .= '$("#BSN_OPT_MSG").css("border","' . ERROR_BORDER . '");';
            $this->allowFinish = false;
        } else {
            $this->return .= '$("#BSN_OPT_MSG").css("border","solid 1px #F0F0F0");';
        }

        if(!isset($_POST['Martial'])) {
            $this->return .= '$("#Martial").css("border","' . ERROR_BORDER . '");';
            $this->allowFinish = false;
        } else {
            $this->return .= '$("#Martial").css("border","solid 1px #F0F0F0");';
        }

        //checks errors for multiple input combinations
        if($this->errors['children']) {
            $this->return .= '$("#familyComp").css("border-bottom","' . WARNING_BOTTOM_BORDER . '");';
        } else {
            $this->return .= '$("#familyComp").css("border-bottom","solid 1px #D3D3D3");';
        }

        if($this->errors['origin']) {
            $this->return .= '$("#familyOrigin").css("border-bottom","' . WARNING_BOTTOM_BORDER . '");';
        } else {
            $this->return .= '$("#familyOrigin").css("border-bottom","solid 1px #D3D3D3");';
        }

        if($this->errors['medics']) {
            $this->return .= '$("#medics").css("border-bottom","' . WARNING_BOTTOM_BORDER . '");';
        } else {
            $this->return .= '$("#medics").css("border-bottom","solid 1px #D3D3D3");';
        }

        if($this->errors['earlierHelp']) {
            $this->return .= '$("#earlierHelp").css("border-bottom","' . WARNING_BOTTOM_BORDER . '");';
        } else {
            $this->return .= '$("#earlierHelp").css("border-bottom","solid 1px #D3D3D3");';
        }


        //checks if there are fields that are not allowed to be filled in, and if its all correct, it pushes to db
        if(!$this->allowFinish) {
            $this->return .= '$("#submitMessage").empty().text("Er zijn nog enkele velden niet correct ingevuld.").css("display","inline");';
            $this->return .= '$("#submitMessageSpace").css("display","block");';
        } elseif (isset($_POST['filled'])) {
            $this->return .= '$("#submitMessage").empty().css("display","none");';
            $this->return .= '$("#submitMessageSpace").css("display","none");';
            $this->finish = true;
        } else {
            $this->return .= '$("#submitMessage").empty().text("Weet u zeker dat u het zo wilt verzenden?").css("display","inline");';
            $this->return .= '$("#submitMessageSpace").css("display","block");';
        }

        return $this->return;

    }
}