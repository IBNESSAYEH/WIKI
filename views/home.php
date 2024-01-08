<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
   
<?php include "layouts/header.php"; ?>

<div class="container mt-4">
    <main class="main">
        <section class="main__section__wikis row justify-content-around">



        
            <?php foreach($wikis as $wiki): ?>
                <div class="section__wikis__container col-12 col-md-10 col-lg-6  d-flex justify-content-around">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="assets/images/wiki.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title "><?= $wiki->titre ?></h5>  
                            <p class="card-text"><?= $wiki->contenu ?></p>
                            <div class="w-100">
                                <a class="btn link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">voir plus...</a>
                                <p class="w-75 text-right  d-inline-block "><?= $wiki->date_creation ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
