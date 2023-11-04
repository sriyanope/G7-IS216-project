<!doctype html>
    <html lang="en">
        <?php session_start(); ?>
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
            <link rel="stylesheet" href="progressBar.css">
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlsN7cu3WF-W3FGrtJ7l9El4nKPAyN1r8&map_ids=40c99f5bd3e0f892&callback=initMap"></script>
           
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
                    border: 2px solid black;
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
            <title>My Event</title>
            
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
                        
                        <!-- map -->
                        <h2><b>Location</b></h2>
                        <div id="map"></div>

                    </div> 
                </div>
                
            <!-- view your participants -->
            <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-10">

                    <h3 class="pt-4"><b>View Your Participants</b></h3>

                </div>
            </div>

            <!-- progress bar -->
            <div class="row"> 
                <div class="col-1"></div>
                    <div class="col-3">
                        <div class="progress">
                        <div class="progress-bar bg-warning" id="progressBar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                <div class="col-1"></div>
            </div>


            <!-- filled -->
            <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-10">
                    <h6 class="pt-2" style="color: #f3c623;"><span id="slotsLabel"></span></h6>
                </div>
            </div>

            <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-10">
                <h4>Participants</h4>
                <div class="row bg-light mt-2 mb-5 border">
                    <div class="col pt-3">
                    <ul id="participants"></ul>
                    </div>
                </div>
                </div>
            </div>




            <!-- participants -->
            <!-- <div class="row pt-4">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="rectangle shadow-sm" style="max-height: 300px; overflow: auto;">

                    
                        <div class="row pt-4">
                            <div class="col text-center">
                                    <img src="../public/images/defaultProfile.jpg" style="height: 100px;">
                                    <div>John</div>
                            </div>
                            <div class="col text-center">
                                <img src="../public/images/defaultProfile.jpg" style="height: 100px;">
                                <div>John</div>
                            </div>
                            <div class="col text-center">
                                <img src="../public/images/defaultProfile.jpg" style="height: 100px;">
                                <div>John</div>
                            </div>
                            <div class="col text-center">
                                <img src="../public/images/defaultProfile.jpg" style="height: 100px;">
                                <div>John</div>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col text-center">
                                    <img src="../public/images/defaultProfile.jpg" style="height: 100px;">
                                    <div>John</div>
                            </div>
                            <div class="col text-center">
                                <img src="../public/images/defaultProfile.jpg" style="height: 100px;">
                                <div>John</div>
                            </div>
                            <div class="col text-center">
                                <img src="../public/images/defaultProfile.jpg" style="height: 100px;">
                                <div>John</div>
                            </div>
                            <div class="col text-center">
                                <img src="../public/images/defaultProfile.jpg" style="height: 100px;">
                                <div>John</div>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col text-center">
                                    <img src="../public/images/defaultProfile.jpg" style="height: 100px;">
                                    <div>John</div>
                            </div>
                            <div class="col text-center">
                                <img src="../public/images/defaultProfile.jpg" style="height: 100px;">
                                <div>John</div>
                            </div>
                            <div class="col text-center">
                                <img src="../public/images/defaultProfile.jpg" style="height: 100px;">
                                <div>John</div>
                            </div>
                            <div class="col text-center">
                                <img src="../public/images/defaultProfile.jpg" style="height: 100px;">
                                <div>John</div>
                            </div>
                        </div>


                    </div>
                </div>
            </div> -->


            <!-- Edit this event -->
            <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-10">

                    <h3 class="pt-4"><b>Event Details</b></h3>
                </div>
            </div>

            <!-- edit form -->

            <div class="row pt-3"> 
                <div class="col-1"></div> 
                <div class="col-10">

                    <form id="CreateEventDetails" method="post">
                        <div class="mb-3">
                          <label for="EventTitle" class="form-label">Event Title</label>
                          <input type="text" class="form-control" id="eventTitle" aria-describedby="EventTitle" disabled>
                        </div>
                        <div class="mb-3">
                          <label for="category" class="form-label">Category</label>
                          <input type="text" class="form-control" id="category" aria-describedby="category" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="Date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="eventDate" disabled>
                          </div>
                          <div class="mb-3">
                            <label for="Timing" class="form-label">Start Time</label>
                            <input type="time" class="form-control" id="startTime" disabled>
                          </div>
                          <div class="mb-3">
                            <label for="Timing" class="form-label">End Time</label>
                            <input type="time" class="form-control" id="endTime" disabled>
                          </div>
                          <div class="mb-3">
                            <label for="noOfSlots" class="form-label">No. of Slots</label>
                            <input type="number" class="form-control" id="noOfSlots"  min=0 max=50 disabled>
                          </div>
                          <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" disabled>
                          </div>
                          <div class="mb-3">                    
                            <label for="AboutThisEvent" class="form-label">About This Event</label>
                            <textarea id="about" class="form-control" rows="4" cols="50" disabled></textarea>
                          </div>
                        
                        
                          <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            Delete Event
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Event</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                Are you sure that you want to delete?  This action is irreversible.
                                </div>
                                <div class="form-group mx-3">
                                    <label for="exampleInputEmail1">Reason for deleting event</label>
                                    <textarea class="form-control" rows="3" id="deleteReason"></textarea>
                                </div>

                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="deleteEvent()">Proceed</button>
                                </div>
                            </div>
                            </div>
                        </div>
                      </form>
                      </div>
                      </div>
                    
                </div>
            </div>

            <!-- javascript -->
            <script>

                var eventId = <?php echo $_GET['eventId']; ?>;

                // retrieve event details and populate website
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
                    document.getElementById("slotsLabel").innerText = data.event[0].filled + "/" + data.event[0].noOfSlots;
                    
                    let eventId = data.event[0].eventId;
                    document.getElementById("eventTitle").value = data.event[0].eventTitle;
                    document.getElementById("category").value = data.event[0].category;
                    document.getElementById("eventDate").value = data.event[0].eventDate;
                    document.getElementById("startTime").value = data.event[0].startTime;
                    document.getElementById("endTime").value = data.event[0].endTime;
                    document.getElementById("noOfSlots").value = Number(data.event[0].noOfSlots);
                    let filled = Number(data.event[0].filled);
                    let slots = Number(data.event[0].noOfSlots);
                    document.getElementById("about").value = data.event[0].about;
                    let image = data.event[0].image;
                    let review = data.event[0].review;
                    let comment = data.event[0].comment;
                    let username = data.event[0].username;
                    let gardenId = data.event[0].gardenId;
                    document.getElementById("location").value = data.event[0].gardenName;

                    percent = (filled/slots)*100;
                    document.getElementById("progressBar").setAttribute("style", `width: ${percent}%`);

                    // retrieve garden details and show google map
                    url = "MySQL/GardenPageInfo.php?type=getGarden&gardenId=" + gardenId;
                    fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            lat = Number(data.garden[0].latitude);
                            lng = Number(data.garden[0].longitude);
                            initMap(lat, lng);


                            })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                })
                .catch(error => {
                    console.error('Error:', error);
                });

                // retrieve participant and populate website
                url = "MySQL/UserEvent.php?eventId=" + eventId;
                fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    output = "";
                    for(user of data.user){
                        username1 = user.username;
                        fullName = user.fullName;
                        profilePhoto = user.profilePhoto;
                        output += `<li class='my-2'><a href='Profile.php?username1=${username1}' style='text-decoration: none;color:black'><img src='${profilePhoto}' style='margin-right:20px;height: 30px;width:auto'><span>${fullName}</span></a></li>`;
                        document.getElementById("participants").innerHTML = output;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

                // convert to 12 hour format
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

                // convert to dd-mm-yyyy date format
                function convertDateFormat(inputDate) {
                    const parts = inputDate.split("-");
                    if (parts.length === 3) {
                        const [year, month, day] = parts;
                        const outputDate = `${day}-${month}-${year}`;
                        return outputDate;
                    }
                    return "Invalid Date";
                }

                // function to delete event
                function deleteEvent() {
                    deleteReason = document.getElementById("deleteReason").value;
                    url = "MySQL/Event.php?type=deleteEvent&eventId=" + eventId + "&deleteReason=" + deleteReason;
                    fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response;
                    })
                    .then(data => {
                        window.location="myEvents.php";
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }

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

            </script>


            </div>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      </body>
    </html>