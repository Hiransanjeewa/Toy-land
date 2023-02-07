<?php 
    include "../connection/connection.php";
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="homestyle1.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="../mainpage/style.css">
        <link rel="stylesheet" href="../mainpage/utility.css">
        <link rel="stylesheet" href="../mainpage/footer.css">
        

        <style>
            
            .othertoys{
                background-color: #f7a7e2;
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
            }
        </style>

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
            $page = 'shop';
            include '../mainpage/header.php';
        ?>
        <br><br><br><br>

        <?php 
            $sql2="SELECT * from product";
            $result2=mysqli_query($conn,$sql2);
            $_SESSION['row2'] = $result2;
        ?>

        <div class="othertoys">
            <table>
                <tr>

                <?php
                    $i = 0;
                    while ($row2=mysqli_fetch_assoc($_SESSION['row2'])) {
                        if (($i%4==0)&&($i>0)) {
                            echo "</tr>";
                            echo "<tr>";
                        }
                ?>
                    <td>
                        <a href="../product/product.php?productID=<?php echo $row2['productID'] ;?>">
                        <div class="productimagesdiv">
                            <img class="productimages"  src="../product/<?php echo $row2['productID'] ;?>/1.webp" >
                            <span id="productname" style=" font-size: large; color: black;">
                                <?php echo $row2['name']."<br>" ;?>
                            </span>
    
                            <span id="price" style="color: black; font-size:  xx-large;">
                                <strong>
                                    <?php echo "US $".$row2['price']."<br>" ;?>
                                </strong>
                            </span>
   

                        </div>
                        </a>
                    </td>
    
  
                    <?php
                        $i++;
                        }

                    ?>
            </table>
        </div>
        <br><br><br>
        <footer>
            <?php
                include "../mainpage/footer.php";                
            ?>
        </footer> 
    </body>
</html>