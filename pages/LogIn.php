<!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="...PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Outfit:wght@700&display=swap" rel="stylesheet">
            <!-- CSS stylesheet -->
            <link rel="stylesheet" href="../style.css">
            <!--reCAPTHA v2.0-->
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <!--Vue-->
            <script src="https://unpkg.com/vue@next"></script>

            <!-- styling -->
            <style>
               a {
                    font-size:14px;
                    font-weight:700
                    }
                .superNav {
                    font-size:13px;
                    }
                .form-control {
                    outline:none !important;
                    box-shadow: none !important;
                    }
                    @media screen and (max-width:900px){
                .centerOnMobile {
                        text-align:center
                    }
                    }

                    @media screen and (max-width: 280px) { 

                                        .logo { display: none; }  

                                        }

                .navbar {
                    background-color: #F6F8E0;
                }

                .btn{
                    background-color: #547D2E;
                }

                .bggreen {
                    background-color: #B7CF9B;
                }
                .text-center1 {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin-right: auto;
                    margin-left: auto;
                }
            </style>

            <?php

                session_start();
                unset($_SESSION['username']);

                spl_autoload_register(
                    function($class){
                        require_once "MySQL/$class.php";
                    }
                );

                // function to retrieve user password from MySQL
                function retrieveUser($username) {
                    $sql = "select username, password from users where username = :username;"; 

                    $connMgr = new ConnectionManager();
                    $pdo = $connMgr->getConnection();
                    

                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        $stmt->execute();
                        $result = "";

                        while($row = $stmt->fetch()) {
                            $result = $row["password"];
                        }

                        return $result;

                }

                // validates the user log in details
                if(isset($_POST['submit'])){
                    $secret = "6Ld-fNcoAAAAAHSdGkVONlDrrecsy-4JMsrROuBi";
                    $response = $_POST["g-recaptcha-response"];
                    $remoteip = $_SERVER['REMOTE_ADDR'];
                    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
                    $data = file_get_contents($url);
                    $row = json_decode($data, true);
                    
                    $username = $_POST["username1"];
                    $password = $_POST["password1"];
                    $hashedPassword = retrieveUser($username);

                    if($row['success'] != true){
                        $_SESSION['error'] = "Error: Please complete the reCAPTCHA";
                    }else if ($hashedPassword !== null) {
                        if (password_verify($password, $hashedPassword)) {
                            $_SESSION['username'] = $username;
                            header("location: LandingPage.html");
                            exit;
                        } else {
                            $_SESSION['error'] = "Wrong Username or Password, please try again.";
                            if(isset($_SESSION['failedLogin'])){
                                $_SESSION['failedLogin'] += 1;
                            }else{
                                $_SESSION['failedLogin'] = 1;
                            }
                        }
                    }
                }

            ?>

            <!-- title -->
            <title>Log In</title>
            
        </head>
        <body>
            <!-- nav bar -->
            <nav class="navbg navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm">
                <div class="container-fluid m-0 p-0" style="flex-wrap: wrap; margin: 0;">
                    <img src="../logo.png" alt="Logo" style="width: 88px; height: 50px;" class="me-0 logo">
                    <a class="navbar-brand me-auto" href="LandingPage.html"> <strong>ECOmmunity</strong></a>
                    <button class="navbar-toggler align-content-center ms-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                
                    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-family: 'Outfit', serif;">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item ms-auto mt-1">
                                <a class="nav-link mx-2 disabled" href="#"><i class="about"></i> About</a>
                            </li>
                            <li class="nav-item ms-auto mt-1">
                                <a class="nav-link mx-2" href="#"><i class="events"></i> Events</a>
                            </li>
                            <li class="nav-item ms-auto mt-1">
                                <a class="nav-link mx-2" href="#"><i class="findAGarden"></i> Find A Garden</a>
                            </li>
                            <li class="nav-item ms-auto mt-1">
                                <a href="#"><button class="btn text-white" href="#">
                                <img src="../icons.png" width="30">
                                My Profile</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        <!-- log in form -->
        <section class="vh-100" style="background-color: #B7CF9B;">
            <div class="container py-2 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
            
                                <h3 class="mt-1">Log In</h3>
                                <div class="mb-5">Log in to enjoy all the features like joining events and finding community gardens near you!</div>
                        
                        
                                <form method="post" onsubmit="return validateForm()">
                                    <div class="form-outline mb-4" id="appUsername">
                                        <input type="name" name="username1" id="username1" class="form-control form-control-lg" placeholder="Username" v-model="username1"/>
                                        <span v-if="usernameCheck()" style="color:red;">Username has to be at least 8 characters</span>
                                    </div>
                        
                                    <div class="form-outline mb-4" id="appPassword">
                                        <input type="password" name="password1" id="password1" class="form-control form-control-lg" placeholder="Password" v-model="password1"/>
                                        <span v-if="passwordCheck()" style="color:red;">Password has to be at least 8 characters</span>
                                    </div>

                                    <div class="text-center1">
                                        <div class="g-recaptcha" data-sitekey="6Ld-fNcoAAAAAOS824_2sZOSzTMzy1xDo5CkBsoN" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;">
                                        </div>
                                    </div>

                                    <?php 
                                    if(isset($_SESSION['error'])){
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    }
                                    ?>
                                
                                    <button class="btn text-white btn-lg btn-block px-5" name="submit" type="submit">Login</button>

                                    <div class="pt-3">Don't have an account? 
                                        <a href='SignUp.php' style="text-decoration: underline; color: black">Create an Account</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- javascript -->
        <script>
            // vue to show message on username
            const appUsername = Vue.createApp({
                data(){
                    return {username1: ""}
                },
                methods: {
                    usernameCheck() {
                    if(this.username1.length > 0 && this.username1.length < 8){
                        return true
                    }
                    }
                }
                }).mount('#appUsername');

            // vue to show message on password
            const appPassword = Vue.createApp({
                data(){
                return {password1: ""}
                },
                methods: {
                passwordCheck() {
                    if(this.password1.length > 0 && this.password1.length < 8){
                    return true
                    }
                }
                }
            }).mount('#appPassword');

            // function to validate form inputs
            function validateForm() {
                          
              var msg = "";
              var check = true;
              var username = document.getElementById("username1").value;
              var password = document.getElementById("password1").value;

              if(username.length == 0 || /^\s*$/.test(username)){
                  check = false;
                  msg += "Username cannot be empty or contain spaces\n";
              }
              if(password.length == 0){
                  check = false;
                  msg += "Password must not be empty\n";
              }
                  
              if(!check){
                  alert(msg);
              }

           return check;
           }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
    </body>
</html>