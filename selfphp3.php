<!DOCTYPE html>
<html lang="en">
<head>
    <title>Practice</title>
</head>
<body>
<?php 
$name = $email = $feedback = "";
$nameErr = $emailErr = $feedbackErr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"])){
            $nameErr = "No name";
        } else {
            $name = $_POST["name"];
            if(!filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
                $nameErr = "Invaild name";
            }
        }
        if(empty($_POST["email"])){
            $emailErr = "No email";
        } else {
            $email = $_POST["email"];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Invalid Email";
            }
        }
        if(empty($_POST["feedback"])){
            $feedbackErr = "No feedback";
        } else {
            $feedback = $_POST["feedback"];
        }
    }

    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        Name: <input type="text" name="name" ><span><?php echo $nameErr ?></span>
        Email: <input type="text" name="email" ><span><?php echo $emailErr ?></span>
        Feedback: <textarea name="feedback"></textarea><span><?php echo $feedbackErr ?></span>
        <input type="submit" name="submit">
    </form>

    <?php 
        echo "Your data";
        echo $name;
        echo $email;
        echo $feedback;
    ?>
</body>
</html>