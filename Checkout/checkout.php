<?php
include "../connection/connection.php";
session_start();


// Catch from a session variable
$customerID = $_SESSION['customerID'];

// Catch from the cart
$productsincart=$_REQUEST['selectedproducts'];
$_SESSION['productsincart'] = explode (",", $productsincart);
$productsincart = $_SESSION['productsincart'];

// Catch from the cart
$productsunits=$_REQUEST['selectedunits'];
$_SESSION['productsunits'] = explode (",", $productsunits);

$productsunits = [];
for ($i=0; $i < count($productsincart); $i++) {
    $productsunits[$i] = (int) $_SESSION['productsunits'][$i];
}

$i=0;








// To make sure having multiple orders in next page
$_SESSION['paymentconfirmation'] = 1;




$availableunits = [];
$productweights = [];
$productprices = [];

for ($i=0; $i < count($productsincart); $i++) {
    $productID = $productsincart[$i];

$sql4 = "SELECT * from product WHERE productID='".$productID."'";
                    $result4 = $conn->query($sql4);
                    $row4 = $result4->fetch_assoc();
                    $availableunits[$i]=$row4['availableUnits'];
                    $productweights[$i] =$row4['weight'];
                    $productprices[$i] = $row4['price'];      
}
$i = 0;


?>

<html>
    <head>
        <title></title>

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

        <script src="checkout.js">
        </script>
        <script type="text/javascript">
        var numberofproducttypes=<?php echo count($productsincart) ;?>;
        var productsincart = <?php echo json_encode($productsincart); ?>;
        var productunits = <?php echo json_encode($productsunits); ?>;
        var productmax = <?php echo json_encode($availableunits); ?>;
        var productweights = <?php echo json_encode($productweights); ?>;
        var productprices = <?php echo json_encode($productprices); ?>;
        console.log(productunits);
        console.log(productsincart);
        </script>

        <style>
            body{
                background-color: rgb(242, 235, 235);
            }
            .checkoutheader{
                width: 100%;
                background-color: white;
                border: none;
                margin: 0ch;
                padding: 0%;
            }
            .checkoutmain{
                
                padding-left: 40px ;
                padding-right: 40px;
            
            }
            .shippingaddress{
                background-color: white;
                width: 60%;
                height: 20%;
            }
            .paymentType{
                background-color: white;
                width: 60%;
                height: 20%;
                
            }
            .productsview{
                background-color: white;
                width: 60%;
                height: 30%;
            }.checkoutprices{
                width: 38%;
                height: 14.3cm;
                background-color: white;
                float:right;
            }
            .itemdescription{
                float: right;
                width: 72%;
            }
            
           
            
        </style>
        <script>
               function changeUnits(x,id,unit,max) {
                    if (x===1) {
                        if (productunits[id]>1) {
                        productunits[id] -=1;
                        }
                        }else if(x===2){
                        if (productunits[id] < productmax[id]) {     
                          productunits[id] += 1; 
                        }
                         }
                         changeShipping();
                         changeitemscost();
                         changetotal();
                        document.getElementById(id).innerHTML= "&nbsp;"+productunits[id] ;
                        
                }
                var shipping=0;
                function changeShipping() {

// ***  Shipping Rates ***
// First 2 kg 300 Lkr
// Additional lkr 150 per 1 kg
var weight=0;
shipping=0;
for (let i = 0; i < numberofproducttypes; i++) {
    weight+=productunits[i]*productweights[i];
}
if (weight>2) {
        shipping = (2 + Math.ceil(weight - 1) * 1);
        shipping=(shipping / 100) * 100;
    }else {
        shipping=2;
    }
    console.log(weight);
    
document.getElementById('shippingCost').innerHTML=shipping.toFixed(2);
}

var itemcosts=0;
function changeitemscost() {
    itemcosts=0;
    for (let i = 0; i < numberofproducttypes; i++) {
        itemcosts+=productunits[i]*productprices[i];
}
document.getElementById('itemprices').innerHTML=itemcosts.toFixed(2);

}

