<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>

    <?php include "layouts/header.php"; ?>

    <div class="container mt-4">
        <main class="main">
            <section class="main__section__wikis row justify-content-around">

                <div class="section__wikis__creation col-12 col-md-10 col-lg-6  d-flex justify-content-around">
                    <div class="card text-center " style="width: 100%;">

                        <div class="card-body d-flex gap-2">
                            <img src="/assets/images/profile.jpg" alt="profile"
                                class="profile rounded-circle shadow-sm">
                            <p class="card-text d-flex justify-content-start p-3  align-items-center text-muted w-100 shadow"
                                data-bs-toggle="modal" data-bs-target="#exampleModalINSERT">Commencer un wiki ....</p>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalINSERT" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"> <img
                                                    src="/assets/images/profile.jpg" alt="profile"
                                                    class="profile rounded-circle shadow-sm"></h1>
                                                    <form id="registerForm" class="signup__container__form w-100 "
                                                        action="http://localhost:8000/wiki/create" method="POST">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    </div>
                                                    
                                        <div class="modal-body">

                                        <div class="mb-3">
                                                    
                                         <input type="text" name="titre" class="w-100 border-0 p-2 border-light " placeholder="creer l'objectif de cette wiki">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="#story">Creer votre Wiki....</label>
                                                    <textarea id="story" name="contenu" rows="10"
                                                        class="w-100 text-muted ">

                                                    </textarea>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            
                                            <p class="d-inline-flex gap-1">
                                                <button type="submit" class="btn btn-success">publier</button>
                                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#multiCollapseExample2" aria-expanded="false"
                                                aria-controls="multiCollapseExample2">choisir des tags</button>
                                                <a class="btn btn-primary" data-bs-toggle="collapse"
                                                href="#multiCollapseExample1" role="button" aria-expanded="false"
                                                aria-controls="multiCollapseExample1">choisir une categorie</a>
                                                
                                            </p>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                        <div class="card card-body">
                                                            <?php foreach ($categories as $categorie): ?>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="ctegorie"
                                                                        type="radio" value="<?= $categorie->id ?>" id="">
                                                                        
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        <?= $categorie->nom ?>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                                                        <div class="card card-body">
                                                            <?php foreach ($tags as $tag): ?>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="tag[]" value="<?= $tag->id ?>">
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        <?= $tag->nom ?>
                                                                    </label>
                                                                </div>

                                                            <?php endforeach; ?>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                </div>

                <?php foreach ($wikis as $wiki): ?>
                    <div class="section__wikis__container col-12 col-md-10 col-lg-6  d-flex justify-content-around">
                        <div class="card" style="width: 100%;">
                            <img class="card-img-top" src="assets/images/wiki.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title ">
                                    <?= $wiki->titre ?>
                                </h5>
                                <p class="card-text">
                                    <?= $wiki->contenu ?>
                                </p>

                                <div class="w-100">
                                    <a
                                        class="btn link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">voir
                                        plus...</a>
                                    <p class="w-75 text-right  d-inline-block ">
                                        <?= $wiki->date_creation ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>