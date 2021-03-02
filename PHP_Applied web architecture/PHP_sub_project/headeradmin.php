


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
                        <a class="<?php echo ($current_page == 'Admin.php' || $current_page == "") ? 'active' : NULL ?>"href="Admin.php">Home1</a>
                    </li>
                    <li>
                        <a class="<?php echo ($current_page == 'addbook.php') ? 'active' : NULL ?>" href="addbook.php">Add a new book</a>
                    </li>
                    <li>
                        <a class="<?php echo ($current_page == 'deletebook.php') ? 'active' : NULL ?>" href="deletebook.php">Delete</a>
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