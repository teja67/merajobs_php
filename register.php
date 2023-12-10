<?php
include 'database.php';

if(isset($_POST['name']))
{

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $password=$_POST['password'];

    $conn->query("INSERT INTO `register`(`name`,`email`,`phone_number`,`password`) VALUES ('".addslashes($name)."','".addslashes($email)."','".addslashes($phone_number)."','".addslashes($password)."')");
    
    header("Location: /merajobs/login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Home</title>
    <!-- Favicon -->
    <link href="img/favicon.icon" rel="icon">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./lib/animate/animate.min.css" rel="stylesheet">
    <link href="./lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css" >
    <link rel="stylesheet" href="./css/login_style.css">

</head>
<body>
   
    <?php
    include 'header.html';
    ?>

<section class="sign-in mt-5">
    <div class="container">
        <div class="signin-content">
           

            <div class="signin-form">
                <h2 class="form-title">Register</h2>
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="name"><i class="fa fa-user"></i></label>
                        <input type="text" name="name" id="name" placeholder="Name" autofocus/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fa fa-envelope"></i></label>
                        <input type="email" name="email" id="email" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <label for="phone_number"><i class="fa solid fa fa-mobile"></i></label>
                        <input type="text" name="phone_number" id="phone_number" placeholder="Phone number"/>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fa fa-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password"><i class="fa fa-lock"></i></label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"/>
                    </div>
                    <div class="form-group form-button">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                        <a href="/merajobs/login.php" class="badge bg-danger" style="margin-left: 5%">Already registered ?</a>
                    </div>
                </form>
            </div>
            <div class="signin-image">
                <figure><img src="img/signup-image.jpg" alt="sing up image"></figure>
            </div>
        </div>
    </div>
</section>

     <!-- Footer Start -->
     <?php
    include 'footer.html';
    ?>  
    <!-- Footer End -->

   

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./lib/wow/wow.min.js"></script>
        <script src="./lib/easing/easing.min.js"></script>
        <script src="./lib/waypoints/waypoints.min.js"></script>
        <script src="./lib/owlcarousel/owl.carousel.min.js"></script>
    
        <!-- Template Javascript -->
        <script src="./js/main.js"></script>
        
</body>
</html>