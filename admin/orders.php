<?php
include '../connection/connection.php';
session_start();

// Selecting orders
$sql = "SELECT * from orders";
$result = $conn->query($sql);

$_REQUEST['changestatus'] = 1;
if (isset($_REQUEST['changestatus'])) {
    $_REQUEST['orderstatus'] = "Shipped";
    $producti = $_REQUEST['orderstatus'];
  
}

?>
<html>
    <head>
        <meta charset ="utf-8">
        <meta http-equiv="x-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Stylesheet" href="../admin/pro01.css">
        <style>
            *{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family: sans-serif;
}
table,th,td{
    border: 1px solid black;
    border-collapse: collapse;
    margin-left:25px;
    margin-top:25px;
    margin-right:35px;
    
}
th{
    background-color:#ada2ff;
    padding-top: 10px;
    padding-left: 25px;
    padding-right:25px;
    padding-bottom:10px;
    
}.links{
     float: right;
}

        </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../mainpage/utility.css"/>
    <link rel="stylesheet" href="../mainpage/style.css"/>
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
            $page = 'orders'; 
            include '../mainpage/header.php'; 
        ?>
        <br><br><br><br><br>
        <table style="width:95%; text-align: center; ">
            <tr>
                <th style="width:5px ">Order ID</th>
                <th style="width:5px">Customer ID</th>
                <th>Customer Name</th>
                <th style="width:5%">Product ID</th>
                <th>Product Name</th>
                <th>No.Of Units</th>
                <th style="width:22%">Address</th>
                <th style="width:5%">Payment Method</th>
                <th style="width:5%">Order Status</th>    
            </tr>
            <?php
            while ($row2=mysqli_fetch_assoc($result)) {
                $sql6 = "SELECT * from customer where customerID='".$row2['customerID']."'";
                $result6 = mysqli_query($conn,$sql6);
                $row6 = mysqli_fetch_array($result6);
                $sql7 = "SELECT name from product WHERE productID='".$row2['productID']."' ";
                $result7 = mysqli_query($conn,$sql7);
                $row7 = mysqli_fetch_array($result7);
                

            ?>
            <tr>
            <td><?php echo $row2['orderID']?></td>
                <td ><?php echo $row2['customerID']?></td>
                <td><?php echo $row6['customerName']?></td>
                <td><?php echo $row2['productID']?></td>
                <td><?php echo $row7[0]?></td>
                <td><?php echo $row2['units']?></td>
                <td><?php echo $row6['addressLine1'] . "," . $row6['addressLine2'] . "," . $row6['District'] . "," . $row6['Province'] . "," . $row6['Country'] . "," . $row6['postalCode'];    ?></td>
                <td><?php echo $row2['paymentMethod']?></td>  

            <?php 
                }
            ?>

        </table>
        <div>

        </div>
        
        <a class="links"  href="adminpanel.php" style=" ">
     <button class="cartbutton" type="button"
        style="margin: 16px; padding: 16px; background-color: darkorange; color: aliceblue;
        border: none;border-radius: 4px;font-size: 15px">
        <span class="buttontext"><FONT COLOR=black>Admin Panel</span>
        
     </button>
</a>
                <br><br><br><br><br>
    <?php
        include '../mainpage/footer.php';
    ?>

    </body>
</html>