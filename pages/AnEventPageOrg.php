<!doctype html>
    <html lang="en">

        <?php
            require_once "MySQL/Protect.php";
        ?>

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
            <link rel="stylesheet" href="CSS/style.css">
            <link rel="stylesheet" href="CSS/progressBar.css">
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlsN7cu3WF-W3FGrtJ7l9El4nKPAyN1r8&map_ids=40c99f5bd3e0f892&callback=initMap"></script>
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
            <!-- jQuery library -->
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
            <!-- Popper JS -->
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <!-- Latest compiled JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Axios -->
            <script src="https://unpkg.com/axios/dist/axios.js"></script>

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

                .table-wrap {
                    min-height: 300px;
                    max-height: 300px;
                    overflow-y: scroll;
                }
                .nav-link {
                    transition: all o.2s;
                }
                .nav-link:hover {
                    border-bottom: 2px solid #547D2E;
                }

            </style>

            <!-- title -->
            <title>My Event</title>
            
        </head>

        <body>

            <!-- loading screen -->
            <div id="preloader">
                <p>Loading..</p>
            </div>

            <!-- nav bar -->
            <nav class="navbg navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm">
                <div class="container-fluid m-0 p-0" style="flex-wrap: wrap; margin: 0;">
                <img src="../public/images/logo.png" alt="Logo" style="width: 88px; height: 50px;" class="me-0 logo">
                <a class="navbar-brand me-auto" href="index.html"> <strong>ECOmmunity</strong></a>
                <button class="navbar-toggler align-content-center ms-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-family: 'Outfit', serif;">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item ms-auto mt-1">
                        <a class="nav-link mx-2" href="index.html"><i class="about"></i> About</a>
                        </li>
                        <li class="nav-item ms-auto mt-1">
                        <a class="nav-link mx-2" href="JoinAnEvent.php"><i class="events"></i> Events</a>
                        </li>
                        <li class="nav-item ms-auto mt-1">
                        <a class="nav-link mx-2" href="FindAGarden.php"><i class="findAGarden"></i> Find A Garden</a>
                        </li>
                        <li class="nav-item ms-auto mt-1">
                        <a href="Profile.php"><button class="btn btn-success text-white" href="#">
                            <img src="../public/images/icons.png" width="30">
                            My Profile</button></a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>

            <!-- content -->
            <div class="container">
                <div class="row pt-5"> 
                    <div class="col">
                        <h2><b id="eventTitleLabel"></b></h2>
                    </div> 
                </div>

                <div class="row"> 
                    <div class="col">
                        <p><img src="../public/images/location pin.svg"><span id="locationDateTimeLabel"></span></p>
                        
                        <!-- map -->
                        <h3><b>Location</b></h3>
                        <div id="map"></div>
                    </div> 
                </div>
                
                <!-- view your participants -->
                <div class="row"> 
                    <div class="col">
                        <h3 class="pt-4"><b>View Your Participants</b></h3>
                    </div>
                </div>

                <!-- progress bar -->
                <div class="row"> 
                        <div class="col-5">
                            <div class="progress">
                            <div class="progress-bar bg-warning" id="progressBar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    <div class="col-1"></div>
                </div>

                <!-- filled -->
                <div class="row"> 
                    <div class="col">
                        <h6 class="pt-2"><span id="slotsLabel"></span></h6>
                    </div>
                </div>

                <!-- participants -->
                <div class="row"> 
                    <div class="col">
                    <h4>Participants</h4>
                    <div class="row bg-light mt-2 mb-5 border">
                        <div class="col">
                        <ul id="participants"></ul>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- about this event -->
                <div class="row"> 
                    <div class="col">
                        <h3 class="pt-4"><b>About this Event</b></h3>
                        <textarea id="about" class="form-control" rows="4" cols="50" disabled></textarea>
                    </div>
                </div>

            <!-- comment -->
            <div class="row pt-3">
                <div class="col">
                    <h3 class="mt-2"><b>Comment Section</b></h3>
                    <div class="comment-container">
                        <div class="comment-table table-wrap">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-3" style="background-color: #e6eedd">Name</th>
                                        <th scope="col" class="col-2" style="background-color: #e6eedd">Timestamp</th>
                                        <th scope="col" class="col-7" style="background-color: #e6eedd">Comment</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"></tbody>
                            </table>
                        </div>

                        <div class="comment-form">
                            <div class="form-group d-flex">
                                <input id="text" class="form-control flex-grow-1" type="text" placeholder="Add a Comment">
                                <button id="btnSend" class="btn btn-success ml-3">Post</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="row pt-3"> 
                    <div class="col">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#exampleModalLong">
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
                    document.getElementById("eventTitleLabel").innerText = `${data.event[0].eventTitle} (${data.event[0].category})`;
                    document.getElementById("locationDateTimeLabel").innerHTML = data.event[0].gardenName + "<br><p style='margin:3px;'><img src='../public/images/calendar.png' width='20px' height='20px'><span> " + convertDateFormat(data.event[0].eventDate) + "</span></p>" + "<p><img src='../public/images/clock.png' width='20px' height='20px'><span> " + convertTo12HourFormat(data.event[0].startTime) + " - " + convertTo12HourFormat(data.event[0].endTime) + "</span></p>";
                    document.getElementById("slotsLabel").innerText = data.event[0].filled + "/" + data.event[0].noOfSlots;
                    
                    let eventId = data.event[0].eventId;
                    let filled = Number(data.event[0].filled);
                    let slots = Number(data.event[0].noOfSlots);
                    document.getElementById("about").value = data.event[0].about;
                    let image = data.event[0].image;
                    let review = data.event[0].review;
                    let comment = data.event[0].comment;
                    let username = data.event[0].username;
                    let gardenId = data.event[0].gardenId;

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
                        window.location="MyEvents.php";
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

                // handling comments
                var username = <?php echo $_SESSION['username']; ?>;

                var textInput = document.getElementById('text');
                textInput.addEventListener('keyup', doText);

                var btnSend = document.getElementById('btnSend');
                btnSend.addEventListener('click', doSend);

                function htmlEntities(str) {
                    return String(str)
                        .replace(/&/g, '&amp;')
                        .replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;')
                        .replace(/"/g, '&quot;');
                }

                function process(username, text) {
                    eventId = <?php echo $_GET['eventId']; ?>;
                    let gotoURL = "MySQL/chat.php?eventId=" + eventId;
                    let getParameters = {};
                    if (typeof text !== "undefined") {
                        getParameters.username = username;
                        getParameters.text = text;
                    }

                    axios.get(gotoURL, {
                        params: getParameters,
                    })
                    .then (response => {
                        let rows = '';
                        let obj = response.data.comment
                        for (msg of obj) {
                            rows = '<tr>'
                                + '<th scope="row" class="col-2">' + msg.username + '</th>'
                                + '<td class="col-2">' + msg.timestamp + '</td>'
                                + '<td class="col-8">' + htmlEntities(msg.text) + '</td>'
                                + '</tr>' + rows;
                        }
                        document.getElementById('tbody').innerHTML = rows;
                        
                    })
                    .catch(error => {
                    });
                }

                function doText(event) {
                    if (event.code === 'Enter') {
                        doSend();
                    }
                }

                function doSend() {
                    let username = <?php echo $_SESSION['username']; ?>;
                    process(username, textInput.value);
                    textInput.value = '';
                }

                process();

                // pull messages every 1 second
                window.setInterval(process, 1000);

            </script>

            <script>

                var loader = document.getElementById("preloader");
                window.addEventListener("load", function(){
                    setTimeout(() => {
                    loader.style.display = "none";
                    }, 800);
                });

            </script>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 

        </body>
    </html>