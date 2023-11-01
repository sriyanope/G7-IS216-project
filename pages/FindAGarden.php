<html>
  <?php session_start(); ?>
  <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <!-- <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet"> -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Outfit:wght@700&display=swap" rel="stylesheet">
      <!-- CSS stylesheet -->
      <link rel="stylesheet" href="../style.css">
      
      <title>Find a Garden</title>

      <!-- styling -->
      <style>
        #map {
            width: 100%;
            aspect-ratio: 1/1;
        }

        a {
            font-size:14px;
            font-weight:700
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
                        text-align:center
                    }
                    }

            @media screen and (max-width: 280px) { 

                                .logo { display: none; }  

                                }

        .navbar {
            background-color: #F6F8E0;
        }

        .btn{
            background-color: #547D2E;
        }

      </style>
  
      <?php
        // retrieve garden details
        spl_autoload_register(
          function ($class){
              require_once  "MySQL/$class.php";
          });
        $dao = new GardenDAO();
        $gardenList = $dao->getGardens();
      
      ?>

        <!-- javascript -->
        <script>
            var mapLocation = <?php echo $gardenList; ?>;
            var markersArray = [];
            let map;
            let mapInitialized = false;
    
            // function to store garden details into an object
            function retrieveLocDetails(garden) {
              if(typeof garden === 'string'){
                garden = garden.split("aaaaa");
              }
                return {
                  gardenId: garden[0],
                  gardenName: garden[1],
                  latitude: Number(garden[2]),
                  longitude: Number(garden[3]),
                  region: garden[4],
                  address: garden[5]
                };
            }
    
            // display map
            function showGarden(garden) {
                    let location = retrieveLocDetails(garden);
                    let marker = new google.maps.Marker({
                        position: { lat: location.latitude, lng: location.longitude },
                        map,
                        title: location.GardenName
                    });
                    map.setCenter({ lat: location.latitude, lng: location.longitude });
    
                    // Clear existing markers and add the new one
                    clearOverlays();
                    markersArray.push(marker);
            }
    
            // initialise google map
            function initMap() {
                firstGarden = [0, "", 1.362338, 103.807374, ""];
                let location = retrieveLocDetails(firstGarden);
                map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: location.latitude, lng: location.longitude },
                    zoom: 15,
                    mapId: "40c99f5bd3e0f892"
                });
                mapInitialized = true;
    

            }
    
            // clear existing overlays
            function clearOverlays() {
                for (var i = 0; i < markersArray.length; i++) {
                    markersArray[i].setMap(null);
                }
                markersArray.length = 0;
            }
        </script>

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
                <a class="nav-link mx-2" href="LandingPage.html"><i class="about"></i> About</a>
              </li>
              <li class="nav-item ms-auto mt-1">
                <a class="nav-link mx-2" href="JoinAnEvent.php"><i class="events"></i> Events</a>
              </li>
              <li class="nav-item ms-auto mt-1">
                <a class="nav-link mx-2 disabled" href="FindAGarden.php"><i class="findAGarden"></i> Find A Garden</a>
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
      
<!--Trialllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll-->

<script>

  url = "MySQL/Notification.php?type=deletedEventNotification";
  fetch(url)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
      output = "";
      for(notif of data.notification){
        eventTitle = data.notification.eventTitle;
        reason = data.notification.reason;
        output += `<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Notification: </strong> ${eventTitle} has been deleted with the following reason:
                ${reason}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`
      }
      document.getElementById("notification").innerHTML = output;
    })
    .catch(error => {
        console.error('Error:', error);
    });

</script>

