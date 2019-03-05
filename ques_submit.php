<?php
    $id = $_POST['id'];
    $answer = $_POST["'optn'.$id"];
    $points = 0;
    $usr_id = $_POST['usr_id'];

    $server = "localhost";
    $username = "root";
    $password = "ayan2510";
    $database = "Quiz";

    $link = new mysqli($server,$username,$password,$database);

    if ($link->connect_errno) {
         die("Connection Attempt Unsuccessfull");
    }

    else 
    {
        $query = $link->query("SELECT * FROM Questions WHERE id = '".$id."'");
        $result = mysqli_fetch_assoc($query);

        if ($answer === $result['answer'])
        {
            $points += $result['points'];
        }

        else 
        {
            $points += 0;
        }

        $link->query("UPDATE Users SET points = '".$points."' WHERE id = '".$usr_id ."'");
        $link->query("UPDATE Users SET solved = 1 WHERE id = '".$usr_id."'");
        header('Location: leaderboard.php');
    }

?>