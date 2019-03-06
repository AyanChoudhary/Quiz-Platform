<?php
    $points = $_POST['points'];
    $question = $_POST['ques'];
    $answer = $_POST['ans'];
    $option1 = $_POST['opt1'];
    $option2 = $_POST['opt2'];
    $option3 = $_POST['opt3'];
    $option4 = $_POST['opt4'];


    $server = "localhost";
    $username = "root";
    $password = "ayan2510";
    $database = "Quiz";

    $link = new mysqli($server,$username,$password,$database);

    if ($link->connect_errno) 
    {
        die("Connection Attempt Unsuccessfull");
    }

    else 
    {
        $id = 1;

        for ($id = 1; $id >= 0; $id ++){
                    
            $result = $link->query("SELECT * FROM Questions WHERE id = '".$id."'");
            $result1 = mysqli_fetch_assoc($result);
            if ($result1 === NULL)
            break;
        }

        $ques = "INSERT INTO Questions (id, points, question, answer, option1, option2, option3, option4) 
        VALUES ('".$id."', '".$points."', '".$question."', '".$answer."', '".$option1."', '".$option2."', '".$option3."', '".$option4."')";

        $link->query($ques);

        header('Location: admin.php');
    }