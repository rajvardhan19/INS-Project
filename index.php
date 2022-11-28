<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php session_start(); ?>
    <?php
    $name = $email = $feedback = "";
    $nameErr = $emailErr = $feedbackErr = "";
    $cook = "hello";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"])){
            $nameErr = "Name Required";
        } else {
            $name = $_POST["name"];
            if(!filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
                $nameErr = "Invalid Name";
            }
        }
        if(empty($_POST["email"])){
            $emailErr = "Email Required";
        } else {
            $email = $_POST["email"];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "invalid Email";
            }
        }
        if(empty($_POST["feedback"])){
            $feedbackErr = "Feedback Required";
        } else {
            $feedback = $_POST["feedback"];
        }
    }
    ?>
    <h1>form</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        Name: <input type="text" name="name"><span><?php echo $nameErr?></span>
        Email: <input type="text" name="email"><span><?php echo $emailErr?></span>
        Feedback: <textarea type="text" name="feedback"></textarea><span><?php echo $feedbackErr?></span>
        <input type="submit" name="submit">
    </form>
    <?php 
    echo "Your data:";
    echo "<br><br>";
    echo $name;
    echo $email;
    echo $feedback;
    ?>
    <?php 
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    ?>

    <?php 
    echo $_SESSION["name"]; 
    echo $_SESSION["email"]; 
    ?>

    <?php
        setcookie($cook, $name, time() + 3600);
        if(isset($_COOKIE[$cook])){
            echo "cookie is set";
            echo "Value" . $_COOKIE[$cook];
        } else {
            echo "cookie not set";
        }
    ?>
    
</body>
</html>