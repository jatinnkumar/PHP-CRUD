<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing : border-box;
        }
        .row:after {
            display : table;
            content : " ";
            clear : both;
        }
        .col1 {
            float : left;
            width : 20%;
            height : 400px;
        }
        .col2 {
            float : left;
            width : 60%;
            height : 400px;
            border : 1px solid black;
            border-radius : 4px;
            text-align : center;
        }
        .col3 {
            float : left;
            width : 20%;
            height : 400px;
            text-align : center;
        }
         #logout {
            text-decoration:none;
            border:1px solid black;
            border-radius:4px;
            color:black;
        }
         #dashboard {
            text-decoration:none;
            border:1px solid black;
            border-radius:4px;
            color:black;
        }
    </style>
</head>
<body>
    <div class ="row">
        <div class ="col1"></div>
        <div class ="col2">
            <h2>My Account</h2>
            <form method ="post" action = "">
                <label>First name :</label>
                <input type ="text" id ="first_name" name ="first_name" value = ""><br><br>
                <label>Last name:</label>
                <input type ="text" id ="last_name" name ="last_name" value =""><br><br> 
                <label>Email:</label>
                <input type ="email" id ="email" name ="email" value =""><br><br>
                <label>City:</label>
                <input type ="text" id ="city" name ="city" value =""><br><br>
                <label>State</label>
                <input type ="text" id ="state" name ="state" value =""><br><br>
                <label>Phone no.:</label>
                <input type ="tel" id ="phone_number" name ="phone_number" value =""><br><br>
                <label>Date of Birth:</label>
                <input type ="date" id ="dob" name ="dob" value =""><br><br>
                <input type ="submit" id ="update" name ="update" value ="Update">
            </form>
        </div>
        <div class ="col3">
            <a href ="logout.php" id ="logout">Logout</a><br><br>
            <a href = "dashboard.php" id ="dashboard">Home</a>
        </div>
    </div>
</body>
</html>