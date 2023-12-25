<?php 
include('../config/db_connection.php');

    session_start();
    // $_SESSION['logged'] =0;
        if(isset($_POST['submit'])){
            $name =htmlspecialchars ($_POST['name']);
            $username =htmlspecialchars ($_POST['username']);
            $email =htmlspecialchars( $_POST['email']);
            $password =htmlspecialchars($_POST['password']);
            
            // connection to mySql database
            $sql = "INSERT INTO users (name,username,email,password) VALUES ('$name','$username','$email','$password')";
                  
            if($con->query($sql)){
                $res = $con->query("SELECT id FROM users where username='$username'");
                session_start();
                $id = mysqli_fetch_all($res,MYSQLI_ASSOC); 
                $_SESSION['user_id'] = $id[0]['id'];
                 header('Location:./home.php?id='. $id[0]['id']);
            }
            else {
                echo 'Query Error '.mysqli_error($con);
            }

        }
?>

<?php include'../src/header.php'?>
    <div class="container mt-5 d-flex justify-content-center">
        <form action="register.php" method="post" class="form bg-light register-form ">
            <h1 class="text-center mb-4">Sign Up</h1>

            <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" name="name" class="form-control" id="Name" placeholder="Enter your Name" required>
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter your Username" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="example@gmail.com" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter strong password" required>
            </div>
            <div class="footer">
            <button type="submit" name="submit" class="submit-btn">Sign Up</button>
            <footer>Already a member? <a class="log-link" href="login.php">Login here</a></footer>
            </div>
        </form>
    </div>
      
<?php include'../src/footer.php'?>
