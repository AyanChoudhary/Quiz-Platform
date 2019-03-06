<?php
    session_start();
    $role = $_SESSION['sess_role'];
    $usr_id = $_SESSION['sess_user_id'];
    if(!isset($_SESSION['sess_username']) || $role != "participant")
    {
        session_destroy();
        header('Location:index.html');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Participant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="index.css">
</head>
<body>
<div class="header">

            <div class="topbar">

                <div class="nav"><a href="leaderboard.php">Leaderboard</a></div>
                
                <div class="toptext">Quiz-A-do</div>

                <div class="logout_btn">

                    <form action="logout.php">
                    <button type="submit" class="logt_btn">Logout</button>
                </form>

        </div>

        </div>

        <div class="main" id="main">
            <div class="form_fill">
                <form action="ques_submit.php" method="POST">

                <?php
                    
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

                        for ($id = 1; $id >=0; $id++)
                        {

                        $query = $link->query("SELECT * FROM Questions WHERE id = '".$id."'");
                        $result = mysqli_fetch_assoc($query);

                        if ($id == $result['id'])
                        {
                            echo '<div class="question_populate">
                                <div class="question">'.$result['id'].'. '.$result['question'].'<input type="hidden" name="id'.$id.'" value='.$result['id'].'></div>
                                <div class="options">
                                    <div class="opt1"><input type="radio" id="admin" name="optn'.$id.'" value='.$result['option1'].' checked>
                                    <label for="admin" class="rad_desc">'.$result['option1'].'</label></div>

                                    <div class="opt2"><input type="radio" id="admin" name="optn'.$id.'" value='.$result['option2'].'>
                                    <label for="admin" class="rad_desc">'.$result['option2'].'</label></div>

                                    <div class="opt3"><input type="radio" id="admin" name="optn'.$id.'" value='.$result['option3'].'>
                                    <label for="admin" class="rad_desc">'.$result['option3'].'</label></div>

                                    <div class="opt4"><input type="radio" id="admin" name="optn'.$id.'" value='.$result['option4'].'>
                                    <label for="admin" class="rad_desc">'.$result['option4'].'</label></div>
                                </div>
                                <hr>
                            </div>' ;
                        }

                        else
                        break;

                        }

                    }
                        echo'<input type="hidden" name="usr_id" value="'.$usr_id.'">';
                    ?>

                    <?php
                    
                    if ($_SESSION['sess_solved'] == 0)
                    {
                        echo '<div class="btn"><button type="submit" class="buttn"> Submit </button></div>';
                    }

                    ?>
                </form>
            </div>
        </div>
</body>
</html>