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
        </div>
      </div>
    </nav>
<?php include('../config/db_connection.php');
  include('../src/header.php');

  // User id
  session_start(); 
  $u_id = $_SESSION['user_id'];
// echo $u_id;  
  
  if(isset($_POST['submit'])){
            $name =htmlspecialchars ($_POST['name']);
            $short_desc =htmlspecialchars ($_POST['short-desc']);
            $desc =htmlspecialchars( $_POST['desc']);
            $cat =htmlspecialchars($_POST['cat']);
            // $img =$_POST['img'];

      
// Image upload handling
$img_temp = $_FILES['img']['tmp_name'];

// Read the image contents
$image_data = file_get_contents($img_temp);

// Convert to hexadecimal representation for safe inclusion in the query
$image_hex = bin2hex($image_data);

// Prepare and execute the SQL query using mysqli::query
$sql = "INSERT INTO recipes (id, name, short_desc, description, cate, image) VALUES ($u_id, '$name', '$short_desc', '$desc', '$cat', 0x$image_hex)";
$res = $con->query($sql);

// Check if the query was successful
if ($res) {
    echo "Recipe added successfully";
} else {
    echo 'Query Error ' . $con->error;
}











            
            // // connection to mySql database
            // $sql = "INSERT INTO recipes (id,name,short_desc,description,cate,image) VALUES ($u_id,'$name','$short_desc','$desc','$cat','$img_name')";
            //    $res=$con->query($sql);    
            // if($res){
            //     echo "<script>alert ('Recipe added successfully')</scripalert>";
            // }
            // else {
            //     echo 'Query Error '.mysqli_error($con);
            // }

        }


        /*      User data        */


        $user_res = $con->query("SELECT * FROM users where id=".$u_id);
        $user_data = mysqli_fetch_all($user_res,MYSQLI_ASSOC);
        // var_dump($user_data);


        /*      User Favorites         */

       $response= $con->query("SELECT * FROM recipes r JOIN favorites f ON f.r_id = r.r_id WHERE f.u_id = $u_id");
       $user_favorites = mysqli_fetch_all($response,MYSQLI_ASSOC);
      
   
        /*      User Published recipes        */
        
        $published_response = $con->query("SELECT * from recipes where id =$u_id");
        $published_recipes  = mysqli_fetch_all($published_response,MYSQLI_ASSOC);
      




?>


   
    <div class="container-fluid " style="padding-top:15dvh">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                          Your data 
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><?php echo $user_data[0]['name'] ?></li>
                      <li class="list-group-item"><?php echo $user_data[0]['username']?></li>
                        <li class="list-group-item"><?php echo $user_data[0]['email'] ?></li>
                    </ul>
                    <a href="./home.php" type="button" class="btn btn-success">logout</a>
                </div>
                       <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                      <h3>Published Recipes</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                      <?php 
                  if (empty($published_recipes)) {
    echo '<li class="list-group-item">No Published Recipes</li>';
} else {
    foreach ($published_recipes as $rec) {
        $rec_id = 'card-' . $rec['r_id']; 
        echo '<li class="list-group-item">';
        echo '<a class="log-link w-100" href="recipe.php?r_id=' . $rec_id . '">' . $rec['name'] . '</a>';
        echo '<a href="../config/del_rec.php?r_id=' . $rec['r_id'] . '" onclick="return confirm(\'Are you sure you want to delete this recipe?\');">';
        echo '<span class="material-symbols-outlined float-end text-danger">delete</span></a>';
        echo '</li>';
    }
}
                      ?>
                      
                    </ul>
                    </div>
                    <h1  class="list-group-ite text-dark"><?php //$user_favorites[0]['name'] ?></h1>
            </div>
            </div>
            <div class="col">
                <form action="./profile.php" method="post" enctype="multipart/form-data">
                    <fieldset >
                      <legend>publish ur Recipe</legend>
                      <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Enter Name</label>
                        <input type="text" id="disabledTextInput" name="name" class="form-control" placeholder="name">
                      </div>
                      <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Enter Short Description</label>
                        <input type="text" name="short-desc" id="disabledTextInput" class="form-control" placeholder="short description">
                      </div>
                      <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Enter Description</label>
                        <input type="text" name="desc" id="disabledTextInput" class="form-control" placeholder=" description">
                      </div>
                      <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Choose Category</label>
                        <select id="disabledSelect" name="cat" class="form-select">
                          <option value="deserts">Deserts</option>
                          <option value="Fried">Fried</option>
                          <option value="griled">Grilled</option>
                          <option value="c-food">Sea Food</option>
                          <option value="pastries">Pastries</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Upload Image </label>
                        <input type="file" name="img" value="img" id="fileToUpload"class="form-control" >
                      </div>
                      <button type="submit" name="submit" class="btn btn-success">submit</button>
                    </fieldset>
                  </form>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                          <h3>Favorite Recipes </h3>
                    </div>
                    <ul class="list-group list-group-flush">
                      <?php 
                   if (empty($user_favorites)) {
    echo '<li class="list-group-item">No Favorites</li>';
} else {
    foreach ($user_favorites as $fav) {
        $fav_id = 'card-' . $fav['r_id']; 
        echo '<li class="list-group-item">';
        echo '<a class="log-link w-100" href="recipe.php?r_id=' . $fav_id . '">' . $fav['name'] . '</a>';
        echo '<a href="../config/del_fav.php?r_id=' . $fav['r_id'] . '" onclick="return confirm(\'Are you sure you want to delete this recipe?\');">';
        echo '<span class="material-symbols-outlined float-end text-danger">delete</span></a>';
        echo '</li>';
    }
}

                      ?>
                      
                    </ul>
                    </div>
                    <h1  class="list-group-ite text-dark"><?php //$user_favorites[0]['name'] ?></h1>
            </div>
        </div>
    </div>
      
    <?php var_dump($u_id); ?>