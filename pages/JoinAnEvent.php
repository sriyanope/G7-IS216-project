<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            border-radius: 10px;
            padding: 5px;
            color: #547D2E;
            text-align: center;
            max-width: 120px;
            margin: 0, auto;
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            overflow:auto;
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
          font-size: 11px; 
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
              width: 30%;
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

        .title-style{
          text-overflow:ellipsis;
          overflow:hidden;
          white-space:nowrap;
          display: -webkit-box;
          -webkit-line-clamp: 3;
          -webkit-box-orient: vertical;

        }

        .accordion{
          max-width: 600px !important;
          /* margin: 50px auto; */
          box-shadow: 0 2px 25px 0 rgba(110, 130, 208, .38) !important;
        }

        .accordion-button{
          background-color: #547D2E !important;
          color: #fff !important;
          position: relative;
          box-shadow: none !important;
        }

        .accordion-button:active, .accordion-button:focus{
          border: none !important;

        }

        .accordion-button:hover{
          background:#3A833A  !important;
        }

        .accordion-button::after{
          content: "";
          background-image: url("../public/images/down-arrow.png") !important;
          transform: scale(1.2);
          border-radius: 3px;
          transition: .5s !important;
          align-items: center;
        }

        .button-container{
          display: flex;
        }

        .event-options-container{
          display:flex;
        }
        @media (prefers-reduced-motion: reduce) {
            .collapse {
                transition-property: height, visibility;
                transition-duration: .35s;
            }
        }
        

        </style>

        <title>Join an Event</title>

    </head>
    <body>
            <div id="preloader">
        <p>Loading...</p>
      </div>
      <!-- nav bar-->
      <nav class="navbg navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm ">
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
          <div class="col-md-3 mx-auto">
            <h2><b>Join an Event</b></h2>
          </div>
          <div class="col-md-7 mx-auto">
            <form class="d-flex">
              <input class="form-control border-end-0 border rounded-pill" type="text" id="search" placeholder="Search" onkeyup="filter(this.value)">
            </form>

          </div>
          <div class="col"></div>
        </div>

      <div class="row">
       <!-- Create event (only seen larger than md screen) -->
        <div class="col-4 pb-4 d-none d-md-block">
          <a href="EventLocation.php" style='color:black;'>
          <button type="button" class="btn btn-success redirectButton">
            Want to create your event? <br> <span style="font-weight:bold;color:white;font-size:medium">Create them!</span>
          </button></a>
        </div>
        <!-- End of create event (only seen larger than md screen) -->

        <!-- Icon button for create event, for screen md or less -->
        <div class="col-4 pb-4 d-md-none">
          <a href="EventLocation.php" style='color:white;'>
          <button type="button" class="btn btn-success redirectButton">
            <div class="col">
              <img src="../public/images/magic.png" width="50px" height="50px">
            </div>
            <div class="col pb-1">
              <span style="font-weight:bold;color:white;font-size:medium;position:relative;flex-wrap:wrap;margin:auto;">Create an event</span>
            </div>
          </button></a>
        </div>
        <!-- End of Icon button for create event, for screen md or less -->

        <!-- See your created event (only seen larger than md screen) -->
        <div class="col-4 pb-4 d-none d-md-block">
          <a href="MyEvents.php" style='color:white;'>
          <button type="button" class="btn btn-success redirectButton">
            Already created an event? <br> <span style="font-weight:bold;color:white;font-size:medium">Check them out!</span>
          </button></a>
        </div>
        <!-- End of see your created event (only seen larger than md screen) -->

        <!-- Icon button for seeing your created event, for screen md or less -->
        <div class="col-4 pb-4 d-md-none">
          <a href="EventLocation.php" style='color:white;'>
          <button type="button" class="btn btn-success redirectButton">
            <div class="col pt-2">
              <img src="../public/images/file.png" width="40px" height="40px">
            </div>
            <div class="col pt-1 pb-1">
              <span style="font-weight:bold;color:white;font-size:medium;position:relative;text-align:left;">Manage your events</span>
            </div>
          </button></a>
        </div>
        
        <!-- End of Icon button for seeing your created event, for screen md or less -->

        <!-- View your atteneded/joined event (only seen larger than md screen) -->
        <div class="col-4 pb-4 d-none d-md-block">
        <a href="SavedAndJoinedEvents.php" style='color:white;'>
          <button type="button" class="btn btn-success redirectButton">
            Joined or saved an event? <br><span style="font-weight:bold;color:white;font-size:medium">View them here!</span>
          </button></a>
        </div>
        <!-- End of view your atteneded/joined event (only seen larger than md screen) -->

        <!-- Icon button for viewing your joined events, for screen md or less -->
        <div class="col-4 pb-4 d-md-none">
          <a href="EventLocation.php" style='color:white;'>
          <button type="button" class="btn btn-success redirectButton">
            <div class="col pt-1">
              <img src="../public/images/team.png" width="45px" height="45px">
            </div>
            <div class="col pt-1 pb-1">
              <span style="font-weight:bold;color:white;font-size:medium;position:relative;text-align:left;">View joined events</span>
            </div>
          </button></a>
        </div>
        <!-- End of Icon button for viewing your joined events, for screen md or less -->

      
      </div>

      <!-- content -->
      <div class="row">
        <div class="col-md-6">
          <div class="button-container">
            <p class="filterHead pe-2">Filter:</p>
            <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
              Date
            </button>
            <div class="collapse" id="collapseExample1">
              <div class="card card-body">
              <div class="row filterHead text-center m-auto">Start Date:</div>
                  <div class="row">
                    <input type="date" class="form-control" name="eventDate" id="eventDate" onchange="filter(this.value)">
                  </div>

                  <div class="row filterHead text-center pt-2 m-auto">End Date:</div>
                  <div class="row">
                    <input type="date" class="form-control" name="eventDateTo" id="eventDateTo" onchange="filter(this.value)">
                  </div>
              </div>
            </div>
            <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
              Category
            </button>
            <div class="collapse" id="collapseExample2">
              <div class="card card-body">
              <div class="row">
                  <div class="filter-container" id="category-checkbox">
                    <div class="form-check m-1">
                      <input class="form-check-input" type="checkbox" value="Workshop" onclick="filter(this.value)" id="workshop-checkbox">
                      <label class="form-check-label" for="workshop-checkbox">Workshop</label>
                    </div>
                    <div class="form-check m-1">
                      <input class="form-check-input" type="checkbox" value="Cleanup" onclick="filter(this.value)" id="cleanup-checkbox">
                      <label class="form-check-label" for="cleanup-checkbox">Cleanup</label>
                    </div>
                    <div class="form-check m-1">
                      <input class="form-check-input" type="checkbox" value="Education" onclick="filter(this.value)" id="education-checkbox">
                      <label class="form-check-label" for="education-checkbox">Education</label>
                    </div>
                    <div class="form-check m-1">
                      <input class="form-check-input" type="checkbox" value="Harvest" onclick="filter(this.value)" id="harvest-checkbox">
                      <label class="form-check-label" for="harvest-checkbox">Harvest</label>
                    </div>
                    <div class="form-check m-1">
                      <input class="form-check-input" type="checkbox" value="Leisure" onclick="filter(this.value)" id="leisure-checkbox">
                      <label class="form-check-label" for="leisure-checkbox">Leisure</label>
                    </div>
                    <div class="form-check m-1">
                      <input class="form-check-input" type="checkbox" value="Others" onclick="filter(this.value)" id="others-checkbox">
                      <label class="form-check-label" for="others-checkbox">Others</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
              Location
            </button>
            <div class="collapse" id="collapseExample3">
              <div class="card card-body">
                <div class="row">
                  <div class="filter-container" id="region-checkbox">
                    <div class="form-check m-1">
                      <input class="form-check-input" type="checkbox" value="north" onclick="filter(this.value)" id="north-checkbox">
                      <label class="form-check-label" for="north-checkbox">North</label>
                    </div>
                    <div class="form-check m-1">
                      <input class="form-check-input" type="checkbox" value="north-east" onclick="filter(this.value)" id="north-east-checkbox">
                      <label class="form-check-label" for="north-east-checkbox">North-East</label>
                    </div>
                    <div class="form-check m-1">
                      <input class="form-check-input" type="checkbox" value="central" onclick="filter(this.value)" id="central-checkbox">
                      <label class="form-check-label" for="central-checkbox">Central</label>
                    </div>
                    <div class="form-check m-1">
                      <input class="form-check-input" type="checkbox" value="east" onclick="filter(this.value)" id="east-checkbox">
                      <label class="form-check-label" for="east-checkbox">East</label>
                    </div>
                    <div class="form-check m-1">
                      <input class="form-check-input" type="checkbox" value="west" onclick="filter(this.value)" id="west-checkbox">
                      <label class="form-check-label" for="west-checkbox">West</label>
                    </div>
                    </div>
                  </div>
              </div>
            </div>
            <!-- <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample">
              Event Options
            </button>
            <div class="collapse" id="collapseExample4">
              <div class="card card-body">
                <div style="display: flex; align-items: center;">
                  <input type="checkbox" value="" id="fullCheckbox" onclick="filter(this.value)">
                  <label class="ps-2" for="fullCheckbox" style="font-weight: bold; font-size: 20px; ">
                    Include Fully Filled
                  </label>
                </div>
                <div style="display: flex; align-items: center;">
                  <input type="checkbox" value="" id="pastEventsCheckbox" onclick="filter(this.value)">
                  <label class="ps-2" for="pastEventsCheckbox" style="font-weight: bold; font-size: 20px; ">
                      Include Past Events
                  </label>
                </div>
              </div>
            </div> -->
   
            
            

          </div>
        </div>

          <!-- past events -->
        <!-- <div class="col-2">
          <div style="display: flex; align-items: center;">
            <input type="checkbox" value="" id="fullCheckbox" onclick="filter(this.value)">
            <label class="ps-2" for="fullCheckbox" style="font-weight: bold; font-size: 20px; ">
                Include Fully Filled
            </label>
          </div>
        </div> -->

        <!-- past events -->
        <!-- <div class="col-2">
            <div style="display: flex; align-items: center;">
                  <input type="checkbox" value="" id="pastEventsCheckbox" onclick="filter(this.value)">
                  <label class="ps-2" for="pastEventsCheckbox" style="font-weight: bold; font-size: 20px; ">
                      Include Past Events
                  </label>
            </div>
        </div> -->
        <div class="col-md-3 col" style="text-align:right;">
              <div style="padding-right:10px;">
                  <input type="checkbox" value="" id="fullCheckbox" onclick="filter(this.value)">
                    <label class="ps-2" for="fullCheckbox" style="font-weight: bold; font-size: 15px; ">
                      Include Fully Filled
                    </label>
              </div>
        </div>
        <div class="col-md-3 col" style="text-align:left;">
          <div style="padding-right:10px;">
              <input type="checkbox" value="" id="pastEventsCheckbox" onclick="filter(this.value)">
              <label class="ps-2" for="pastEventsCheckbox" style="font-weight: bold; font-size: 15px; ">
                  Show Past Events
              </label>
          </div>
        </div>
      </div> 
      <div class="row">
        <div id="resultCount" style="padding-top:10px;font-style:italic;color:darkgreen;"></div>
        <div class="col">
          <div class="bg-light">
            <div class="album py-3 bg-light">
              <!--div class="album py-5 bg-light"-->
                <div class="container">
                  <!-- change here -->
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3" id="events">
                  <!-- div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" -->
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
        

      <!-- accordion filter -->
      <!-- <div class="row"> -->
        <!-- <div class="col-2 d-none d-lg-block">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Event Date Range
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="row filterHead text-center m-auto">Start Date:</div>
                  <div class="row">
                    <input type="date" class="form-control" name="eventDate" id="eventDate" onchange="filter(this.value)">
                  </div>

                  <div class="row filterHead text-center pt-2 m-auto">End Date:</div>
                  <div class="row">
                    <input type="date" class="form-control" name="eventDateTo" id="eventDateTo" onchange="filter(this.value)">
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Event Category
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="row">
                    <div class="filter-container" id="category-checkbox">
                      <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" value="Workshop" onclick="filter(this.value)" id="workshop-checkbox">
                        <label class="form-check-label" for="workshop-checkbox">Workshop</label>
                      </div>
                      <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" value="Cleanup" onclick="filter(this.value)" id="cleanup-checkbox">
                        <label class="form-check-label" for="cleanup-checkbox">Cleanup</label>
                      </div>
                      <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" value="Education" onclick="filter(this.value)" id="education-checkbox">
                        <label class="form-check-label" for="education-checkbox">Education</label>
                      </div>
                      <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" value="Harvest" onclick="filter(this.value)" id="harvest-checkbox">
                        <label class="form-check-label" for="harvest-checkbox">Harvest</label>
                      </div>
                      <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" value="Leisure" onclick="filter(this.value)" id="leisure-checkbox">
                        <label class="form-check-label" for="leisure-checkbox">Leisure</label>
                      </div>
                      <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" value="Others" onclick="filter(this.value)" id="others-checkbox">
                        <label class="form-check-label" for="others-checkbox">Others</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Location
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="row">
                    <div class="filter-container" id="region-checkbox">
                      <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" value="north" onclick="filter(this.value)" id="north-checkbox">
                        <label class="form-check-label" for="north-checkbox">North</label>
                      </div>
                      <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" value="north-east" onclick="filter(this.value)" id="north-east-checkbox">
                        <label class="form-check-label" for="north-east-checkbox">North-East</label>
                      </div>
                      <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" value="central" onclick="filter(this.value)" id="central-checkbox">
                        <label class="form-check-label" for="central-checkbox">Central</label>
                      </div>
                      <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" value="east" onclick="filter(this.value)" id="east-checkbox">
                        <label class="form-check-label" for="east-checkbox">East</label>
                      </div>
                      <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" value="west" onclick="filter(this.value)" id="west-checkbox">
                        <label class="form-check-label" for="west-checkbox">West</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
                  <!-- event list -->
        
        
        <!-- filter-->
        <!-- <div class="col-2">
          <div class="row">
            <input type="date" class="form-control" name="eventDate" id="eventDate" onchange="filter(this.value)">
          </div>

          <div class="row filterHead">Date To:</div>
          <div class="row">
            <input type="date" class="form-control" name="eventDateTo" id="eventDateTo" onchange="filter(this.value)">
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
        </div> -->
