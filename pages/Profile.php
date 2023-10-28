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

                .profileName{
                    /* font-size: 70px; */
                    /* font-weight: 700px; */
                    /* line-height: 100%; */
                    font-family: 'Outfit', sans-serif;
                    font-size:70px;
                    margin-top:10px;
                    /* width: 649px;
                    height: 129px; */
                    /* text-align: center; */
                    /* padding-left:200px */
                    
                    
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
                .byline{
                    font-size: 18px;
                    margin-top: 10px;
                    color:grey;
                }
                .featureTitle{
                    font-family: 'Orelega One', sans-serif;
                    /* position: */
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


            </style>

            <title>Log In</title>
            
        </head>
        <body>
            <!-- Start of Navbar -->
            <nav class="navbg navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm">

            <div class="container-fluid m-0" style="flex-wrap: wrap; margin: 0;">
              <img src="../logo.png" alt="Logo" style="width: 114px; height: 65px;" class="me-0 logo">
              <a class="navbar-brand me-auto" href="LandingPage.html"> <strong>ECOmmunity</strong></a>
              <button class="navbar-toggler align-content-center ms-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-family: 'Outfit', serif;">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item ms-auto mt-1">
                    <a class="nav-link mx-2 disabled" href="LandingPage.html"><i class="about"></i> About</a>
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
          <!-- End of Navbar -->
          <script>
            var username = <?php echo $_SESSION['username']; ?>;

            url = "MySQL/User.php?type=getUser&username=" + username;
            fetch(url)
              .then(response => {
                  if (!response.ok) {
                      throw new Error('Network response was not ok');
                  }
                  return response.json();
              })
              .then(data => {
                console.log(data.user);
                document.getElementById("fullName").innerText = data.user[0].fullName;
                document.getElementById("email").innerText = data.user[0].email;
                document.getElementById("bio").innerText = data.user[0].bio;
                document.getElementById("instagram").href = data.user[0].instagram;
                document.getElementById("telegram").href = "https://t.me/" + data.user[0].telegram;
              })
              .catch(error => {
                  console.error('Error:', error);
              });

          </script>
          <!-- Legend:
            Container1: for the profile picture, Edit profile tag, Sign Out tag, byline line and Social Media tags + all other componenets-->

          <!-- Start of Container1 -->
          <div class="container-fluid">
            <div class="row">
                <div class="col text-center mt-4">
                        <img class="profilePhotoFrame" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"> 
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                  <a href="ProfileEdit.php">
                    <button type="button" class="btn btn-success mx-2" href="ProfileEdit.html">
                        <img src="../public/images/edit.png" class="editProfileimg"> 
                        Edit Profile
                    </button>
                  </a>
                    
                  <a href="LogIn.php">
                  <button type="button" class="btn btn-success">
                        <img src="../public/images/logout.png" class="editProfileimg"> 
                        Sign Out
                    </button>
                  </a>
                </div>
            </div>
            <div class="row text-center">
                <h1 class="profileName" id="fullName"></h1>
            </div>
            <div class="row text-center">
                <p class="byline">"Software Developer by day, secret gardener by night"</p>
                <div class="col text-center mb-3">
                    Click me! ->
                    <button type="button" class=" btn bg-dark text-white mx-2"> <!-- onclick='copyFunction()' was meant to be here-->
                        <img src="../public/images/open-mail.png" class="editProfileimg"><span id="email"></span></button>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                  <a href="#">
                  <button type="button" class=" btn bg-dark text-white mx-2">
                        <img src="../public/images/linkedin.png" class="editProfileimg"> 
                        LinkedIn
                    </button>
                    </a>
                    <a href="#" id="instagram">
                    <button type="button" class=" btn bg-dark text-white mx-2">
                        <img src="../public/images/instagram.png" class="editProfileimg"> 
                        Instagram
                    </button>
                    </a>
                    <a href="#" id="telegram">
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
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <h3 class="featureTitle">Events Attended:</h3>
                </div>
                <div class="col-md-4 offset-md-4">
                    <div id="carouselExampleCaptions" class="carousel slide">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="../public/images/EventImage.jpg" class="d-block w-100 " alt="event #1">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Tree Planting Event #1</h5>
                              <p>Some representative placeholder content for the first slide.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="../public/images/EventImage.jpg" class="d-block w-100" alt="event #">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Tree Planting Event #2</h5>
                              <p>Some representative placeholder content for the second slide.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="../public/images/EventImage.jpg" class="d-block w-100" alt="event #">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Tree Planting Event #1</h5>
                              <p>Some representative placeholder content for the third slide.</p>
                            </div>
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    
                </div>

            </div>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <h3 class="featureTitle">Events Hosted:</h3>
                </div>
                <div class="col-md-4 offset-md-4">
                    <div id="carouselWithCaptions" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-bs-target="#carouselWithCaptions" data-bs-slide-to="0" class="active"></li>
                          <li data-bs-target="#carouselWithCaptions" data-bs-slide-to="1"></li>
                          <li data-bs-target="#carouselWithCaptions" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="../public/images/EventImage.jpg" class="d-block w-100" alt="Slide 1">
                            <div class="carousel-caption d-none d-sm-block">
                              <h5>First slide label</h5>
                              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="../public/images/EventImage.jpg" class="d-block w-100" alt="Slide 2">
                            <div class="carousel-caption d-none d-sm-block">
                              <h5>Second slide label</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="../public/images/EventImage.jpg" class="d-block w-100" alt="Slide 3">
                            <div class="carousel-caption d-none d-sm-block">
                              <h5>Third slide label</h5>
                              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselWithCaptions" role="button" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselWithCaptions" role="button" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                    
                </div>

            </div>
            
          </div>
          <!-- End of Container -->


    

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="...HUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        </body>
        <script>
           // idk if yall wanna try, but i wanted to add a button where when you click on the email, it copies onto your clipboard? here is a link from w3 
           // schools that I tried with but I failed https://www.w3schools.com/howto/howto_js_copy_clipboard.asp, check it out
        </script>
    </html>