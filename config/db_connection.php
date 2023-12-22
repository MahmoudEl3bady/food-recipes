<?php 
  $con = new mysqli('localhost','root','','recipe_db');

            if(!$con){
                echo 'Connection Error :'.mysqli_connect_error();
            }
        
          /*To Redirect the user to another File(Page) */  
                 // header('Location:test.php');        
?>
