<?php 
// include ('../src/navbar.php');
// if(isset($_POST['cardId'])){
//     echo $_POST['cardId'];
// }
// var_dump($_GET['r_id']);
$r_id = substr($_GET['r_id'],5);

include('../config/db_connection.php');

$sql = "SELECT * FROM recipes WHERE r_id='$r_id'";
$result=$con->query($sql);
$recipe = mysqli_fetch_all($result,MYSQLI_ASSOC);

// var_dump($recipe);

// session_start();
// $_SESSION['r_id']=$r_id;




/*                 Add Favorites             */

//    var_dump($_GET['id']);
?>
<?php include('../src/nav_without_btn.php')?>
<br>
<style>
     
       
      

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
            /* background-color: #e8e4e0; */
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

    

     
        /* @media (max-width: 768px) {
            .card {
                height: 400px; 
            }
        } */
    </style>
</head>
<br>
<section class="recipe-sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                 <?php  echo '<img class="top-right-image img-fluid" src="data:image;base64,'.base64_encode($recipe[0]['image']). '" alt="Image">';?>

            </div>
        </div>
    </div>
    <div class="title">
       <h2 class="card-title fw-bold text-success"> <?php echo $recipe[0]['name']?></h2>
    </div>
    <div class="row">
        <div class="col-md-6" >
            <div class="card " style="background-color:#e7f4da">
                <h2 class=""style="background-color:#e7f4da;">Recipe Description</h2>
                <p class="lead" style="background-color:#e7f4da"><?php echo $recipe[0]['description'] ?></p>
            </div>
        </div>
    </div>
    <script>
        
    </script>

    <div class="col-12 text-center">

    </div>
</section>

<?php


?>