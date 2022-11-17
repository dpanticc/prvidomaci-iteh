<?php

class UserInterface
{

    private $host;
    private $user;
    private $pass;
    private $db;
    private $mysqli;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = 'accounts';
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db) or die($this->mysqli->error);
        
    }

    public function login()
    {
        $email = $this->mysqli->escape_string($_POST['email']);
        $result = $this->mysqli->query("SELECT * FROM users WHERE email = '$email'");

        if($result->num_rows == 0){ //nema usera
            $_SESSION['message'] = "User with that email doesn't exist!";
            header("location: error.php");
        }
        else{ //ima usera
            $user = $result -> fetch_assoc();

            if(password_verify($_POST['password'], $user['password'])){

                $_SESSION['email'] = $user['email'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['active'] = $user['active'];

                $_SESSION['logged_in'] = true;

                header("location: homepage.php");
            }
        else{
            $_SESSION['message'] = "Wrong password, try again!";
            header("location: error.php");
            }
        }

    }
}