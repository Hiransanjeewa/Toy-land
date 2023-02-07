<?php 
include "../connection/connection.php";
session_start();

    // Deciding the category of the products
  if (isset($_REQUEST['category'])) {
  $catecory = $_REQUEST['category'];
  
  
  $sql1="SELECT count('productID') from product  WHERE category='$catecory'";
  $sql2="SELECT * from product  WHERE category='$catecory'";
}
    
?>
<?php

$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($result1);
$_SESSION['noOFproducts']= $row1[0];

$result2=mysqli_query($conn,$sql2);
$_SESSION['row2'] = $result2;



?>
<?php
 $_SESSION['i']= 1;

  
 




?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="homestyle1.css">
    <script src="home script.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="homestyle1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

    <script src="app.js" defer></script>
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

      body{
        background-color: aquamarine;
      }
      .rec_i{
        margin-left: 50px;
        width: 5cm;
        height: 6cm;
      }
      .topproduct{
        background-color: white;
        height: 8cm;
        margin: 3px;
      }
      .rec_itm1{
        margin-top: 20px;
      }
      .othertoys{
        background-color: aquamarine;
        display: flex; 
      }
      .productimages{
        width: 7cm;
        height: 7cm;
      }
      .productimagesdiv{
        margin: 0.60cm;
        height: 9cm;
        width: 7cm;
        float: left;
        background-color: white;
      }
      .productimagesdiv:hover{
        filter: brightness(108%);
        border: 5px;
        border-style: solid;
        border-color: red;
      }.categories a{
    display:inline-block;
   margin-top: 20px;
   text-decoration: none;
   padding-left: 30px;
   font-size: 20px;
   color: rgb(0, 0, 0);
   border-radius: 10px;
   font-family: "Trirong", serif;
   line-height: normal;
   
}.rec_itm1{
    margin-top: 50px;

}
      

    </style>
</head>


 <!--body-->
 <body >
  <header>
    <?php  
          $page = 'home';                   
          include "header.php";                 
    ?>
    <br><br>
  </header>
   <!--catagories-->
    <div class="fullcontain">
        <div class= "cointainer">

            <div class= "categories">
              <div class="cate_icon">
                  <i class="fa fa-bars"></i>
                  <h2>Categories</h2>
              </div> 
              
             <a href="homepage.php?category=Animals">Animals</a><br>
             <a href="homepage.php?category=Cars and vehical">Cars and vehical</a><br>
             <a href="homepage.php?category=Construction toys">Construction toys</a><br>
             <a href="homepage.php?category='Creative toys'">Creative toys</a><br>
             <a href="homepage.php?category=Dolls">Dolls</a><br>
             <a href="homepage.php?category=Educational toys">Educational toys</a><br>
             <a href="homepage.php?category=Electronic toys">Electronic toys</a><br>
             <a href="homepage.php?category=Food-related toys">Food-related toys</a><br>
             <a href="homepage.php?category=Puzzle/assembly">Puzzle/assembly</a><br>
             <a href="homepage.php?category=Science and optical">Science and optical</a><br>
             <a href="homepage.php?category=Sound toys">Sound toys</a><br>
             <a href="homepage.php?category=Spinning toys">Spinning toys</a><br>
             <a href="homepage.php?category=Wooden toys">Wooden toys</a><br>
            </div>

          <div class= "discount">
                 <div class="banner">
                   <img src="banner.png" alt="banner" srcset="">
                 </div>

                 <div class="deals">
                    <img src="img3.png" id="img3" alt="" srcset="">
                    <a href="discount_item.php"><img class="img1" src="discount.png" alt="discount"></a>
                    <a href="topsearch.php"><img class="img2" src="topsearch.png" alt="topsearch" srcset=""></a>
                 </div>

                 <div class="topproduct">
                    <div class="topbuy">
                      <h1>Top</h1>
                      <h2>&nbsp; buying items</h2>
                      <a href="topbuying.php"><i class="fa fa-long-arrow-right"></i></a>
                    </div>

                    <div class="topbuyitems">
                    <a href="../product/product.php?productID=1"><img id= "p1" class="topbuy1" src="../product/1/1.webp" alt="1"></a>
                    <a href="../product/product.php?productID=2"><img id= "p2" class="topbuy2" src="../product/2/1.webp" alt="2"></a>
                    <a href="../product/product.php?productID=3"><img id= "p3" class="topbuy3" src="../product/3/1.webp" alt="3"></a>
                    <a href="../product/product.php?productID=4"><img id= "p4" class="topbuy4" src="../product/4/1.webp" alt="4"></a>
                    </div>
                 </div>
             </div>
        </div>

       <!-- <div class="swiper">
            <div class="swiper-wrapper">
                 <div class="swiper-slide"><a href="#"><img class="swiperimage1" src="swipper1.jpeg" alt="sw1"></a></div>
                 <div class="swiper-slide"><a href="#"><img class="swiperimage2" src="swipper2.jpeg" alt="sw2"></a></div>
                 <div class="swiper-slide"><a href="#"><img class="swiperimage3" src="swipper3.jpeg" alt="sw3"></a></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>    -->

        <div class="recommended_items">
             <div class="rec_top">
             <h1>Recommended Items</h1>
             <a href="#"><i class="fa fa-long-arrow-right"></i></a>
             </div> 

             <div class="rec_itm">
             <a href="../product/product.php?productID=5"><img class="rec_i" id="p5" src="../product/5/1.webp" alt="5" ></a>
             <a href="../product/product.php?productID=6"><img class="rec_i" id="p6" src="../product/6/1.webp" alt="6" ></a>
             <a href="../product/product.php?productID=7"><img class="rec_i" id="p7" src="../product/7/1.webp" alt="7" ></a>
             <a href="../product/product.php?productID=8"><img class="rec_i" id="p8" src="../product/8/1.webp" alt="8" ></a>
             <a href="../product/product.php?productID=23"><img class="rec_i" id="p8" src="../product/23/1.webp" alt="8" ></a>
             
            </div>

             <div class="rec_itm1">
             <a href="../product/product.php?productID=9"><img class="rec_i" id="p5" src="../product/9/1.webp" alt="5" ></a>
             <a href="../product/product.php?productID=13"><img class="rec_i" id="p6" src="../product/13/1.webp" alt="6" ></a>
             <a href="../product/product.php?productID=14"><img class="rec_i" id="p7" src="../product/14/1.webp" alt="7" ></a>
             <a href="../product/product.php?productID=15"><img class="rec_i" id="p8" src="../product/15/1.webp" alt="8" ></a>
             <a href="../product/product.php?productID=65"><img class="rec_i" id="p8" src="../product/65/1.webp" alt="8" ></a>
            
             </div>
         </div>
         <!--
      <div class="animation_movie">
     
       <div class="anima_pic">
           <img id="animatimg" class="animatimg" src="animation.gif" alt="">
       </div>
       
       <div class="anima_disc">
          <p>There are some products which especially buy themselves to comparing and searching online<br>
             for the best offer such as toys, a traditionally expensive product
               <br><br>
             Shoppers want to give children the highest possible quality so as to contribute to their <br>
             health, education and upbringing, but also find the cheapest price for these non-essential items.
            <br><br>
            Given that online sales are gaining ground, you’d be advised to provide this option on your <br>
             digital channels. But most importantly, it’s best you do it well: in order to compete with <br>
             Amazon, the leader in online searches and sales for toys, your brand's greatest asset will <br>
             be to generate product content that stands out for both the consumer and Google.
            </p>
       </div>

      </div>
