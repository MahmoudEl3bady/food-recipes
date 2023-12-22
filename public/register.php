<?php 
include('../config/db_connection.php');
        if(isset($_POST['submit'])){
            $name =htmlspecialchars ($_POST['name']);
            $username =htmlspecialchars ($_POST['username']);
            $email =htmlspecialchars( $_POST['email']);
            $password =htmlspecialchars($_POST['password']);

            // connection to mySql database
            
        

            $sql = "INSERT INTO users (name,username,email,password) VALUES ('$name','$username','$email','$password')";
            // $con->query($sql); 
            
            if($con->query($sql)){
             session_start();
             $_SESSION['username'] =$username;
                header('Location:./home.php');

            }
            else {
                echo 'Query Error '.mysqli_error($con);
            }

        }
?>

<?php include'../src/header.php'?>
    <form action="register.php" method="post">
        <h1>Sign Up</h1>
            <div>
            <label for="username">Name:</label>
            <input type="text" name="name" id="Name" placeholder="Enter your Name " required>
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Enter your Username " required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="example@gmail.com" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter strong password" required>
        </div>
        <div>
            
        </div>
        <button type="submit" name="submit" value="submit">Register</button>
        <footer>Already a member? <a href="login.php">Login here</a></footer>
<?php include'../src/footer.php'?>
