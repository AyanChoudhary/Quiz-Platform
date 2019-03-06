<?php
    $usr_id = $_POST['usr_id'];
    $points = 0;

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
        for ($dum = 1; $dum >= 1; $dum++)
        {
            $id_dum = $_POST["id$dum"];
            $ans_dum = $_POST["optn$dum"];

            if ($dum == $id_dum)

            {

                $query = $link->query("SELECT * FROM Questions WHERE id = '".$id_dum."'");
                $result = mysqli_fetch_assoc($query);

                if ($ans_dum == $result['answer'])
                {
                    $points += $result['points'];
                }

                else 
                {
                    $points += 0;
                }

            }

            else
            break;

        }

        $link->query("UPDATE Users SET points = '".$points."' WHERE id = '".$usr_id ."'");
        $link->query("UPDATE Users SET solved = 1 WHERE id = '".$usr_id."'");
        header('Location: logout.php');
        
    }

?>