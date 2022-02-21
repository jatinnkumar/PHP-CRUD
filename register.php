<?php
session_start();
include "conn.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users where email='$email'";

    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        echo "Email '$email' already exists.";
    } else {
        $rolde = 0;
        $query = "insert into users
        (first_name, last_name, email, password, role)
        values ('$firstName', '$lastName', '$email','$password','$role')";
        mysqli_query($conn, $query);
        header("Location: login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .col1 {
            float: left;
            height: 400px;
            width: 30%;
        }

        .col2 {
            float: left;
            width: 40%;
            border: 2px solid black;
            border-radius: 5px;
            height: 400px;
            text-align: center;
        }

        .col3 {
            float: left;
            height: 400px;
            width: 30%;
            text-align : center;
        }

        .error {
            color: red;
        }
        #login {
            text-decoration:none;
            border:1px solid black;
            border-radius:4px;
            color:black;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
    <script>
        $().ready(function() {
            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-z]+$/i.test(value);
            }, "Letters only please");
            $("#submit_form").validate({
                // in 'rules' user have to specify all the constraints for respective fields
                rules: {
                    firstName: {
                        required: true,
                        lettersonly: true
                    },
                    lastName: {
                        required: true,
                        lettersonly: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    confirmPassword: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password" //for checking both passwords are same or not
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    agree: "required"
                },
                // in 'messages' user have to specify message as per rules
                messages: {
                    firstName: {
                        required: "Please enter your firstname",
                        lettersonly: "Please enter only alphabets"
                    },
                    lastName: {
                        required: "Please enter your lastname",
                        lettersonly: "Please enter only alphabets"
                    },
                    password: {
                        required: "Please enter a password",
                        minlength: "Your password must be consist of at least 8 characters"
                    },
                    confirmPassword: {
                        required: "Please enter a password",
                        minlength: "Your password must be consist of at least 8 characters",
                        equalTo: "Please enter the same password as above"
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
            <h2>Registration Form</h2><br>
            <form id="submit_form" method="post" action="">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName"><br><br>
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName"><br><br>
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email"><br><br>
                <label for="password">Password:</label>
                <input type="text" id="password" name="password"><br><br>
                <label for="confirmPassword">Confirm Password:</label>
                <input type="text" id="confirmPassword" name="confirmPassword"><br><br>
                <input type="submit" name="submit">
            </form>
        </div>
        <div class="col3">
             <a href="login.php" id="login" name="login">Login</a>
        </div>
    </div>
</body>
</html>
