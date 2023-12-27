<?php include('header.php');?>

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