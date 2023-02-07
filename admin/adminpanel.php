<?php 

include "../connection/connection.php";
session_start();

if (isset($_SESSION['adminID'])) {

    if (isset($_REQUEST['viewcustomerID'])) {
        $viewcustomerID=$_REQUEST['viewcustomerID'];
        $sql = "SELECT count(customerID) from customer where customerID=$viewcustomerID";
        $result1=mysqli_query($conn,$sql);
$row1=mysqli_fetch_array($result1);
        if ($row1[0]) {
            header("Location: customer.php?customerID='$viewcustomerID'");
            exit();
        }else{
            header('Location: adminpanel.php');
            exit();
        }
    }
    if (isset($_REQUEST['addproduct'])) {
        header('Location: addproduct.html');
            exit();
        }
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../admin/Adminpanalstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../mainpage/utility.css"/>
    <link rel="stylesheet" href="../mainpage/style.css"/>
    <link rel="stylesheet" href="../mainpage/footer.css"/>
    <link rel="stylesheet" href="admincss.css"/>

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
        $page = 'adminpanel'; 
        include '../mainpage/header.php'; 
    ?>
    <br><br><br><br><br>
    <h1>Admin Panel</h1>
    <div class="adminbutton">
        <h1 class="adtopic">Admin Support</h1>
        <div class="buttons">
        <form action="adminpanel.php">
          <div class="form">
              
          <h3 class="view">View Customer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h3> 
          <input type="number" name="viewcustomerID" placeholder="CustomerID" >
          <button class="adminoptionbutton" name="submit">Find</button><br>
        </div> 
        </form>
        
        <div class="addproducts"><h3>Click here to Add product&nbsp;&nbsp; :</h3> 
        <a href="addproduct.php"><button class="adminoptionbutton" name="addproduct" >Add product</button></a><br>
    </div>
        
    <div class="vieworders">
    <h3>Click here to view orders &nbsp;&nbsp;&nbsp;&nbsp;:</h3>  
       <a href="orders.php"><button class="adminoptionbutton" name="vieworders">View orders</button></a><br>
        
    </div>
    <div class="vieworders">
    <h3>Click here to Logout as a admin &nbsp;&nbsp;&nbsp;&nbsp;:</h3>  
       <a href="adminlogin.php"><button class="adminoptionbutton" name="logout">Logout</button></a><br>
        
    </div>
    
       
        </div>
    </div>
    <br><br><br><br>
    <?php
        include '../mainpage/footer.php';
    ?>
</body>
</html>


<?php 
}else {
    header('Location: adminlogin.php');
    exit();
}

?>
