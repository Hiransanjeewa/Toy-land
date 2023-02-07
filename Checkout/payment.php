<?php

include "../connection/connection.php";
session_start();

?>

<?php

if ($_SESSION['paymentconfirmation']) {
    if (isset($_REQUEST['cardholdername'])) {
        $paymentmethod = 2;
    $payment = 'card payment';
    
    }else {
      $payment = 'cash on dilivery';
    }

if ((isset($_REQUEST['units'])) && ($_REQUEST['paymentmethod']>0)) {

    $productunits=$_REQUEST['units'];
    $_SESSION['units'] = explode (",", $productunits);
    $productunits = $_SESSION['units'];
    $custommerID = $_SESSION['customerID'];
    $productIDS = $_SESSION['productsincart'];
    $paymentmethod=$_REQUEST['paymentmethod'];
    
    
    $weight=0;
    $shipping=0;
    $itemcosts=0;

    $x = 0;
    for ($i=0; $i < count($productIDS); $i++) {
        $sql1 = "SELECT * from product WHERE productID='".$productIDS[$i]."'";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();

        $weight += $row1['weight'] * $productunits[$x];
        $itemcosts += $row1['price'] * $productunits[$x];
        $x += 2;
    }
    // ***  Shipping Rates ***
    // First 2 kg 300 Lkr
    // Additional lkr 150 per 1 kg

    if ($weight>2) {
        $shipping = (2 + ceil($weight - 2) * 1);
        $shipping=($shipping / 100) * 100;
    }else {
        $shipping=2;
    }
$totalcost = 0;
$totalcost = $shipping + $itemcosts;

?>

<?php
}

?>
<!--  
    **********  Card Verification and then make paymentmethod=2 **********    
--> 
<?php
if ($paymentmethod==1) {

?>



<html>
    <head>
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
               //var number=document.getElementById['cardno'].value;
        </script>
        <script>
function validatecard(){
  if (!(document.getElementById('cardholdername').value)) {
    alert ('Please enter card holder name ! ');
  return false;

  }
    var creditCardNum=document.getElementById('cardno').value;

// Credit card number cannot be empty
if(creditCardNum.length == 0){
    alert ('Please enter a credit card number ! ');
  return false;
}

// The credit card number must be 16 digits in length
if(creditCardNum.length !== 16){
    alert ('Credit card number is not valid ! ');
  return false;
}

// All of the digits must be numbers
for(var i = 0; i < creditCardNum.length; i++){
  // store the current digit
  var currentNumber = creditCardNum[i];

  // turn the digit from a string to an integer (if the digit is in fact a digit and not anther char)
  currentNumber = Number.parseInt(currentNumber);

  // check that the digit is a number
  if(!Number.isInteger(currentNumber)){
    alert ('Credit card number cannot have letters ! ');
    return false;
  }
}

// The credit card number must be composed of at least two different digits (i.e. all of the digits cannot be the same)
var obj = {};
for(var i = 0; i < creditCardNum.length; i++){
  obj[creditCardNum[i]] = true;
}
if(Object.keys(obj).length < 2){
  return false;
}

// The final digit of the credit card number must be even
if(creditCardNum[creditCardNum.length - 1] % 2 !== 0){
    alert ('Credit card number is not valid ! ');
  return false;
}

// The sum of all the digits must be greater than 16
var sum = 0;
for(var i = 0; i < creditCardNum.length; i++){
  sum += Number(creditCardNum[i]);
}
if(sum <= 16){
    alert ('Credit card number is not valid ! ');
  return false;
}

// validating date

var Expmonth=document.getElementById('month').value;
var Expyear=document.getElementById('year').value;


if ((Expmonth==0)||(Expyear==0)) {
    alert ('Please Enter Expiry date correctly ! ');
  return false;
}

// validating cvv
var cardcvv=document.getElementById('cvv').value;
if (cardcvv==0) {
    alert ('Please enter the cvv ! ');
  return false;
}
if (cardcvv.length<3) {
    alert ('Please enter correct cvv ! ');
  return false;
}
if(isNaN(cardcvv)){
	alert ('Please enter correct cvv ! ');
  return false;
 }else{
	return 0;
 }



return true;
}

function changepaymenttype() {
        let confirmAction = confirm("Are you sure to Make a cash on dilivery order");
        if(confirmAction){
            return true;
        }else{
            return false;
        }
  }
        </script>
        
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
                
               
            }
            
            .form-body{
                width: 10cm;
               
                text-align: left;
                margin-left: 7cm;
                
            
            }
            .cardholder{
              font-size: 0.4cm;
            }
            .card-number{
                width: 7cm;
                font-size: 0.4cm;
                
            }
            .cartbutton{
              

            }
           .cartbutton:hover{
    filter: brightness(108%);
    }
    .paynowbutton{
      background-color: chartreuse;
      width: 3cm;
      height: 1cm;
       
    }
    .cvv{
      inline-size: 1.2cm;
      font-size: 0.4cm;
    }

.header{
    font-size:  1.3cm;
    text-align: center;
}
.datesselectors{
  
  font-size: 0.4cm;

}

        </style>
    </head>
    <body>
      <?php
        $page = 'payment';
        include '../mainpage/header.php';
      ?>
        <br><br><br>
        <div class="maindiv">
            <br><br>
            <h1 class="header">
                Add credit or Debit card Here
            </h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="credit-card" id="form" onsubmit="return validatecard();"   >
               
            <div class="form-header">
                  <h4 class="title">Credit card detail</h4>
                </div>
                <div class="form-body" id="form" >
                <strong> Name on the card</strong>
                  <input type="text" class="cardholder" name="cardholdername" id="cardholdername" maxlength="30" placeholder="Saman Kumara">
                  <br><br>
                  
                  <!-- Card Number -->
                  <strong> Card number</strong>
                  <input type="text" name="cardno" class="card-number" id="cardno" maxlength="16" placeholder="xxxx-xxxx-xxxx-xxxx">
                  <br>
                  <br>
                  <strong>Expiry date</strong>&nbsp;
               
                  <!-- Date Field -->                    
                      <select name="Month" id="month" class="datesselectors">
                        <option value="0">Month</option>
                        <option value="january">January</option>
                        <option value="february">February</option>
                        <option value="march">March</option>
                        <option value="april">April</option>
                        <option value="may">May</option>
                        <option value="june">June</option>
                        <option value="july">July</option>
                        <option value="august">August</option>
                        <option value="september">September</option>
                        <option value="october">October</option>
                        <option value="november">November</option>
                        <option value="december">December</option>
                      </select>
                   
                      <select name="Year" id="year" class="datesselectors">

                        <option value="0">year</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2016">2025</option>
                        <option value="2017">2026</option>
                        <option value="2018">2027</option>
              
                      </select>
                    
                  <br>
                  <br>
               
                  <!-- Card Verification Field -->
                  <div class="card-verification">
                      <strong>Cvv</strong> 
                    
                      <input class="cvv" type="text" maxlength="3" id="cvv" name="cvv" placeholder="cvc" >
                    
                  </div><br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="submit" class="paynowbutton">
                    Pay now
                  </button>
               
                  
                  
                </div>

            
            
            <br>

            <br>
            <br>
            <br>


            <div class="links">
 <a class="links"  href="payment.php?paymentmethod=2&units=<?php echo $productunits[0];?>">
     <button onclick="changepaymenttype()" class="cartbutton" type="button"
        style="margin: 16px; padding: 16px; background-color: darkorange; color: aliceblue;
        border: none;border-radius: 4px;font-size: 15px">
        <span class="buttontext"><FONT COLOR=black>Make cash on dilivery order</span>
        
     </button>
</a>

<a href="../Shoppingcart/cart.php">
     <button class="cartbutton" type="button"
        style="margin: 16px; padding: 16px; background-color: darkorange; color: aliceblue;
        border: none;border-radius: 4px;font-size: 15px;  ">
        &nbsp;&nbsp;&nbsp;<FONT COLOR=black>Go back to cart &nbsp;&nbsp;&nbsp;
     </button>
</a>
<br>
Buy more items  and get discounts 
<br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>
    </form>
    </body>
    
</html>



<?php



}






