<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form practice</title>
</head>
<body>
<?php
$name = $email = $feedback = "";
$nameErr = $emailErr = $feedbackErr = "";
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     if(empty($_POST["name"])){
//         $nameErr = "Name required";
//     } else {
//         $name = $_POST["name"];
//     }

// }


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
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if(empty($_POST["feedback"])){
        $nameErr = "Feedback required";
    } else {
        $feedback = $_POST["feedback"];
    }
}
?>
    <h1>Form Practise</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" >
        Name: <input type="text" name="name"><span><?php echo $nameErr ?></span>
        Email: <input type="text" name="email"><span><?php echo $emailErr ?></span>
        Feedback: <textarea type="text" name="feedback"></textarea>
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