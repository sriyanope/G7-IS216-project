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
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Outfit:wght@700&display=swap" rel="stylesheet">
            <!-- CSS stylesheet -->
            <link rel="stylesheet" href="../style.css">
            <link rel="stylesheet" href="myPictures.css">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

            <!-- styling -->
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
                     background-color: rgba(0, 0, 0, 0.5);
                     width: 3rem;
                     height: 3rem;
                     border-radius: 50%;
                     opacity: 1;
                     top: 50%;
                     transform: translateY(-50%);
                 }
 
                 .carousel-control-prev-icon, .carousel-control-next-icon {
                     color: white;
                     font-size: 1.5rem;
                 }

                 #map {
                    height: 60vh;
                }

                .notification {
                    position: fixed;
                    bottom: 0;
                    right:0;
                    z-index: 100;
                }

            </style>

            <!-- title -->
            <title>Garden</title>
            
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
                      <a class="nav-link mx-2 disabled" href="LandingPage.html"><i class="about"></i> About</a>
                    </li>
                    <li class="nav-item ms-auto mt-1">
                      <a class="nav-link mx-2" href="JoinAnEvent.php"><i class="events"></i> Events</a>
                    </li>
                    <li class="nav-item ms-auto mt-1">
                      <a class="nav-link mx-2" href="FindAGarden.php"><i class="findAGarden"></i> Find A Garden</a>
                    </li>
                    <li class="nav-item ms-auto mt-1">
                      <a href="Profile.php"><button class="btn btn-success text-white" href="#">
                          <img src="../icons.png" width="30">
                          My Profile</button></a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>

            <!-- content -->
            <div class="container px-5">
                <div class="row pt-5"> 
                    <!-- <div class="col-1"></div>  -->
                    <div class="col">
                        <h2><b><span id="gardenName"></span></b></h2>
                    </div> 
                    <p><img src="../public/images/location pin.svg"><span id="address"></span>
                        </p>
                </div>

                <div class="row"> 
                    <!-- <div class="col-1"></div>  -->
                    <div class="col-md-6">
                        <h3><b>Location</b></h3>
                        <div id="map"></div>
                    </div> 
                    <div class="col-md-6 mt-6">
                        <h3><b>My Notes</b></h3>
                        <form id="EditNotes" method="post">
                              <div class="mb-3">                    
                                <textarea name="notes" class="form-control" rows="14" cols="50" id="note"></textarea>
                              </div>
                            <button type="button" name="submit" class="btn btn-success text-white mb-5 mt-3" onclick="updateNote()">Update Note</button>
                        </form>
                    </div> 
                </div>


                
            </div>


            <!-- Notification -->
            <div id="notification" class="notification"></div>

            <!-- get garden id -->
            <?php $gardenId = $_GET['gardenId']; ?>;

            <script>

                // function to initialise map
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

                // retrieve garden details and show google map
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
                        document.getElementById("gardenName").innerText = data.garden[0].gardenName + ` (${data.garden[0].region})`;
                        document.getElementById("address").innerText = data.garden[0].address;
                        lat = Number(data.garden[0].latitude);
                        lng = Number(data.garden[0].longitude);
                        initMap(lat, lng);


                        })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                
                // function to retrieve note and update in page
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

                // function to save note
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
                            displayAlert("Notes updated successfully", "warning");
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }

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

                getNote();

            </script>


        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlsN7cu3WF-W3FGrtJ7l9El4nKPAyN1r8&map_ids=40c99f5bd3e0f892&callback=initMap"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      </body>
    </html>