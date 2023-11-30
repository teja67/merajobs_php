<?php
session_start();
include 'database.php';

$user_id=$_SESSION['user_id'];

if(isset($_POST['state']))
{
    $state=$_POST['state'];
    $city=$_POST['city'];
    $area=$_POST['area'];
    $job_category=$_POST['job_category'];
    $job_type=$_POST['job_type'];
    $job_desc=$_POST['job_desc'];
    $salary=$_POST['salary'];
    $contact=$_POST['contact'];
    $vacancy=$_POST['vacancy'];

    $conn->query("INSERT INTO `skill`(`state`,`city`,`area`,`job_type`,`job_category`,`job_desc`,`salary`,`vacancy`,`contact`,`user_id`) VALUES('".$state."','".$city."','".$area."','".$job_type."','".$job_category."','".$job_desc."','".$salary."','".$vacancy."','".$contact."','".$user_id."')");
    
    header('Location:/merajobs/skill.php');
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
    <title>Skill</title>
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
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Skill</h1>
        <div class="row g-3">

            <form action="" method="post" autocomplete="off">
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="col-md-2 col-5">
                        <label for="state">State<span class="text-danger"> *</span></label>
                    </div>
                    <div class="col-md-4 col-5">
                        <select name="state" id="state" class="form-select border-0" onchange="get_state()">
                            <option selected>Select State</option>
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
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="col-md-2 col-5">
                        <label for="city">City<span class="text-danger"> *</span></label>
                    </div>
                    <div class="col-md-4 col-5">
                        <select name="city" class="form-select border-0" id="city_dropdown" onchange="get_city()">
                            <option selected>Select City</option>
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
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="col-md-2 col-5">
                        <label for="area">Area<span class="text-danger"> *</span></label>
                    </div>
                    <div class="col-md-4 col-5">
                        <select name="area" class="form-select border-0" id="area_dropdown">
                            <option selected>Select Area</option>
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
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="col-md-2 col-5">
                        <label for="">Job type <span class="text-danger"> *</span></label>
                    </div>
                    <div class="col-md-4 col-5">
                        <select name="job_type" id="job_type" class="form-control">
                            <option value="">Select Job Type</option>
                            <option value="1">Part Time</option>
                            <option value="2">Full Time</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="col-md-2 col-5">
                        <label for="job">Job<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-4 col-5">
                        <select name="job_category" id="job" class="form-control">
                            <option value="">Select Job Category</option>
                            <?php
                                $cate_data=$conn->query("SELECT * FROM `job_category`");
                                while($data=$cate_data->fetch())
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
                        <label for="job_desc">Job Description<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-4 col-5">
                        <textarea name="job_desc" id="job_desc" cols="50" rows="5"></textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="col-md-2 col-5">
                        <label for="salary">Salary<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-4 col-5">
                        <input type="text" name="salary" id="salary" class="form-control" placeholder="Enter Your Salary">
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="col-md-2 col-5">
                        <label for="contact">Contact<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-4 col-5">
                        <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Your Contact">
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="col-md-2 col-5">
                        <label for="vacancy">Vacancy</label>
                    </div>
                    <div class="col-md-4 col-5">
                        <input type="text" name="vacancy" id="vacancy" class="form-control" placeholder="Enter Vacancy">
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
               var csrfToken = "{{ csrf_token }}";

function get_state(val)
{
     $.ajax({
        type:'POST',
        url: 'get_city',
        headers: {
            'X-CSRFToken': csrfToken
        },
        data: {
            city_id: val
        },
        success: function(data) 
        {
           
        }
    });
}
        </script>
        
</body>
</html>