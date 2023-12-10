
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/merajobs/index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">Reasonable Jobs</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
        <?php
        
            if(isset($_SESSION['user_id']))
            {
                $isLoggedIn=$_SESSION['user_id'];
                $is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin']==1;            ;

                if($is_admin==0)
                {
                    $username=$_SESSION['user_name'];
                
                    $application_data=$conn->query("SELECT * FROM `job_applications` WHERE `applied_for`='".$isLoggedIn."' ");
                    $application_count=$application_data->rowcount();
                    
    
                    $count=($application_count>0)?$application_count:'';
                    ?>
    
                        <a href="/merajobs/index.php" class="nav-item nav-link"><i class="fa fa-home"></i> Home</a>
                        <a href="/merajobs/get_application.php" class="nav-item nav-link"><i class="fa fa-paper-plane"></i> Applied</a>
                        <a href="/merajobs/inbox.php" class="nav-item nav-link"><i class="fa fa-briefcase"></i> Skills Inbox <sup class="text-danger"><?=$count?></sup> </a>
                        <a href="/merajobs/vacancies_inbox.php" class="nav-item nav-link"><i class="fa fa-briefcase"></i> Vacancies Inbox</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?= $username?></a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="/merajobs/profile_settings.php" class="dropdown-item"><i class="fa fa-user"></i> My Profile</a>
                                <a href="/merajobs/skill.php" class="dropdown-item "><i class="fa fa-clipboard-list"></i> Post Skill</a>
                                <a href="/merajobs/your_skills.php" class="dropdown-item "><i class="fa fa-clipboard-list"></i> View Skills</a>
                                <a href="/merajobs/vacancies.php" class="dropdown-item "><i class="fa fa-clipboard-list"></i> Post Vacancies</a>
                                <a href="/merajobs/your_vacancies.php" class="dropdown-item "><i class="fa fa-clipboard-list"></i> View Vacancies</a>
                            </div>
                        </div>
                        <a class="nav-item nav-link" style="cursor:pointer" onclick="logout(<?=$isLoggedIn?>)"><i class="fa fa-sign-out-alt"></i> Logout</a>
    
                    <?php
                }
                else if($is_admin==1)
                {
                    $username=$_SESSION['user_name'];
                    ?>
    
                        <a href="/merajobs/index.php" class="nav-item nav-link"><i class="fa fa-home"></i> Home</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?= $username?></a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="/merajobs/state.php" class="dropdown-item"><i class="fa fa-user"></i> State</a>
                                <a href="/merajobs/city.php" class="dropdown-item "><i class="fa fa-clipboard-list"></i> City</a>
                                <a href="/merajobs/area.php" class="dropdown-item "><i class="fa fa-clipboard-list"></i> Area</a>
                                <a href="/merajobs/job_category.php" class="dropdown-item "><i class="fa fa-clipboard-list"></i> Job Category</a>
                                <!-- <a class="dropdown-item" onclick="logout(<?=$isLoggedIn?>)"><i class="fa fa-sign-out-alt"></i> Logout</a> -->
                            </div>
                        </div>
                        <a class="nav-item nav-link" style="cursor:pointer" onclick="logout(<?=$isLoggedIn?>)"><i class="fa fa-sign-out-alt"></i> Logout</a>
    
                    <?php
                }
            } else{
                ?>
                    <a href="/merajobs/login.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
                <?php
            }

            ?>
        </div>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>

function logout(val)
{
    $.ajax({
           type:'POST',
           url: '/merajobs/logout.php',
           data: {
               user_id: val
           },
           success: function(data) 
           {
            window.location.href = "/merajobs/login.php";
           }
       });
}
</script>