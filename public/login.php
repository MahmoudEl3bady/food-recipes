<?php 
    include('../config/db_connection.php');
   session_start();
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = htmlspecialchars($_POST['password']);
         
        $_SESSION['username'] =$username;
        $sql = "SELECT username,password ,id FROM users WHERE username = '$username' AND password = '$password'";
        $result = $con->query($sql);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $_SESSION['user_id'] = $data[0]['id'];
        // print_r($data);
        if($data){
        //    var_dump($data);
            header('Location:./home.php?id='. $data[0]['id']);
            //    <a href="./home.php?id=' . $data['id'] . '"  class="log-link">';

        }
        else {
            echo "Incorrect username and password";
        }
        
    }

?>

<?php include('../src/header.php'); ?>
<div class="container d-flex justify-content-center flex-column align-items-center pt-5">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form  bg-light register-form  ">
    <h1 class="text-center mb-4">Login</h1>

    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Enter your Username" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your password" required>
    </div>

    <button type="submit" name="login" class="submit-btn">Login</button>
    <a href="#" class="text-center log-link mt-3">Forgotten password?</a><br>
    <a href="../public/register.php" class=" log-link text-center mt-3">Sign Up</a>
</form>

</div>


<?php  ?>
