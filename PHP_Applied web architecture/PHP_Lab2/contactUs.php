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
<body>
	<?php include 'config4.php'; ?>
	<div id="wholepage">
		
	<?php include 'header.php'; ?>
			<!--<header id="pageheader">
				<div id="mneu">
			<h6>PLEASE CONTACT US!!</h6>
			<img src="library.jpg" id="hamber">
			<nav>
				<ul id="top" class="nav1">
					<li>
						<a href="ass6.php">Home</a>
					</li>
					<li
					<li>
						<a href="home.php">About US</a>
					</li>
					<li>
						<a href="browse books.php">Browse books</a>
					</li>
					<li>
						<a href="contacts us">Contact us</a>
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
      <h1>All books<p>Corner</p></h1>
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
      <img src="library.jpg">
      <h1>All books<p>Corner</p></h1>
      </figure>
    </li>

  </ul>

</div>


<form id="contact">
 Name<br>
	<input type="text" name="name" required="true">
	<br>
    Email address<br>
    <input type="email" name="name" required="true">
    <br> 
    Country<br>
    <input type="text" name="name">
    <br>
    
    <textarea id="subject" name="subject" placeholder="Write something" style="height:200px"></textarea>
     <input type="submit" name="submit" value="submit">
	</form>
	<footer class="fot">
	<!--<P>Copyrights 2016,All rights reserved,Happening Inc.</p>
	</footer>-->
	<?php 
	echo include 'footer.php';
	?>
</body>
</html>