<!-- 
          event list
          <div class="col-10">
            <div class="bg-light"> -->

              <!-- <div class="album py-3 bg-light"> -->
                <!--div class="album py-5 bg-light"-->
                  <!-- <div class="container"> -->
                    <!-- change here -->
                    <!-- <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3" id="events"> -->
                    <!--div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"-->
                    <!-- </div>
                  </div>
                </div>
            </div>
          </div> -->
        <!-- </div>
      </div>
    </div> -->

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
          console.log("AA")
          if(document.getElementById("pastEventsCheckbox").checked){
            pastEvents = "1";
          }else{
            pastEvents = "0";
          }

          if(document.getElementById("fullCheckbox").checked){
            full = "1";
          }else{
            full = "0";
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
          eventDateTo = document.getElementById("eventDateTo").value;
          searchKey = document.getElementById("search").value;

          url = "MySQL/Event.php?type=getAllEvents&key=" + searchKey + "&regions=" + selectedRegions + "&categories=" + selectedcategories + "&eventDate=" + eventDate + "&eventDateTo=" + eventDateTo + "&pastEvents=" + pastEvents + "&full=" + full;
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
                      <a href="GeneralEventPage.php?eventId=${eventId}&pastEvents=${pastEvents}&gardenId=${gardenId}"><img class="card-img-top" src="${photo}"></a>
                      <div class="card-body">
                        <a href="GeneralEventPage.php?eventId=${eventId}&pastEvents=${pastEvents}&gardenId=${gardenId}" class="text-decoration-none text-dark">
                          <h4 class='title-style'>${eventTitle}</h4>
                          <p class="card-text"><img src="../public/images/calendar.svg" class="pe-1">${eventDate}<br>${startTime}-${endTime}</p>
                          <p><span class='title-style'><img src="../public/images/location pin.svg" class="pe-1">${gardenName}</span></p>
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
          // pull messages every 1 second
          window.setInterval(filter, 3000);

          // pull messages every 1 second
          window.setInterval(filter, 3000);
          
      </script>
      <script>
          var loader = document.getElementById("preloader");
          window.addEventListener("load", function(){
            setTimeout(() => {
              loader.style.display = "none";
            }, 1500);
          });
          $(document).ready(function(){
            $('.btn').click(function(){
              $('.collapse').collapse('hide');
            });
          });
      </script>


      <!-- Bootstrap JS bundle to be placed before the closing </body> tag -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      
    </body>
</html>