<!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="...PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <!-- <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet"> -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Outfit:wght@700&display=swap" rel="stylesheet">
            <!-- CSS stylesheet -->
            <link rel="stylesheet" href="../style.css">
            <!--reCAPTHA v2.0-->
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
                    @media screen and (max-width:540px){
                .centerOnMobile {
                        text-align:center
                    }
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


            </style>

            <?php

            session_start();
            unset($_SESSION['username']);

            spl_autoload_register(
                function($class){
                    require_once "MySQL/$class.php";
                }
            );

            function retrieveUser($username) {
                $sql = "select username, password from user where username = :username;"; 

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


            if(isset($_POST['submit'])){
                $secret = "6LehUX4oAAAAADi4e2nB_zOqJCDD1xmWzyly9Pme";
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
                    }
                }
            }






            ?>

            <title>Log In</title>
            
        </head>
        <body>
          <nav class="navbg navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm">

            <div class="container m-0" style="flex-wrap: wrap; margin: 0;">
              <img src="../logo.png" alt="Logo" width="80" height="50" class="col-1 me-0">
              <a class="navbar-brand me-auto m-1" href="#"> <strong>ECOmmunity</strong></a>
              <button class="navbar-toggler align-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-family: 'Outfit', serif;">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item ms-auto mt-1">
                    <a class="nav-link mx-2" href="#"><i class="about"></i> About</a>
                  </li>
                  <li class="nav-item ms-auto mt-1">
                    <a class="nav-link mx-2" href="#"><i class="events"></i> Events</a>
                  </li>
                  <li class="nav-item ms-auto mt-1">
                    <a class="nav-link mx-2" href="#"><i class="findAGarden"></i> Find A Garden</a>
                  </li>
                  <li class="nav-item ms-auto mt-1">
                    <button class="btn text-white" href="#">
                        <img src="../icons.png" width="30">
                        Profile</button>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

                    
        <section class="vh-100" style="background-color: #B7CF9B;">
            <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
        
                    <h3 class="mt-1">Log In</h3>
                    <div class="mb-5">Log in to enjoy all the features like joining events and finding community gardens near you!</div>
                    
                    
                    <form method="post" onsubmit="return validateForm()">
                    <div class="form-outline mb-4">
                        <input type="name" name="username1" id="username1" class="form-control form-control-lg" placeholder="Username"/>
                    </div>
        
                    <div class="form-outline mb-4">
                        <input type="password" name="password1" id="password1" class="form-control form-control-lg" placeholder="Password"/>
                    </div>

                    <div class="g-recaptcha" data-sitekey="6LehUX4oAAAAABXpjfAUapqrTexUmEPXuQzRIs9v"></div>

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


        <script>
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







            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="...HUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        </body>
    </html>