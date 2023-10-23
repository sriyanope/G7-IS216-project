<!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
             <!-- google font API -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <!-- <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet"> -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Outfit:wght@700&display=swap" rel="stylesheet">
            <!-- CSS stylesheet -->
            <link rel="stylesheet" href="/style.css">

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

            <title>Sign Up</title>

            <?php

              # Start session
              session_start();
         

              spl_autoload_register(
                  function($class){
                      require_once "MySQL/$class.php";
                  }
              );

              function registerUser($username, $fullName, $gender, $age, $email, $hashedPassword) {
                  $sql = "insert into user (username, fullName, gender, age, email, password) values (:username, :fullName, :gender, :age, :email, :hashedPassword);"; 

                  $connMgr = new ConnectionManager();
                  $pdo = $connMgr->getConnection();
                  
                  try{
                      $stmt = $pdo->prepare($sql);
                      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                      $stmt->bindParam(':fullName', $fullName, PDO::PARAM_STR);
                      $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
                      $stmt->bindParam(':age', $age, PDO::PARAM_INT);
                      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                      $stmt->bindParam(':hashedPassword', $hashedPassword, PDO::PARAM_STR);

                      $stmt->setFetchMode(PDO::FETCH_ASSOC);
                      $result = $stmt->execute();
                      return $result;
                  } 
                  catch (PDOException $e) {
                      // Check if the exception is due to a duplicate key (username in this case)
                      if ($e->errorInfo[1] === 1062) {
                          return false; // Return a specific error code for duplicate username
                          $_SESSION["error"] = "Username already existed";
                      } else {
                          // For other exceptions, you can log the error or handle them as needed
                          error_log("Database Error: " . $e->getMessage());
                          return false;
                      }
                  }
              }


              # Get parameters passed from register.php
              if(isset($_POST['submit'])){
                $username = $_POST["username1"];
                $fullName = $_POST["name1"];
                $gender = $_POST["gender1"];
                $age = $_POST["age1"];
                $email = $_POST["email1"];
                $password = $_POST["password1"];
                
                
                # Hash entered password
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                
                $status = registerUser($username, $fullName, $gender, $age, $email, $hashed);
                if($status){
                
                    $_SESSION["username"] = $username;
                    header("location: LandingPage.html");
                    exit;
                }
                else{
                    $_SESSION['error'] = "Username has been taken, please input another username";
                    
                }
              }

              ?>

        </head>
        <body>
            <!-- nav bar -->
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
                      <a class="nav-link mx-2" href="FindAGarden.html"><i class="findAGarden"></i> Find A Garden</a>
                    </li>
                    <li class="nav-item ms-auto mt-1">
                      <button class="btn text-white" href="#">
                          <img src="../icons.png" width="30">
                          My Profile</button>
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
        
                    <h3 class="mt-1">Create An Account</h3>
                    <div class="mb-5">Create an account to enjoy all the features like joining events and finding community gardens near you!</div>

                    <form method="post" onsubmit="return validateForm()">
                      <div class="form-outline mb-4">
                        <input type="username" class="form-control inputstl" name="username1" id="username1" placeholder="Enter a Username">
                      </div>

                      <div class="form-outline mb-4">
                        <input type="name" class="form-control inputstl" name="name1" id="name1" placeholder="Enter Your Full Name">
                      </div>

                      <div class="form-outline mb-4">
                        <select class="form-control inputstl" name="gender1" id="gender1">
                          <option disabled selected>Gender</option>
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="number" class="form-control inputstl" name="age1" id="age1" placeholder="Enter Your Age">
                      </div>

                      <div class="form-outline mb-4">
                        <input type="email" class="form-control inputstl" name="email1" id="email1" placeholder="Enter Email">
                        </dv>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" class="form-control inputstl" name="password1" id="password1" placeholder="Enter Password">
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" class="form-control inputstl" name="password2" id="password2" placeholder="Confirm Password">
                      </div>

                      <?php 
                      if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                      }
                      ?>

                      <button class="btn text-white btn-lg btn-block px-5" name="submit" type="submit">Sign Up</button>
          
                      <div class="pt-3">Already have an account? 
                          <a href='login.php' style="text-decoration: underline; color: black">Log In</a>
                      </div>
                    </form>

                    <script>

                      function validateForm() {
                          
                          var msg = "";
                          var check = true;
                          var username = document.getElementById("username1").value;
                          var fullName = document.getElementById("name1").value;
                          var gender = document.getElementById("gender1").value;
                          var age = document.getElementById("age1").value;
                          var email = document.getElementById("email1").value;
                          var password1 = document.getElementById("password1").value;
                          var password2 = document.getElementById("password2").value;


                          if(username.length == 0 || /^\s*$/.test(username)){
                              check = false;
                              msg += "Username cannot be empty or contain spaces\n";
                          }
                          if(fullName.length == 0){
                              check = false;
                              msg += "Full Name cannot be empty\n";
                          }
                          if(gender == "Gender"){
                              check = false;
                              msg += "Please select a gender\n";
                          }
                          if(age.length == 0){
                              check = false;
                              msg += "Age cannot be empty\n";
                          }
                          if(password1.length == 0){
                              check = false;
                              msg += "Password must not be empty\n";
                          }
                          if(password2.length == 0){
                              check = false;
                              msg += "Confirm Password must not be empty\n";
                          }
                          if(password1 != password2){
                              check = false;
                              msg += "Password and conform password does not match";
                          }
                             
                          if(!check){
                              alert(msg);
                          }
                    // return true if ok, false if there is a validation error
                          return check;
                      }
                  </script>
        
        
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>


</body>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      </body>
    </html>