<?php 
include "../connection/connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
    <style>
        .main{
    display: flex;
    height: 800px;
    align-items: center;
    justify-content:  center;
    background-color: white;
    
}

.table{
    width: 900px;
    height: 450px;
    padding-top: 100px;
    background-color: aquamarine;
}

.signup h1{
   color: black;
}

button{
    background-color: aquamarine;
}
.buttonn{
    background-color: grey;
    text-align: center;
    align-items: center;
}
 </style>
 
<?php


if (
    (isset($_REQUEST['submit'])) && (isset($_REQUEST['name'])) && (isset($_REQUEST['secondname']))
    && (isset($_REQUEST['price'])) && (isset($_REQUEST['description'])) && (isset($_REQUEST['weight']))
    && (isset($_REQUEST['category']))
) {

    $productname = $_REQUEST['name'];
    $secondaryname = $_REQUEST['secondname'];
    $description = $_REQUEST['description'];
    $price = $_REQUEST['price'];
    $weight = $_REQUEST['weight'];
    $availableunits = $_REQUEST['units'];
    $category = $_REQUEST['category'];
    $sql = "INSERT INTO product(name,secondaryName,description,price,weight,availableUnits,category)VALUES('".$productname."','".$secondaryname."','".$description."',$price,$weight,$availableunits,'".$category."') ";
    $result1 = $conn->query($sql);

    $sql1 = "SELECT COUNT(*) FROM product";
    $result2 = $conn->query($sql1);
    $row = $result2->fetch_assoc();

$folder= $row['COUNT(*)']+1 ;
    $success = 0;
    $fail = 0;
    mkdir("../Product/".$folder);
$directory = "../Product/".$folder."/";
    
    for ($i=0; $i < 5; $i++) { 
        
    if(isset($_FILES['userfile'.$i])){
        
        move_uploaded_file($_FILES['userfile'.$i]['tmp_name'], $directory. ($i+1).".jpeg");
            
      }
      else{
          echo "image not found!";
      }
    }header("Adminpanel.php");
}
?>
   
   <script>
        function validate(){
            var product_name= document.forms["myForm"]["name"].value;
            var product_description= document.forms["myForm"]["description"].value;
            var product_price= document.forms["myForm"]["price"].value;
            var product_weight= document.forms["myForm"]["weight"].value;
            var product_units= document.forms["myForm"]["units"].value;

            if (!product_name) {
                alert ("Please enter product name")
                return false;
            }
            if (!product_description) {
                alert ("Please enter product description")
                return false;
            }
            if (!product_price) {
                alert ("Please enter product price")
                return false;
            }
            if (!product_weight) {
                alert ("Please enter product weight")
                return false;
            }
            if (!product_units) {
                alert ("Please enter product units")
                return false;
            }

            return true;
        }
    </script>

</head>
<body>
<div class="main">
        <div class="table">
            <div class="signup"><h1 style="text-align: center;">ADD ITEMS</h1></div><br>
                

            <div class="form" style="width: 900px;">
                
            <form enctype="multipart/form-data" action="addproduct.php" name="myForm" id="myForm" method="post" onsubmit=" return validate();">
                
                    <table align="center">
                        <tr><td>Enter Name:</td><td><input type="text" name="name" id="name" placeholder="Enter Name"  size="50"></td>
                    <td><span id="1" class="info"></span></td></tr>
                    <tr></tr><tr></tr><tr></tr><tr></tr>

                        <tr><td>Secondary Name:</td><td><input type="text" name="secondname" id="sname" placeholder="Secondary Name" size="50"></td>
                    <td><span id="2" class="info"></span></td></tr>
                    <tr></tr><tr></tr><tr></tr><tr></tr>

                    <tr><td>Description:</td><td><textarea  name="description" id="description" placeholder="Description" rows="3" cols="50"></textarea></td>
                    <td><span id="3" class="info"></span></td></tr>
                    <tr></tr><tr></tr><tr></tr><tr></tr>

                        <tr><td>Price:</td><td><input type="text" name="price" id="price" placeholder="Price"></td>
                    <td><span id="4" class="info"></span></td></tr>
                    <tr></tr><tr></tr><tr></tr><tr></tr>

                        <tr><td>Weight:</td><td><input type="text" name="weight" id="weight" placeholder="weight"></td>
                    <td><span id="5" class="info"></span></td></tr>
                    <tr></tr><tr></tr><tr></tr><tr></tr>

                    <tr><td>Available Units:</td><td><input type="number"  name="units" id="units" placeholder="Available Units"></td>
                    <td><span id="6" class="info"></span></td></tr>
                    <tr></tr><tr></tr><tr></tr><tr></tr>

                    <tr><td>Category:</td><td><select id="categories" name="category">
                        <option value="Cars and vehical">Cars and vehical</option>
                        <option value="Construction toys">Construction toys</option>
                        <option value="Creative toys">Creative toys</option>
                        <option value="Dolls">Dolls</option>
                        <option value="Educational toys">Educational toys</option>
                        <option value="Electronic toys">Electronic toys</option>
                        <option value="Food-related toys">Food-related toys</option>
                        <option value="Puzzle/assembly">Puzzle/assembly</option>
                        <option value="Science and optical">Science and optical</option>
                        <option value="Sound toys">Sound toys</option>
                        <option value="Spinning toys">Spinning toys</option>
                        <option value="Wooden toys">Wooden toys</option>
                        <option value="Others">Others</option></select></td>
                    <td><span id="6" class="info"></span></td></tr>
                    <tr></tr><tr></tr><tr></tr><tr></tr>

                    <tr>
                        <td> Image1: </td><td><input name="userfile0" type="file" id="userfile0" /> </td>
                    </tr>
                    <tr>
                        <td> Image2: </td><td><input name="userfile1" type="file" id="userfile1" /> </td>
                    </tr>
                    <tr>
                        <td> Image3: </td><td><input name="userfile2" type="file" id="userfil2" /> </td>
                    </tr>
                    <tr>
                        <td> Image4: </td><td><input name="userfile3" type="file" id="userfile3" /> </td>
                    </tr>
                    <tr>
                        <td> Image5: </td><td><input name="userfile4" type="file" id="userfile4" /> </td>
                    </tr>
                  
<td colspan="2" ><button class="button" type="submit" id="submit" name="submit" value="submit"> ADD ITEM </button></td>

</tr>
                    </table>
                </form>

        </div>
                
        </div>
    </div> 
</body>
</html>

