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
            $nameErr = "Name required";
        } else {
            $name = $_POST["name"];
            if(!filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
                $nameErr = "Invaild Name";
            }
        }
        if(empty($_POST["email"])){
            $emailErr = "Email Required";
        } else {
            $email = $_POST["email"];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid input";
            }
        }
    
        if(empty($_POST["feedback"])){
            $nameErr = "Feedback required";
        } else {
            $feedback = $_POST["feedback"];
        }
    }
    ?>
    <h1>Form</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        Name: <input type="text" name="name"><span><?php echo $nameErr ?></span>
        Email: <input type="text" name="email"><?php echo $emailErr ?></span>
        Feedback: <input type="text" name="feedback"><?php echo $feedbackErr ?></span>
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