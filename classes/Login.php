<?php

class Login {

    private $email;
    private $password;

    function login() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            session_start();
            if($_POST['username'] == $this->email and $_POST['password'] == $this->password) {
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['username'] = $this->email;
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