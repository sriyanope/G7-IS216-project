<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>Join an Event</title>
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
            margin; 0 auto;
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
          

        </style>

    </head>
    <body>
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
                <a href="Profile.php"><button class="btn text-white">
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
        <div class='col-4'><p class="text-center pb-4">Want to create you event? <a href="EventLocation.php" style='color:black;'><br>Create them here!</a></p></div>
        <div class='col-4'><p class="text-center pb-4">Already created an event? <a href="MyEvents.php" style='color:black;'><br>Check them out!</a></p></div>
        <div class='col-4'><p class="text-center pb-4">Already joined or saved an event? <a href="SavedAndJoinedEvents.php" style='color:black;'><br>View them here!</a></p></div>       
        </div>

      <!-- content -->
      <div class="row">
        <div class="col-2 filterHead">Filter By Region:</div>
        <div class="col-3" id="resultCount"></div>
      </div>

      <div class="row">
        <!-- filter-->
        <div class="col-2">
          <div class="bg-light filter-container">
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
      
      <!-- javascript -->
      <script>

        // function to update event list when user uses the filter or types in the search bar
        function filter() {
          const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
          let selectedRegions = Array.from(checkboxes).map(checkbox => checkbox.value);
          if(selectedRegions.length == 0){
            selectedRegions = ['north', 'north-east', 'central', 'east', 'west'];
          }
          searchKey = document.getElementById("search").value;

          url = "MySQL/Event.php?type=getAllEvents&key=" + searchKey + "&regions=" + selectedRegions;
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
                  let image = event.image;
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

                  let v = eventId + "aaaaa" + eventTitle + "aaaaa" + category + "aaaaa" + eventDate + "aaaaa" + startTime + "aaaaa" + endTime + "aaaaa" + noOfSlots + "aaaaa" + filled + "aaaaa" + about + "aaaaa" + image + "aaaaa" + username + "aaaaa" + gardenId;

                  if(savedList.indexOf(eventId) == -1){
                    btn = `<button type="button" class="btn btn-primary" id='saveBtn' value="${v}" onclick='save(this, this.value)'>Save</button>`
                  }else{
                    btn = `<button type="button" class="btn btn-primary" id='unsaveBtn' value="${v}" onclick='unsave(this, this.value)'>Unsave</button>`
                  }

                  output += `<div class="col">
                    <div class="card h-100">
                      <a href="GeneralEventPage.php?eventId=${eventId}"><img class="card-img-top" src="../public/images/EventImage.jpg"></a>
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

        // initialise the page with all events
        url = "MySQL/Event.php?type=getAllEvents&key=&regions=north,north-east,central,east,west";
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
                  image: event[9],
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
              })
              .catch(error => {
                  console.error('Error:', error);
              });
          }

      </script>

      <!-- Bootstrap JS bundle to be placed before the closing </body> tag -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      
    </body>
</html>