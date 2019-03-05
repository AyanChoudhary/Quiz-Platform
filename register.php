<?php
    $acc_type = $_GET["acc_type"];
    $user = $_GET["usr"];
    $pass = $_GET["psw"];
    $conf_pass = $_GET["conf_psw"];
    $name = $_GET["name"];

    $server = "localhost";
    $username = "root";
    $password = "ayan2510";
    $database = "Quiz";

    $link = new mysqli($server,$username,$password,$database);

    if ($link->connect_errno) {
        die("Connection Attempt Unsuccessfull");
    }

    else {

        if($pass === $conf_pass) {
            $id = 1;

            if($acc_type == "admin") {

                for ($id = 1; $id >= 0; $id ++){
                    
                    $result = $link->query("SELECT * FROM `Admin` WHERE id = '".$id."'");
                    $result1 = mysqli_fetch_assoc($result);

                    if ($user == $result1['username'])
                    {
                        $message = "Username exists";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        header('Location: index.html');
                    }

                    if ($result1 === NULL)
                    break;
                }

                $link->query("INSERT INTO `Admin`(`id`, `username`, `password`, `name`) VALUES ('".$id."', '".$user."', '".$pass."', '".$name."')");
            } 
            
            else if($acc_type == "participant")
            {
                for ($id = 1; $id >= 0; $id ++){
                    
                    $result = $link->query("SELECT * FROM `Users` WHERE id = '".$id."'");
                    $result1 = mysqli_fetch_assoc($result);
                    if ($result1 === NULL)
                    break;
                }

                $link->query("INSERT INTO `Users`(`id`, `points`, `username`, `password`, `solved`, `name`) VALUES ('".$id."', '0', '".$user."', '".$pass."', '0', '".$name."')");
            }

            header('Location: index.html');
        }

        else
        echo "Passwords don't match";

        }