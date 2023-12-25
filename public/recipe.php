<?php 
// include ('../src/navbar.php');
// if(isset($_POST['cardId'])){
//     echo $_POST['cardId'];
// }
// var_dump($_GET['r_id']);
$r_id = substr($_GET['r_id'],5);
echo $r_id;
include('../config/db_connection.php');

$sql = "SELECT * FROM recipes WHERE r_id='$r_id'";
$result=$con->query($sql);
$recipe = mysqli_fetch_all($result,MYSQLI_ASSOC);

// var_dump($recipe);

session_start();
$_SESSION['r_id']=$r_id;




/*                 Add Favorites             */

   
?>
<?php include('../src/navbar.php')?>
<style>
     
        .custom-shape-divider-bottom-1703338947 {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .custom-shape-divider-bottom-1703338947 svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 184px;
        }

        .custom-shape-divider-bottom-1703338947 .shape-fill {
            fill: #e8e4e0;
        }

       
      

        .container {
            position: relative;
        }

        .top-right-image {
            position: absolute;
            top: 20dvh;
            right:0;
            width: 400px;
            height: 350px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgb(126, 158, 101);
            z-index: 999;
        }

        .title {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
            font-weight: bold;
        }

        .card {
            background-color: #e8e4e0;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            margin-left: 20px;
            box-shadow: 0 2px 4px rgb(126, 158, 101);
        }

        .card h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card ul {
            list-style-type: none;
            padding: 0;
        }

        .card li {
            margin-bottom: 5px;
        }

        .save-button {
            position: fixed;
            bottom: 8%; 
            left: 50%; 
            transform: translateX(-50%); /* Center the button horizontally */
            padding: 8px 16px;
            background-color: #72b75e;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .save-button:hover {
            background-color: #5a8f4e;
        }
        @media (max-width: 768px) {
            .card {
                height: 400px; /* Adjust the height as needed for smaller screens */
                width: 20%; /* Set the width to 100% for full-width on smaller screens */
            }
        }
    </style>
</head>
<br>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-12">
                 <?php  echo '<img class="top-right-image img-fluid" src="data:image;base64,'.base64_encode($recipe[0]['image']). '" alt="Image">';?>

            </div>
        </div>
    </div>
    <div class="custom-shape-divider-bottom-1703338947">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
    </div>
    <div class="title">
       <h2 class="card-title"> <?php echo $recipe[0]['name']?></h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h2>Recipe Description</h2>
                <p class="lead"><?php echo $recipe[0]['description'] ?></p>
            </div>
        </div>
    </div>
    <script>
        
    </script>

    <div class="col-12 text-center">

<form method="POST" action="">
    <button type="submit">Click me</button>
</form>
     
    </div>
</section>

<?php


?>