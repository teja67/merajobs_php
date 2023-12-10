<?php
session_start();
include 'database.php';
if(isset($_SESSION['user_id']))
{
    $userid=$_SESSION['user_id'];
}else{
    header('Location: /merajobs/login.php');
}

$user_id=$_SESSION['user_id'];
$get_data=$conn->query("SELECT * FROM register WHERE id='".$user_id."'");
$fetch_data=$get_data->fetch();
$id=$fetch_data['id'];
$name=$fetch_data['name'];
$ph_no=$fetch_data['phone_number'];
$profile_pic=$fetch_data['profile_pic'];
$email=$fetch_data['email'];

    if (isset($_POST['user_id']) && isset($_FILES['pic'])) {
        $user_id = $_POST['user_id'];

        // Get the image information
        $file_name = $_FILES['pic']['name'];
        $file_size = $_FILES['pic']['size'];
        $file_tmp = $_FILES['pic']['tmp_name'];
        $file_type = $_FILES['pic']['type'];

        $target_path = "img/" . $file_name;
        move_uploaded_file($file_tmp, $target_path);

        $conn->query("UPDATE `register` SET `profile_pic`='".$file_name."' WHERE id='".$user_id."'");

        // Send a response back to the JavaScript
        echo "0";
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
    <title>Profile_Settings</title>
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
    <link rel="stylesheet" href="./css/style.css">


</head>
<body>
<?php include "header.php" ?>
   
<section style="background-color: #EFFDF5;">
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-6">
          <div class="card" style="border-radius: .5rem;">
            <div class="row g-0">
              <div class="col-md-4 gradient-custom text-center text-white"
                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                <div class="profile-pic mt-5" onclick="get_modal(1)">
                      <label class="-label" for="">
                          <span> <i class="far fa-edit"></i> Edit Photo</span>
                      </label>
                      <?php
                        $image=(is_null($profile_pic))?'user.JPG':$profile_pic;
                      ?>
                      <img src="./img/<?=$image?>" alt=""  class="avatar xl rounded-circle img-thumbnail shadow-sm">
                </div>

                <h5 class="mt-4"><?=$name?></h5>
              </div>
              <div class="col-md-8">
                <div class="card-body p-4">
                  <h6>Profile</h6>
                  <hr class="mt-0 mb-4">  
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>First Name</h6>
                      <p class="text-muted"></p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Last Name</h6>
                      <p class="text-muted"></p>
                    </div>
                  </div>
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Email</h6>
                      <p class="text-muted"><?=$email?></p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Phone</h6>
                      <p class="text-muted"><?=$ph_no?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Change profile picture</h4>
        </div>
        <div class="modal-body">
          <form id="upload-form" method="post" autocomplete="off" enctype="multipart/form-data">
            <input type="file" name="pic" id="pic" class="form-control" accept="image/jpeg, image/png" >
            <input type="hidden" name="id" class="form-control" value="<?=$id?>">
          
            <div class="mt-5">
              <img id="display-img" src="#" style="max-width: 100%; max-height: 200px;display: none;margin-left: 50px;"  class="pl-5"/>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" id="img-btn" onclick="update_image(<?=$id?>)">Submit</button>
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
        <script src="jquery-3.6.4.min.js"></script>
        <script src="./toastr-master/toastr.js"></script>
        <link href="./toastr-master/toastr.css" rel="stylesheet" type="text/css" />


<script>
  document.getElementById('pic').addEventListener('change', function() {
      const imgInput = document.getElementById("pic");
      const displayImg = document.getElementById("display-img");

      if (imgInput.files && imgInput.files[0]) {
          displayImg.style.display = 'block';
          displayImg.src = URL.createObjectURL(imgInput.files[0]);
      } else {
          displayImg.src = "";
      }
  });
   


function get_modal(modal_id)
{
    $("#myModal").modal("show");
}

var csrfToken = "{{ csrf_token }}";

function update_image(val)
{
    var profile_image=$('#pic').val();
    var formData = new FormData($('#upload-form')[0]);
    formData.append('user_id', val)

    $.ajax({
        type: 'post',
        url: '',
        headers: {
              'X-CSRFToken': csrfToken
          },
        data:formData,
        processData: false,
        contentType: false,
        success: function (data) {
            if(data==0)
            {
              $('.close').click();
              window.location.href = "/merajobs/profile_settings.php";
		          toastr.success('Profile Picture Uploaded');
            }else if(data==1){
              $('.close').click();
            }else{
              $('.close').click();
            }
        }
    });
}

</script>
        
</body>
</html>