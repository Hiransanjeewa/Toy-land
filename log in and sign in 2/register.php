<?php

include 'connectsignuplogin.php';

if (isset($_POST['submit'])) {

  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $email = $_POST['email'];
  $addressline1 = $_POST['line1'];
  $addressline2 = $_POST['line2'];
  $phonenumber = $_POST['p_number'];
  $province = $_POST['province'];
  $distric = $_POST['distric'];
  $country = $_POST['country'];
  $postcode = $_POST['postcode'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];


  if ($password == $repassword) {

    $query = "select * from customer WHERE email='$email'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
      // there is already a user with the same username
      echo '<script type="text/javascript"> alert("Email already exists.. try another username") </script>';
    } else {
      $query = "INSERT INTO customer (customerName,email,addressLine1,addressLine2,mobile,District,Province,Country,postalCode,password) 
  			  VALUES('$firstname', '$email', '$addressline1','$addressline2','$phonenumber','$distric','$province','$country','$postcode', '$password')";

      $query_run = mysqli_query($conn, $query);

      if ($query_run) {
        header('Location:login.php');
      } else {
        echo '<script type="text/javascript"> alert("Error!") </script>';
      }
    }
  }
}
		?>

<!DOCTYPE html>
<html lang="en">
<head>
  
<script>


function validatePhoneNumber(input_str) {
  var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;

  return re.test(input_str);
}
</script>
  <script>

    function validateform() {
      var p1=document.getElementById('password').value;
      var p2=document.getElementById('repassword').value;


      if (!(document.getElementById('fname').value)) {
        alert('Enter first name');
        return false; 
      }
      else if (!(document.getElementById('lname').value)) {
        alert('Enter last name');
        return false; 
      }else if (!(document.getElementById('email').value)) {
        alert('Enter Your Email');
        return false;
      }
      else if (!(document.getElementById('line1').value)) {
        alert('Enter Your address');
        return false; 
      }else if (!(document.getElementById('p_number').value)) {
        alert('Enter your phone number');
        return false; 
      }else if(!(validatePhoneNumber(document.getElementById('p_number').value))){
        alert('Enter valid phone number');
        return false; 
      }
      else if (!(document.getElementById('province').value)) {
        alert('Enter Your province');
        return false; 
      }else if (!(document.getElementById('distric').value)) {
        alert('Enter your distric');
        return false; 
      }else if (!(document.getElementById('country').value)) {
        alert('Enter your country');
        return false; 
      }else if (!(document.getElementById('postcode').value)) {
        alert('Enter your Postcode');
        return false; 
      }else if (!(document.getElementById('password').value)) {
        alert('Enter a Strong password');
        return false; 
      }else if (!(document.getElementById('repassword').value)) {
        alert('Enter Your repassword');
        return false; 
      }else if (!(p1 == p2)) {
        alert('Your both password should be equal');
        return false; 
      } 
    }
  </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up page</title>
    <link rel="stylesheet" href="registerstyles.css">
    <script src="registerscript.js" defer></script>
    
</head>
<body>
    <div class="cointainer">

      <form class="register" action="register.php" method="post" onsubmit="return validateform();">
        <h1 class="Welcome" id="welcome">Welcome to Toys Land</h1>
        <h1>Register</h1>
        <div class="name">
      
        <input id="fname"  name="fname" type="text" placeholder="Enter First Name"/>
        <span id="nameerror"></span>
        
        <input id="lname"  name="lname" type="text" placeholder="Enter Last Name"/>
        </div>

        
       <input id="email" maxlength="50" name="email" type="email" placeholder="Enter E-mail : hiransanjeewaa@gmail.com" >
        
        <input type="text" name="line1" id="line1" placeholder="Enter address line1"><br>
        <input type="text" name="line2" id="line2" placeholder="Enter address line2"><br>
       
        
        <input type="text" name="p_number" id="p_number" placeholder="Enter Mobile number" >
        <input type="text" name="province" id="province" placeholder="Enter Province / area">
        
<br>     <input type="text" name="distric" id="distric" placeholder="Enter Your Distric / State"><br>
         <input type="text" name="country" id="country" placeholder="Enter Your country">
         <input type="text" name="postcode" id="postcode" placeholder="Enter your postal code">
         
        
        <input type="password" name="password" id="password" placeholder="Enter Password">
<br>
         
         <input type="password" name="repassword" id="repassword" placeholder="Enter password again">
         <br>
        <input class="submit" name="submit" type="submit" value="Register Now">
      </form>
      
    </div>
    <br><br><br>
    <div class="alreadyhave">
    <h2>Already have a account</h2> <a href="login.php"><button>Log In</button></a>
    </div> 
</body>
</html>