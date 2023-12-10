<?php
session_start();
include 'database.php';

if(isset($_SESSION['user_id']))
{
    $userid=$_SESSION['user_id'];
}else{
    header('Location: /merajobs/login.php');
}

if(isset($_SESSION['user_id']))
{
    $user_id=$_SESSION['user_id'];

    $app_data=$conn->query("SELECT * FROM `job_applications` WHERE `applied_for`='".$user_id."' ");

}
else
{
    $app_data=array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Skills Inbox</title>
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
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Skills Inbox</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                    <?php
                        if($app_data->rowCount() > 0)
                        {
                            while($data=$app_data->fetch())
                            {
                                $name=$data['name'];
                                $email=$data['email'];
                                $phone_number=$data['phone_no'];
                                $job_id=$data['job_id'];

                                $skill_data=$conn->query("SELECT * FROM `job_category` WHERE `id`='".$job_id."' ");
                                $get_skill=$skill_data->fetch();
                                $cat_name=$get_skill['name'];
                                ?>
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3"><?=$cat_name?></h5>
                                                <span class="text-truncate me-3"><i class="fa fa-address-book text-primary me-2"></i><?=$name?></span>
                                                <span class="text-truncate me-3"><i class="fa fa-envelope-open text-primary me-2"></i><?=$email?></span>
                                                <span class="text-truncate me-0"><i class="fa fa-phone text-primary me-2"></i><?=$phone_number?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                  <!-- <p class="btn btn-primary">Applied</p> -->
                                            </div>
                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Recieved: <?= date('d-M-Y',strtotime($data['get_date'])) ?></small>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }else{
                        ?>
                          <p class="text-danger">No Applications Received</p>
                        <?php
                        }
                    ?>
                    </div>
                </div>
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
        
</body>
</html>