?>




<!--      if credit card confirmed or cash on dilivery        --> 

<?php

if ($paymentmethod==2) {
  $productunits = $_SESSION['units'];
  $custommerID = $_SESSION['customerID'];
  $productIDS = $_SESSION['productsincart'];
    $_SESSION['paymentconfirmation'] = 0;
    $x = 0;
    for ($i=0; $i < count($productIDS); $i++) {
        
        $sql1 = "SELECT * from product WHERE productID='".$productIDS[$i]."'";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();

        //  Replace renewed number of units in stock

        $availableunits = $row1['availableUnits'] - $productunits[$x];
        $numberoforders=  $row1['numberOfOrders'] + $productunits[$x];
        echo $productunits[$x];
        
        $sql2 = "UPDATE product SET availableUnits= $availableunits ,numberOfOrders=$numberoforders  WHERE productID=$productIDS[$i]";
        $result2 = $conn->query($sql2);

        $sql3 = "DELETE  FROM cart  WHERE customerID=$custommerID AND productID=$productIDS[$i]  ";
        $conn->query($sql3);

        $sql5 = "INSERT INTO orders(customerID,productID,units,paymentmethod)VALUES($custommerID,$productIDS[$i],$productunits[$x],'".$payment."') ";
    $result5 = $conn->query($sql5);
        

        $x += 2;
    }
    ?>
    <html>
    <head>
        <title>
            Item adding confirmation
        </title>
        <link rel="stylesheet" href="payment.css">
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
        <style>
           .cartbutton:hover{
    
    filter: brightness(108%);
    }
        </style>
    </head>
    <body>
        <?php
          $page = 'confirm';
          include '../mainpage/header.php';
        ?>
        <br>
        <div class="maindiv">
            <br><br>
            <h1 class="header">
                Your Order is Confirmed
            </h1>
            
            <img class="tikimage"  src="Tik.png" alt="tickmark" width="100px" >
            Your payment is <?php if (isset($totalcost)) { echo $totalcost." $"; }   ?>
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

    <?php
    
}
}else{
  header('Location: confirm.html');
  exit();
}
include '../mainpage/footer.php';
?>
