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
                    <li class="nav-item dropdown text-center text-secondary ">
                        <a class="nav-link text-muted mb-0 pb-0" href="#"><i class="fa-solid fa-tag fs-5"></i>

                            <a class="nav-link dropdown-toggle mt-0 pt-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                tag search
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <?php foreach ($tags as $tag) : ?>
                                 <li><a class="dropdown-item">   <form class="form-check">
                                                <input class="form-control" type="radio" name="tag" value="<?= $tag->id ?>" >
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    <?= $tag->nom ?>
                                                </label>
                                            </form>

                                        </a></li>
                                        <?php endforeach; ?>
                            </ul>
                    </li>
                    <li class="nav-item dropdown text-center text-secondary ">
                        <a class="nav-link text-muted mb-0 pb-0" href="#"><i class="fa-solid fa-table fs-5"></i>

                            <a class="nav-link dropdown-toggle mt-0 pt-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                categorie search
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                
                                <li><a class="dropdown-item">
                                        <form class="" method="POST">
                                    <input class="form-control me-2 " id="categorieSearch" type="search" placeholder="Search..." aria-label="Search" style="background : #e5e1e1;">

                                               
                                </form>
                                            </a></li>
                                           


                            </ul>
                    </li>
                </ul>


                <div class="nav__search">
                    <form class="d-flex mx-auto ">
                        <input class="form-control me-2 " id="search" type="search" placeholder="Search for products..." aria-label="Search" style="background : #e5e1e1;">
                    </form>




                </div>
                <ul class="ml-auto d-flex ">
                        <?php if (!isset($_SESSION['isAdmin'])) : ?>
                        <li class="nav-item ">
                            <a class="text-primary" href="http://localhost:8000/auth/signin">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="http://localhost:8000/auth/signup">Sign Up</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="btn btn-danger" href="http://localhost:8000/auth/logout">logout</a>
                        </li>
                        <?php endif; ?>
                    </ul>
            </div>
        </div>
    </nav>
</header>