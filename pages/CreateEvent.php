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
            $eventDate = $_POST['eventDate'];
            $startTime = $_POST['startTime'];
            $endTime = $_POST['endTime'];
            $noOfSlots = $_POST['noOfSlots'];
            $about = $_POST['about'];
         
            $sql = "insert into event (eventTitle, category, eventDate, startTime, endTime, noOfSlots, filled, about, createdDate, username, gardenId) values (:eventTitle, :category, :eventDate, :startTime, :endTime, :noOfSlots, 0, :about, CURDATE(), :username, :gardenId);";

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
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':gardenId', $gardenId, PDO::PARAM_INT);

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            
            $stmt = null;
            $pdo = null;

            header("location: MyEvents.php");
          }
        ?>

<script>
  function validateForm() {
    var msg = "";
    var check = true;
    var eventTitle = document.getElementById("eventTitle").value;
    var category = document.getElementById("category").value;
    var eventDate = document.getElementById("eventDate").value;
    var startTime = document.getElementById("startTime").value;
    var endTime = document.getElementById("endTime").value;
    var noOfSlots = document.getElementById("noOfSlots").value;
    var location = document.getElementById("location").value;
    var about = document.getElementById("about").value;
    var photos = document.getElementById("UploadEventPicture").value;

    // Check if any fields are empty
    if (!eventTitle || !category || !eventDate || !startTime || !endTime || !noOfSlots || !location || !about || !photos) {
      check = false;
      msg += "Please fill in all fields.\n";
    }

    const date1 = new Date(eventDate + "T" + startTime);
    const date2 = new Date(eventDate + "T" + endTime);

    // Verify if the start time is more recent than the end time
    if (date1.getTime() >= date2.getTime()) {
      check = false;
      msg += "End Time must be after Start Time.\n";
    }

    const today = new Date();
    today.setHours(0, 0, 0, 0);
    const selectedEventDate = new Date(eventDate);

    // Verify if the event date is not earlier than today
    if (selectedEventDate.getTime() < today.getTime()) {
      check = false;
      msg += "Event date cannot be earlier than today.\n";
    }

    if (!check) {
      alert(msg);
    }

    return check;
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
                      <option value="Garden Workday">Garden Workday</option>
                      <option value="Education">Education</option>
                      <option value="Harvest">Harvest</option>
                      <option value="Leisure">Leisure</option>
                      <option value="Leisure">Others</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="eventDate" id="eventDate" class="form-label">Date</label>
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
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" name="location" id="location">
                  </div>
                  <div class="mb-3">                    
                    <label for="about" class="form-label">About This Event</label>
                    <textarea id="about" name="about" class="form-control" rows="4" cols="50"></textarea>
                  </div>
                  <div class="input-group mb-3">
                    <label class="form-label pe-3" for="UploadEventPicture">Add Pictures</label><br>
                    <input type="file" class="form-control d-block" id="UploadEventPicture">
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