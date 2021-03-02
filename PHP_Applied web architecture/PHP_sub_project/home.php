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
      <h6>ABOUT US</h6>
      <img src="hamburger.png" id="hamber">
      <nav>
        <ul id="top" class="nav1">
          <li>
            <a href="ass6.php">Home</a>
          </li>
          <li>
            <a href="home.php">About us</a>
          </li>
          <li>
            <a href="browse books.php">Browse books</a>
          </li>
          <li>
            <a href="contacts us.php">Contact us</a>
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
    <h1>ABOUT US</h1>
    <p >
       ZACKS LIBRARY is about  online books from different types of subjects and age groups.It brings people to the world of deeper understanding and rich knowledge about everything that an individual might nee or have access to.The library is suporting more science research and other technical knowledge We are aimimg to bring more fantasy through SweApps by bringing to you this app which protects you and your friends 
           The app masters secrecy of individuals buy not using their personal information to sign upp for we discovered that by using 
           your credentials to sign upp can haunt our user's life , jobs for example .We brought signing up by finger print or phone number for it is easy to delect for future reasons  .  
    </p>
   <!-- <footer class="fot">
  <P>Copyrights 2016,All rights reserved,Happening Inc.</p>
  </footer> -->
<?php
echo include 'footer.php'; 
?>

</body>


</html>