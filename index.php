<?php
session_start();
include 'database.php';
$userid=isset($_SESSION['user_id']);
if(isset($_POST['user_id']))
{
    session_destroy();
    header('Location: /merajobs/login.php');
    exit;
}

if(isset($_POST['state']))
{
    $state_id=$_POST['state'];
    $city_id=$_POST['city'];
    $area_id=$_POST['area'];

    $job_data=$conn->query("SELECT * FROM `skill` WHERE `state`='".$state_id."' and `city`='".$city_id."' and `area`='".$area_id."' ");
}
else
{
    $job_data=$conn->query("SELECT * FROM skill");
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
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
   
<?php include "header.php" ?>


<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <form action="" method="post">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-3">
                            <select class="form-select border-0" name="state" id="state" required>
                                <option value="" >Select State</option>
                                <?php
                                    $state_data=$conn->query("SELECT * FROM `state`");
                                    while($data=$state_data->fetch())
                                    {
                                        ?>
                                            <option value="<?=$data['id']?>"><?=$data['name']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select border-0" name="city" id="city" required>
                                <option value="">Select City</option>
                                <?php
                                    $city_data=$conn->query("SELECT * FROM `city`");
                                    while($data=$city_data->fetch())
                                    {
                                        ?>
                                            <option value="<?=$data['id']?>"><?=$data['name']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select border-0" name="area" id="area" required>
                                <option value="">Select Area</option>
                                <?php
                                    $area_data=$conn->query("SELECT * FROM `area`");
                                    while($data=$area_data->fetch())
                                    {
                                        ?>
                                            <option value="<?=$data['id']?>"><?=$data['area']?></option>
                                        <?php
                                    }
                                ?>
                                
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-dark border-0 w-100">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                    <h6 class="mb-3">Marketing</h6>
                    <!-- <p class="mb-0">123 Vacancy</p> -->
                </a>
            </div>
            <div class="col-lg-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                    <h6 class="mb-3">Customer Service</h6>
                    <!-- <p class="mb-0">123 Vacancy</p> -->
                </a>
            </div>
            <div class="col-lg-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                    <h6 class="mb-3">Human Resource</h6>
                    <!-- <p class="mb-0">123 Vacancy</p> -->
                </a>
            </div>
            <div class="col-lg-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                    <h6 class="mb-3">Project Management</h6>
                    <!-- <p class="mb-0">123 Vacancy</p> -->
                </a>
            </div>
            <div class="col-lg-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                    <h6 class="mb-3">Business Development</h6>
                    <!-- <p class="mb-0">123 Vacancy</p> -->
                </a>
            </div>
            <div class="col-lg-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                    <h6 class="mb-3">Sales & Communication</h6>
                    <!-- <p class="mb-0">123 Vacancy</p> -->
                </a>
            </div>
            <div class="col-lg-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-book-reader text-primary mb-4"></i>
                    <h6 class="mb-3">Teaching & Education</h6>
                    <!-- <p class="mb-0">123 Vacancy</p> -->
                </a>
            </div>
            <div class="col-lg-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-drafting-compass text-primary mb-4"></i>
                    <h6 class="mb-3">Design & Creative</h6>
                    <!-- <p class="mb-0">123 Vacancy</p> -->
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Category End -->

 <!-- Jobs Start -->
 <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                <?php
                                    if($job_data->rowCount() > 0)
                                    {
                                        $jobdata = array();
                                        while ($row = $job_data->fetch(PDO::FETCH_ASSOC)) {
                                            $jobdata[] = $row;
                                        }
                                        
                                        foreach($jobdata as $get_data)
                                        {
                                                
                                            $user_id=$get_data['user_id'];
                                            $job_id=$get_data['job_type'];
                                            $category_id=$get_data['job_category'];
                                            $city_id=$get_data['city'];
                                            $area_id=$get_data['area'];
                                            $get_date=$get_data['get_date'];
                                            $dateTime = new DateTime($get_date);
                                            $formattedDate = $dateTime->format('d M, Y');

                                            $job_type=($job_id==1)?'Part Time':'Full Time';

                                            $category_data=$conn->query("SELECT name FROM `job_category` WHERE id='".$category_id."' ");
                                            $cat_data=$category_data->fetch();

                                            $city_data=$conn->query("SELECT name FROM `city` WHERE id='".$city_id."' ");
                                            $citydata=$city_data->fetch();

                                            $area_data=$conn->query("SELECT area FROM `area` WHERE id='".$area_id."' ");
                                            $areadata=$area_data->fetch();
                                            ?>
                                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                                <div class="text-start ps-4">
                                                    <h5 class="mb-3"><?=$cat_data['name']?></h5>
                                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?=$areadata['area']?>,<?=$citydata['name']?></span>
                                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?=$job_type?></span>
                                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?=$get_data['vacancy']?></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                <div class="d-flex mb-3">
                                                    <?php
                                                    if($user_id==$userid)
                                                    {
                                                        ?>
                                                            <a class="btn btn-primary" href="">Your Post</a>
                                                        <?php
                                                    }else{
                                                        ?>
                                                            <a class="btn btn-primary" href="">Apply Now</a>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Posted: <?=$formattedDate?></small>
                                            </div>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <p> <strong>No Jobs Found</strong> </p>
                                        <?php
                                    }
                                   
                                    ?>

                                        
                                   
                                </div>
                            </div>
                            <!-- <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->


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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>

function logout(val)
{
    $.ajax({
           type:'POST',
           url: '',
           data: {
               user_id: val
           },
           success: function(data) 
           {
            //    alert(data);
           }
       });
}
</script>
        
</body>
</html>