<!--Trialllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll-->

      <!-- content -->
      <div id="notification"></div>
      <div class="container">
        <!-- search textbox -->
        <div class="row p-5">
          <div class="col"></div>
          <div class="col-3 mx-auto">
            <h2><b>Find a Garden</b></h2>
          </div>
          <div class="col-7 mx-auto">
            <div class="input-group">
              <input class="form-control border-end-0 border rounded-pill" type="search" id="search" placeholder="Search" onkeyup="filter(this.value)">
              <span class="input-group-append">
                      <i class="fa fa-search"></i>
                  </button>
              </span>
            </div>
          </div>
          <div class="col"></div>
        </div>

        <!-- filter -->
        <div class="row">
          <div class="col-2">Filter By Region:</div>
          <div class="col-3" id="resultCount"></div>
        </div>

        <div class="row">

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

          <!-- garden list -->
          <div class="col-5">
            <div class="bg-light" id="gardens"></div>
          </div>

          <!-- google map -->
          <div class="col-5">
            <div class="bg-light">
              <div id="map"></div>
              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlsN7cu3WF-W3FGrtJ7l9El4nKPAyN1r8&map_ids=40c99f5bd3e0f892&callback=initMap"></script>
            </div>

          <!-- saved gardens -->
          <div class="row mt-5">
            <h4>Saved Gardens</h4>
          </div>

          <div class="row bg-light mt-2 mb-5 border">
            <div class="col pt-3">
              <ul id="savedGardens"></ul>
            </div>
          </div>
        </div> 
      </div>

      </div>

      <!-- javascript -->
      <script>

        // function to show garden list
        function showGardenList(obj) {
          var output = "";
          document.getElementById("resultCount").innerText = obj.garden.length + " results";
          for(garden of obj.garden){
            let gardenID = garden.gardenID;
            let gardenName = garden.gardenName;
            let latitude = Number(garden.latitude);
            let longitude = Number(garden.longitude);
            let region = garden.region;
            let address = garden.address;
            
            let v = gardenID + "aaaaa" + gardenName + "aaaaa" + latitude + "aaaaa" + longitude + "aaaaa" + region + "aaaaa" + address;

            output += `<div class="card border">
            <div class="card-body">
                  <h5 class="card-title">${gardenName}</h5>
                  <p class="card-text">Address: ${address}</p>
                  <button type="button" class="btn btn-primary" value="${v}" onclick='showGarden(this.value)'>Map</button>
                  <button type="button" class="btn btn-primary" value="${v}" onclick='selectedGarden(this.value)'>View More</button>
                  <button type="button" class="btn btn-primary" id='saveBtn' value="${v}" onclick='save(this.value)'>Save</button>
                  <button type="button" class="btn btn-primary" id='unsaveBtn' value="${v}" onclick='unsave(this.value)'>Unsave</button>
                </div>
              </div>`;
          }
          document.getElementById("gardens").innerHTML = output;
        }

        // function to update garden list based on filter and search bar
        function filter() {
          const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
          let selectedRegions = Array.from(checkboxes).map(checkbox => checkbox.value);
          if(selectedRegions.length == 0){
            selectedRegions = ['north', 'north-east', 'central', 'east', 'west'];
          }
          searchKey = document.getElementById("search").value;

          url = "MySQL/GardenFilter.php?key=" + searchKey + "&regions=" + selectedRegions;
          fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Parse the JSON response
            })
            .then(data => {
                showGardenList(data); // Now you can work with the JSON data
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        // function to go to a particular garden page
        function selectedGarden(garden){
          garden = retrieveLocDetails(garden);
          window.location.href = "GardenPage.php?gardenId=" + garden.gardenId;
        }

        // function to show list of saved gardens
        function showSavedGarden() {
          var output = "";
          let username = <?php echo $_SESSION['username'] ?>;
          url = "MySQL/SavedGarden.php?type=show&username=" + username;
          fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
              if(data.garden.length == 0){
                document.getElementById("savedGardens").innerHTML = "No garden saved";
              }else{
                for(garden of data.garden){
                let gardenID = garden.gardenID;
                let gardenName = garden.gardenName;

                output += `<li class='my-2'><a href='GardenPage.php?gardenId=${gardenID}' style='text-decoration: none;color:black'><span>${gardenName}</span></a></li>`;
              }
              document.getElementById("savedGardens").innerHTML = output;
              }
                })
            .catch(error => {
                console.error('Error:', error);
            });


        }

        // function to save garden
        function save(garden){
          let gardenObj = retrieveLocDetails(garden);
          let gardenId = gardenObj.gardenId;
          let username = <?php echo $_SESSION['username'] ?>;
          url = "MySQL/SavedGarden.php?type=add&gardenId=" + gardenId + "&username=" + username;
          fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response;
            })
            .then(data => {
              showSavedGarden();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        // function to unsave garden
        function unsave(garden){
          let gardenObj = retrieveLocDetails(garden);
          let gardenId = gardenObj.gardenId;
          let username = <?php echo $_SESSION['username'] ?>;
          url = "MySQL/SavedGarden.php?type=delete&gardenId=" + gardenId + "&username=" + username;
          fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response;
            })
            .then(data => {
              showSavedGarden();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        showSavedGarden();
        filter();
      </script>
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
    </body>
</html>