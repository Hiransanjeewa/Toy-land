<?php
include "../connection/connection.php";
session_start();
if (isset($_SESSION['customerID'])) {
    



if ((isset($_REQUEST['units']))&&($_SESSION['i']==1)) {
    
    $_SESSION['units'] = $_REQUEST['units'];
    $units=$_SESSION['units'];
    $custommerID=$_SESSION['customerID'];
    $productID=$_SESSION['productID'];


    $sql4="SELECT * FROM cart WHERE customerID='".$_SESSION['customerID']."' AND productID='".$_SESSION['productID']."' ";
    $n = $conn->query($sql4);
    $row = $n->fetch_array();
    
    
    if ($row[2]) {
        $newunits = $_SESSION['units'] + $row[2];
        $sql2 = "UPDATE cart SET units='".$newunits."' WHERE customerID='".$_SESSION['customerID']."' AND productID='".$_SESSION['productID']."' ";
    }else {
        $sql2="INSERT INTO cart VALUES('".$_SESSION['customerID']."','".$_SESSION['productID']."','".$_SESSION['units']."')";
    }
    $result2=$conn->query($sql2);
    $_SESSION['i'] = 0;
}
    ?>

<html>
    <head>
        <title>
            Item adding confirmation
        </title>

        <style>
            .maindiv{
                
                border-top: 40px;
                border-left: 200px;
                border-right: 200px;
                margin-bottom: 80px;
                border-color: white;
                border-style: solid;
                text-align: center;
              
                background-color:   aquamarine;
            }
            
            .header{
                font-size:  1.3cm;
                text-align: center;
            }
            .tikimage{
                display: block;
                margin-left: auto;
                margin-right: auto;
                
  
                background: aquamarine;
                border-radius:80% 
            }
            .links{
                text-align: center;
                
               
            }.cartbutton:hover{
    
    filter: brightness(108%);
    }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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
            $page = 'itemadded';
            include '../mainpage/header.php';
        ?>
        <br><br><br>
        <div class="maindiv">
            <br><br>
            <h1 class="header">
                Item Added to Cart
            </h1>
            
            <img class="tikimage"  src="Tik.png" alt="tickmark" width="100px" >
            <br>
            <?php
            $sql4="SELECT units FROM cart WHERE customerID='".$_SESSION['customerID']."' ";
            $n = $conn->query($sql4);
            $i = 0;
            $allunits=0;
            while ($row = $n->fetch_array()) {
                $allunits += $row[$i];
            }
            ;


            echo $allunits;
            
            ?>
             Items in the cart 
            <br>
            <br>
            <br>


            <div class="links">
 <a class="links"  href="../mainpage/Homepage.php">
     <button class="cartbutton" type="button"
        style="margin: 16px; padding: 16px; background-color: darkorange; color: aliceblue;
        border: none;border-radius: 4px;font-size: 12px">
        Continue Shopping
     </button>
</a>

<a href="../Shoppingcart/cart.php">
     <button class="cartbutton" type="button"
        style="margin: 16px; padding: 16px; background-color: darkorange; color: aliceblue;
        border: none;border-radius: 4px;font-size: 12px">
        &nbsp;&nbsp;&nbsp;Go to checkout&nbsp;&nbsp;&nbsp;
     </button>
</a>
<br>
Add more items to your cart and get discounts 
<br><br><br><br><br><br><br><br><br><br>



            </div>
 

        </div>


        
            <?php include '../mainpage/footer.php'; ?>
    </body>


</html>
<?php 
}else {
    header('Location:../log in and sign in 2/login.php');
}

?>