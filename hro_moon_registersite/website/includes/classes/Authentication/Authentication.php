<?php namespace moonconsultancy\Authentication;


class Authentication {
    private  $return = '';
    public $Authenticated = false;

    /**
     * Check login credentials and set sessions
     *
     * @return string
     */
    public function checkLogin()
    {
        if($_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD){
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];

            $link = "?" . ($_POST['prev'] == 'false' ? 'page=4' : $_POST['prev']);
            $this->return .= '<meta http-equiv="refresh" content="0; url=' . $link . '" />';
            $this->Authenticated = true;

        } else {
            $this->return .= "<script>$('#errorMsg').css('display','block');</script>";
        }

        return $this->return;
    }

    /**
     * Check session credentials and if not correct, send back to the login page
     *
     * @return string
     */
    public function  checkAuth() {
        //redirect to prev page
        $prev = "";
        foreach($_GET as $key => $value) {
            $prev .= "%26".$key."%3D".$value."";
        }
        $prev = "'" . substr($prev, 3) . "'";



        if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
            if (!$_SESSION['username'] == ADMIN_USERNAME || !$_SESSION['password'] == ADMIN_PASSWORD) {
                $this->return .= '<meta http-equiv="refresh" content="0; url=?page=3&prev=' . $prev . '" />';
            } else {
                $this->Authenticated = true;
            }
        } else {
            $this->return .= '<meta http-equiv="refresh" content="0; url=?page=3&prev=' . $prev . '" />';
        }
        return $this->return;
    }
}