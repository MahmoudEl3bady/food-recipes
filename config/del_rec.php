<?php 
include('../config/db_connection.php');

if (isset($_GET['r_id'])) {
    $recipe_id = $_GET['r_id'];

    // Perform the delete query
    $delete_query = "DELETE FROM recipes WHERE r_id = $recipe_id";
    $result = $con->query($delete_query);

    if ($result) {
        echo "<script>alert('Recipe deleted successfully');</script>";
    } else {
        echo "Error deleting recipe: " . $con->error;
    }
} else {
    echo "Invalid recipe ID";
}

// Redirect back to the previous page
echo "<script>window.location.href = document.referrer;</script>";
?>