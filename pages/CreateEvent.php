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
            <!--Vue-->
            <script src="https://unpkg.com/vue@next"></script>
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
                  }

                  .required::after {
                    content: ' *';
                    color: red;
                  }

            </style>

            <!-- title -->
            <title>Create An Event</title>
            
        </head>

        <?php
          // create event into MySQL
          $username = $_SESSION['username'];
          
          spl_autoload_register(
            function ($class){
                require_once  "MySQL/$class.php";
            });

          $location = $_GET['gardenName'];
          $gardenId = $_GET['gardenId'];

          if(isset($_POST['submit'])){
            $eventTitle = $_POST['eventTitle'];
            $category = $_POST['category'];

            if($category == "Workshop"){
              $photo = "EventImage/Workshop.png";
            }else if($category == "Cleanup"){
              $photo = "EventImage/Cleanup.png";
            }else if($category == "Education"){
              $photo = "EventImage/Education.png";
            }else if($category == "Harvest"){
              $photo = "EventImage/Harvest.png";
            }else if($category == "Leisure"){
              $photo = "EventImage/Leisure.png";
            }else if($category == "Others"){
              $photo = "EventImage/Others.png";
            }

            $eventDate = $_POST['eventDate'];
            $startTime = $_POST['startTime'];
            $endTime = $_POST['endTime'];
            $noOfSlots = $_POST['noOfSlots'];
            $about = $_POST['about'];

            $sql = "insert into event (eventTitle, category, eventDate, startTime, endTime, noOfSlots, filled, about, photo, createdDate, username, gardenId) values (:eventTitle, :category, :eventDate, :startTime, :endTime, :noOfSlots, 0, :about, :photo, CURDATE(), :username, :gardenId);";

            $connMgr = new ConnectionManager();
            $pdo = $connMgr->getConnection();
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':eventTitle', $eventTitle, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':eventDate', $eventDate, PDO::PARAM_STR);
            $stmt->bindParam(':startTime', $startTime, PDO::PARAM_STR);
            $stmt->bindParam(':endTime', $endTime, PDO::PARAM_STR);
            $stmt->bindParam(':noOfSlots', $noOfSlots, PDO::PARAM_INT);
            $stmt->bindParam(':about', $about, PDO::PARAM_STR);
            $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':gardenId', $gardenId, PDO::PARAM_INT);

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            if ($stmt){
              $stmt = null;
              $pdo = null;
              header("location: MyEvents.php");
            }
            
          }

        ?>

        <script>

            function validateForm() {
              var msg = "";
              var check = true;

              var eventTitle = document.getElementById("eventTitle").value;
              var eventDate = document.getElementById("eventDate").value;
              var startTime = document.getElementById("startTime").value;
              var endTime = document.getElementById("endTime").value;
              var noOfSlots = document.getElementById("noOfSlots").value;
              var about = document.getElementById("about").value;

              if (eventTitle.length < 5) {
                check = false;
              }

              if (eventDate.length === 0) {
                check = false;
              } else {
                // Create a new Date object for today
                var today = new Date();
                // Create a Date object for the selected event date
                var selectedDate = new Date(eventDate);

                // Verify if the event date is earlier than today
                if (selectedDate <= today) {
                  check = false;
                }
              }

              if (startTime.length === 0 || endTime.length === 0) {
                check = false;
              } else {
                // Verify if the start time is more recent than the end time
                var startTimeDate = new Date(eventDate + " " + startTime);
                var endTimeDate = new Date(eventDate + " " + endTime);

                if (startTimeDate >= endTimeDate) {
                  check = false;
                }
              }

              if (noOfSlots.length === 0) {
                check = false;
              }

              if (about.length < 10) {
                check = false;
              }

              if (!check) {
                document.getElementById("submit").setAttribute("class", "btn btn-secondary text-white disabled");
                return false;
              }

                document.getElementById("submit").setAttribute("class", "btn btn-success text-white");
                return true;
            }

        </script>


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

            <!-- start the form for creating event -->
            <div class="container">
              <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                  <div class="p-5 mb-5 ">

                    <h3 class="text-center"><strong>Create An Event</strong></h3>
                    <p class="text-center pb-4">Need some inspiration before starting your own? <a href="JoinAnEvent.php">Join an Event!</a></p>
                    <form id="CreateEventDetails" method="post">
                      <div class="mb-3" id="appEventTitle">
                        <label for="eventTitle" class="form-label required">Event Title</label>
                        <input type="text" class="form-control" name="eventTitle" id="eventTitle" aria-describedby="eventTitle" onkeyup="validateForm()" v-model="eventTitle">
                        <span v-if="eventTitleCheck()" style="color:red;">Event title has to be at least 5 characters</span>
                      </div>
                      <div class="mb-3" id="appCategory">
                        <label for="category" class="form-label required">Event Category</label>
                        <select class="form-select" aria-label="Default select example" name="category" onkeyup="validateForm()" v-model="category">
                            <option value="Workshop">Workshop</option>
                            <option value="Cleanup">Cleanup</option>
                            <option value="Education">Education</option>
                            <option value="Harvest">Harvest</option>
                            <option value="Leisure">Leisure</option>
                            <option value="Others">Others</option>
                          </select>
                      </div>
                      
                      <div class="mb-3" id="appEventDate">
                        <label for="eventDate" class="form-label required">Date</label>
                        <input type="date" class="form-control" name="eventDate" id="eventDate" onkeyup="validateForm()" v-model="eventDate">
                        <span v-if="eventDateCheck()" style="color:red;">Event date has to be after today</span>
                      </div>
                      <div class="mb-3" id="appStartTime">
                        <label for="startTime" id="starttiming" class="form-label required">Start Time</label>
                        <input type="time" class="form-control" name="startTime" id="startTime" onkeyup="validateForm()" v-model="startTime">
                      </div>
                      <div class="mb-3" id="appEndTime">
                        <label for="endTime" id="endtiming" class="form-label required">End Time</label>
                        <input type="time" class="form-control" name="endTime" id="endTime" onkeyup="validateForm()" v-model="endTime">
                        <span v-if="endTimeCheck()" style="color:red;">End time cannot be earlier than start time</span>
                      </div>
                      <div class="mb-3" id="appSlots">
                        <label for="noOfSlots" class="form-label required">No. of slots</label>
                        <input type="number" class="form-control" name="noOfSlots" id="noOfSlots" min=0 max=50 onkeyup="validateForm()" v-model="slots">
                      </div>
                      <div class="mb-3" id="appAbout">
                        <label for="about" class="form-label required">About This Event</label>
                        <textarea id="about" name="about" class="form-control" rows="4" cols="50" onkeyup="validateForm()" v-model="about"></textarea>
                        <span v-if="aboutCheck()" style="color:red;">About has to be at least 10 characters</span>
                      </div>
                      <button type="submit" name="submit" id="submit" class="btn btn-secondary text-white disabled">Create Event</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <script>

              const appEventTitle = Vue.createApp({
                data(){
                  return {eventTitle: ""}
                },
                methods: {
                  eventTitleCheck() {
                    if(this.eventTitle.length > 0 && this.eventTitle.length < 5){
                      return true
                    }
                  }
                }
              }).mount('#appEventTitle');

              const appEventDate = Vue.createApp({
                data(){
                  return {eventDate: ""}
                },
                methods: {
                  eventDateCheck() {
                    // Create a new Date object for today
                    var today = new Date();
                    // Create a Date object for the selected event date
                    var selectedDate = new Date(this.eventDate);

                    // Verify if the event date is earlier than today
                    if (selectedDate <= today) {
                      return true;
                    }
                  }
                }
              }).mount('#appEventDate');

              const appEndTime = Vue.createApp({
                data(){
                  return {endTime: ""}
                },
                methods: {
                  endTimeCheck() {
                    var eventDate = document.getElementById("eventDate").value;
                    var startTime = document.getElementById("startTime").value;
                    // Verify if the start time is more recent than the end time
                    var startTimeDate = new Date(eventDate + " " + startTime);
                    var endTimeDate = new Date(eventDate + " " + this.endTime);
                    if (startTimeDate >= endTimeDate) {
                      return true;
                    }
                  }
                }
              }).mount('#appEndTime');

              const appAbout = Vue.createApp({
                data(){
                  return {about: ""}
                },
                methods: {
                  aboutCheck() {
                    if(this.about.length > 0 && this.about.length < 10){
                      return true
                    }
                  }
                }
              }).mount('#appAbout');

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