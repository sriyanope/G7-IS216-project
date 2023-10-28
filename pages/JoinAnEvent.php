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

        </style>

    </head>
    <body>
      <!--Start of Nav-->
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
      <!-- <nav class="navbg navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm">

        <div class="container m-0" style="flex-wrap: wrap;">
          <img src="logo.png" alt="Logo" width="80" height="50" class="col-1 me-0">
          <a class="navbar-brand me-auto m-1" href="#"> <strong>ECOmmunity</strong></a>
          <button class="navbar-toggler align-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-family: 'Outfit', serif;">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item ms-auto mt-1">
                <a class="nav-link mx-2" href="#"><i class="about"></i> About</a>
              </li>
              <li class="nav-item ms-auto mt-1">
                <a class="nav-link mx-2" href="#"><i class="events"></i> Events</a>
              </li>
              <li class="nav-item ms-auto mt-1">
                <a class="nav-link mx-2" href="FindAGarden.html"><i class="findAGarden"></i> Find A Garden</a>
              </li>
              <li class="nav-item ms-auto mt-1">
                <button class="btn text-white" href="#">
                    <img src="icons.png" width="30">
                    Profile</button>
              </li>
            </ul>
          </div>
        </div>
      </nav> -->
      
      <!--End of Nav-->
      
      <!--Start of body-->

      <!--Start of Search Row-->
      <div class="container">
        <div class="row p-5">
          <div class="col"></div>
          <div class="col-3 mx-auto">
            <h2><b>Join an Event</b></h2>
          </div>
          <div class="col-7 mx-auto">
            <!-- <div class="input-group">
              <input class="form-control border-end-0 border rounded-pill" type="search" placeholder="Search" id="example-search-input">
              <span class="input-group-append">
                  <button class="btn btn-outline-secondary bg-success border-bottom-0 border rounded-pill ms-n5" type="button">
                    <img src="public/images/search.svg"/>
                  </button>
              </span>
            </div> -->
            <form class="d-flex">
              <input class="form-control border-end-0 border rounded-pill" type="search" id="search" placeholder="Search an Event" onkeyup="filter(this.value)">
            </form>

          </div>
          <div class="col"></div>
        </div>
      <!--End of Search Row-->

      <!--Start of Main Body-->
        <div class="row">
          <div class="col">Filter By Region:</div>
        </div>

        <div class="row">
          <!--Start of Filter-->
          <div class="col-2">
            <div class="bg-light">
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="north" onclick="filter(this.value)">
                <label class="form-check-label">North</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="north-east" onclick="filter(this.value)">
                <label class="form-check-label">North-East</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="central" onclick="filter(this.value)">
                <label class="form-check-label">Central</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="east" onclick="filter(this.value)">
                <label class="form-check-label">East</label>
              </div>
              <div class="form-check m-3">
                <input class="form-check-input" type="checkbox" value="west" onclick="filter(this.value)">
                <label class="form-check-label">West</label>
              </div>
            </div>
          </div>
          <!--End of Filter-->

          <!--Start of Event List-->
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
          <!--End of Event Body-->



        </div>

      </div>
      
      <script>

        function filter() {
          const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
          let selectedRegions = Array.from(checkboxes).map(checkbox => checkbox.value);
          if(selectedRegions.length == 0){
            selectedRegions = ['north', 'north-east', 'central', 'east', 'west'];
          }
          searchKey = document.getElementById("search").value;

          url = "MySQL/Event.php?key=" + searchKey + "&regions=" + selectedRegions;
          fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Parse the JSON response
            })
            .then(data => {
                showEventList(data); // Now you can work with the JSON data
            })
            .catch(error => {
                console.error('Error:', error);
            });
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


        function showEventList(obj) {
          var output = "";
          console.log(obj);
          for(event of obj.event){
            console.log(event);
            let eventId = event.eventId;
            let eventTitle = event.eventTitle;
            let category = event.category;
            let eventDate = event.eventDate;
            let startTime = event.startTime;
            let endTime = event.endTime;
            let noOfSlots = event.noOfSlots;
            let filled = event.filled;
            let about = event.about;
            let image = event.image;
            let review = event.review;
            let comment = event.comment;
            let username = event.username;
            let gardenId = event.gardenId;
            
            eventDate = convertDateFormat(eventDate);
            startTime = convertTo12HourFormat(startTime);
            endTime = convertTo12HourFormat(endTime);

            let v = eventId + "_" + eventTitle + "_" + category + "_" + eventDate + "_" + startTime + "_" + endTime + "_" + noOfSlots + "_" + filled + "_" + about + "_" + image + "_" + review + "_" + comment + "_" + username + "_" + gardenId;

            output += `<div class="col">
              <div class="card h-100">
                <a href=""><img class="card-img-top" src="../public/images/EventImage.jpg"></a>
                <div class="card-body">
                  <a href="" class="text-decoration-none text-dark">
                    <h4>${eventTitle}</h4>
                    <p class="card-text"><img src="../public/images/calendar.svg" class="pe-1">${eventDate}<br>${startTime}-${endTime}</p>
                    <p><img src="../public/images/location pin.svg" class="pe-1">${gardenId}</p>
                  </a>
                  <div class="d-flex justify-content-between align-items-center">
                    <span>${filled}/${noOfSlots}</span>
                    <span><button type="button" class="btn btn-primary" value="${v}" onclick='save(this.value)'>Save</button></span>
                  </div>
                </div>
              </div>
            </div>`
          }
          document.getElementById("events").innerHTML = output;
        }


        url = "MySQL/Event.php?key=&regions=north,north-east,central,east,west";
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

      </script>


      <!--End of body-->
      <!-- Bootstrap JS bundle to be placed before the closing </body> tag -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      
    </body>
</html>