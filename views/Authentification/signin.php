<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/auth.css">
    <title>Document</title>
</head>

<body>
    <div class="signup__container row justify-content-between align-items-center ">
        <form class="signup__container__form col-12 col-md-6   " action="" method="POST">
           

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address :</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                <small id="email" class="form-text text-muted"></small>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password :</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password">
                <small id="password" class="form-text text-muted"></small>
            </div>

            <button type="submit" name="submit" class="signup__container__form__submit btn btn-primary ">Create Account</button>
        </form>

        <div class="signup__picture  d-none d-md-flex  col-md-6 ">
            <img src="/assets/images/articles.avif" alt="">
        </div>
    </div>
</body>

</html>