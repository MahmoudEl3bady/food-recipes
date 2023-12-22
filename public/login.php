<?php 
    include('../config/db_connection.php');
  
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = htmlspecialchars($_POST['password']);
          session_start();
        $_SESSION['username'] =$username;

        $sql = "SELECT username,password FROM users WHERE username = '$username' AND password = '$password'";
        $result = $con->query($sql);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        // print_r($data);
        if($data){
            header('Location:./home.php');
        }
        else {
            echo "Incorrect username and password";
        }
        
    }



?>

<?php include('../src/header.php'); ?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<h3>Login</h3>
    <div>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Enter your Username " required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter Your password" required>
    </div>
<button type="submit" value="login" name="login">Login</button>
<a href="#" style="text-align: center; margin-top:30px;">Forgotten password?</a><br>
<a href="../public/register.php" style="text-align: center; margin-top:30px;">Sign Up</a>

</form>

<?php include('../src/footer.php'); ?>
