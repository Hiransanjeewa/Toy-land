<html>
    <head>
        
        <title>
            Item adding confirmation
        </title>
        <link rel="stylesheet" href="payment.css">
        <style>
           .cartbutton:hover{
    
    filter: brightness(108%);
    }
        </style>
    </head>
    <body>
        <div class="maindiv">
            <br><br>
            <h1 class="header">
                Your Order is Confirmed
            </h1>
            
            <img class="tikimage"  src="Tik.png" alt="tickmark" width="100px" >
            Your payment is <?php echo $totalcost ;?>
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
            if($allunits==0){
                echo "You have no";
            }else{
                echo "You have ".$allunits;
            }
            ?>
            more Items in the cart 
            <br>
            <br>
            <br>


            <div class="links">
 <a class="links"  href="mainpage.php">
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
        &nbsp;&nbsp;&nbsp;Go to cart&nbsp;&nbsp;&nbsp;
     </button>
</a>
<br>
Buy more items  and get discounts 
<br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>
    </body>
</html>