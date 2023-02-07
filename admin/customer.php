<!DOCTYPE html>
    <head>
        <meta charset ="utf-8">
        <meta http-equiv="x-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Stylesheet" href="customer.css">
    </head>
    <body>
    <div class="container-3">
    <table>
        <?php
        
        include "../connection/connection.php";
        
           //---the name given for the customer id is typed as $id
            $id=$_REQUEST['customerID'];
            
            $querry="SELECT * FROM customer WHERE customerID=$id";
            $querry_run = $conn->query($querry);
        
            while($row=$querry_run->fetch_array()){
              
            ?>
            <h2 style="padding:5px"> <?php echo $row['customerName'];?> Account Overview</h2>
            <img src="customers-icon-12.jpeg" class="cust01"><br><br>
            <tbody>
            <tr><td><b>Customer ID</td><td><?php echo $row['customerID'];?></td><tr>
            <tr><td><b>Customer Name  </td> <td><?php echo $row['customerName'];?></td></tr>
            <tr><td><b>Email </td> <td><?php echo $row['email'];?></td></tr>
            <tr><td><b>Mobile</td> <td><?php echo $row['mobile'];?></td></tr>
            <tr><td><b>Address line 01</td> <td><?php echo $row['addressLine1'];?></td></tr>
            <tr><td><b>District</td> <td><?php echo $row['District'];?></td></tr>
            <tr><td><b>Province</td> <td><?php echo $row['Province'];?></td></tr>
            <tr><td><b>Country</td> <td><?php echo $row['Country'];?></td></tr>
            <tr><td colspan="2" style="text-align: center;">        <a class="links"  href="adminpanel.php" >
     <button class="cartbutton" type="button"
        style="margin: 16px; padding: 16px; background-color: darkorange; color: aliceblue;
        border: none;border-radius: 4px;font-size: 15px">
        <span class="buttontext"><FONT COLOR=black>Admin Panel</span>
     </button>
</a></td> </tr>
           <tbody>
            <?php
             }
        
        ?>
       
        </table>

    </div>

</body>
</html>