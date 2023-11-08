<!doctype html>
    <html lang="en">
        <head>
            <?php session_start(); ?>
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
            <!-- Axios -->
            <script src="https://unpkg.com/axios/dist/axios.js"></script>
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
            <!-- jQuery library -->
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
            <!-- Popper JS -->
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <!-- Latest compiled JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
           
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

                .notification {
                    position: fixed;
                    bottom: 0;
                    right:0;
                    z-index: 100;
                }

            </style>

            <!-- title -->
            <title>Event</title>
            
        </head>
        <body>
                  <div id="preloader">
        <p>Loading...</p>
      </div>
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
            <div class="container">
                <div class="row pt-5"> 
                    <div class="col">
                        <h2><b id="eventTitleLabel"></b></h2>
                    </div> 
                </div>

                <div class="row"> 
                    <div class="col">
                        <p><img src="../public/images/location pin.svg"><span id="locationDateTimeLabel"></span></p>
                    
                        <!-- google map -->                      
                        <h3><b>Location</b></h3>
                        <div id="map"></div>
                    </div> 
                </div>

                <!-- host -->
                <div class="row"> 
                    <div class="col">

                        <!-- host name -->
                        <h3 class="pt-4">Event host:
                            <a href="#" id="profileLabel" style="text-decoration: none; color: black; font-size: 1.5rem; font-weight: bold;"><span id="fullNameLabel"></span></a>
                        </h3>

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
                        <button type="submit" class="btn text-white" id="joinBtn" onclick="joinEvent()" style="width:100px;">Join</button>
                    
                    </div>
                </div>

            <!-- hr -->
            <div class="row">
                <div class="col pt-3">
                    <hr>
                </div>
            </div>

            <!-- about this event -->
            <div class="row">
                <div class="col">

                    <h3 class="pt-4"><b>About This Event</b></h3>

                </div>
            </div>

            <!-- para about -->
            <div class="row">
                <div class="col">

                    <textarea id="aboutLabel" class="form-control" rows="4" cols="50" disabled></textarea>

                </div>
            </div>

            <!-- hr -->
            <div class="row">
                <div class="col-5 pt-3">
                    <hr>
                </div>
            </div>

            <!-- comment -->
            <div class="row pt-3">
                <div class="col">
                    <h3 class='mt-2'><b>Comment Section</b></h3>
                    <table class='table mt-3' style="border: 1px solid #e0e0e0; border-radius: 5px; background-color: #f9f9f9;">
                        <tbody id='tbody'></tbody>
                    </table>

                    <div class="comment-form">
                        <table class='table' style="border: 1px solid #e0e0e0; border-radius: 5px; background-color: #ffffff;">
                            <tbody>
                                <tr>
                                    <td class='font-italic'>
                                        <div class="form-group d-flex">
                                            <input id='text' class="w-80 form-control" type="text" style="border: 1px solid #e0e0e0;" placeholder="Input Comment">
                                            <button id='btnSend' class='btn btn-success ml-3'>POST!</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                     
                </div>
            </div>

            <!-- Notification -->
            <div id="notification" class="notification"></div>




            <!-- javascript -->
            <script>

                // get event details and populate page

                eventId = <?php echo $_GET['eventId']; ?>;
                orgUsername = <?php echo $_SESSION['username']; ?>;
                pastEvents = <?php echo $_GET['pastEvents']; ?>;

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
                    document.getElementById("fullNameLabel").innerText = data.event[0].fullName;
                    document.getElementById("slotsLabel").innerText = data.event[0].filled + "/" + data.event[0].noOfSlots;
                    checkFullSlots(data.event[0].filled, data.event[0].noOfSlots);
                    document.getElementById("aboutLabel").innerText = data.event[0].about;
                    profileLink = "Profile.php?username1=" + data.event[0].username;
                    document.getElementById("profileLabel").setAttribute("href", profileLink);

                    if(orgUsername == data.event[0].username || pastEvents == "1"){
                        document.getElementById("joinBtn").setAttribute("class", "btn btn-success text-white d-none");
                    }
                    
                    
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
                        document.getElementById("joinBtn").innerText = "Joined";
                        updateFilled();
                        displayAlert("Event joined successfully", "warning");
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
                        displayAlert("Removed from event", "warning");
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


<script>

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
            let gotoURL = "server/chat.php?eventId=eventId";
            // this function process can be invoked with and without arguments.
            // When there is no argument passed in, we have no parameters to send to the API.
            let getParameters = {};
            // If there are arguments passed in (i.e. parameter text has value), prepare the GET parameters to be sent to the API.
            if (typeof text !== "undefined") {
                getParameters.username = username;
                getParameters.text = text;
            }
            

            axios.get(gotoURL, {
                params: getParameters,
            })
            .then (response => {
                let rows = '';
                let obj = response.data.eventId
                for (msg of obj) {
                    rows = rows + '<tr>'
                        + '<th scope="row" class="col-3">' + msg.who + '</th>'
                        + '<td class="col-7">' + htmlEntities(msg.text) + '</td>'
                        + '</tr>';
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
            loader.style.display = "none";
          })
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlsN7cu3WF-W3FGrtJ7l9El4nKPAyN1r8&map_ids=40c99f5bd3e0f892&callback=initMap"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      </body>
    </html>
