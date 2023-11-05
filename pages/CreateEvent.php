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

            </style>

            <!-- title -->
            <title>Create An Event</title>
            
        </head>

        <?php
          // create event into MySQL
          session_start();
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

            // Check if any fields are empty
            if (!document.getElementById("eventTitle").value || !document.getElementById("category").value || !document.getElementById("eventDate").value || !document.getElementById("startTime").value || !document.getElementById("endTime").value || !document.getElementById("noOfSlots").value || !document.getElementById("about").value) {
              check = false;
              msg += "Please fill in all fields.\n";
            }

            // create a new Date object
            var today = new Date();

            // get the individual components of the date (year, month, day)
            var year = today.getFullYear();
            var month = today.getMonth() + 1; // Note that months are zero-based (0 for January)
            var day = today.getDate();

            // format the date as a string (e.g., "YYYY-MM-DD")
            var formattedDate = year + "-" + (month < 10 ? "0" : "") + month + "-" + (day < 10 ? "0" : "") + day;

            // verify if the event date is not earlier than today
            if (document.getElementById("eventDate").value <= formattedDate) {
              check = false;
              msg += "Event date cannot be earlier than today.\n";
            }

            // verify if the start time is more recent than the end time
            var startTime = document.getElementById("eventDate").value + " " + document.getElementById("startTime").value;
            var endTime = document.getElementById("eventDate").value + " " + document.getElementById("endTime").value;

            // Compare the Date objects to check if start time is earlier than end time
            if (startTime >= endTime) {
              check = false;
              msg += "End Time must be after Start Time.\n";
            }

            if (!check) {
              alert(msg);
            }else{
              alert("Good");
            }

            return false;

          }

        </script>

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

              <!-- start the form for creating event -->
              <div class="container-fluid">
                <div class="p-5 mb-5 ">

              <h3 class="text-center"><strong>Create An Event</strong></h3>
              <p class="text-center pb-4">Need some inspiration before starting your own? <a href="JoinAnEvent.php">Join an Event!</a></p>
              <form id="CreateEventDetails" method="post" onsubmit="return validateForm()">
                <div class="mb-3">
                  <label for="eventTitle" class="form-label">Event Title</label>
                  <input type="text" class="form-control" name="eventTitle" id="eventTitle" aria-describedby="eventTitle">
                </div>
                <div class="mb-3">
                  <label for="category" class="form-label">Event Category</label>
                  <select class="form-select" aria-label="Default select example" name="category">
                      <option value="Workshop">Workshop</option>
                      <option value="Cleanup">Cleanup</option>
                      <option value="Education">Education</option>
                      <option value="Harvest">Harvest</option>
                      <option value="Leisure">Leisure</option>
                      <option value="Others">Others</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="eventDate" class="form-label">Date</label>
                    <input type="date" class="form-control" name="eventDate" id="eventDate">
                  </div>
                  <div class="mb-3">
                    <label for="startTime" id="starttiming" class="form-label">Start Time</label>
                    <input type="time" class="form-control" name="startTime" id="startTime">
                  </div>
                  <div class="mb-3">
                    <label for="endTime" id="endtiming" class="form-label">End Time</label>
                    <input type="time" class="form-control" name="endTime" id="endTime">
                  </div>
                  <div class="mb-3">
                    <label for="noOfSlots" class="form-label">No. of slots</label>
                    <input type="number" class="form-control" name="noOfSlots" id="noOfSlots" min=0 max=50>
                  </div>
                  <div class="mb-3">                    
                    <label for="about" class="form-label">About This Event</label>
                    <textarea id="about" name="about" class="form-control" rows="4" cols="50"></textarea>
                  </div>
                <button type="submit" name="submit" class="btn text-white">Create Event</button>
              </form>
              </div>
              </div>

            <script>
               function required(inputText){
                // verify if any fields are empty 
                  if (inputText.value.length == 0)
                    { 
                      alert("Please fill in all fields");  	
                      return false; 
                    }  	
                    return true; 
               } 
              </script>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
      </body>
    </html>