<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Baker - Bakery Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="myStlye.css">
    <style>
        /* CSS styles for the image */
        .avatar {
            width: 100px; /* Set the width */
            height: auto;
            margin-bottom: 10px;  /* Let the height adjust proportionally */
        }
    </style>
</head>

<body>

<?php
include("config.php")
?>


    <!-- Login Form -->
    <section id="login" class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Login Form</h2>
                <h2 class="text-center bg-warning">
                <?php
                    if(isset($_POST['submit'])){// if user press submit button
                        login();
                        if(isset($_SESSION['message'])){// if there is a msg in the session show it then delete it from session 
                             showMsg();
                        }
                    }

                ?>
                </h2>
                <div class="text-center">
                    <div class="avatar-container">
                        <img src="img/avatar.jpg" alt="Avatar" class="avatar">
                    </div>
                </div>
                <div class="login-form">
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        </div>
                        <label>
                            <input type="checkbox" checked="checked" name="remember"> Remember me
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- End Login Form -->

    <!-- Footer and other content -->


</body>

</html>
