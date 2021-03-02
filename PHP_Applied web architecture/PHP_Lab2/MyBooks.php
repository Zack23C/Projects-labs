


<?php 
            
//protection from XSS (CROSS-SITE SCRIPTING)code injection eg iframe
            include('config4.php');


?>

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
 

       

            <h2> Reserved Books</h2>

            <div>

              <img class="bookimage" src="pulo.jpeg" alt="toppicture" width="20%" height="10%">

            </div>

  





<?php
# This is the mysqli version

$searchtitle = "";
$searchauthor = "";

if (isset($_POST) && !empty($_POST)) {
# Get data from form
    $searchtitle = trim($_POST['searchtitle']);
    $searchauthor = trim($_POST['searchauthor']);
}

//  if (!$searchtitle && !$searchauthor) {
//    echo "You must specify either a title or an author";
//    exit();
//  }

$searchtitle = addslashes($searchtitle);
$searchauthor = addslashes($searchauthor);

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=NjeriOlenkereLab4.php>Return to home page </a>");
    exit();
}

# Build the query. Users are allowed to search on title, author, or both

$query = " select title, author, onloan, bookid from books where onloan is true";
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " and title like '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " and author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " and title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; // unfinished
}

//echo "Running the query: $query <br/>"; # For debugging


  # Here's the query using an associative array for the results
//$result = $db->query($query);
//echo "<p> $result->num_rows matching books found </p>";
//echo "<table border=1>";
//while($row = $result->fetch_assoc()) {
//echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
//}
//echo "</table>";
 

# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    $stmt->bind_result($title, $author, $onloan, $bookid);
    $stmt->execute();
    
//    $stmt2 = $db->prepare("update onloan set 0 where bookid like ". $bookid);
//    $stmt2->bind_result($onloan, $bookid);
    

    echo '<table bgcolor="dddddd" cellpadding="6">';
    echo '<tr><b><td>BookID</td><b> <td>Title</td> <td>Author</td> <td>Reserved?</td> </b> <td>Return</td> </b></tr>';
    while ($stmt->fetch()) {
        if($onloan==1)
            $onloan="Yes";
       
        echo "<tr>";
        echo "<td> $bookid </td><td> $title </td><td> $author </td><td> $onloan </td>";
        echo '<td><a href="returnBook.php?bookid=' . urlencode($bookid) . '">Return</a></td>';
        echo "</tr>";
        
    }
    echo "</table>";
    ?>




       <footer>
        <?php include ('footer.php');?>   
       </footer> 

        

     </div>
 </div>
 </div>


    </body>
    
</html>