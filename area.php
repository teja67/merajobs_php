<?php
session_start();
include 'database.php';

if(isset($_POST['city']))
{
    $city_id=$_POST['city'];
    $area_name=$_POST['area'];

    $conn->query("INSERT INTO `area`(`city_id`,`area`) VALUES('".$city_id."','".$area_name."')");
    
    header('Location:/merajobs/area.php');
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
    <title>Area</title>
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
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
   <?php include "header.php" ?>

    
    <div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Area</h1>
        <div class="row g-3">

            <form action="" method="post" autocomplete="off">
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="col-md-2 col-5">
                        <label for="city">City</label>
                    </div>
                    <div class="col-md-4 col-5">
                        <select name="city" id="city" class="form-control" required>
                        <?php
                        $city_data=$conn->query("SELECT * FROM city");
                        while($data=$city_data->fetch())
                        {
                            ?>
                                <option value="<?=$data['id']?>"><?=$data['name']?></option>
                            <?php
                        }
                        ?>
                        </select>
                    
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="col-md-2 col-5">
                        <label for="area">Area</label>
                    </div>
                    <div class="col-md-4 col-5">
                        <input type="text" name="area" id="area" class="form-control" placeholder="Enter Your Area" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <div class="col-md-3 col-5">
                    </div>
                    <div class="col-md-4 col-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>


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

        <script>

        </script>
        
</body>
</html>