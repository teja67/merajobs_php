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

    // echo $user_id;
    // exit;
    
    $skills_data=$conn->query("SELECT * FROM `skill` WHERE `user_id`='".$user_id."' ");

}
else
{
    $skills_data=array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>View Skills</title>
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
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Your Skills</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                    <?php
                        if(!empty($skills_data))
                        {
                            while($data=$skills_data->fetch())
                            {
                                $area_id=$data['area'];
                                $category_id=$data['job_category'];

                                $cat_data=$conn->query("SELECT name FROM `job_category` WHERE `id`='".$category_id."' ");
                                $fetch_catname=$cat_data->fetch();
                                $categry_name=$fetch_catname['name'];

                                $area_data=$conn->query("SELECT area FROM `area` WHERE `id`='".$area_id."' ");
                                $fetch_areaname=$area_data->fetch();
                                $area_name=$fetch_areaname['area'];

                                
                                ?>
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3"><?=$categry_name?></h5>
                                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?=$area_name?></span>
                                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?=($data['job_type']==1)?'Full Time' : 'Part Time'?></span>
                                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?=$data['salary']?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                        <a class="btn btn-primary" href="/merajobs/update_skills.php?skill_id=<?=$data['id']?>">Edit Skill</a>
                                            </div>
                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Posted: <?= date('d-M-Y',strtotime($data['get_date'])) ?></small>
                                        </div>
                                    </div>
                                </div>
                        <?php
                        }
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