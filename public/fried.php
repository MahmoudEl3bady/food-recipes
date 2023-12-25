<?php include('../src/navbar.php')?>
    <div class="grid-container" style="padding-top:100px;">
     <?php include('../config/db_connection.php');

        // session_start();
        $sql ="SELECT * FROM recipes where cate='fried'";
        $result = $con->query($sql);
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);   
       

    foreach ($row as $index => $card) {
        $cardId = 'card-' . $index; // Generate a unique ID for each card

        echo '<a href="./recipe.php?id=' . $cardId . '"  class="log-link">';
   echo '<div class="card" style="height: 100%;">';
      echo '<img class="card-img-top img-fluid" style="height:80%" src="data:image;base64,'.base64_encode($card['image']). '" alt="Image">';
        echo '<h3 class="card-title">' . $card["name"] . '</h3>';
         echo '<p class="card-text">' . $card["short_desc"] . '</p>';
        // echo '<p class="card-text">' . $card["description"] . '</p>';
        echo '</div>';
        echo '</a>';
    }
       ?>
    </div>

    <?php include('../src/footer.php') ?>