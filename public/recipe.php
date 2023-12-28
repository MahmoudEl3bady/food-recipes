<?php 
// include ('../src/navbar.php');
// if(isset($_POST['cardId'])){
//     echo $_POST['cardId'];
// }
// var_dump($_GET['r_id']);
session_start();
$user_id=  $_SESSION['user_id'];

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
<!-- <br> -->
<style>
     
       
      

        .container {
            position: relative;
        }

        .top-right-image {
            /* position: absolute;
            top: 25dvh;
            right:0;
            width: 450px;
            height: 400px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgb(126, 158, 101);
            z-index: 999; */
        }

        .title {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
            font-weight: bold;
        }

        .card {
            /* background-color: #e8e4e0; */
            /* border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            margin-left: 20px;
            box-shadow: 0 2px 4px rgb(126, 158, 101); */
        }

        .card h2 {
            /* text-align: center;
            font-size: 24px;
            margin-bottom: 10px; */
        }

        .card ul {
            /* list-style-type: none;
            padding: 0; */
        }

        .card li {
            /* margin-bottom: 5px; */
        }

    

     
        /* @media (max-width: 768px) {
            .card {
                height: 400px; 
            }
        } */
    </style>
</head>
<!-- <br> -->
<section class="recipe-sec pt-5" style="">
    <div class="container">
        <div class="row">
            <div class="title col-lg-12 p-3">
                    <h2 class="card-title fw-bold text-success"> <?php echo $recipe[0]['name']?></h2>
                    <p class="lead text-secondary  text-center"><?php echo $recipe[0]['short_desc']?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                 <?php  echo '<img class="img-cover h-auto w-75 rounded" src="data:image;base64,'.base64_encode($recipe[0]['image']). '" alt="Image">';?>

            </div>
            <!-- <div class="col-2">
                <?php  // echo '<a href="./home.php?r_id=' .$recipe[0]['r_id'].'?id='.$user_id.'" class="btn btn- position-absolute "  style="top:0;left:0;"><div class="text-light"><i class="fa-regular fa-bookmark text-light fs-2"></i></div> </a>';?>
            </div> -->
            
        </div>
        <div class="row">
            <div class="card col-10 col-sm-12" style="background-color:#e7f4da">
                <h2 class=""style="background-color:#e7f4da;">Recipe Description</h2>
                <p class="lead" style="background-color:#e7f4da"><?php echo $recipe[0]['description'] ?></p>
            </div>
        </div>
    </div>

      

  <!-- <div class="col-12 text-center"> -->

    </div>
</section>

<?php


?>