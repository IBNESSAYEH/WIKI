<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/auth.css">
    <title>Document</title>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('registerForm').addEventListener('submit', function (event) {
                if (!validateForm()) {
                    event.preventDefault();
                }
            });

            function validateForm() {
                let email = document.getElementById('exampleInputEmail1').value.trim();
                let password = document.getElementById('exampleInputPassword1').value.trim();

                if (!validateEmail(email)) {
                    alert("Invalid email address");
                    return false;
                }

                if (!validatePassword(password)) {
                    alert("Invalid password. Password must be at least 8 characters and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.");
                    return false;
                }

                // If both email and password validations pass, allow form submission
                return true;
            }

            function validateEmail(email) {
                // Use a regular expression to check email format
                const emailRegex = /^\S+@\S+\.\S+$/;
                return emailRegex.test(email);
            }

            function validatePassword(password) {
                // Check if the password meets the specified criteria
                return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password);
            }
        });
    </script>
</head>

<body>
    <div class="signup__container row justify-content-between">
        <form id="registerForm" class="signup__container__form col-12 col-md-6   " action="http://localhost:8000/auth/login" method="POST">
          

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address :</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                <small id="email" class="form-text text-muted"></small>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password :</label>
                <input type="password" class="form-control"  name="password" id="exampleInputPassword1" placeholder="Enter your password ">
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
