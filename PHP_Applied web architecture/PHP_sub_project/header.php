


<?php


include('config4.php');


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body> 
<header id="pageheader">


                <div id="mneu">
            <h6></h6>
            <img src="hamburger.png" id="hamber">
            <nav>
                <ul id="top" class="nav1">
                    <li>
                        <a class="<?php echo ($current_page == 'ass6.php' || $current_page == "") ? 'active' : NULL ?>"href="ass6.php">Home</a>
                    </li>
                    <li>
                        <a class="<?php echo ($current_page == 'home.php') ? 'active' : NULL ?>" href="home.php">About US</a>
                    </li>
                    <li>
                        <a class="<?php echo ($current_page == 'browsedBooks.php') ? 'active' : NULL ?>" href="browsedBooks.php">Search books</a>
                    </li>
                    <li>
                        <a class="<?php echo ($current_page == 'MyBooks.php') ? 'active' : NULL ?>" href="MyBooks.php">Reserved books</a>
                        
                    </li>
                        
                       <li>   
                         <a class="<?php echo ($current_page == 'contactUs.php') ? 'active' : NULL ?>" href="contactUs.php">Contact us</a>
                    </li>
                    <li>   
                         <a class="<?php echo ($current_page == 'SQLInjection.php') ? 'active' : NULL ?>" href="SQLInjection.php">Gallery</a>
                    </li>     
                </ul>
            </nav>
             </div>
        </header>

</body>
</html>