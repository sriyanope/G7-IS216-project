<!doctype html>
    <html lang="en">
    <?php session_start(); ?>
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
            <!-- Fonts (Orelega One and Outfit)-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Outfit:wght@600&display=swap" rel="stylesheet">

            <!-- CSS stylesheet -->
            <link rel="stylesheet" href="../style.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

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
                      .logo {
                        display: none;
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

                .profileName{
                    font-family: 'Outfit', sans-serif;
                    font-size:70px;
                    margin-top:10px; 
                }
                .profilePhotoFrame{
                    position:relative;
                    height: 200px;
                    overflow:hidden;
                    border-radius: 50%;

                }
                .editProfileimg{  
                    margin-right: 3px;
                    width:25px;
                    height:25px;
                }
                .featureTitle{
                    font-family: 'Orelega One', sans-serif;
                    margin-top: 40px;

                }
                .bio{
                    color: grey;
                    border-radius: 10px;
                }
            
                textarea {
                  -webkit-box-sizing: border-box;
                  -moz-box-sizing: border-box;
                  box-sizing: border-box;

                  width: 100%;
              }

              .notification {
                position: fixed;
                bottom: 0;
                right:0;
                z-index: 100;
              }

            </style>

            <!-- title -->
            <title>Profile</title>
            
        </head>
        <body>
            <!-- nav bar -->
            <nav class="navbg navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm">

                <div class="container-fluid m-0" style="flex-wrap: wrap; margin: 0;">
                    <img src="../logo.png" alt="Logo" style="width: 88px; height: 50px;" class="me-0 logo">
                    <a class="navbar-brand me-auto" href="LandingPage.html"> <strong>ECOmmunity</strong></a>
                    <button class="navbar-toggler align-content-center ms-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-family: 'Outfit', serif;">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item ms-auto mt-1">
                                <a class="nav-link mx-2" href="LandingPage.html"><i class="about"></i> About</a>
                            </li>
                            <li class="nav-item ms-auto mt-1">
                                <a class="nav-link mx-2" href="JoinAnEvent.php"><i class="events"></i> Events</a>
                            </li>
                            <li class="nav-item ms-auto mt-1">
                                <a class="nav-link mx-2" href="FindAGarden.php"><i class="findAGarden"></i> Find A Garden</a>
                            </li>
                            <li class="nav-item ms-auto mt-1">
                                <a href="Profile.php"><button class="btn text-white" href="#">
                                    <img src="../icons.png" width="30">
                                    My Profile</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

          <!-- javascript -->
          <script>

            // gets the username of the user
            var username = <?php 
            if(isset($_GET['username1'])){
              echo $_GET['username1'];
            }else{
              echo $_SESSION['username'];
            } ?>;

            // checks if the profile page belongs to the user
            var checkOwnProfile = <?php 
              if((isset($_GET['username1']) and $_GET['username1'] == $_SESSION['username']) or !isset($_GET['username1'])){
                echo 1;
              }else{
                echo 0;
              } ?>;

              console.log(checkOwnProfile)

            // retrieve profile details and populate page
            url = "MySQL/User.php?type=getUser&username=" + username;
            fetch(url)
              .then(response => {
                  if (!response.ok) {
                      throw new Error('Network response was not ok');
                  }
                  return response.json();
              })
              .then(data => {
                console.log(data.user)
                document.getElementById("fullName").innerText = data.user[0].fullName;
                document.getElementById("email").innerText = data.user[0].email;
                document.getElementById("copyButton").setAttribute("data-value", data.user[0].email);
                document.getElementById("bio").innerText = data.user[0].bio;

                if(data.user[0].instagram !== null && data.user[0].instagram.length > 0){
                  document.getElementById("instagram").href = data.user[0].instagram;
                }else{
                  document.getElementById("instagram").setAttribute("class", "d-none");
                }

                if(data.user[0].telegram !== null && data.user[0].telegram.length > 0){
                  document.getElementById("telegram").href = "https://t.me/" + data.user[0].telegram;
                }else{
                  document.getElementById("telegram").setAttribute("class", "d-none");
                }

                document.getElementById("image").setAttribute("src", data.user[0].profilePhoto);

              })
              .catch(error => {
                  console.error('Error:', error);
              });

          </script>
          <!-- content  -->
          <div class="container-fluid">
            <div class="row">
                <div class="col text-center mt-4">
                        <img class="profilePhotoFrame" id="image" style="width: 200px; height: 200px; margin-bottom:20px;" src="ProfileImage/1.png"> 
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                  <a href="ProfileEdit.php" style="text-decoration:none;">
                    <button type="button" class="btn btn-success mx-2" href="ProfileEdit.html" id="editBtn">
                        <img src="../public/images/edit.png" class="editProfileimg"> 
                        Edit Profile
                    </button>
                  </a>
                    
                  <a href="LogIn.php" style="text-decoration:none;">
                  <button type="button" class="btn btn-success" id='signOutBtn'>
                        <img src="../public/images/logout.png" class="editProfileimg">
                        Sign Out
                    </button>
                  </a>
                </div>
            </div>

            <script>

              // if the profile page does not belong to the user, hide the edit and sign out button
              if(checkOwnProfile == 0){
                document.getElementById("editBtn").setAttribute("class", "btn btn-success mx-2 d-none");
                document.getElementById("signOutBtn").setAttribute("class", "btn btn-success d-none");
              }



            </script>
            
            <div class="row text-center">
                <h1 class="profileName" id="fullName"></h1>
            </div>
            <div class="row text-center">
                <div class="col text-center mb-3">


                    <button type="button" class=" btn bg-dark text-white mx-2" id="copyButton">
                        <img src="../public/images/open-mail.png" class="editProfileimg"><span id="email"></span></button>

                    <a href="#" id="instagram" style="text-decoration:none;">
                    <button type="button" class=" btn bg-dark text-white mx-2" >
                        <img src="../public/images/instagram.png" class="editProfileimg"> 
                        Instagram
                    </button>
                    </a>
                    <a href="#" id="telegram" style="text-decoration:none;">
                    <button type="button" class=" btn bg-dark text-white mx-2">
                        <img src="../public/images/telegram.png" class="editProfileimg"> 
                        Telegram
                    </button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <h3 class="featureTitle">Bio:</h3>
                </div>
                <div class="col-md-4 offset-md-4">
                    <textarea disabled rows="5" cols="30" class="bio text-center" id="bio">
                    get to know more about me
                    </textarea>
                </div>
            </div>
            

            <!-- Notification -->
            <div id="notification" class="notification"></div>

            <div class="container m-5"></div>
            
          </div>

    
          <script>

              // function to display an alert and automatically dismiss it after 5 seconds
              function displayAlert(message, type) {
                const notification = document.getElementById("notification");
                const alert = document.createElement("div");
                alert.className = `alert alert-${type} alert-dismissible fade show`;
                alert.innerHTML = `${message}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>`;
                notification.appendChild(alert);
                setTimeout(function() {
                  alert.style.display = "none";
                }, 5000);
              }

              // function to copy value
              function copyButtonValue() {
                // Get the button element by its ID
                const button = document.getElementById("copyButton");

                if (button) {
                  const valueToCopy = button.getAttribute("data-value");
                  const tempInput = document.createElement("input");
                  document.body.appendChild(tempInput);
                  tempInput.setAttribute("value", valueToCopy);
                  tempInput.select();
                  document.execCommand("copy");
                  document.body.removeChild(tempInput);
                  displayAlert("Email copied to clipboard", "warning");
                }
              }

              const copyButton = document.getElementById("copyButton");

              if (copyButton) {
                copyButton.addEventListener("click", copyButtonValue);
              }



          </script>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
        </body>
  </html>