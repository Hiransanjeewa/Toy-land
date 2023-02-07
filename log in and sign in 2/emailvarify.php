<?php
    session_start();
    include '../connection/connection.php';

    mt_rand();
    $code = mt_rand();
    $codehash = md5($code);

    $query = "INSERT INTO customer (code, code_hash) VALUES ('$code', '$codeHash')";
    mysqli_query($conn, $query);

    $email = "suriyaseyon6@gmail.com";

    $to  = $email;
    $subject = "Verification Code";
    $message = "
    Hi,
    
    We just need to verify your email address before you can access.
    Your email verification code is : $code
    
    Thanks!  The Toy Land team";

    mail($to, $subject, $message);
?>

<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="../mainpage/style.css"/>
        <link rel="stylesheet" href="../mainpage/utility.css"/>
        <link rel="stylesheet" href="../mainpage/footer.css"/>

        <script src="../mainpage/app.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    </head>

    <body>

        <?php                     
            $page = 'search'; 
            include '../mainpage/header.php';                 
        ?> 
        <form action="emailverify.php">
            <table>
                <tr colspan="2">
                    <td><h2>Email verification<h2></td>
                </tr>
                <tr>
                    <td>Enter your email verification code: </td>
                    <td><input type="text" name="code"></td>
                </tr>
            </table>
        </form>
        



        <?php include '../mainpage/footer.php';?>
        
    </body>
</html>

<?php

    $inputCode = $_GET['code'];
    $inputCodeHash = md5($inputCode);

    $query = "SELECT * FROM customer WHERE code = '$inputCode' AND code_hash = '$inputCodeHash'";
    $result = mysqli_query($conn, $query);
     
    if (mysqli_num_rows($result) == 1) {
      // Code is correct
      header('location: ../mainpage/homepage.php');
    } else {
      // Code is incorrect
    }
?>