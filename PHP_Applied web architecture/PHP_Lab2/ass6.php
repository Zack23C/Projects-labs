<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="ass51.css">
<link rel="stylesheet" type="text/css" href="jsf/flexslider.css">
<meta charset="utf-8"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="jsf/jquery.flexslider.js"></script>
<script type="text/javascript" src="jsf/a5.js"></script>
<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });
</script>
</head>
	<?php include 'config4.php'; ?>

<body>
	<div id="wholepage">


	<?php include 'header.php'; ?>
	
			<!--<header id="pageheader">
				<div id="mneu">
			<h6>ZACK BOOKS LIBRARY</h6>
			<img src="hamburger.png" id="hamber">
			<nav>
				<ul id="top" class="nav1">
					<li>
						<a href="ass6.php">Home</a>
					</li>
					<li>
						<a href="home.php">About US</a>
					</li>
					<li>
						<a href="browse books.php">Browse Books</a>
					</li>
					<li>
						<a href="contacts us.PHP">Contact us</a>
					</li>
					<li>
						<a href="my books.php">My books</a>
					</li>	
				</ul>
			</nav>
		</div>
		</header>-->

	<div id="maincolumn">

<div class="flexslider">

  <ul class="slides">
  	<li>
  		<figure class="bigimage">
		<img src="library.jpg">
		<h1>Welcome to <p> ZACKS LIBRAY</p></h1>
	</figure>
    </li>

    <li>
    <figure class="bigimage">
      <img src="library.jpg">
      <h1>All books <p>Corner</p></h1>
	</figure>
    </li>

    <li>
       <figure class="bigimage">
      <img src="library.jpg" >
      <h1>All books<p>Corner</p></h1>
      </figure>
    </li>

    <li>
    	<figure class="bigimage">
      <img src="library.jpg" height="400px">
      <h1>All books<p>Corner</p></h1>
      </figure>
    </li>

  </ul>

</div>
    <ul id="buttons">
    	<li>
	<a href="#" class="bigbutton">Create Account</a>
	</li>
</ul>

<form id="contact">
	
    Username:<br>
    <input type="email" name="name" required="true">
    <br> 
    Password:<br>
    <input type="text" name="name">
    <br>
     <input type="submit" name="submit" value="sign in">
	</form>

	<!--<footer class="fot">
	<P>Copyrights 2017,All rights reserved,ZackBooks Inc.</p>
	</footer>-->
	<?php
	echo include 'footer.php';
?>
</body>
</html>