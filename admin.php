<?php
    session_start();
    $role = $_SESSION['sess_role'];
    if(!isset($_SESSION['sess_username']) || $role != "admin")
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
    <title>Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="admin.css">
</head>

<body>
<div class="header">

            <div class="topbar">
                
                <div class="toptext">Quiz-A-do</div>

                <div class="logout_btn">

                    <form action="logout.php">
                    <button type="submit" class="logt_btn">Logout</button>
                </form>

            </div>

            </div>

        <div class="hello">
            Hello!! <?php echo $_SESSION['sess_name']; ?>
        </div>

    </div>
    
    <div class="main">
        <form action="question.php" method="POST">

        <div class="form">
            <div class="ques"><input type="text" placeholder="Question" class="textbox" name="ques" required autofocus></div>
            <div class="ans"><input type="text" placeholder="Answer" class="answer" name="ans" required></div>
            <div class="points"><input type="text" placeholder="Points" class="answer" name="points" required></div>
            <div class="opt1"><input type="text" placeholder="Option 1" class="optn" name="opt1" required></div>
            <div class="opt2"><input type="text" placeholder="Option 2" class="optn" name="opt2" required></div>
            <div class="opt3"><input type="text" placeholder="Option 3" class="optn" name="opt3" required></div>
            <div class="opt4"><input type="text" placeholder="Option 4" class="optn" name="opt4" required></div>

            <div class="btn"><button type="submit" class="button">Add Question</div>
        </div>

        </form>
    </div>  
        
</body>
</html>