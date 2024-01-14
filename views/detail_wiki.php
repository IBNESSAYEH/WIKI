





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

<body style="background-color: #e7e1e1;">



<header>
    <nav class="navbar navbar-expand-lg navbar-white bg-white shadow">
        <div class="container">
            <div class="nav__logo mx-2">
                <a class="navbar-brand" href="http://localhost:8000">
                    <img src="assets/images/wikilogo.png" class="img-fluid" alt="">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse nav__content" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item active text-center text-dark">
                        <a class="nav-link text-dark" href="http://localhost:8000"><i class="fa-solid fa-house fs-5"></i>
                            <p>Home</p>
                        </a>
                    </li>




                    <?php if (isset($_SESSION['isAdmin'])) :
                        if ($_SESSION['isAdmin'] == 1) :
                    ?>
                            <li class="nav-item text-center text-secondary">
                                <a class="nav-link " href="http://localhost:8000/admin"><i class="fa-solid fa-gauge-high fs-5"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                    <?php endif;
                    endif; ?>
                    
                   
                </ul>


                <div class="nav__search">
                 






                    <?php if (!isset($_SESSION['isAdmin'])) : ?>
                        <ul class="ml-auto d-flex mx-2">
                            <li class="nav-item mx-2">
                                <a class="text-primary" href="http://localhost:8000/auth/signin">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary" href="http://localhost:8000/auth/signup">Sign Up</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>





















    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Wiki - Single Wiki</title>
</head>
<body>


<section class="w-100 p-5 d-flex  justify-content-center ">
<div class="card mb-3" style="max-width: 90%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/assets/images/wiiki.webp" class="img-fluid rounded-start " alt="wiki images" style="height : 100%">
    </div>
    <div class="col-md-8">
      <div class="card-body  d-flex flex-column justify-content-between " style="height : 100%">
        <h5 class="card-title"><?= $wikis->wiki_titre ?> By : <b class="text-primary"> <?= $wikis->user_nom ?></b> </h5>
        <p class="card-text"><?= $wikis->wiki_contenu ?></p>
        <p class="card-text"><small class="text-body-secondary">
          creer le : <?= $wikis->wiki_date ?> </br>
          categorie : <?= $wikis->categorie_nom ?> </br>
          tag(s) : <?= $wikis->tag_nom ?> </br>
        </small></p>
      </div>
    
    </div>
  </div>
</div>
</section>

</body>
</html>