<header>
    <nav class="navbar navbar-expand-lg navbar-white bg-white shadow">
        <div class="container">
            <div class="nav__logo mx-2">
                <a class="navbar-brand" href="http://localhost:8000">
                    <img src="assets/images/wikilogo.png" class="img-fluid" alt="">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse nav__content" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item active text-center text-dark">
                        <a class="nav-link text-dark" href="http://localhost:8000"><i
                                class="fa-solid fa-house fs-5"></i><p>Home</p></a>
                    </li>
                    <?php if (isset($_SESSION['isAdmin'])):  
                        if ($_SESSION['isAdmin'] == 1):
                    ?>
                    <li class="nav-item text-center text-secondary">
                        <a class="nav-link " href="http://localhost:8000/admin"><i
                                class="fa-solid fa-gauge-high fs-5"></i><p>Dashboard</p></a>
                    </li>
                    <?php endif;  endif; ?>
                </ul>

                <div class="nav__search">
                    <form class="d-flex mx-auto w-50">
                        <input class="form-control me-2 text-white border-0" id="live_search" type="search"
                            placeholder="Search for products..." aria-label="Search"
                            style="background : #e5e1e1;">
                    </form>
                    <?php if (!isset($_SESSION['isAdmin'])): ?>
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
