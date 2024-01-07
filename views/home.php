<?php

include "layouts/client_main.php";

?>

<main class="main">

<section class="main__section__wikis row justify-content-around">

  <?php foreach($wikis as $wiki): ?>
  <div class="section__wikis__container col-12 col-md-10 col-lg-12 d-flex justify-content-around ">
  <div class="card" style="width: 50%;">
  <img class="card-img-top" src="assets/images/wiki.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title "><?= $wiki->titre ?></h5>  
    <p class="card-text"><?= $wiki->contenu ?></p>
    <div class="w-100">
        <a href="#" class="btn btn-primary">Go somewhere</a>
        <p class="w-75 text-right  d-inline-block "><?= $wiki->date_creation ?></p>
    </div>
  </div>
</div>
  </div>
  <?php endforeach; ?>




</section>




</main>
