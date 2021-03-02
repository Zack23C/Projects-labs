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


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

#this function is for older PHP versions that use Magic Quotes.
#
//    function escapestring($input) {
//    if (get_magic_quotes_gpc()) {
//    $input = stripslashes($input);
//    }
//
//    @ $db = new mysqli('localhost', 'root', '', 'testinguser');
//
//
//    return mysqli_real_escape_string($db, $input);
//
//    }//paswordhashig= hash is the blender for passwords..(password+hash=bits and pieces blended in. fROM THIS )

@ $db = new mysqli('localhost', 'root', '', 'library');//CONNECTING WITH DB testnguser

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=NjeriOlenkereLab4.php>Return to home page </a>");
    exit();
}

    #the mysqli_real_espace_string function helps us solve the SQL Injection
    #it adds forward-slashes in front of chars that we can't store in the username/pass
    #in order to excecute a SQL Injection you need to use a ' (apostrophe)
    #Basically we want to output something like \' in front, so it is ignored by code and processed as text

if (isset($_POST['username'], $_POST['userpass'])) {
    #with statement under we're making it SQL Injection-proof
    $uname = mysqli_real_escape_string($db, $_POST['username']);

    
    #without function, so here you can try to implement the SQL injection
    #various types to do it, either add ' -- to the end of a username, which will comment out
    #or simply use 
    #' OR '1'='1' #
    #$uname = $_POST['username'];
    
    #here we hash the password, and we want to have it hashed in the database as well
    #optimally when you create a user (through code) you simply send a hash
    #hasing can be done using different methods, MD5, SHA1 etc.
     $uname = $_POST['username'];//create useruser variable..
    $upass = sha1($_POST['userpass']);//create userpassword variable.. Whats SHAL?

    
    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql
    echo $uname;
    echo '<br>';
    echo $upass;
    //echo "SELECT * FROM user WHERE username = '{$uname}' AND userpass = '{$upass}'";
    
    $query = ("SELECT * FROM user WHERE username = '{$uname}' "."AND userpass = '{$upass}'");//select all where username==uname and userpassword==upasword
       
    
    $stmt = $db->prepare($query);//prepares
    $stmt->execute();//executes
    $stmt->store_result(); //puts the results here
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows();
    
    
    
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        
        if (isset($totalcount)) {
            if ($totalcount == !0) {
                echo '<h2>You got it wrong. Can\'t break in here!</h2>';
            } else {
                echo '<h2>Welcome! Correct password.<a href="fileupload4.php">Go there</a></h2>';

            }
        }
        ?>

        <form method="POST" action="">
            <input type="text" name="username">
            <input type="password" name="userpass">
            <input type="submit" value="Go">
        </form>

    </body>
</html>
