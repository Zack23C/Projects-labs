<?php
session_start ();
/* SQL injection.prevention
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

@ $db = new mysqli('localhost', 'root', '', 'testinguser');//CONNECTING WITH DB testnguser

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
    $uname = mysqli_real_escape_string($db, $_POST['username']);//escape specal characters(escapes) (espects 2 parameters)goes in db then checks

    
    #without function, so here you can try to implement the SQL injection
    #various types to do it, either add ' -- to the end of a username, which will comment out
    #or simply use 
    #' OR '1'='1' #
    #$uname = $_POST['username'];
    
    #here we hash the password, and we want to have it hashed in the database as well
    #optimally when you create a user (through code) you simply send a hash
    #hasing can be done using different methods, MD5, SHA1 etc.
    
    $upass = sha1($_POST['userpass']);//create userpassword variable.. Whats SHAL?

    
    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql
    //echo $uname;
    //echo '<br>';
    //echo $upass;
    //echo "SELECT * FROM user WHERE username = '{$uname}' AND userpass = '{$upass}'";
    //$query = ("INSERT INTO username($uname) VALUES ('{$uname}')");
    
    $query = ("SELECT * FROM user WHERE username = '{$uname}' "."AND userpass = '{$upass}'");
    //select all where username==uname and userpassword==upasword
       
    
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
    
        <title>gallery</title>
        
      
      
        <meta charset="utf-8"/>
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="Lab4.css"/>
        
    </head>
    
    <body>
    
        <div id="wrap">
            
            <?php 
            
            include('header.php');
            
            ?>
            
          
            
                <div class="lid">
               
                        <h3>Gallery</h3>
                    
                       
                    <h4> Most read books</h4> 
                 
                        <ul class="table">
                            <li class="one">  <img class="otherimage" src="book11.jpg" alt="frontpagepicture" width="203px" height="302px"></li>
                            
                            <li class="two"> <img class="otherimage" src="book6.jpg" alt="frontpagepicture" width="202px" height="302px"></li>

                             <li class="three"> <img class="topimage" src="book5.jpg" alt="frontpagepicture" width="202px" height="302px"></li>

                         <li class="three"> <img class="topimage" src="book4.jpg" alt="frontpagepicture" width="202px" height="302px"></li>


                        </ul>
                        <p  class="last"> Log in to see more! </p>

                            <?php
        
        
        
        if (isset($totalcount)) {//icheck it out(if the total count is entered)
            if ($totalcount == 0) {
                echo '<h2>You got it wrong. Can\'t break in here!</h2>';
            } else {
                header("location: fileupload4.php");//header redirects user to location of file upload.
            }
        }
        ?>

       <h3>Log in :</h3>
                
                <form method="POST" action="">
                            
                           
                            
                            <table cellpadding="20" cellspacing="0" width="100%">
                            
                                <tr>
                                
                                    <td width="50%" valign="top">
                                    
                                        <label for="name">Username</label><br />
                                        
                                        <input id="name" type="text" name="username" required="" />
                                        
                                        <br /><br />
                                        
                                        <label for="Password">Password</label><br />
                                        
                                        <input type="Password" id="Password" name="userpass" required="" />
                                    
                                    </td>
                                    
                                    <td width="50%" valign="top">
                                    
                                    
                                        
                                        <input type="submit" value="Log In" required="" />
                                    
                                    </td>
                                
                                </tr>
                            
                            </table>
                            
                        </form>   
                <p  class="last"> </p>
                
            
           
           <footer>
              <?php include('footer.php');?> 

           </footer> 
       </div>
            
        </div>
        </div>
        </div>
    </body>

</html>