-->
<div class="othertoys">
  <table>
    <tr>

  

<?php
if (isset($_REQUEST['category'])) {
  $i = 0;

  while ($row2 = mysqli_fetch_assoc($_SESSION['row2'])) {
    if (($i % 4 == 0) && ($i > 0)) {
      echo "</tr>";
      echo "<tr>";
    }
    ?>
    <td>
    <a href="../product/product.php?productID=<?php echo $row2['productID']; ?>">
    <div class="productimagesdiv">
    <img class="productimages"  src="../product/<?php echo $row2['productID']; ?>/1.webp" >
    <span id="productname" style=" font-size: large; color: black;">
    <?php echo $row2['name'] . "<br>"; ?>
    </span>
    
    <span id="price" style="color: black; font-size:  xx-large;">
    <strong>
    <?php echo "US $" . $row2['price'] . "<br>"; ?>
    </strong>
    </span>
   

    </div>
    </a>
    </td>
    
  
<?php


        $i++;
  }
}

?>
</table>
</div>
<!--
<div>
  <br>
         <div class="nextpage">
            <h1>Related Searches</h1>
              <div class="nexttopics">
                <a href="#">girls toys</a>
                <a href="#">boys toys</a>
                <a href="#">doll</a>
                <a href="#">action figures</a>
                <a href="#">kids toys</a>
                <a href="#">toy</a>
                <a href="#">lego</a>
                <a href="#">baby toys</a>
                <a href="#">toy car</a>
                <a href="#">hot weel</a>
              </div>
<hr class="hrline1">
              <div class="pagenumbers">
              <a href="#"><i class="fa fa-long-arrow-left" id="left" ></i></a>
                <a href="#" class="page1">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">7</a>
                <a href="#">8</a>
                <a href="#">9</a>
                <a href="#">10...</a>
              <a href="#"><i class="fa fa-long-arrow-right"></i></a>
              </div>
              <hr class="hrline1">
         </div>
    
    </div>
-->
<!--footer-->
    <footer>
     <?php
       include "footer.php";                
     ?>
    </footer> 

    <!--script-->
    
    
    <script>
      const swiper = new Swiper('.swiper', {
       autoplay:{
        delay:3000,
        disableOnInteraction: false,
       },
  direction: 'horizontal',
  loop: true,

  pagination: {
    el: '.swiper-pagination',
    clickable:true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

    let image =document.getElementById('img3');
    let images = ['img3.png','img2.png','img4.png','img5.png','img6.png']
    setInterval(() => {
      let random = Math.floor(Math.random() * 5);
      image.src = images[random];
    }, 2000);


    

    </script>
 </body>
</html>