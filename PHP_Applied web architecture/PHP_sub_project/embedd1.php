<?php



<form action="embedd.php" method="GET">
    
    <input type ="text" name="name">
    <input type="submit" value="Submit">
    
</form>
  
<?php


}




?>



<a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a>

<a class="<?php echo $current_page == 'booksearch.php' ? 'active' : NULL ?>" href="booksearch.php">Browse books</a>
