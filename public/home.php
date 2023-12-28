<nav class="navbar navbar-expand-lg navbar-light  fixed-top shadow bg-light" ; style="height:10dvh">
        <div class="container">
          <a
            href="../public/home.php"
            class="navbar-brand fs-2 fw-bold"
            style="color:#4caf50;"
          >
            <span class="material-symbols-outlined"> Food </span>
            Recipes
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#nav-links"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse mt-4" id="nav-links">
            <ul class="navbar-nav mx-auto">
              
              <li class="nav-item">
                <a href="../public/c-food.php" class="nav-link">Sea food</a>
              </li>
              
              <li class="nav-item">
                <a href="../public/pastries.php" class="nav-link">pastries</a>
              </li>
          
              <li class="nav-item">
                <a href="../public/griled.php" class="nav-link">Grilled</a>
              </li>
              <li class="nav-item">
                <a href="../public/fried.php" class="nav-link">Fried</a>
              </li>
                <li class="nav-item">
                <a href="../public/deserts.php" class="nav-link">Deserts</a>
              </li>
            </ul>
  <a href="<?php echo (isset($_GET['id']) && $_GET['id']) ? '../public/profile.php?id=' . $_GET['id'] : '../public/register.php'; ?>" class="btn text-white" style="background-color: #4caf50;">
      <?php echo (isset($_GET['id']) && $_GET['id']) ? 'View profile' : 'Sign up'; ?>
  </a>


          </div>
        </div>
</nav>

<section class="home-sec " style="">
      <?php include('../src/header.php')?>
   <div class="grid-container " style="padding-top:100px;">
  <?php include('../config/db_connection.php');

          session_start();
          $sql ="SELECT * FROM recipes ;";
          $result = $con->query($sql);
          $row = mysqli_fetch_all($result,MYSQLI_ASSOC);   
          // var_dump($row);
          // Array of card data

          $cardData = [
              [
                  "image" => "../assets/img/food.jpg",
                  "title" => "Card 1",
                  "description" => "Description of Card 1"
              ],
              [
                  "image" => "../assets/img/food.jpg",
                  "title" => "Card 2",
                  "description" => "Description of Card 2"
              ],
              [
                  "image" => "../assets/img/food.jpg",
                  "title" => "Card 3",
                  "description" => "Description of Card 3"
              ],[
                  "image" => "../assets/img/food.jpg",
                  "title" => "Card 1",
                  "description" => "Description of Card 1"
              ],[
                  "image" => "../assets/img/food.jpg",
                  "title" => "Card 1",
                  "description" => "Description of Card 1"
              ],[
                  "image" => "../assets/img/food.jpg",
                  "title" => "Card 1",
                  "description" => "Description of Card 1"
              ],[
                  "image" => "../assets/img/food.jpg",
                  "title" => "Card 1",
                  "description" => "Description of Card 1"
              ],[
                  "image" => "../assets/img/ood.jpg",
                  "title" => "Card 1",
                  "description" => "Description of Card 1"
              ],
              [
                  "image" => "food.jpg",
                  "title" => "Card 1",
                  "description" => "Description of Card 1"
              ],
              // Add more card data as needed
          ];
            $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
              if(isset($_GET['r_id'])){

                $rec_id = $_GET['r_id'];
            
            
              $stmt = $con->prepare("INSERT INTO favorites (u_id, r_id) VALUES (?, ?)");
              $stmt->bind_param("ii", $user_id, $rec_id);

              if ($stmt->execute()) {
                  echo "<script>alert('Favorite added successfully.')</script>";
              } else {
                  echo "Error adding favorite: " . $stmt->error;
              }

              $stmt->close();

            }
    foreach ($row as $index => $card) {
    $cardId = 'card-' . $card['r_id']; // Generate a unique ID for each card
    echo '<div class="card position-relative h-auto" style="width: 18rem;">';
    echo '<img class="card-img-top" src="data:image;base64,'.base64_encode($card['image']). '" alt="Image">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title fw-bold fs-3">' . $card["name"] . '</h5>';
    echo '<p class="card-text text-secondary fs-5 fw-light">' . $card["short_desc"] . '</p>';
    echo '<a href="./home.php?r_id=' .$card['r_id'].'?id='.$user_id.'" class="btn btn- position-absolute "  style="top:0;left:0;"><div class="text-light"><i class="fa-regular fa-bookmark text-light fs-2"></i></div> </a>';
    echo '<a href="./recipe.php?r_id=' . $cardId .'?id=' .$card['id']. '" class="btn btn-outline-success  position-absolute w-50" style="bottom:3px;left:25%;background-:#9da28c;">Details</a>';
    echo '</div>';
    echo '</div>';
}

  ?>
      </div>
</section>
      <?php include('../src/footer.php');?>
      <?php //echo $user_name_;?>

    