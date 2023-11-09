<html>
  <?php session_start(); ?>
  <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Outfit:wght@700&display=swap" rel="stylesheet">
      <!-- CSS stylesheet -->
      <link rel="stylesheet" href="../style.css">
      
      <title>Event Location</title>

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

        .bookmark-container {
            position: absolute;
            bottom: 10px;
            right: 10px;
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


        <!-- Notification -->
        <div id="notification" class="notification"></div>

        <button id="scrollToTopButton" class="scroll-to-top-button"><img src="../public/images/arrowUp.png"></button>

      
      <!-- content -->
      <div class="container">
          <div class="row">
            <div class="col-1"></div>
            <div class="col-10">

        <!-- search textbox -->
        <div class="row p-5">
          <div class="col"></div>
          <div class="col-3 mx-auto">
            <h2>
              
              <b>Find a Garden</b>
            </h2>

          </div>
          <div class="col-7 mx-auto">
            <div class="input-group">
              <input class="form-control border-end-0 border rounded-pill" type="text" id="search" placeholder="Search" onkeyup="filter(this.value)">
              
              
            </div>
          </div>
          <div class="col"></div>
        </div>

        <!-- filter -->
        <div class="row">
          <div class="col-2 filterHead mt-1">Filter By Region:</div>
          <div class="col-3" id="resultCount"></div>
        </div>

        <div class="row">
        <div class="col-2">
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

        </div> 
      </div>

            </div>
            <div class="col-1"></div>
          </div>

      </div>
      
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

            output += `<div class="card border style="height:200x"">
                    <a href="javascript:void(0);" onclick='select("${v}")' class="text-decoration-none text-dark">
                      <div class="card-body">
                        <h5 class="card-title">${gardenName}</h5>
                        <p class="card-text" style="font-weight: normal;">Address: ${address}</p>
                        <p style="font-weight: normal;">Region: ${region}</p>
                      </div>
                    </a>
                    <div class="bookmark-container">
                      <img src="../public/images/map.png" style='height:40px;width:40px;' class='bookmark-icon' data-value="${v}" onclick='showGarden(this.getAttribute("data-value"))'>    
                    </div>
                  </div>
                  `;
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
                return response.json();
            })
            .then(data => {
                showGardenList(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
        
        function select(garden){
          garden = retrieveLocDetails(garden);
          window.location.href = "CreateEvent.php?gardenId=" + garden.gardenId + "&gardenName=" + garden.gardenName;
        }

        filter();

        window.setInterval(filter, 2000);
        
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