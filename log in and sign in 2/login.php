<?php
include "../connection/connection.php";

if(isset($_POST['log'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if ($email != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from customer where email='".$email."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $sql_queryy = "select customerID, customerName, email from customer where email='".$email."' and password='".$password."'";
            $result1 = mysqli_query($conn,$sql_queryy);
            $row1 = mysqli_fetch_array($result1);
            session_start();
            $_SESSION['customerID']=$row1[0];
            $_SESSION['email']=$row1[2];
            $_SESSION['fname']=$row1[1];


            header('Location:../mainpage/Homepage.php');
        }else{
            echo "Invalid username and password";
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
    <title>Log In Page</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="cointainer">
           
    <form id="login" method="post" action="login.php">
    <h1 class="great">Good to see you Again!</h1> 
        <h1>Log In Here</h1>   
        <label><b>User Name     
        </b>    
        </label>    
        <input type="email" name="email" id="Uname" placeholder="Username">    
        <br><br>    
        <label><b>Password&nbsp;&nbsp;     
        </b>    
        </label>    
        <input type="password" id="pass" name="password" id="Pass" placeholder="Password">    
        <br><br>    
        <input  type="submit" name="log" class="log" id="log" value="Log In Here">       
        <br><br>      
          
         <a href="#">Forgot Password</a>    
    </form>     

    </div>
    <div class="donthave">
    <h2>Don't have a account</h2> <a href="login.php"><button class="sigbtn">Sign In</button></a>
    </div>
         
    </form>     

    </div>

</body>
</html>