function changetotal() {  
    var totalcost= itemcosts + shipping;
    document.getElementById('totalcost').innerHTML=totalcost.toFixed(2);

}

var paymentmethod=0;
function checkpaymentmethod(){
    var m=paymentmethod;

    if (m>0) {
        window.location.href = "payment.php?units="+productunits+"&paymentmethod="+paymentmethod;
     }
     else {
         alert('Please Select a payment method to place order');
     }

}




        </script>
        <script>
            
            
        </script>

    </head>
    <body onload="changeShipping();changeitemscost();changetotal()">
        <?php
            $page = 'checkout';
            include '../mainpage/header.php';
        ?>

        <br><br><br><br><br>
    
        <div class="checkoutheader">
           
            
        </div>
        <br>
        <div class="checkoutmain">
        <div class="checkoutprices">
        <strong> <span style="font-size: 1cm;"> Summary</span></strong><br><br>
        <p>
            Total Item Cost     :    US &nbsp;$ <span id="itemprices"></span> <br>

            Total Shipping      : US &nbsp;$
            <span id="shippingCost">
            </span>
            <hr>
            
            Total               : US &nbsp;$ <span id="totalcost"></span>
            <br>
            <script>

                
</script>
<button onclick="checkpaymentmethod();" class="cartbutton" type="button" style="margin: 16px; padding: 16px; background-color: darkorange; color: aliceblue;border: none;border-radius: 4px;font-size: 16px">
Place Order 
</button>

        </p>

            </div>

            <div class="checkoutdetails">
                <div class="shippingaddress">
                <strong><span style="font-size: 0.6cm;">Shipping Address </span> </strong><br><br>
                <?php 
                    $sql = "SELECT * from Customer where customerID='".$customerID."'";
                    $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo $row['customerName']."  ".$row['mobile']."<br>";
                echo $row['addressLine1'] . "," . $row['addressLine2'].",<br>";
                echo $row['District'].",".$row['Province'].",".$row['Country']." ".$row['postalCode']."<br><br><br>";
                ?>
                </div>
                <br><br>


                <div class="paymentType">
                <strong><span style="font-size: 0.6cm;">Payment Method</span> </strong><br><br>
                
                <input type="radio" name="paymenttype" value="1" onchange="paymentmethod=1;"> Card Payment &nbsp;&nbsp;&nbsp;
                <input type="radio" name="paymenttype" value="2" onchange="paymentmethod=2;"> Cash on dilivery 
                </div>
                <br>
                <script>
                    i=0;
                    </script>
                <?php 
                for ($i=0; $i < count($productsincart); $i++) {
                    $productID = $productsincart[$i];
                    

                ?>
                <div class="productsview">
                    <img src="../Product/<?php echo $productID ?>/1.webp" alt="image1" height="95%" width="180">
                    <div class="itemdescription">
                    <p>
                    <?php
                    $sql = "SELECT * from product WHERE productID='".$productID."'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo $row['name']."<br>";
                    echo $row['description']."<br>";
                    echo "<br>";
                    ?>
                    US &nbsp;$ &nbsp;
                    <?php
                    echo $row['price'];
                    ?>
                    </p>
                   
                    
                    <p style="color: cadetblue;"> 
                    <img  onclick="changeUnits(1,<?php echo $i ;?>,productunits[i],productmax[i])" id="-" src="-.jpeg" alt="Minus mark"  border-radius=50% width="18px">
                    <span id="<?php echo $i ;?>">
                    <?php echo  $productsunits[$i];?>
                    
                    </span>
                    <img onclick="changeUnits(2,<?php echo $i ;?>,productunits[i],productmax[i])" id="+" src="+.jpeg" alt="Plus mark"  border-radius=50% width="30px">
      
                 
        </p>
                    </div>


                </div>
                <br>
                <script>
                    console.log(productunits[i]);
                    i++;
                    
                </script>


                <?php
                   
                }
                
                ?>





            </div>
            


        </div>

        <?php
            include '../mainpage/footer.php';
        ?>
        
    </body>

</html>