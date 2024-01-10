<header>
    <nav class="navbar navbar-expand-lg navbar-white bg-white shadow">
        <div class="container">
            <div class="nav__logo mx-2">
                <a class="navbar-brand" href="http://localhost:8000">
                    
                    <img src="assets/images/wikilogo.png" class="img-fluid  ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://localhost:8000">Home</a>
                    </li>
                    <?php 
                    
                    
                    if (isset($_SESSION['isAdmin'])):  
                    if ($_SESSION['isAdmin'] == 1):  ?>
                        <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/admin">Dashboard</a>
                    </li>
                    <?php  endif;  
                     endif;  ?>
                   
                   
                </ul>

                <form class="d-flex mx-auto w-50">
                    <input class="form-control me-2 text-white border-0  " type="search" placeholder="Search for products..." aria-label="Search" style="background : #e5e1e1;">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>

                <?php  if (!isset($_SESSION['isAdmin'])):  ?>
                <ul class="ml-auto d-flex mx-2">
                    <li class="nav-item mx-2">
                        <a class="text-primary" href="http://localhost:8000/auth/signin">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="http://localhost:8000/auth/signup">Sign Up</a>
                    </li>
                </ul>
                    <?php  endif;  ?>
                   

               
            </div>
        </div>
    </nav>
</header>