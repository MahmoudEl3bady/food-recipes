<?php
// Check if the form is submitted
if(isset($_POST['submit'])) {
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];
    include('../config/db_connection.php');
    // Check if file is uploaded successfully
    if(move_uploaded_file($tempImage, "uploads/".$image)) {
        // Create a database connection

        // Check connection
        if($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        // Insert image file name into database
        $sql = "INSERT INTO recipes (id,name,short_desc,description,cate,image) VALUES (03782,'name','short_desc','desc','cat','$image')";
        if($con->query($sql) === TRUE) {
            echo "Image uploaded and saved to database successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        // Close the database connection
        $con->close();
    } else {
        echo "Error uploading image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <form action="te.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="Upload">
    </form>
</body>
</html>