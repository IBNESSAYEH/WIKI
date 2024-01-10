<?php   


if($_SESSION['isAdmin'] != 1){
    header("location: http://localhost:8000");
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <title>Document</title>
</head>

<body>

    <div class="menu">
        <ul class="menu__list">
            <li class="menu__list__item menu__list__item__profile">
                <div class="menu__profile">
                    <img src="/assets/images/profile.jpg" alt="">
                </div>
                <h4 class="menu__profile__name">abdellatif ibnessayeh</h4>
            </li>
            <li class="menu__list__item">
                <a href="http://localhost:8000">
                    <i class="fas fa-home"></i>
                    <p>home</p>
                </a>
            </li>
            <li class="menu__list__item">
                <a href="#categories">
                    <i class="fas fa-table"></i>
                    <p>categories</p>
                </a>
            </li>
            <li class="menu__list__item">
                <a href="#tags">
                    <i class="fas fa-tag"></i>
                    <p>tags</p>
                </a>
            </li>
            <li class="menu__list__item">
                <a href="#users">
                    <i class="fas fa-user-group"></i>
                    <p>users</p>
                </a>
            </li>
           
            <li class="menu__list__item">
                <a href="#statistique">
                    <i class="fas fa-chart-pie"></i>
                    <p>statistique</p>
                </a>
            </li>
            <li class="menu__list__item">
                <a href="#wikis">
                <i class="fas fa-pen"></i>
                    <p>wikis</p>
                </a>
            </li>

            <li class="menu__list__item__logout">
                <a href="http://localhost:8000/auth/logout">
                    <i class="fas fa-sign-out"></i>
                    <p>Log Out</p>
                </a>
            </li>
        </ul>

    </div>


    <main id="statistique" class="container">
        <div  class="container__header">
            <h3>dashboard</h3>
            <i class="fas fa-chart-pie"></i>
        </div>
        <div class="container__statistique">
            <div class="container__statistique__data">
                <i class="fas fa-user"></i>
                <div class="container__statistique__info">
                    <p>users</p>
                    <p class="container__statistique__detail"><?= count($users) ?></p>
                </div>
            </div>
            <div class="container__statistique__data">
                <i class="fas fa-pen"></i>
                <div class="container__statistique__info">
                <p>wikis</p>
        <?php if (is_array($wikis)): ?>
            <p class="container__statistique__detail"><?= count($wikis) ?></p>
        <?php else: ?>
            <p class="container__statistique__detail">0</p>
        <?php endif; ?>
                </div>
            </div>
            <div class="container__statistique__data">
                <i class="fas fa-tag"></i>
                <div class="container__statistique__info">
                    <p>tags</p>
                    <p class="container__statistique__detail"><?= count($tags) ?></p>
                </div>
            </div>
            <div class="container__statistique__data">
                <i class="fas fa-table"></i>
                <div class="container__statistique__info">
                    <p>categories</p>
                    <p class="container__statistique__detail"><?= count($categories) ?></p>
                </div>
            </div>

        </div>
        <div id="wikis" class="container__header">
            <h3>Wikis Statistiques</h3>
            <i class="fas fa-pen"></i>
        </div>
        <?php  if ($wikis !== false): ?>

        <table class="container__table">
            <thead>
                <tr>
                    <th>titre</th>
                    <th>date_creation</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach ($wikis as $wiki) : ?>
                    <tr>
                        <td><?= $wiki->titre ?></td>
                        <td><?= $wiki->date_creation ?></td>
                        <td>

                            <!-- Button trigger modal -->
                           
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $wiki->id ?>">
                                voir wiki
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $wiki->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-dark " id="exampleModalLabel"><?= $wiki->titre ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark ">
                                            <?= $wiki->contenu ?>
                                        </div>
                                        <div class="modal-footer">
                                        <form action="http://localhost:8000/wiki/accept" method="POST">
                                <input name="id"  value="<?= $wiki->id ?>"  type="hidden">
                                <button type="submit"   class="btn btn-outline-primary">accepter</button>
                            </form>
                                            <a  href="" class="btn btn-outline-danger">supprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
    <p class="alert alert-success my-2">vous n'avez aucune wiki sans acceptation !!!!!.</p>
<?php endif; ?>
        <div id="tags" class="container__header">
            <h3>Tags Statistiques</h3>
            <i class="fas fa-tag"></i>
        </div>

        <table class="container__table">
            <thead>
                <tr>
                    <th>nom</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tags as $tag) : ?>
                    <tr>
                        <td><?= $tag->nom ?></td>
                        <td>
                            <div class="btn btn-outline-primary">modifier</div>
                            <div class="btn btn-outline-danger">supprimer</div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div id="categories" class="container__header">
            <h3>categories Statistiques</h3>
            <i class="fas fa-table"></i>
        </div>

        <table class="container__table">
            <thead>
                <tr>
                    <th>nom</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $categorie) : ?>
                    <tr>
                        <td><?= $categorie->nom ?></td>
                        <td>
                            <div class="btn btn-outline-primary">modifier</div>
                            <div class="btn btn-outline-danger">supprimer</div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div  id="users"  class="container__header">
            <h3>Users Statistiques</h3>
            <i class="fas fa-user-group"></i>
        </div>

        <table  class="container__table">
            <thead>
                <tr>
                    <th>nom</th>
                    <th>email</th>
                    <th>role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user->nom ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->isAdmin === "1" ? "admin" : "client"  ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>