

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>Wiki</title>
</head>

<body>

<!-- header of page -->

    <?php include "layouts/header.php"; ?>

    <div class="container mt-4">
        <main class="main">
            <section class="main__section__wikis row justify-content-center" id="search_result">

                <div class="section__wikis__creation col-12 col-md-10 col-lg-6  d-flex justify-content-around">
                    <div class="card text-center " style="width: 100%;">

                        <div class="card-body d-flex gap-2">
                            <img src="/assets/images/profile.jpg" alt="profile"
                                class="profile rounded-circle shadow-sm">
                            <p class="card-text d-flex justify-content-start p-3  align-items-center text-muted w-100 shadow"
                                data-bs-toggle="modal" data-bs-target="#exampleModalINSERT">Commencer un wiki....</p>
                            <!-- Modal pourla creation d'une wiki -->
                            <?php  include "../views/layouts/AddWikiModal.php";  ?>

                        </div>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                </div>


                <!-- affichage des wikis -->

                <?php foreach ($wikis as $wiki): ?>
                    <div class="section__wikis__container col-12 col-md-10 col-lg-6  d-flex justify-content-around">
                        <div class="card"   style="width: 100%;">
                            <div class="card-header w-100">

                                <img src="/assets/images/profile.jpg" alt="profile"
                                    class="profile rounded-circle shadow-sm " style="width: 10%">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title ">
                                    <?= $wiki->titre ?>
                                </h5>
                                <p class="card-text">
                                    <?= $wiki->contenu ?>
                                </p>


                            </div>
                            <img class="card-img-bottom" src="assets/images/wiki.jpg" alt="Card image cap">

                            <div class="card-footer d-flex justify-content-between align-items-center">

                                <?= $wiki->date_creation ?>
                                <?php if ($_SESSION['id_user'] == $wiki->id_user): ?>
                                    <div class="d-flex m-2">

                                        <a href="http://localhost:8000/wiki/delete/<?= $wiki->id  ?>" class="text-secondary "><i
                                                class="fa-solid fa-trash  ms-4 me-1  fs-5"></i>supprimer</a>
                                        <a href="#" class="text-secondary "  data-bs-toggle="modal" data-bs-target="#exampleModaledit<?= $wiki->id  ?>"><i
                                                class="fa-solid fa-pen-to-square  ms-4 me-1  fs-5"></i>modifier</a>
                                                 <!-- Modal pourla modifiction d'une wiki -->
                            <?php  include "../views/layouts/EditWikiModal.php";  ?>
                                    </div>
                                <?php else: ?>
                                    <a class="text-secondary"><i class="fa-solid fa-flag ms-4 me-1  fs-5"></i></i>signaler</a>
                                <?php endif; ?>
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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    



















    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var SearchInput = document.getElementById("search");
        var searchResultContainer = document.getElementById("search_result");

        SearchInput.addEventListener("keyup", function () {
            var input = SearchInput.value;

            if (input !== "") {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "search.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Clear previous results
                        searchResultContainer.innerHTML = "";
                        // Append the new search results
                        searchResultContainer.innerHTML += xhr.responseText;
                        searchResultContainer.style.display = "flex";
                    }
                };
                xhr.send("input=" + input);
            } 
        });
    });
</script>




 
</body>

</html>