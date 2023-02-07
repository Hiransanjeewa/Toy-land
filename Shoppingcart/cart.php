<?php
    include "../connection/connection.php";
    session_start();

    // Catch from a session variable

    $customerID = $_SESSION['customerID'];


    if (isset($_REQUEST['delete'])){
        $deleteproduct=$_REQUEST['delete'];
        $sql3 = "DELETE  FROM cart  WHERE customerID=$customerID AND productID=$deleteproduct  ";
        $conn->query($sql3);
        }
        


    // Check number of item types in the cart

    $sql2="SELECT count('productID') from cart WHERE customerID=$customerID" ;
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($result2);
    $itemsincart= $row2[0];

    if ($row2[0]) {

        // Get items from the cart table
        $productsincart=[];
        $productsunits = [];
        $x=1;

        for ($i = 0; $i < $itemsincart; $i++) {

            $y=1;
            while ($y) { 
        
                $sql1="SELECT count('units') from cart WHERE customerID=$customerID AND productID=$x" ;
                $result1=mysqli_query($conn,$sql1);
                $row1=mysqli_fetch_array($result1);
   
                if ($row1[0]) {
                    $productsincart[$i]=(int)$x;
                    $sql3 = "SELECT units from cart WHERE customerID=$customerID AND productID=$x";
                    $result3 = mysqli_query($conn, $sql3);
                    $row3 = mysqli_fetch_array($result3);
                    $productsunits[$i] = (int)$row3[0];
                    $y = 0;
                }
                $x++;
            }

        }

        $i = 0;

        $_SESSION['selectedproducts'] = $productsincart;

        // Catch from the cart


        $availableunits = [];
        $productweights = [];
        $productprices = [];

        for ($i=0; $i < $itemsincart; $i++) {
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
        <title>Cart</title>
        <link rel="stylesheet" href="../mainpage/style.css"/>
        <link rel="stylesheet" href="../mainpage/utility.css"/>
        <link rel="stylesheet" href="../mainpage/footer.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

        <script src="js/app.js" defer></script>
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
        <script type="text/javascript">
        var productIDs =<?php echo json_encode($productsincart); ?>;
        var numberofproducttypes=<?php echo count($productsincart) ;?>;
        var productunits = <?php echo json_encode($productsunits); ?>;
        var productmax = <?php echo json_encode($availableunits); ?>;
        var productweights = <?php echo json_encode($productweights); ?>;
        var productprices = <?php echo json_encode($productprices); ?>;
        
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
                width: 70%;
            }input.itemcheckbox{
                width: 22px;
        height: 22px;
            }.checkboxdiv{
                
                
                width: 8%;
                height: 100%;
                
                float: left;

            }.productinfo{
                width: 92%;
                height: 100%;
                float: right;
                
            }.productimagee{
                width: 30%;
                height: 100%;
                float: left;
            }
            
        </style>
        <script>
            function changeUnits(x,id,unit,max) {
                if (!(document.getElementById(-(id+1)).checked)) {
                    return;
                }
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
                var index = -1;
                for (let i = 0; i < numberofproducttypes; i++) {
                    if(document.getElementById(index).checked){
                        weight+=productunits[i]*productweights[i];
                    }
                    index-=1;
                }

                if (weight>2) {
                    shipping = (2 + Math.ceil(weight - 1) * 1);
                    shipping=(shipping / 100) * 100;
                }else if(weight>0){
                    shipping=2;
                }
    
                document.getElementById('shippingCost').innerHTML=shipping.toFixed(2);
            }
            
            var itemcosts=0;
            var selectedproducts=[];
            var selectedunits=[];
            function changeitemscost() {
                var index = -1;
                itemcosts=0;
                var l=0;
                for (let i = 0; i < numberofproducttypes; i++) {
                    if(document.getElementById(index).checked){
                        selectedproducts[l]=productIDs[i];
                        selectedunits[l]=productunits[i];
                        l+=1;
                        itemcosts+=productunits[i]*productprices[i];
                    }
                    index-=1;
                }
                document.getElementById('itemprices').innerHTML=itemcosts.toFixed(2);
            }

            function changetotal() {  
                var totalcost= itemcosts + shipping;
                document.getElementById('totalcost').innerHTML=totalcost.toFixed(2);
            }

            // Checking if User selects Items to buy

            function checkselected(){
                if (selectedproducts[0]) {
                    window.location.href = "../checkout/checkout.php?selectedunits="+selectedunits+"&selectedproducts="+selectedproducts;
                }
                else {
                    alert('Please Select items to checkout');
                }

            }
        </script>

        <!-- *************** Checkbox Selecting  *******************--> 

        <script>
            var selected=1;
            function selectall() {
                if (selected==1) {
                    if (document.getElementById("allselected").checked=true) {
                        for (var index = -1; index > -numberofproducttypes-1; index-=1) {
                            document.getElementById(index).checked=true;
                        }
                        changeShipping();
                        changeitemscost();
                        changetotal();
                    }
                    selected=0;
                }else{
                    for (var index = -1; index > -numberofproducttypes-1; index-=1) {
                        document.getElementById(index).checked=false;
                        changeShipping();
                        changeitemscost();
                        changetotal();
                    }
                    document.getElementById("allselected").checked=false;
                    selected=1;
                }
            }

            function deselectall() {
                changeShipping();
                changeitemscost();
                changetotal();
                var all=1;
                for (var index = -1; index > -numberofproducttypes-1; index--) {
                    if (!(document.getElementById(index).checked)) {
                        document.getElementById("allselected").checked=false;
                        all=0; 
                    }
                }
                if (all==1) {
                    document.getElementById("allselected").checked=true;
                }
            }

            function confirmAction() {
                let confirmAction = confirm("Remove Item from Cart?");
                if(confirmAction){
                    return true;
                }else{
                    return false;
                }
            }
        </script>



    </head>
    <body >
    <?php                     
          $page = 'cart'; 
          include '../mainpage/header.php';                 
    ?>
    
      
        <br>
        <div class="checkoutmain">
            <div class="checkoutprices">
                <strong> <span style="font-size: 1cm;">Summary</span> </strong><br><br>
                <p>
                Total Item Cost &nbsp;    :&nbsp;&nbsp;US&nbsp; $ <span id="itemprices"></span> <br>

                Total Shipping   &nbsp;&nbsp;  &nbsp;: US &nbsp;$ 
                <span id="shippingCost">
                </span>
                <hr>
            
                Total               : US &nbsp;$ <span id="totalcost"></span>
                <br>
            
                <button onclick="checkselected();" class="cartbutton" type="button" style="margin: 16px; padding: 16px; background-color: darkorange; color: aliceblue;border: none;border-radius: 4px;font-size: 16px">
                    Go to Checkout 
                </button>

                </p>

            </div>

            <div class="checkoutdetails">
                <div class="shippingaddress">
                    <strong>Shopping Cart(<?php echo $itemsincart ;?>)</strong><br><br>
                    <input  type="checkbox" onclick="selectall();" id="allselected" class="itemcheckbox" value="1">Select all items
                
                </div>
                <br><br>


               
                <script>
                    i=0;
                </script>

                <?php 
                    for ($i=0,$n=-1; $i < count($productsincart); $i++,$n--) {
                        $productID = $productsincart[$i];
                ?>
                <div class="productsview">
                  
                    <div class="productinfo">

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
                            <img  onclick="changeUnits(1,<?php echo $i ;?>,productunits[i],productmax[i],<?php echo $n?>)" id="-" src="-.jpeg" alt="Minus mark"  border-radius=50% width="18px">
                            <span id="<?php echo $i ;?>">
                            <?php echo  $productsunits[$i];?>
                            </span>
                            <img onclick="changeUnits(2,<?php echo $i ;?>,productunits[i],productmax[i],<?php echo $n?>)" id="+" src="+.jpeg" alt="Plus mark"  border-radius=50% width="30px">

                            <a href="cart.php?delete=<?php echo $productID;?>" onclick=" return confirmAction()">
                            <img src="delete.jpeg" alt="deletebutton" width="20cm" height="20cm">
                            </a>
      
                 
                            </p>
                        </div>
                        
                        <div class="productimagee">
                            <img src="../Product/<?php echo $productID ?>/1.webp" alt="image1" height="95%" width="180cm">

                        </div>
                    </div>
                <div class="checkboxdiv">
                    <br><br><br><br><br>
                    <input type="checkbox" id="<?php echo $n?>" class="itemcheckbox" value="1" onclick="deselectall();">
                </div>
            </div>
            <br>
            <script>  
                i++; 
            </script>


            <?php  
                }
                }else{
    header('Location:empty.html');
                }
                
            ?>
        </div>
            


    
        
    </body>

</html>