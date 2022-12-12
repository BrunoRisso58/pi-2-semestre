<?php

class Login {

    private $email;
    private $password;

    function login($email, $password) {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            session_start();
            if($email == $this->email and $password == $this->password) {
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['email'] = $this->email;
            } else {
                $_SESSION['loggedin'] = FALSE;
            }
        }
    }

    function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location: index.php");
        exit;
    }

    function verifyLogin() {
        session_start();
        if ($_SESSION['loggedin'] == FALSE) {
            header("location: index.php");
        }
    }

}

?>