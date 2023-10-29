<!doctype html>
    <?php session_start(); ?>
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

                 #map {
                    height: 60vh;
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
                        <h2><b><span id="gardenName"></span></b></h2>
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
                        <h2><b>My Notes</b></h2>
                    </div> 
                </div>

                <!-- Form -->

                <div class="row pt-2"> 
                    <div class="col-1"></div> 
                    <div class="col-10">
                        
                        <form id="EditNotes" method="post">
                              <div class="mb-3">                    
                                <label for="notes" class="form-label">Notes</label>
                                <textarea name="notes" class="form-control" rows="4" cols="50" id="note"></textarea>
                              </div>
                              <div class="input-group mb-3">
                                <label class="form-label pe-3 mt-3" for="UploadGardenPicture">Add Pictures</label><br>
                                <input type="file" class="form-control d-block mt-3" id="UploadGardenPicture">
                              </div>
                            <button type="button" name="submit" class="btn text-white mb-5 mt-3" onclick="updateNote()">Update Notes</button>
                          </form>
                          <h2><b>Location</b></h2>
                          <div id="map"></div>
                    </div> 

                </div>
            </div>


            <?php $gardenId = $_GET['garden']; ?>;
            
            <script>
                function initMap(lat, lng) {
                    lat = Number(lat);
                    lng = Number(lng);
                    map = new google.maps.Map(document.getElementById("map"), {
                        center: { lat: lat, lng: lng },
                        zoom: 17,
                        mapId: "40c99f5bd3e0f892"
                    });
                    
                    var marker = new google.maps.Marker({
                        position: { lat: Number(lat), lng: Number(lng) },
                        map
                    });
                    }

                var username = <?php echo $_SESSION['username']; ?>;
                var gardenId = <?php echo $gardenId; ?>;
                url = "MySQL/GardenPageInfo.php?type=getGarden&gardenId=" + gardenId;
                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        document.getElementById("gardenName").innerText = data.garden[0].gardenName;
                        lat = Number(data.garden[0].latitude);
                        lng = Number(data.garden[0].longitude);
                        initMap(lat, lng);


                        })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                

                function getNote() {
                url = "MySQL/GardenPageInfo.php?type=getNote&gardenId=" + gardenId + "&username=" + username;
                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if(data.gardenNote.length > 0){
                            document.getElementById("note").innerText = data.gardenNote[0].note;
                        }
                        })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }

                function updateNote() {
                    note = document.getElementById("note").value;
                    url = "MySQL/GardenPageInfo.php?type=updateNote&gardenId=" + gardenId + "&username=" + username + "&note=" + note;

                    fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response;
                        })
                        .then(data => {
                            getNote();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }

                getNote();

            </script>


        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlsN7cu3WF-W3FGrtJ7l9El4nKPAyN1r8&map_ids=40c99f5bd3e0f892&callback=initMap"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      </body>
    </html>