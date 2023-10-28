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
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="myPictures.css">

            <style>
                a {
                     font-size:14px;
                     font-weight:700;
                     color: black;
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
                         text-align:center;
                     }
                     }
 
                     @media screen and (max-width: 308px) { 
 
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
                     display: flex;
                     flex-direction: column;
                     min-height: 100vh;
                 }
 
                 .noEventCentre {
                     padding-top: 22%;
                     padding-bottom: 22%;
                     text-align: center;
                 }
 
                 .carousel-control-prev, .carousel-control-next {
                     background-color: rgba(0, 0, 0, 0.5); /* Background color */
                     width: 3rem; /* Adjust the width as needed */
                     height: 3rem; /* Adjust the height as needed */
                     border-radius: 50%; /* Makes them round */
                     opacity: 1; /* Set the opacity to make them fully visible */
                     top: 50%; /* Adjust the vertical position */
                     transform: translateY(-50%); /* Center vertically */
                 }
 
                 .carousel-control-prev-icon, .carousel-control-next-icon {
                     color: white; /* Icon color */
                     font-size: 1.5rem; /* Icon size */
                 }
            </style>

            <title>Garden Page</title>
            
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
                      <a class="nav-link mx-2" href="../JoinAnEvent.html"><i class="events"></i> Events</a>
                    </li>
                    <li class="nav-item ms-auto mt-1">
                      <a class="nav-link mx-2" href="../FindAGarden.php"><i class="findAGarden"></i> Find A Garden</a>
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

            <!-- content -->
            <div class="container-fluid">
                <div class="row pt-5"> 
                    <div class="col-1"></div> 
                    <div class="col-10">
                        <h2><b>Community Garden @ Bedok</b></h2>
                    </div> 
                </div>

                <div class="row"> 
                    <div class="col-1"></div> 
                    <div class="col-10">
                        <p><img src="../public/images/location pin.svg"> Blk 635 Bedok North, Singapore 179872 • 
                            <span style="color: gray;">Vegetable Garden</span>
                        </p>
                        
                    </div> 
                </div>


                <!-- carousel -->

                <div class="row"> 
                    <div class="col-1"></div> 
                    <div class="col-10">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="../public/images/randomGarden.jpeg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="../public/images/EventImage.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="../public/images/randomGarden.jpeg" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                            </div>
                        
                        </div> 
                    </div>
                </div>
                
                <!-- My Notes -->

                <div class="row pt-3"> 
                    <div class="col-1"></div> 
                    <div class="col-10">
                        <h2><b>My Notes</b></h2>
                    </div> 
                </div>

                <div class="row pt-1"> 
                    <div class="col-1"></div> 
                    <div class="col-10">
                        <p>
                            At our Tree Planting Event, you can expect an inspiring day of hands-on environmental action. Participants will have the opportunity to get their hands dirty as we work together to plant a variety of native trees in a designated area. Don't worry if you're new to tree planting; our experienced team will provide all the necessary guidance and tools. You'll learn about the importance of tree planting for our ecosystem, climate, and local community. Throughout the event, there will be engaging educational sessions and discussions on environmental conservation. So, come prepared to dig holes, place saplings in the ground, and nurture these young trees into a thriving forest. It's a day filled with camaraderie, learning, and the satisfaction of contributing to a healthier planet. Join us in making a tangible difference and be a part of this meaningful conservation effort!
                        </p>
                    </div> 
                </div>

                <!-- My Pictures -->

                <div class="row pt-3"> 
                    <div class="col-1"></div> 
                    <div class="col-10">
                        <h2><b>My Pictures</b></h2>
                    </div> 
                </div>

                <div class="row pt-3 myPictures"> 
                    <div class="col-1"></div> 
                    <div class="col-10">
                        
                        <div class="gallery">
                            <img src="../public/images/EventImage.jpg" alt="my pics">
                            <img src="https://picsum.photos/id/15/300/300" alt="my pics">
                            <img src="https://picsum.photos/id/1040/300/300" alt="my pics">
                            <img src="https://picsum.photos/id/106/300/300" alt="my pics">
                            <img src="https://picsum.photos/id/136/300/300" alt="my pics">
                            <img src="https://picsum.photos/id/1039/300/300" alt="my pics">
                            <img src="https://picsum.photos/id/110/300/300" alt="my pics">
                            <img src="https://picsum.photos/id/1047/300/300" alt="my pics">
                            <img src="https://picsum.photos/id/1057/300/300" alt="my pics">
                        </div>
                    </div> 
                </div>

                <!-- Edit Notes -->

                <div class="row pt-5"> 
                    <div class="col-1"></div> 
                    <div class="col-10">
                        <hr>
                    </div> 
                </div>

                <div class="row pt-2"> 
                    <div class="col-1"></div> 
                    <div class="col-10">
                        <h2><b>Update My Notes</b></h2>
                    </div> 
                </div>

                <!-- Form -->

                <div class="row pt-2"> 
                    <div class="col-1"></div> 
                    <div class="col-10">
                        
                        <form id="EditNotes" method="post">
                              <div class="mb-3">                    
                                <label for="notes" class="form-label">Notes</label>
                                <textarea id="Notes" name="notes" class="form-control" rows="4" cols="50"></textarea>
                              </div>
                              <div class="input-group mb-3">
                                <label class="form-label pe-3 mt-3" for="UploadGardenPicture">Add Pictures</label><br>
                                <input type="file" class="form-control d-block mt-3" id="UploadGardenPicture">
                              </div>
                            <button type="submit" name="submit" class="btn text-white mb-5 mt-3">Update Notes</button>
                          </form>

                    </div> 
                </div>


                


             








            </div>






        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      </body>
    </html>