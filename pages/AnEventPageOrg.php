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
            <!-- <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet"> -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Outfit:wght@700&display=swap" rel="stylesheet">
            <!-- CSS stylesheet -->
            <link rel="stylesheet" href="../style.css">
            <link rel="stylesheet" href="progressBar.css">
           
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

            </style>

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
                <div class="col-10">

                    <div class="container">
                        <i class="fas fa-3x fa-battery-full icon"></i>
                  
                        <div class="progress2 progress-moved">
                          <div class="progress-bar2"></div>
                          <div class="loader" style="--n: 1; --f: 0;"></div>
                        </div>
                      </div>

                </div>
            </div>

            <!-- filled -->
            <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-10">

                    <h6 class="pt-2" style="color: #f3c623;"><span id="slotsLabel"></span></h6>

                </div>
            </div>

            <!-- participants -->
            <div class="row pt-4">
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
            </div>

            <!-- about the group -->

            <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-10">

                    <h3 class="pt-4"><b>About The Group</b></h3>

                </div>
            </div>

            <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-5">

                    <h5 class="pt-2">Gender Ratio</h5>

                </div>
                <div class="col-5">

                    <h5 class="pt-2">Age</h5>

                </div>
            </div>

            <div class="row pt-3"> 
                <div class="col-1"></div> 
                <div class="col-1" style="display: flex; align-items: center;">
                    <div style="display: inline-block;">Female</div>
                </div>
                <div class="col-3" style="display: flex; align-items: center;">
                    <span class="percentageBar" style="display: inline-block; width: 74%;"></span>
                </div>
                <div class="col-1" style="display: flex; align-items: center;">
                    <span style="display: inline-block; align-items: left;">54%</span>
                </div>

                <div class="col-1" style="display: flex; align-items: center;">
                    <div style="display: inline-block;">18 - 35 y/o</div>
                </div>
                <div class="col-3" style="display: flex; align-items: center;">
                    <span class="percentageBar" style="display: inline-block; width: 23%;"></span>
                </div>
                <div class="col-1" style="display: flex; align-items: center;">
                    <span style="display: inline-block; align-items: left;">23%</span>
                </div>

            </div>

            <div class="row pt-3"> 
                <div class="col-1"></div> 
                <div class="col-1" style="display: flex; align-items: center;">
                    <div style="display: inline-block;">Male</div>
                </div>
                <div class="col-3" style="display: flex; align-items: center;">
                    <span class="percentageBar" style="display: inline-block; width: 54%;"></span>
                </div>
                <div class="col-1" style="display: flex; align-items: center;">
                    <span style="display: inline-block; align-items: left;">46%</span>
                </div>

                <div class="col-1" style="display: flex; align-items: center;">
                    <div style="display: inline-block;">36 - 44 y/o</div>
                </div>
                <div class="col-3" style="display: flex; align-items: center;">
                    <span class="percentageBar" style="display: inline-block; width: 15%;"></span>
                </div>
                <div class="col-1" style="display: flex; align-items: center;">
                    <span style="display: inline-block; align-items: left;">15%</span>
                </div>
            </div>

            <div class="row pt-3"> 
                <div class="col-5"></div>

                <div class="col-1"></div> 
                <div class="col-1" style="display: flex; align-items: center;">
                    <div style="display: inline-block;">45 - 65 y/o</div>
                </div>
                <div class="col-3" style="display: flex; align-items: center;">
                    <span class="percentageBar" style="display: inline-block; width: 46%;"></span>
                </div>
                <div class="col-1" style="display: flex; align-items: center;">
                    <span style="display: inline-block; align-items: left;">46%</span>
                </div>
            </div>

            <div class="row pt-3"> 
                <div class="col-5"></div>

                <div class="col-1"></div> 
                <div class="col-1" style="display: flex; align-items: center;">
                    <div style="display: inline-block;">above 65y/o</div>
                </div>
                <div class="col-3" style="display: flex; align-items: center;">
                    <span class="percentageBar" style="display: inline-block; width: 15%;"></span>
                </div>
                <div class="col-1" style="display: flex; align-items: center;">
                    <span style="display: inline-block; align-items: left;">15%</span>
                </div>
            </div>

            <!-- Edit This Event -->
            <div class="row"> 
                <div class="col-1"></div> 
                <div class="col-10">

                    <h3 class="pt-4"><b>Edit This Event</b></h3>
                    <button type="button" class="btn text-white" onclick="enableInput()">Edit</button>
                </div>
            </div>

            <!-- Edit Form -->

            <div class="row pt-3"> 
                <div class="col-1"></div> 
                <div class="col-10">

                    <form id="CreateEventDetails" method="post">
                        <div class="mb-3">
                          <label for="EventTitle" class="form-label">Event Title</label>
                          <input type="text" class="form-control" id="eventTitle" aria-describedby="EventTitle" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Event Category</label>
                            <select class="form-control inputstl" name="category" id="category" disabled>
                                <option>Garden Workshops</option>
                                <option>Harvest</option>
                                <option>Food Donation Drives</option>
                                <option>Leisure</option>
                                <option>Others</option>
                            </select>
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
                          <div class="input-group mb-3">
                            <label class="form-label pe-3" for="UploadEventPicture">Add Pictures</label><br>
                            <input type="file" class="form-control d-block" id="UploadEventPicture" disabled>
                          </div>
                        <button type="button" class="btn text-white d-none" id="updateBtn" onclick="updateInput()">Update Edit</button>
                      </form>
                      </div>
                      </div>
                    
                </div>
            </div>

            <script>

                var eventId = <?php echo $_GET['eventId']; ?>;
                
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
                    document.getElementById("about").value = data.event[0].about;
                    let image = data.event[0].image;
                    let review = data.event[0].review;
                    let comment = data.event[0].comment;
                    let username = data.event[0].username;
                    let gardenId = data.event[0].gardenId;
                    document.getElementById("location").value = data.event[0].gardenName;
                })
                .catch(error => {
                    console.error('Error:', error);
                });

                function enableInput() {
                    document.getElementById("eventTitle").removeAttribute("disabled");
                    document.getElementById("category").removeAttribute("disabled");
                    document.getElementById("eventDate").removeAttribute("disabled");
                    document.getElementById("startTime").removeAttribute("disabled");
                    document.getElementById("endTime").removeAttribute("disabled");
                    document.getElementById("noOfSlots").removeAttribute("disabled");
                    document.getElementById("location").removeAttribute("disabled");
                    document.getElementById("about").removeAttribute("disabled");
                    document.getElementById("updateBtn").setAttribute("class", "btn text-white");
                }

                function updateInput() {
                    document.getElementById("eventTitle").setAttribute("disabled", "");
                    document.getElementById("category").setAttribute("disabled", "");
                    document.getElementById("eventDate").setAttribute("disabled", "");
                    document.getElementById("startTime").setAttribute("disabled", "");
                    document.getElementById("endTime").setAttribute("disabled", "");
                    document.getElementById("noOfSlots").setAttribute("disabled", "");
                    document.getElementById("location").setAttribute("disabled", "");
                    document.getElementById("about").setAttribute("disabled", "");
                    document.getElementById("updateBtn").setAttribute("class", "btn text-white d-none");
                    
                    // eventTitle = document.getElementById("eventTitle");
                    // category = document.getElementById("category");
                    // eventDate = document.getElementById("eventDate");
                    // startTime = document.getElementById("startTime");
                    // endTime = document.getElementById("endTime");
                    // noOfSlots = document.getElementById("noOfSlots");
                    // location = document.getElementById("location");
                    // about = document.getElementById("about");
                    // url = "MySQL/Event.php?type=updateEvent&eventTitle="+eventTitle+"&category="+category+"&eventDate="+eventDate+"&startTime="+startTime+"&endTime="+endTime+"&noOfSlots="+noOfSlots+"&location="+location+"&about="+about;
                    // console.log(url);
                    // fetch(url)
                    // .then(response => {
                    //     if (!response.ok) {
                    //         throw new Error('Network response was not ok');
                    //     }
                    //     return response;
                    // })
                    // .then(data => {

                    // })
                    // .catch(error => {
                    //     console.error('Error:', error);
                    // });
                }

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

                function convertDateFormat(inputDate) {
                    const parts = inputDate.split("-");
                    if (parts.length === 3) {
                        const [year, month, day] = parts;
                        const outputDate = `${day}-${month}-${year}`;
                        return outputDate;
                    }
                    return "Invalid Date"; // Handle invalid input
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




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      </body>
    </html>