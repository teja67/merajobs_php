<?php
session_start();
include 'database.php';

if(isset($_SESSION['user_id']))
{
    $user_id=$_SESSION['user_id'];
}else{
    header('Location: /merajobs/login.php');
}

if(isset($_GET['job_id']))
{
    $apply_id=$_GET['job_id'];

    $skill_data=$conn->query("SELECT * FROM `skill` WHERE `id`='".$apply_id."'");
    $fetch_silldata=$skill_data->fetch();

    $state_id=$fetch_silldata['state'];
    $userid=$fetch_silldata['user_id'];
    $city_id=$fetch_silldata['city'];
    $area_id=$fetch_silldata['area'];
    $cat_id=$fetch_silldata['job_category'];

    $cat_data=$conn->query("SELECT name FROM `job_category` WHERE `id`='".$cat_id."' ");
    $fetch_catname=$cat_data->fetch();
    $categry_name=$fetch_catname['name'];

    $area_data=$conn->query("SELECT area FROM `area` WHERE `id`='".$area_id."' ");
    $fetch_areaname=$area_data->fetch();
    $area_name=$fetch_areaname['area'];
    
    $type_id=$fetch_silldata['job_type'];
    $job_desc=$fetch_silldata['job_desc'];
    $salary=$fetch_silldata['salary'];
    $vacancy=$fetch_silldata['vacancy'];
    $contact=$fetch_silldata['contact'];
    $published_date=$fetch_silldata['get_date'];

}

if(isset($_POST['applied_user']))
{
    $apply_id=$_POST['applied_user'];
    $job_id=$_POST['job_id'];

    $user_data=$conn->query("SELECT * FROM `register` WHERE `id`='".$apply_id."' ");
    $fetch_user=$user_data->fetch();
    $name=$fetch_user['name'];
    $email=$fetch_user['email'];
    $phone_number=$fetch_user['phone_number'];

    $conn->query("INSERT INTO `job_applications`(`user_id`,`applied_for`,`job_id`,`name`,`email`,`phone_no`) VALUES('".$user_id."','".$apply_id."','".$job_id."','".$name."','".$email."','".$phone_number."')");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Job Detail</title>
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


   <!-- Job Detail Start -->
   <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gy-5 gx-4">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-5">
                    <!-- <img class="flex-shrink-0 img-fluid border rounded" src="{% static 'img/com-logo-2.jpg' %}" alt="" style="width: 80px; height: 80px;"> -->
                    <div class="text-start ps-4">
                        <h3 class="mb-3"></h3>
                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?=$categry_name?></span>
                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?= ($type_id==1)?'Full Time':'Part Time' ?></span>
                        <!-- <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?=$salary?></span> -->
                    </div>
                </div>

                <div class="mb-5">
                    <h4 class="mb-3">Job description</h4>
                    <p><?=$job_desc?></p>
                    <h4 class="mb-3">Qualifications</h4>
                    <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                    </ul>
                </div>

                <div class="">
                    <form method="POST" action="">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="hidden" name="job_id" class="form-control" value="<?=$apply_id?>">
                                <input type="hidden" name="applied_user" class="form-control" value="<?=$userid?>">
                            </div>

                            <div class="col-12">
                                <?php
                                if($user_id==$userid)
                                {
                                    ?>
                                        <button class="btn btn-primary w-100" type="submit" disabled>Your Post</button>
                                    <?php
                                }else{
                                    $app_data=$conn->query("SELECT * FROM `job_applications` WHERE `user_id`='".$user_id."' AND `job_id`='".$apply_id."' ");
                                    $job_count=$app_data->rowcount();
                                    if($job_count>0)
                                    {
                                        ?>
                                            <button class="btn btn-primary w-100" type="submit" disabled>Already Applied</button>
                                        <?php
                                    }else{
                                        ?>
                                            <button class="btn btn-primary w-100" type="submit">Apply Post</button>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Job Summery</h4>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: <?=$vacancy?></p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Job Type: <?= ($type_id==1)?'Full Time':'Part Time' ?></p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: <?=$salary?></p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Contact: <?=$contact?></p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Location:<?=$area_name?></p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: <?=date('d-M-Y',strtotime($published_date))?> </p>
                </div>
                <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Additional Detail</h4>
                    <p class="m-0"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Job Detail End -->

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
