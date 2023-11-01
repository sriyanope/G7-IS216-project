<!doctype html>
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
            <link rel="stylesheet" href="organiserView/progressBar.css">
            <link rel="stylesheet" href="starRating.css">
           
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

                .rectangle {
                    height: 300px; 
                    width: 100%; 
                    border: 1px solid gray;
                    border-radius: 10px;
                }
                
                .percentageBar {
                    background-color: #547D2E;
                    border-radius: 10px;
                    height: 40px;
                    width: 50%;
                }
                #map {
                    height: 60vh;
                }

            </style>

            <!-- title -->
            <title>An Event</title>
            
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
                      <a class="nav-link mx-2" href="JoinAnEvent.html"><i class="events"></i> Events</a>
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

            <!-- content -->
            <div class="container-fluid">
                <div class="row pt-5"> 
                    <div class="col-1"></div> 
                    <div class="col-10">
                        <h2><b id="eventTitleLabel"></b></h2>
                    </div> 
                </div>

                <div class="row"> 
                    <div class="col-1"></div> 
                    <div class="col-10">
                        <p><img src="../public/images/location pin.svg"><span id="locationDateTimeLabel"></span></p>
                        <p>Category: <span id="categoryLabel"></span></p>
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

            <!-- host -->
            <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-4">

                    <!-- host name -->
                    <h3 class="pt-4"><b>Event host:
                        <a href="#" id="profileLabel" style="text-decoration:none;color:black;"><span style="color:#54493B" id="fullNameLabel"></span></a>
                        <!-- progress bar -->
                        <div class="container">
                            <i class="fas fa-3x fa-battery-full icon"></i>
                            
                            <div class="progress2 progress-moved">
                            <div class="progress-bar2"></div>
                            <div class="loader" style="--n: 1; --f: 0;"></div>
                            </div>
                        </div>
                        <!-- filled -->
                        <h6 class="pt-2" style="color: #f3c623;" id="slotsLabel"></h6>

                        <!-- join -->
                        <div style="color:red;" id='fullLabel'></div>
                        <button type="submit" class="btn text-white" id="joinBtn" onclick="joinEvent()">Join</button>
                    </b></h3>

                </div>
                <div class="col-1">
                    <img src="../public/images/defaultProfile.jpg" style="height: 100px; margin-top: 10px;">
                </div>
            </div>

            <!-- hr -->
            <div class="row">
                <div class="col-1"></div>
                <div class="col-5 pt-3">
                    <hr>
                </div>
            </div>

            <!-- about this event -->
            <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-5">

                    <h3 class="pt-4"><b>About This Event</b></h3>

                </div>
            </div>

            <!-- para about -->
            <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-5">

                    <p id="aboutLabel"></p>

                </div>
            </div>

            <!-- hr -->
            <div class="row">
                <div class="col-1"></div>
                <div class="col-5 pt-3">
                    <hr>
                </div>
            </div>

            <!-- Reviews -->
      <!--       <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-5">

                    <h3 class="pt-4"><b>Read through what others have said</b></h3>

                </div>
            </div>


            <div class="row pt-4">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="rectangle shadow-sm" style="max-height: 300px; overflow: auto;">


                        <div class="row pt-5">
                            <div class="col-1"></div>
                            <div class="col-6">
                                <h4>Lily</h4>
                            </div>
                            <div class="col-4 justify-content-end">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <span style="color:gray; font-size: 70%;">
                                    27/07/2022
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <p>This was an amazing event that I really enjoyed! Looking forward to the next one already!</p>
                            </div>
                        </div>


                        <div class="row pt-5">
                            <div class="col-1"></div>
                            <div class="col-6">
                                <h4>Lily</h4>
                            </div>
                            <div class="col-4 justify-content-end">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <span style="color:gray; font-size: 70%;">
                                    27/07/2022
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <p>This was an amazing event that I really enjoyed! Looking forward to the next one already!</p>
                            </div>
                        </div>


                        <div class="row pt-5">
                            <div class="col-1"></div>
                            <div class="col-6">
                                <h4>Lily</h4>
                            </div>
                            <div class="col-4 justify-content-end">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <img src="../public/images/filledStar.png" style="height: 50%;">
                                <span style="color:gray; font-size: 70%;">
                                    27/07/2022
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <p>This was an amazing event that I really enjoyed! Looking forward to the next one already!</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


             <div class="row">
                <div class="col-1"></div>
                <div class="col-5 pt-3">
                    <hr>
                </div>
            </div>-->

            <!-- Comments -->
            <!-- <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-10">

                    <h3 class="pt-4"><b>Add Your Comments</b></h3>
                </div>
            </div> -->

            <!-- edit form -->

            <div class="row pt-3"> 
                <div class="col-1"></div> 
                <div class="col-10">

                    <!-- <form id="addComments" method="post">
                        <div class="mb-3">
                          <label for="Name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="Name" aria-describedby="Name">
                        </div>
                        <div class="mb-3">
                          <label for="Rating" class="form-label">Rating</label>
                          
                          <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                          </div>

                        </div>
                        <div class="mb-3">                    
                            <label for="Comments" class="form-label">Comments</label>
                            <textarea id="Comments" class="form-control" rows="4" cols="50"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <label class="form-label pe-3" for="UploadEventPicture">Add Pictures</label><br>
                            <input type="file" class="form-control d-block" id="UploadEventPicture">
                        </div>
                        <button type="submit" class="btn text-white" id="submit">Submit</button>
                      </form> -->

                      <!-- google map -->
                      <h2><b>Location</b></h2>
                      <div id="map"></div>
                      </div>

                    </div>
                </div>
            </div>

            <!-- javascript -->
            <script>

                // get event details and populate page
                eventId = <?php echo $_GET['eventId']; ?>;
                url = "MySQL/Event.php?type=getEventByEventId&eventId=" + eventId;
                fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById("eventTitleLabel").innerText = data.event[0].eventTitle;
                    document.getElementById("locationDateTimeLabel").innerHTML = data.event[0].gardenName + "<br>" + convertDateFormat(data.event[0].eventDate) + " • " + convertTo12HourFormat(data.event[0].startTime) + " - " + convertTo12HourFormat(data.event[0].endTime);
                    document.getElementById("fullNameLabel").innerText = data.event[0].fullName;
                    document.getElementById("categoryLabel").innerText = data.event[0].category;
                    document.getElementById("slotsLabel").innerText = data.event[0].filled + "/" + data.event[0].noOfSlots;
                    checkFullSlots(data.event[0].filled, data.event[0].noOfSlots);
                    document.getElementById("aboutLabel").innerText = data.event[0].about;
                    profileLink = "Profile.php?username=" + data.event[0].username;
                    document.getElementById("profileLabel").setAttribute("href", profileLink);
                    
                    
                    lat = Number(data.event[0].latitude);
                    lng = Number(data.event[0].longitude);
                    initMap(lat, lng);
                    
                })
                .catch(error => {
                    console.error('Error:', error);
                });


                // show join button if the user has not joined the event
                url = "MySQL/Event.php?type=checkJoinedEvent&eventId=" + eventId;
                fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if(data.event.length > 0){
                        document.getElementById("joinBtn").setAttribute("onclick", "leaveEvent()");
                        document.getElementById("joinBtn").innerText = "Leave";
                    }

                })
                .catch(error => {
                    console.error('Error:', error);
                });

                // function to convert to 12 hour format
                function convertTo12HourFormat(time24) {
                    const [hours, minutes] = time24.split(':');
                    let period = 'AM';
                    let hours12 = parseInt(hours);

                    if (hours12 >= 12) {
                        period = 'PM';
                        if (hours12 > 12) {
                            hours12 -= 12;
                        }
                    }

                    return `${hours12}:${minutes} ${period}`;
                }

                // function to convert to dd-mm-yyyy date format
                function convertDateFormat(inputDate) {
                    const parts = inputDate.split("-");
                    if (parts.length === 3) {
                        const [year, month, day] = parts;
                        const outputDate = `${day}-${month}-${year}`;
                        return outputDate;
                    }
                    return "Invalid Date"; // Handle invalid input
                }

                // function to initialise google map
                function initMap(lat, lng) {
                    lat = Number(lat);
                    lng = Number(lng);
                    map = new google.maps.Map(document.getElementById("map"), {
                        center: { lat: lat, lng: lng },
                        zoom: 17,
                        mapId: "40c99f5bd3e0f892"
                    });
                    
                    var marker = new google.maps.Marker({
                        position: { lat: lat, lng: lng },
                        map
                    });
                    }
                
                // function to update MySQL on joining event
                function joinEvent() {
                    url = "MySQL/Event.php?type=joinEvent&eventId=" + eventId;
                    fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response;
                    })
                    .then(data => {
                        document.getElementById("joinBtn").setAttribute("onclick", "leaveEvent()");
                        document.getElementById("joinBtn").innerText = "Leave";
                        updateFilled();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }

                // function to update MySQL on leaving event
                function leaveEvent() {
                    url = "MySQL/Event.php?type=leaveEvent&eventId=" + eventId;
                    fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response;
                    })
                    .then(data => {
                        document.getElementById("joinBtn").setAttribute("onclick", "joinEvent()");
                        document.getElementById("joinBtn").innerText = "Join";
                        updateFilled();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }

                // function to retrieve updated filled event
                function updateFilled(){
                    url = "MySQL/Event.php?type=getFilled&eventId=" + eventId;
                    fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        document.getElementById("slotsLabel").innerText = data.event[0].filled + "/" + data.event[0].noOfSlots
                        checkFullSlots(data.event[0].filled, data.event[0].noOfSlots);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }

                function checkFullSlots($filled, $totalSlots){
                    if($filled == $totalSlots && document.getElementById("joinBtn").getAttribute("onclick") == "joinEvent()"){
                        document.getElementById("joinBtn").setAttribute("class", "btn text-white d-none");
                        document.getElementById("fullLabel").innerText = "Slots are full!";
                    }
                }

            </script>
            
        </div>

            <script>

                // progress bar
                CSS.registerProperty({
                    name: "--p",
                    syntax: "<integer>",
                    initialValue: 0,
                    inherits: true,
                });

            </script>



        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlsN7cu3WF-W3FGrtJ7l9El4nKPAyN1r8&map_ids=40c99f5bd3e0f892&callback=initMap"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      </body>
    </html>