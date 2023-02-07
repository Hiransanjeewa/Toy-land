<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="utility.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
	<link rel="stylesheet" type="text/css" href="contact.css">
    <link rel="stylesheet" type="text/css" href="about.css"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"-->
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

<!-- Header -->
<?php $page = 'contact'; include 'header.php'; ?>

<br><br><br>

<section class="contact">
<h1> Contact Us </h1>
<!--Contact div 1-->
<div class="left">
				
<form action="mailsender.php" id="contactform" name="contactform" style="display: block;" method="POST">
	
<div class="inputbox">	
	<input type="text" name="name" placeholder="Name" id="name" class="text " value="" style="opacity: 1;">
	<input type="text" name="email" placeholder="Email" id="email" class="text " value="">
</div>
<div class="inputbox">		
	<input type="text" name="number" placeholder="Number" id="number" class="text " value="">
	<input type="text" name="subject" placeholder="Subject" id="subject" class="text " value="">
</div>
	<textarea name="message" id="message" class="textarea " placeholder="Message"></textarea>
	
	<input type="submit" name="submit" value="SUBMIT" id="submit" class="btn">
		
</form>   
         
</div>
<!--Contact div 1 ends-->

<!--Contact div 2-->
	<div class="right">
        <p>You can contact us using the form to your left, alternatively you can use one of the links below:</p>
        <ul class="contactinfo">
            <li class="phone">+94 7540 429083</li>
            <li class="email"><a href="mailto:thvidhush@gmail.com">toy_land@gmail.com</a></li>
            <li class="twitter"><a href="http://twitter.com/josephmacdonald">twitter.com/toyland</a></li>
        </ul>
    </div>        	
<!--Contact div 2 ends-->
</section>

<!-- Footer Section -->
<div style="clear: both;">
<?php include 'footer.php'; ?>
</div>

<script src="app.js"></script>

</body>
</html>