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
            <!-- jQuery library -->
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
            <!-- Popper JS -->
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <!-- Latest compiled JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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

                .notification {
                    position: fixed;
                    bottom: 0;
                    right:0;
                    z-index: 100;
                }

            </style>

            <!-- title -->
            <title>My Events</title>
            
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

            <!-- if no events -->
            <div class="container-fluid bggreen d-none" id="noEvent">
                <div class="row noEventCentre">
                    <h2><b>You have not created any events!</b></h2>
                    <h6>Want to host an event?
                    <a href='EventLocation.php' style="text-decoration: underline; color: black">Create your own!</a>
                    </h6>
                </div>
            </div>
            
            <!-- if there are events-->
            <div class="container-fluid bggreen" id="yesEvent">
                <div class="row pt-5 pb-4 mx-auto">
                    <h1><b>My Events</b></h1>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" onchange="loadEvents()">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Saved</label>
                </div>
                <div class="col-3" id="resultCount"></div>
                <div class="row px-3 mx-5">
                    <div class="album ">
                        <div class="container">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3" id="events">

                            <div id="events"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Notification -->
                <div id="notification" class="notification"></div>   

            </div>



            <script>
                var switchState = false;

                function loadEvents() {
                    var switchCheckbox = document.getElementById("flexSwitchCheckDefault");
                    if (switchCheckbox.checked) {
                        url = "MySQL/SavedJoinedEvents.php?type=joined";
                        fetch(url)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                showEventList(data);
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                        switchState = true;
                    } else {
                        url = "MySQL/SavedJoinedEvents.php?type=saved";
                        fetch(url)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                showEventList(data);
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                        switchState = false;
                    }
                }


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

                    // function to convert dd-mm-yyyy date format
                    function convertDateFormat(inputDate) {
                        const parts = inputDate.split("-");
                        if (parts.length === 3) {
                            const [year, month, day] = parts;
                            const outputDate = `${day}-${month}-${year}`;
                            return outputDate;
                        }
                        return "Invalid Date";
                    }

                    // function to show event list
                    function showEventList(obj) {
                        document.getElementById("resultCount").innerText = obj.event.length + " results";
                        url = "MySQL/SavedJoinedEvents.php?type=saved";
                        fetch(url)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                            savedList = [];
                                for(event of data.event){
                                savedList.push(event.eventId);
                                }

                                if(obj.event.length == 0){
                                document.getElementById("events").innerHTML = "<div class='col'><h3 class='d-flex justify-content-center'>No result</h3></div>";
                                }else{
                                var output = "";
                                for(event of obj.event){
                                let eventId = event.eventId;
                                let eventTitle = event.eventTitle;
                                let category = event.category;
                                let eventDate = event.eventDate;
                                let startTime = event.startTime;
                                let endTime = event.endTime;
                                let noOfSlots = Number(event.noOfSlots);
                                let filled = Number(event.filled);
                                let about = event.about;
                                let photo = event.photo;
                                let username = event.username;
                                let gardenId = event.gardenId;
                                let gardenName = event.gardenName;

                                if(filled >= noOfSlots - 3){
                                    slots = "<span style='color:red'>" + filled + "/" + noOfSlots + " slots filled</span>";
                                }else if(filled < (noOfSlots/2)){
                                    slots = "<span style='color:green'>" + filled + "/" + noOfSlots + " slots filled</span>";
                                }else{
                                    slots = "<span style='color:orange'>" + filled + "/" + noOfSlots + " slots filled</span>";
                                }
                                
                                eventDate = convertDateFormat(eventDate);
                                startTime = convertTo12HourFormat(startTime);
                                endTime = convertTo12HourFormat(endTime);

                                let v = eventId + "aaaaa" + eventTitle + "aaaaa" + category + "aaaaa" + eventDate + "aaaaa" + startTime + "aaaaa" + endTime + "aaaaa" + noOfSlots + "aaaaa" + filled + "aaaaa" + about + "aaaaa" + photo + "aaaaa" + username + "aaaaa" + gardenId;

                                if(savedList.indexOf(eventId) == -1){
                                    btn = `<button type="button" class="btn btn-primary" id='saveBtn' value="${v}" onclick='save(this, this.value)'>Save</button>`
                                }else{
                                    btn = `<button type="button" class="btn btn-primary" id='unsaveBtn' value="${v}" onclick='unsave(this, this.value)'>Unsave</button>`
                                }

                                output += `<div class="col">
                                    <div class="card h-100">
                                    <a href="GeneralEventPage.php?eventId=${eventId}"><img class="card-img-top" src="${photo}"></a>
                                    <div class="card-body">
                                        <a href="GeneralEventPage.php?eventId=${eventId}" class="text-decoration-none text-dark">
                                        <h4>${eventTitle}</h4>
                                        <p class="card-text"><img src="../public/images/calendar.svg" class="pe-1">${eventDate}<br>${startTime}-${endTime}</p>
                                        <p><img src="../public/images/location pin.svg" class="pe-1">${gardenName}</p>
                                        </a>
                                        <div class="d-flex justify-content-between align-items-center">
                                        ${slots}
                                        ${btn}
                                        </div>
                                    </div>
                                    </div>
                                </div>`
                                }
                                document.getElementById("events").innerHTML = output;
                                }

                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });





                        }


                    function retrieveEventDetails(event) {
                        if(typeof event === 'string'){
                            event = event.split("aaaaa");
                        }
                            return {
                            eventId: event[0],
                            eventTitle: event[1],
                            category: event[2],
                            eventDate: event[3],
                            startTime: event[4],
                            endTime: event[5],
                            noOfSlots: Number(event[6]),
                            filled: Number(event[7]),
                            about: event[8],
                            photo: event[9],
                            username: event[10],
                            gardenId: event[11],
                            gardenName: event[12]
                            };
                        }

                    function save(this1, event){
                        let eventObj = retrieveEventDetails(event);
                        let eventId = eventObj.eventId;
                        url = "MySQL/SavedJoinedEvents.php?type=add&eventId=" + eventId;
                        fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response;
                        })
                        .then(data => {
                            this1.setAttribute("onclick", "unsave(this, this.value)");
                            this1.innerText = "Unsave";
                            displayAlert("Event added to saved list", "warning");
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    }

                    function unsave(this1, event){
                        let eventObj = retrieveEventDetails(event);
                        let eventId = eventObj.eventId;
                        url = "MySQL/SavedJoinedEvents.php?type=delete&eventId=" + eventId;
                        fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response;
                        })
                        .then(data => {
                            this1.setAttribute("onclick", "save(this, this.value)");
                            this1.innerText = "Save";
                            displayAlert("Event removed from saved list", "warning");
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

                    loadEvents()
                    
            </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      </body>
    </html>