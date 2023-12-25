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
      <?php include('../src/header.php')?>
      <div class="grid-container " style="padding-top:100px;">
  <?php include('../config/db_connection.php');

          session_start();
          $sql ="SELECT * FROM recipes;";
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
            $user_id = $_SESSION['user_id'];
              if(isset($_GET['r_id'])){

                $rec_id = $_GET['r_id'];
            
            
                // var_dump($aaa);

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
          
          echo '<a href="./recipe.php?r_id=' . $cardId .'?id=' .$card['id']. '"  class="log-link">';
          echo '<div class="card" style="height: 100%;">';
          echo '<img class="card-img-top img-fluid" style="height:80%" src="data:image;base64,'.base64_encode($card['image']). '" alt="Image">';
          echo '<h3 class="card-title">' . $card["name"] . '</h3>';
          echo '<p class="card-text">' . $card["short_desc"] . '</p>';
          echo '<a href="./home.php?r_id=' .$card['r_id'].'?id='.$user_id.'">Save</a>';

          // echo '<p class="card-text">' . $card["description"] . '</p>';
          echo '</div>';
          echo '</a>';

              

        
      }
  ?>
      </div>

      <?php include('../src/footer.php');?>
    