<?php
    session_start();
    include "conn.php";
    if(!isset($_SESSION['email'])) {
    header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        *{
            box-sizing:border-box;
        }
        .row:after {
            content:"";
            display:table;
            clear:both;
        }
        .col1 {
            float:left;
            width:20%;
            height:400px;
            text-align:center;
        }
        .col2 {
            float:left;
            width:60%;
            height:400px;
            text-align:center;
        }
        .col3 {
            float:left;
            width:20%;
            height:400px;
            text-align:center;
        }
        #logOut {
            text-decoration:none;
            border:1px solid black;
            border-radius:4px;
            color:black;
        }
        #myaccount {
            text-decoration:none;
            border:1px solid black;
            border-radius:4px;
            color:black;
        }
        table, td, th {  
            border: 1px solid black;
            text-align: left;
        }
        table {
            border-collapse: collapse;
            max-width: 60%;
            width:60%;
        }
        .table-data {
            width:65%;
            float: right;
         }
        th, td {
            padding: 15px;
         }
    </style>
</head>
<body>
    <div class="row">
        <div class="col1"></div>
        <div class="col2">
            <?php
                $email = $_SESSION['email'];
                $role = $_SESSION['role'];

                $queryGetUsersData = "select * from users where email = '$email'";
                echo $role;
                if($role == 1) {
                    $queryGetUsersData = "select * from users";
                } 
                
                $res = mysqli_query($conn, $queryGetUsersData);

                echo "<table>
                <tr>
                    <th>S.No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                    <th colspan=\"2\">Action</th>
                </tr>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['first_name'] . "</td>
                        <td>" . $row['last_name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['city'] . "</td>
                        <td>" . $row['state'] . "</td>
                        <td>" . $row['phone_number'] . "</td>
                        <td>" . $row['role'] . "</td>
                        <td colspan=\"2\">
                            <form method=\"POST\" href=\"delete_user.php\"> 
                                <input type=\"hidden\" name=\"id\" value=\"" . $row['id'] . "\"> </input>
                                <input value=\"delete\" onclick=\"alert('Are you sure to delete it?')\" type=\"submit\"></input>
                            </form>
                            <form method=\"POST\" href=\"edit_user.php\"> 
                                <input type=\"hidden\" name=\"id\" value=\"" . $row['id'] . "\"> </input>
                                <input type=\"submit\" value=\"edit\"></input>
                            </form>
                        </td>
                    </tr>";
                }
                echo "</table>";
            ?>
        </div>
        <div class="col3">
           <a href="logout.php" id="logOut" name="logOut">Logout</a>
           <a href = "myaccount.php" id = "myaccount" name = "myaccount">Myaccount</a>
        </div>
    </div>


</body>
</html>
