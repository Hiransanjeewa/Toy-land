<?php
include "../connection/connection.php";
session_start();
$_SESSION['i']=1;


$folder=$_REQUEST['productID'];
$productID=$_REQUEST['productID'];
$_SESSION['productID'] = $productID;


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="productJavascript.js" > 
    </script>
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
    <script>
        function changeImage(x) {
    switch (x) {
        case 2:
            document.getElementById('image0').src="<?php echo $folder ?>/2.webp";
            break;
        case 3:
            document.getElementById('image0').src="<?php echo $folder ?>/3.webp";
            break;
        case 4:
            document.getElementById('image0').src="<?php echo $folder ?>/4.webp";
            break;
        case 5:
            document.getElementById('image0').src="<?php echo $folder ?>/5.webp";
            break;
        default:
        document.getElementById('image0').src="<?php echo $folder ?>/1.webp";
            break;
    }
}
function changeShipping() {

// ***  Shipping Rates ***
// First 2 kg 2$
// Additional 1$ per 1 kg

if ((weight*units)>2) {
    shipping = (2 + Math.ceil(weight*units - 1) * 1);
    shipping=(shipping / 100) * 100;
    
}else {
    shipping=2;
}

document.getElementById('shippingCost').innerHTML=shipping.toFixed(2);

}
    </script>
    <style>
    .productName{
    font-size: 0.8cm;
    font: bolder;
    }
    .cartbutton:hover{
    
    filter: brightness(108%);
    }
    .price{
        background-color: darkorange;
        font-size: 1.5cm;
        width: 8cm;
        float: left;
    }
    </style>

    <title>product</title>
    <link rel="stylesheet" href="product.css">
</head>


<?php

?>

<body>
    <?php                     
        $page = 'home'; 
        include '../mainpage/header.php';                 
    ?>
    <br><br><br>
    <!--
        Header comes here

    -->

    <div class="product">
    <div class="images">
        <div class="mainimagediv">
            <span >
            <img  id="image0" class="mainimage" src="<?php echo $folder ?>/1.webp" alt="image1" >

            </span>

        </div>
        <div class="secondaryimagediv">
        <img onmouseenter="changeImage(1)" class="secondaryimage" id="image1" src="<?php echo $folder ?>/1.webp" alt="image1">
        <img onmouseenter="changeImage(2)" class="secondaryimage" id="image2" src="<?php echo $folder ?>/2.webp" alt="image2">
        <img onmouseenter="changeImage(3)" class="secondaryimage" id="image3" src="<?php echo $folder ?>/3.webp" alt="image3">
        <img onmouseenter="changeImage(4)" class="secondaryimage" id="image4" src="<?php echo $folder ?>/4.webp" alt="image4">
        <img onmouseenter="changeImage(5)" class="secondaryimage" id="image5" src="<?php echo $folder ?>/5.webp" alt="image5">
        </div>
    </div>
    <?php

    $sql = "SELECT * from product where productID=$productID";
    $result = $conn->query($sql);
    if ($result) {
       //echo ("Data retrived successfully ");
    }
    $row = $result->fetch_assoc();
    ?>
    <div class="productDetails">
        <p class="productName">
        <?php echo $row['name']?>
        </p>
        <p class="productSecondaryName">
        <?php echo $row['secondaryName']?>
        </p>

        <p class ="productDiscription">
        <?php echo $row['description']?>
        </p>

        <p class ="numberOfOrders">
        <?php echo $row['numberOfOrders']." orders "  ;?>
        </p>


        <!-- Item Price -->

        <div class ="price">
        
        <?php echo "US  $ ".$row['price'] ;?>
        
        
        </div>
        <br>
        <br>




        <!-- Number of Items -->

        <p class="numberOfItems">
        <script>
            var units=1;
            var max = 0;
            max = <?php echo $row['availableUnits'] ; ?>;
            weight
        </script>

        <br><br>Quantity: 
        <p style="color: cadetblue;"> 
           <img  onclick="changeUnits(1)" id="-" src="-.jpeg" alt="Minus mark"  border-radius=50% width="18px">
           <span style="color: black;" id="units" >
            &nbsp; 1
           </span>
           <img onclick="changeUnits(2)" id="+" src="+.jpeg" alt="Plus mark"  border-radius=50% width="30px">
      
        
        
        
        <?php
           echo $row['availableUnits']." Avilable in store";
           
        
        ?>
        </p>

        </p>
        <?php

        $sql1 = "SELECT District,Province,Country from Customer where customerID='".$_SESSION['customerID']."'";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        ?>

        <script>
            var weight= <?php echo $row['weight'] ;?>
        </script>
        <p class="shipping">
            Ships to :  <?php echo $row1['District'].",", $row1['Province'].",",$row1['Country']; ?>
            
            <br>
            Shipping : US &nbsp;$ 
        <span id="shippingCost">
            &nbsp; 2
        </span>
    
        </p>
        


       <span id="x">

       </span>

       <?php
       if ($row['availableUnits']>0) {
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


       
<a href="itemadded.php" onclick="location.href=this.href+'?units='+units;return false;">
     <button class="cartbutton" type="button"
        style="margin: 16px; padding: 16px; background-color: darkorange; color: aliceblue;
        border: none;border-radius: 4px;font-size: 12px" >
        Add to cart
     </button>
</a>

    </form>

        <?php
       }else{
           echo "This item is sold out";
       }
       ?>
       <script>

</script>


    </div>
    </div>
    <br><br>
    <?php
        include '../mainpage/footer.php';
    ?>
    
</body>
</html>