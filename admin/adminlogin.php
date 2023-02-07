<?php
include "../connection/connection.php";
session_start();
$_SESSION['adminID'] = 0;

if(isset($_POST['log'])){

    $email = $_REQUEST['email'];
    $password = $_POST['password'];

    if ($email != " " && $password != " "){

        $sql = "select count(*) as adminID from admin where email='$email' and password='$password'";
        $result1=mysqli_query($conn,$sql);
        $row1=mysqli_fetch_array($result1);
       

        $count = $row1[0];
        echo $count;

        if(isset($count)){
            $sql_queryy = "select adminID from admin where email='".$email."' and password='".$password."'";
            $result1 = mysqli_query($conn,$sql_queryy);
            $row1 = mysqli_fetch_array($result1);
            session_start();
            $_SESSION['adminID']=$row1[0];
            echo $_SESSION['adminID'];
            header('Location:adminpanel.php');
            exit();
        }else{
            echo "Invalid Email and password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin LogIn Page</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="cointainer">
           
    <form id="login" method="post" action="adminlogin.php">
    <h1 class="great">Good to see you Again!</h1> 
        <h1>Admins Log In Here</h1>   
        <label><b>User Name     
        </b>    
        </label>    
        <input type="email" name="email" id="Uname" placeholder="email">    
        <br><br>    
        <label><b>Password&nbsp;&nbsp;     
        </b>    
        </label>    
        <input type="password" id="pass" name="password" id="Pass" placeholder="Password">    
        <br><br>    
        <input  type="submit" name="log" class="log" id="log" value="Log In Here">       
        <br><br>      
        <a href="../log in and sign in 2/login.php">Log in as a user</a> <br>
         <a href="#">Forgot Password</a>    
    </form>     

    </div>

</body>
</html>