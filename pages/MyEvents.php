<!doctype html>
    <html lang="en">
        <head>
            <?php
                require_once "MySQL/Protect.php";
            ?>
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
           
            <!-- styling -->
            <style>
               a {
                    font-size:14px;
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
                    display: flex;
                    flex-direction: column;
                    min-height: 100vh;
                }

                .noEventCentre {
                    padding-top: 22%;
                    padding-bottom: 22%;
                    text-align: center;
                }
                .custom-checkbox {
                    display: flex;
                    align-items: center;
                }

                .custom-checkbox input[type="checkbox"] {
                    outline: 2px solid black;
                    background-color: white; 
                }

                .custom-checkbox input[type="checkbox"]:focus {
                    outline: none;
                }

                .custom-checkbox input[type="checkbox"]:checked {
                    outline: 2px solid #B7CF9B;
                    background-color: #B7CF9B; 
                }

                .custom-checkbox-label {
                    font-weight: bold;
                    font-size: 20px;
                    margin-left: 10px; 
                }
                .nav-link {
                  transition: all o.2s;
                }
                .nav-link:hover {
                border-bottom: 2px solid #547D2E;
                }
                .title-style{
                    text-overflow: ellipsis;
                    overflow:hidden;
                    white-space:nowrap;
                    display: -webkit-box;
                    -webkit-line-clamp: 3;
                    -webkit-box-orient: vertical;
                }

                .scroll-to-top-button {
                    display: none;
                    position: fixed;
                    bottom: 20px;
                    right: 20px;
                    z-index: 99;
                    background-color: #547D2E;
                    border: none;
                    border-radius: 50%;
                    width: 60px;
                    height: 60px;
                    cursor: pointer;
                    padding: 0;
                }

                .scroll-to-top-button img {
                    display: block;
                    margin: 0 auto;
                }
                
            </style>

            <!-- title -->
            <title>My Events</title>
            
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
                      <a class="nav-link mx-2" href="LandingPage.html"><i class="about"></i> About</a>
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
            
            <!-- if there are events-->
            <div class="container bggreen" id="yesEvent">
                <div class="row pt-5 pb-4 mx-auto">
                    <h1><b>My Created Events</b></h1>
                </div>
            
                <!-- past events -->
                <div class="row pb-4">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <div class="custom-checkbox">
                            <input class="form-check-input custom-checkbox" type="checkbox" value="" id="pastEventsCheckbox" onclick="pastEvents()">
                            <label class="form-check-label custom-checkbox-label" for="flexCheckDefault">
                                Include Past Events
                            </label>
                        </div>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 album">
                        <div class="container">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3" id="events">
                            </div>
                        </div>
                    </div>
                </div>                                 
            </div>

            <button id="scrollToTopButton" class="scroll-to-top-button"><img src="../public/images/arrowUp.png"></button>

            <!-- javascript -->
            <script>

                const scrollToTopButton = document.getElementById('scrollToTopButton');

                // Show the button when the user scrolls down 200 pixels
                window.onscroll = function() {
                if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                    scrollToTopButton.style.display = 'block';
                } else {
                    scrollToTopButton.style.display = 'none';
                }
                };

                // Scroll to the top of the page when the button is clicked
                scrollToTopButton.addEventListener('click', function() {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
                });

                // function to head to the event page
                function viewOrgEvent(garden){
                    eventId = garden.split("_")[0];
                    window.location.href = "AnEventPageOrg.php?eventId=" + eventId;
                    }

                // function to convert time to 12 hour format
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
                    return "Invalid Date";
                }

            // display the list of events
            function showEvents(obj){
                output = "";
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
                    let review = event.review;
                    let comment = event.comment;
                    let username = event.username;
                    let gardenId = event.gardenId;
                    let gardenName = event.gardenName;

                    if(filled < (noOfSlots/2)){
                        slots = "<span style='color:green'>" + filled + "/" + noOfSlots + " slots filled</span>";
                        }else if(filled == noOfSlots){
                        slots = "<span style='color:red'>" + filled + "/" + noOfSlots + " slots filled</span>";
                        }else{
                        slots = "<span style='color:orange'>" + filled + "/" + noOfSlots + " slots filled</span>";
                        }
                        
                    eventDate = convertDateFormat(eventDate);
                    startTime = convertTo12HourFormat(startTime);
                    endTime = convertTo12HourFormat(endTime);
                    
                    let v = eventId + "_" + eventTitle + "_" + category + "_" + eventDate + "_" + startTime + "_" + endTime + "_" + noOfSlots + "_" + filled + "_" + about + "_" + photo + "_" + review + "_" + comment + "_" + username + "_" + gardenId;

                    output += `<div class="col">
                        <div class="card h-100">
                            <a href="javascript:void(0);" onclick='viewOrgEvent("${v}")' class="text-decoration-none text-dark">
                            <img class="card-img-top" src="${photo}">
                            <div class="card-body">
                                <h4 class='title-style'>${eventTitle}</h4>
                                <p class="card-text">
                                <img src="../public/images/calendar.svg" class="pe-1">${eventDate}<br>${startTime}-${endTime}
                                </p>
                                <p class='title-style'>
                                <img src="../public/images/location pin.svg" class="pe-1">${gardenName}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                ${slots}
                                </div>
                            </div>
                            </a>
                        </div>
                        </div>
                        `;
                    }
                    document.getElementById("events").innerHTML = output;
            }

            function pastEvents(){
                if(document.getElementById("pastEventsCheckbox").checked){
                    url = "MySQL/Event.php?type=myEvents&pastEvents=1";
                }else{
                    url = "MySQL/Event.php?type=myEvents&pastEvents=0";
                }
                fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    showEvents(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }

            pastEvents()

            </script>

        <script>
          var loader = document.getElementById("preloader");
          window.addEventListener("load", function(){
            setTimeout(() => {
              loader.style.display = "none";
            }, 1500);
          });
        </script>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      </body>
    </html>