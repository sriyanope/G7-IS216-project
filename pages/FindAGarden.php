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
      <!-- iconify -->
      <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


      <!-- jQuery library -->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
      <!-- Popper JS -->
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
      <!-- font awesome icons -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
      
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
                    <span id="profileBtnText">My Profile</span></button></a>
              </li>
            </ul>
          </div>
        </div>
        </nav>

        <!-- Notification -->
        <div id="notification" class="notification"></div>

        <button id="scrollToTopButton" class="scroll-to-top-button"><img src="../public/images/arrowUp.png"></button>

      
<!--Put in landing pageeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee-->

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


  function removeNotification(){
    url = "MySQL/Notification.php?type=removeNotification";
    fetch(url)
      .then(response => {
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          return response;
      })
      .then(data => {
        
      })
      .catch(error => {
          console.error('Error:', error);
      });
  }

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
        eventTitle = notif.eventTitle;
        reason = notif.reason;
        output += `
              <strong>${eventTitle}</strong> has been deleted with the following reason: ${reason}<br>
            `
      }
      document.getElementById("notificationModal").innerHTML = output;

      // Get a reference to the button element by its ID
      const myButton = document.getElementById('notificationBtn');

      // Check if the button element exists
      if (myButton) {
        // Trigger a click event on the button
        myButton.click();
      }

    })
    .catch(error => {
        console.error('Error:', error);
    });

</script>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#exampleModal" id="notificationBtn">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id='notificationModal'></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick='removeNotification()'>Got it!</button>
      </div>
    </div>
  </div>
</div>


<!--Trialllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll-->

      <!-- content -->
      <div class="container">
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
          <div id="savedGardenDiv">
            <div class="row mt-5">
              <div class="col-1">
                <img src="../public/images/BookmarkNone.png" style="height:40px;width:40px;">
              </div>
              <div class="col-11 pt-1">
                <h4>Saved Gardens</h4>
              </div>
              
            </div>

            <div class="row bg-light mt-2 mb-5 border">
              <div class="col pt-3">
                <ul id="savedGardens"></ul>
              </div>
            </div>
          </div>

        </div> 
      </div>

      </div>
      
      <div class="container m-5"></div>

      <!-- javascript -->
      <script>

        // function to show garden list
        function showGardenList(obj) {
          var output = "";
          document.getElementById("resultCount").innerText = obj.garden.length + " results";
          if(username != "nonUser"){
            url = "MySQL/SavedGarden.php?type=show&username=" + username;
            fetch(url)
              .then(response => {
                  if (!response.ok) {
                      throw new Error('Network response was not ok');
                  }
                  return response.json();
              })
              .then(data => {
                  savedList = [];
                  for(garden of data.garden){
                    savedList.push(garden.gardenName);
                  }
                  for(garden of obj.garden){
                    let gardenID = garden.gardenID;
                    let gardenName = garden.gardenName;
                    let latitude = Number(garden.latitude);
                    let longitude = Number(garden.longitude);
                    let region = garden.region;
                    let address = garden.address;
                    let v = gardenID + "aaaaa" + gardenName + "aaaaa" + latitude + "aaaaa" + longitude + "aaaaa" + region + "aaaaa" + address;

                    if (savedList.indexOf(gardenName) == -1) {
                        btn = `<img src="../public/images/BookmarkNone.png" style='height:40px' class='bookmark-icon' data-value="${v}" onclick='save(this, this.getAttribute("data-value"))'>`
                    } else {
                        btn = `<img src="../public/images/Bookmarked.png" style='height:40px' class='bookmark-icon' data-value="${v}" onclick='unsave(this, this.getAttribute("data-value"))'>`
                    }

                    output += `<div class="card border">
                              <a href="javascript:void(0);" onclick='selectedGarden("${v}")' class="text-decoration-none text-dark">
                                <div class="card-body">
                                  <h5 class="card-title">${gardenName}</h5>
                                  <p class="card-text" style="font-weight: normal;">Address: ${address}</p>
                                  <p style="font-weight: normal;">Region: ${region}</p>
                                </div>
                              </a>
                              <div class="bookmark-container">
                                <img src="../public/images/map.png" style='height:40px;width:40px;' class='bookmark-icon' data-value="${v}" onclick='showGarden(this.getAttribute("data-value"))'>    
                                ${btn}
                              </div>
                            </div>
                            `;
                  }
                  document.getElementById("gardens").innerHTML = output;
                  })
              .catch(error => {
                  console.error('Error:', error);
              });
          }else{
            document.getElementById("savedGardenDiv").setAttribute("class", "d-none");
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
                          <button type="button" class="btn btn-primary" value="${v}" onclick='showGarden(this.value)'>Show Map</button>
                        </div>

                    </div>
                    `;
                }
                document.getElementById("gardens").innerHTML = output;
          }

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

        // function to go to a particular garden page
        function selectedGarden(garden){
          garden = retrieveLocDetails(garden);
          window.location.href = "GardenPage.php?gardenId=" + garden.gardenId;
        }

        var username = '<?php 
          if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
          } else {
            echo "nonUser";
          }  
        ?>';

        if(username == "nonUser"){
          document.getElementById("profileBtnText").innerText = "Log In/Sign Up";
        }
        
        // function to show list of saved gardens
        function showSavedGarden() {
          var output = "";
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

        // Function to save garden
        function save(this1, garden){
          
          let gardenObj = retrieveLocDetails(garden);
          let gardenId = gardenObj.gardenId;
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
              this1.setAttribute("onclick", "unsave(this, this.getAttribute('data-value'))");
              this1.setAttribute("src", "../public/images/Bookmarked.png");
              this1.innerText = "Unsave";
              message = garden.split("aaaaa")[1];
              displayAlert(message + " <b>Saved</b>", "warning");
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        // Function to unsave garden
        function unsave(this1, garden){
          let gardenObj = retrieveLocDetails(garden);
          let gardenId = gardenObj.gardenId;
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
              this1.setAttribute("onclick", "save(this, this.getAttribute('data-value'))");
              this1.setAttribute("src", "../public/images/BookmarkNone.png");
              this1.innerText = "Save";
              message = garden.split("aaaaa")[1];
              displayAlert(message + " <b>Unsaved</b>", "warning");
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }



        filter();

        if(username != "nonUser"){
          showSavedGarden();
        }
        
      </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
    </body>
</html>