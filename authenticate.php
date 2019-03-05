<?php
$user = $_GET["usr"];
$pass = $_GET["psw"];
$role = $_GET["acc_type"];

$server = "localhost";
$username = "root";
$password = "ayan2510";
$database = "Quiz";

$link = new mysqli($server,$username,$password,$database);

if ($link->connect_errno) {
    die("Connection Attempt Unsuccessfull");
}

else {

    if ($role === "participant")
    {
        $result1 = $link->query("SELECT * FROM Users WHERE username = '".$user."'");
        $usr1 = mysqli_fetch_assoc($result1);
        $result2 = $link->query("SELECT * FROM Users WHERE password = '".$pass."'");
        $pass1 = mysqli_fetch_assoc($result2);

        if ($usr1["username"] === $user) {
                
                if ($usr1["password"] === $pass1["password"])
                {
                    session_start();
                    session_regenerate_id();
                    $_SESSION['sess_user_id'] = $usr1['id'];
                    $_SESSION['sess_username'] = $usr1['username'];
                    $_SESSION['sess_solved'] = $usr1['solved'];
                    $_SESSION['sess_name'] = $usr1['name'];
                    $_SESSION['sess_role'] = $role;

                    header('Location: participant.php');
                }

                else
                echo "Username and password does not match.";
            }

        else 
        echo "User does not exist.";
    }

    else
    {
        $result1 = $link->query("SELECT * FROM Admin WHERE username = '".$user."'");
        $usr1 = mysqli_fetch_assoc($result1);
        $result2 = $link->query("SELECT * FROM Admin WHERE password = '".$pass."'");
        $pass1 = mysqli_fetch_assoc($result2);

        if ($usr1["username"] === $user) {
                
            if ($usr1["password"] === $pass1["password"])
            {
                session_start();
                $_SESSION['sess_user_id'] = $usr1['id'];
                $_SESSION['sess_username'] = $usr1['username'];
                $_SESSION['sess_name'] = $usr1['name'];
                $_SESSION['sess_role'] = $role;

                header('Location: admin.php');
            }

            else
            echo "Username and password does not match.";
        }

    else 
    echo "User does not exist.";
    }
        
}
?>