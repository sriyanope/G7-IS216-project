<html>
    <head>
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
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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
              font-weight:700
              }
          .superNav {
              font-size:13px;
              }
          /* .form-control {
              outline:none !important;
              box-shadow: none !important;
              } */
              @media screen and (max-width:900px){
                .centerOnMobile {
                  text-align:center
                }
              }
              @media screen and (max-width: 280px) { 
                .logo { display: none; }  
              }

          .btn{
              background-color: #547D2E;
          }

          .form-control {
              outline: 0 !important;
              border-color: initial;
              box-shadow: none;
                    }

          .filter-container {
            background-color: #f6f8e0;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            color: #547D2E;
            text-align: center;
            max-width: 300px;
            margin: 0, auto;
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
          }

          .form-check-input {
            display: none;
          }

          .form-check-label {
            display: inline-block;
            font-weight: 600;
            font-size: 18px;
            cursor: pointer;
            margin: 10px;
            position: relative;
            transition: color 0.3s ease, transform 0.3s ease;
          }

          .form-check-label::before {
            content: "\2713";
            position: absolute;
            left: -30px;
            opacity: 0;
            transform: scale(0.5);
            transition: opacity 0.3s ease, transform 0.3s ease;
          }

          .form-check-input:checked + .form-check-label::before {
            opacity: 1;
            transform: scale(1);
          }

          .form-check-label:hover {
            color: #B7CF9B;
            transform: scale(1.1);
          }
          
          .filterHead {
          font-weight: 600;
          font-size: 12px; 
          color: black;
          margin-bottom: 10px;
          text-align: center; 
          text-transform: uppercase; 
          letter-spacing: 2px; 
          }

          .notification {
              position: fixed;
              bottom: 0;
              right:0;
              z-index: 100;
          }

          .redirectButton{
            /* padding: 1em 2em; */
            border:0;
            border-radius: 0.25rem;
            cursor: pointer;
            font-size: 20px;
            transition: transform 500ms;
          }

          .redirectButton:hover,
          .redirectButton:focus-visible{
            transform: translateY(-0.75rem);
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

        <title>Join an Event</title>

    </head>
    <body>
      <div id="preloader"></div>
      <!-- nav bar-->
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
                <a class="nav-link mx-2 disabled" href="JoinAnEvent.php"><i class="events"></i> Events</a>
              </li>
              <li class="nav-item ms-auto mt-1">
                <a class="nav-link mx-2" href="FindAGarden.php"><i class="findAGarden"></i> Find A Garden</a>
              </li>
              <li class="nav-item ms-auto mt-1">
                <a href="Profile.php"><button class="btn btn-success text-white">
                    <img src="../icons.png" width="30">
                    My Profile</button></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>    

      <!-- search bar -->
      <div class="container">
        <div class="row p-5">
          <div class="col"></div>
          <div class="col-3 mx-auto">
            <h2><b>Join an Event</b></h2>
          </div>
          <div class="col-7 mx-auto">
            <form class="d-flex">
              <input class="form-control border-end-0 border rounded-pill" type="search" id="search" placeholder="Search" onkeyup="filter(this.value)">
            </form>

          </div>
          <div class="col"></div>
        </div>

      <div class="row">
        <!-- <div class='col-4'><p class="text-center pb-4">Want to create you event? <a href="EventLocation.php" style='color:black;'><br>Create them here!</a></p></div>
        <div class='col-4'><p class="text-center pb-4">Already created an event? <a href="MyEvents.php" style='color:black;'><br>Check them out!</a></p></div>
        <div class='col-4'><p class="text-center pb-4">Already joined or saved an event? <a href="SavedAndJoinedEvents.php" style='color:black;'><br>View them here!</a></p></div>        -->
        <div class="col-4 pb-4">
          <a href="EventLocation.php" style='color:black;'>
          <button type="button" class="btn btn-success redirectButton">
            Want to create your event? <br> <span style="font-weight:bold;color:black;font-size:medium">Create them!</span>
          </button></a>
        </div>
        <div class="col-4 pb-4">
          <a href="MyEvents.php" style='color:black;'>
          <button type="button" class="btn btn-success redirectButton">
            Already created an event? <br> <span style="font-weight:bold;color:black;font-size:medium">Check them out!</span>
          </button></a>
        </div>
        <div class="col-4 pb-4">
        <a href="SavedAndJoinedEvents.php" style='color:black;'>
          <button type="button" class="btn btn-success redirectButton">
            Joined or saved an event? <br><span style="font-weight:bold;color:black;font-size:medium">View them here!</span>
          </button></a>
        </div>

      
      </div>

      <!-- content -->
      <div class="row">
        <div class="col-2 filterHead">Date:</div>
        <div class="col-3" id="resultCount"></div>
        <div class="col-4"></div>

        <!-- past events -->
        <div class="col-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="pastEventsCheckbox" onclick="filter(this.value)">
            <label class="form-check-label" for="pastEventsCheckbox">
                Show Past Events
            </label>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- filter-->
        <div class="col-2">
          <div class="row">
            <input type="date" class="form-control" name="eventDate" id="eventDate" onchange="filter(this.value)">
          </div>
          
          <div class="row">
            <div class="filterHead mt-4">Category:</div>
          </div>

          <div class="row">
          <div class="bg-light filter-container" id="category-checkbox">
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="Workshop" onclick="filter(this.value)" id="workshop-checkbox">
                <label class="form-check-label" for="workshop-checkbox">Workshop</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="Cleanup" onclick="filter(this.value)" id="cleanup-checkbox">
                <label class="form-check-label" for="cleanup-checkbox">Cleanup</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="Education" onclick="filter(this.value)" id="education-checkbox">
                <label class="form-check-label" for="education-checkbox">Education</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="Harvest" onclick="filter(this.value)" id="harvest-checkbox">
                <label class="form-check-label" for="harvest-checkbox">Harvest</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="Leisure" onclick="filter(this.value)" id="leisure-checkbox">
                <label class="form-check-label" for="leisure-checkbox">Leisure</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="Others" onclick="filter(this.value)" id="others-checkbox">
                <label class="form-check-label" for="others-checkbox">Others</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="filterHead mt-4">Location:</div>
          </div>

          <div class="row">
          <div class="bg-light filter-container" id="region-checkbox">
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="north" onclick="filter(this.value)" id="north-checkbox">
                <label class="form-check-label" for="north-checkbox">North</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="north-east" onclick="filter(this.value)" id="north-east-checkbox">
                <label class="form-check-label" for="north-east-checkbox">North-East</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="central" onclick="filter(this.value)" id="central-checkbox">
                <label class="form-check-label" for="central-checkbox">Central</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="east" onclick="filter(this.value)" id="east-checkbox">
                <label class="form-check-label" for="east-checkbox">East</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="west" onclick="filter(this.value)" id="west-checkbox">
                <label class="form-check-label" for="west-checkbox">West</label>
              </div>
            </div>
          </div>
        </div>

          <!-- event list -->
          <div class="col-10">
            <div class="bg-light">

              <div class="album py-3 bg-light">
                <!--div class="album py-5 bg-light"-->
                  <div class="container">
                    <!-- change here -->
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3" id="events">
                    <!--div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"-->
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Notification -->
    <div id="notification" class="notification"></div>

    <button id="scrollToTopButton" class="scroll-to-top-button"><img src="../public/images/arrowUp.png"></button>

    <div class="container m-5"></div>

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

        // function to update event list when user uses the filter or types in the search bar
        function filter() {
          if(document.getElementById("pastEventsCheckbox").checked){
            pastEvents = "1";
          }else{
            pastEvents = "0";
          }

          const checkboxesRegion = document.getElementById("region-checkbox").querySelectorAll('input[type="checkbox"]:checked');
          let selectedRegions = Array.from(checkboxesRegion).map(checkbox => checkbox.value);
          if(selectedRegions.length == 0){
            selectedRegions = ['north', 'north-east', 'central', 'east', 'west'];
          }

          const checkboxesCategory = document.getElementById("category-checkbox").querySelectorAll('input[type="checkbox"]:checked');
          let selectedcategories = Array.from(checkboxesCategory).map(checkbox => checkbox.value);
          if(selectedcategories.length == 0){
            selectedcategories = ['Workshop', 'Cleanup', 'Education', 'Harvest', 'Leisure', 'Others'];
          }
          
          eventDate = document.getElementById("eventDate").value;
          searchKey = document.getElementById("search").value;

          url = "MySQL/Event.php?type=getAllEvents&key=" + searchKey + "&regions=" + selectedRegions + "&categories=" + selectedcategories + "&eventDate=" + eventDate + "&pastEvents=" + pastEvents;
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
          if(document.getElementById("pastEventsCheckbox").checked){
              url = "MySQL/SavedJoinedEvents.php?type=saved&pastEvents=1";
          }else{
              url = "MySQL/SavedJoinedEvents.php?type=saved&pastEvents=0";
          }
          document.getElementById("resultCount").innerText = obj.event.length + " results";
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
                    btn = `<img src="../public/images/BookmarkNone.png" style='height:40px' class='bookmark-icon' data-value="${v}" onclick='save(this, this.getAttribute("data-value"))'>`
                    
                  }else{
                    btn = `<img src="../public/images/Bookmarked.png" style='height:40px' class='bookmark-icon' data-value="${v}" onclick='unsave(this, this.getAttribute("data-value"))'>`
                  }

                  if(document.getElementById("pastEventsCheckbox").checked){
                    pastEvents = "1";
                  }else{
                    pastEvents = "0";
                  }

                  output += `<div class="col">
                    <div class="card h-100">
                      <a href="GeneralEventPage.php?eventId=${eventId}&pastEvents=${pastEvents}"><img class="card-img-top" src="${photo}"></a>
                      <div class="card-body">
                        <a href="GeneralEventPage.php?eventId=${eventId}&pastEvents=${pastEvents}" class="text-decoration-none text-dark">
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
                this1.setAttribute("onclick", "unsave(this, this.getAttribute('data-value'))");
                this1.setAttribute("src", "../public/images/Bookmarked.png");
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
                this1.setAttribute("onclick", "save(this, this.getAttribute('data-value'))");
                this1.setAttribute("src", "../public/images/BookmarkNone.png");
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

          filter();

      </script>
      <script>
          var loader = document.getElementById("preloader");
          window.addEventListener("load", function(){
            loader.style.display = "none";
          })
      </script>

      <!-- Bootstrap JS bundle to be placed before the closing </body> tag -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      
    </body>
</html>