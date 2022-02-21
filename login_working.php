<?php
session_start();
include "conn.php";

if(isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "select * from users where email='$email'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        echo "Email does not exist. Please Register First.";
        die();
    }

    $userData = mysqli_fetch_assoc($result);
    if ($userData['password'] != $password) {
        echo "Wrong Password, Try again...";
        die();
    }
    
    $_SESSION['email'] = $userData['email'];
    header("Location: dashboard.php");

    if(isset($_POST['remember_me'])) {
        setcookie('email', $userData['email'], time() + 30*24*60*60);
        setcookie('password', $userData['password'], time() + 30*24*60*60);
    } else {
        setcookie('email', null, -1);
        setcookie('password', null, -1);
    }
}

$email = '';
$password = '';

if(isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
}

if(isset($_COOKIE['password'])) {
    $password = $_COOKIE['password'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            box-sizing:border-box;
        }
        .row:after{
            content:"";
            display:table;
            clear:both;
        }
        .col1{
            float:left;
            width:25%;
            height:300px;
        }
        .col2{
            float:left;
            width:50%;
            height:300px;
            text-align:center;
            border:2px solid black;
            border-radius:5px;
        }
        .col3{
            float:left;
            width:25%;
            height:300px;
        }
        input[type=text]:hover{
            color:grey;
        }
        #a{
           text-decoration:none;
           border:1px solid black;
           color:black;
           border-radius:2px;
           padding:1px;
        }
        .error{
            color:red;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $().ready(function() {
            $("#login").validate({
                // in 'rules' user have to specify all the constraints for respective fields
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                     password: {
                        required: true,
                        minlength: 8
                    },
                    agree: "required"
                },
                // in 'messages' user have to specify message as per rules
                messages: {
                    password: {
                        required: "Please enter a password",
                        minlength: "Your password must be consist of at least 8 characters"
                    },
                    agree: "Please accept our policy"
                }
            });
        });
    </script>
</head>
<body>
    <div class="row">
        <div class="col1"></div>
        <div class="col2">
            <h2>Log In</h2>
            <form id="login" method="post" action="">
                <label for="email">E-mail:</label>
                <input type="text" id="email" value="<?php echo $email?>"name="email"><br><br>
                <label for="password">Password:</label>
                <input type="text" id="password" value="<?php echo $password?>" name="password"><br><br>
                <input type="submit" name="login" value="Login">
                <input type="checkbox" id="remember_me" name="remember_me"  <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?> />
                <label for="remember_me">Remember Me</label><br>
                <a href="register.php" id="register">Register</a>
            </form>
        </div>
        <div class="col3"></div>
    </div>
</body>
</html>
