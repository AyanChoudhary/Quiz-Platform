<?php
    $server = "localhost";
    $username = "root";
    $password = "ayan2510";
    $database = "Quiz";

    $link = new mysqli($server,$username,$password,$database);

    if ($link->connect_errno) {
         die("Connection Attempt Unsuccessfull");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Leaderboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="index.css">
</head>

<body>

        <div class="header">
            <div class="topbar">
                
                <div class="nav"><a href="participant.php">Questions</a></div>

                <div class="toptext">Quiz-A-do</div>

                <div class="logout_btn">

                    <form action="logout.php">
                    <button type="submit" class="logt_btn">Logout</button>
                </form>

        </div>

        </div>

        <div class="main">

        <div class="hold">

        <div class="rank_1">#Rank</div>
        <div class="user_1">User</div>
        <div class="pts_1">Points</div>

        </div>

        <table>

        <?php

        $rank = 1;
        
                $result = $link->query("SELECT * FROM Users ORDER BY points DESC");
                $result1 = mysqli_fetch_assoc($result);
                $points = $result1['points'];
                $row = $rank+1;

                for ($id = 1; $id >=0; $id ++)
                {
            
                echo '
                    <tr>
                        <td class="start">'.$rank.'</td>
                        <td>'.$result1['username'].'</td>
                        <td class="end">'.$result1['points'].'</td>
                    </tr>';

                    $result = $link->query("SELECT * FROM Users WHERE points < '".$points."' ORDER BY points DESC");
                    $result1 = mysqli_fetch_assoc($result);
                    $points = $result1['points'];
                    $rank++;

                    if ($result1 === NULL)
                    break;
                }
        ?>

        </table>

        </div>

        
</body>
</html>