<!DOCTYPE html>
<html lang="en">
<head>
    <title>Final Form</title>
</head>
<body>
<?php 
session_start();
?>
<?php 
$name = $email = $feedback = "";
$nameErr = $emailErr = $feedbackErr = "";
$cook = "cook";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $nameErr = "Name required";
    } else {
        $name = $_POST["name"];
        if(!filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
            $nameErr = "Invalid name";
        }
    }
    if(empty($_POST["email"])){
        $emailErr = "email required";
    } else {
        $email = $_POST["email"];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
             $emailErr = "Invalid email";
        }
    }
    if(empty($_POST["feedback"])){
        $feedbackErr = "feedback required";
    } else {
        $feedback = $_POST["feedback"];
    }
}
    ?>
    <h1>Final Form Practice</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    Name: <input type="text" name="name"><span><?php echo $nameErr ?></span>
    Email: <input type="text" name="email"><span><?php echo $emailErr ?></span>
    Feedback: <input type="text" name="feedback"><span><?php echo $feedbackErr ?></span>
    <input type="submit" name="submit">
    </form>
    <?php echo "Your Data:";
    echo $name;
    echo $email;
    echo $feedback;
    ?>

    <?php 
        setcookie($cook, $name, time()+ 3600, "/" );
    ?>

    <?php 
        if(!isset($_COOKIE["name_user"])){
            echo "Cookie named name_user is not set";
        } else {
            echo "Cookie name user_name is set";
            echo "Value =>" . $_COOKIE[$cook];
        }
    ?>

    <?php 
        $_SESSION["fav color"] = "BLue";
        $_SESSION["fav animal"] = "Dog";
        echo "Session is set";
    ?>

    <?php
        echo $_SESSION["fav color"];
        echo $_SESSION["fav animal"];
    ?>

</body>
</html>