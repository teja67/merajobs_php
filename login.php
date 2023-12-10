<?php
session_start();
include 'database.php';

if(isset($_POST['username']))
{
    $user_name=addslashes($_POST['username']);
    $password=addslashes($_POST['password']);

    $stmt = $conn->prepare("SELECT id, name,is_admin FROM `register` WHERE `name`=:user_name AND `password`=:password");
    $stmt->bindParam(':user_name', $user_name);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $count = $stmt->rowCount();

    if($count> 0)
    {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = $result['id'];
        $user_name = $result['name'];
        $is_admin = $result['is_admin'];

        // You can now use $user_id and $user_name as needed
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $user_name;
        $_SESSION['is_admin'] = $is_admin;

        header('Location:/merajobs/index.php');
        exit;
    } else {
        header('Location:/merajobs/login.php'); 
    }
    
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
    <title>Login</title>
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
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="./css/login_style.css">


</head>
<body>
   
    <?php
        include 'header.html';
    ?>

    
<section class="sign-in mt-5">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="./img/signin-image.jpg" alt="sing up image"></figure>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Log in</h2>
                <form method="POST" action="" autocomplete="off">
                    <div class="form-group">
                        <label for="username"><i class="fa fa-user"></i></label>
                        <input type="username" name="username" id="username" placeholder="User Name" autofocus/>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fa fa-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password"/>
                    </div>
                    <div class="form-group form-button">
                        <button type="submit" class="btn btn-outline-success">Log in</button>
                        <a href="/merajobs/register.php" class="badge bg-danger" style="margin-left: 5%">Create an account ?</a>
                    </div>
                </form>
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