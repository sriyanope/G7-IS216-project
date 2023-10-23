<!doctype html>
    <html lang="en">
    <?php session_start() ?>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="...PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <!-- <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet"> -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Outfit:wght@700&display=swap" rel="stylesheet">
            <!-- CSS stylesheet -->
            <link rel="stylesheet" href="/style.css">
            <!-- photo editing css animation CDN-->
            <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" /> -->

            <style>
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
                    @media screen and (max-width:540px){
                .centerOnMobile {
                        text-align:center
                    }
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

                .profileName{
                    /* font-size: 70px; */
                    /* font-weight: 700px; */
                    /* line-height: 100%; */
                    font-family: 'Outfit', sans-serif;
                    font-size:70px;
                    margin-top:10px;
                    /* width: 649px;
                    height: 129px; */
                    /* text-align: center; */
                    /* padding-left:200px */
                    
                    
                }
                .profilePhotoFrame{
                    position:relative;
                    height: 200px;
                    overflow:hidden;
                    border-radius: 50%;

                }
                .editProfileimg{  
                    margin-right: 3px;
                    width:25px;
                    height:25px;
                }
               
                .byline{
                    font-size: 18px;
                    margin-top: 10px;
                    color:grey;
                }
                .featureTitle{
                    font-family: 'Orelega One', sans-serif;
                    /* position: */
                    margin-top: 40px;

                }
                .bio{
                    color: grey;
                    border-radius: 10px;
                }
                .col-centered{
                    margin: 0 auto;
                    float:none;
                    
                }
                .f-field{
                    background-color: #d8dfd1;
                    border: 2px, solid, black;
                }
                .social-media{
                    /* margin-top:2px; */
                    list-style-type: none;
                    padding-left:4px;
                }
                .social-img{
                    width:30px;
                    height:30px;
                    padding-right: 2px;
                }
                .social-link{
                    padding-left: 1rem;
                }
                
            

            </style>

            <title>Edit Profile Page</title>
            
        </head>
        <body>
          <nav class="navbg navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm">

            <div class="container m-0" style="flex-wrap: wrap; margin: 0;">
              <img src="../logo.png" alt="Logo" width="80" height="50" class="col-1 me-0">
              <a class="navbar-brand me-auto m-1" href="LandingPage.html"> <strong>ECOmmunity</strong></a>
              <button class="navbar-toggler align-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-family: 'Outfit', serif;">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item ms-auto mt-1">
                    <a class="nav-link mx-2" href="#"><i class="about"></i> About</a>
                  </li>
                  <li class="nav-item ms-auto mt-1">
                    <a class="nav-link mx-2" href="JoinAnEvent.html"><i class="events"></i> Events</a>
                  </li>
                  <li class="nav-item ms-auto mt-1">
                    <a class="nav-link mx-2" href="FindAGarden.html"><i class="findAGarden"></i> Find A Garden</a>
                  </li>
                  <li class="nav-item ms-auto mt-1">
                    <a href="Profile.php">
                        <button class="btn btn-success text-white" href="Profile.html">
                            <img src="../icons.png" width="30">
                            My Profile
                        </button>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <div class="container-fluid">
            <div class="row">
                <div class="text-center mt-4">
                    <img id="profilePicture" src="../public/images/defaultProfile.jpg" alt="Profile Picture" class="profilePhotoFrame">
                    <input type="file" id="imageInput" style="display: none">
                </div>
                <div class="text-center mt-2">
                    <button id="changePicture" class="btn btn-success rounded ">Change Picture</button>
                </div>
            </div>
           
            
            <div class="row">
                <div class="form-group">
                    <!-- Edit Name -->
                    <div class="col-sm-6 col-centered">
                        <h2 class="featureTitle">Name:</h2>
                    </div>
                    <div class="col-sm-6 col-centered">
                        <input type="text" class="form-control f-field" name="fname" id="fullName" Placeholder="This name will be displayed for all users to see" >
                    </div>

                    <!-- Edit ByLine -->
                    <div class="col-sm-6 col-centered">
                        <h2 class="featureTitle">Byline:</h2>
                    </div>
                    <div class="col-sm-6 col-centered needs-validation">
                        <input type="text" class="form-control f-field" name="byline" id="byline" Placeholder="A quirky one liner about yourself" >
                    </div>

                    <!-- Edit DOB -->
                    <div class="col-sm-6 col-centered">
                        <h2 class="featureTitle">Date of Birth:</h2>
                    </div>
                    <div class="col-sm-6 col-centered">
                        <input type="date" class="form-control f-field" id="dob" onchange="getAge()">
                        <br>
                        <p id="age"> Your age is: </p>
                    </div>

                    <!-- Edit Email -->
                    <div class="col-sm-6 col-centered">
                        <h2 class="featureTitle">Email:</h2>
                    </div>
                    <div class="col-sm-6 col-centered">
                        <input type="email" class="form-control f-field" name="email" id="email" Placeholder="ilovetrees@email.com" >
                    </div>

                    <!-- Edit Bio -->
                    <div class="col-sm-6 col-centered">
                        <h2 class="featureTitle">Bio:</h2>
                    </div>
                    <div class="col-sm-6 col-centered">
                         <div class="mb-3"> 
                             <textarea class="form-control f-field" id="bio" rows="5" col="70"></textarea> 
                         </div> 
                        
                    </div>

                    <!-- Edit Social Media -->
                    <div class="col-sm-6 col-centered">
                        <h2 class="featureTitle">Socials:</h2>
                    </div>
                    <div class="col-sm-6 col-centered">
                        <div class="card ">
                            <div class="card-body" style="background-color: #d8dfd1;">
                                <ul class="social-media">
                                    <div class="row">
                                        <div class="col">
                                            <li>
                                                <img src="../public/images/instagram.png" class="social-img">
                                                <div class="col-5 d-inline-block m-auto">
                                                    <label for="instagram"></label>
                                                    <input
                                                        type="text"
                                                        class="form-control d-inline-block mx-auto"
                                                        name="instagram" placeholder="https://instagram.com/username"/> 
                                                </div>
                                            </li>
                                        </div>
                                        

                                    </div>
                                   
                                    <li>
                                        <img src="../public/images/linkedin.png" class="social-img">
                                        <div class="col-5 d-inline-block m-auto">
                                            <label for="Linkedin"></label>
                                            <input
                                                type="text"
                                                class="form-control d-inline-block mx-auto"
                                                name="Linkedin" placeholder="https://www.linkedin.com/in/username"/> 
                                        </div>
                                    </li>
                                    <li>
                                        <img src="../public/images/telegram.png" class="social-img">
                                        <div class="col-5 d-inline-block m-auto">
                                            <label for="telegram"></label>
                                            <input
                                                type="text"
                                                class="form-control d-inline-block mx-auto"
                                                name="telegram" placeholder="@username"/> 
                                        </div>
                                    </li>
                                    
                                </ul>
                              
                            </div>
                          </div>
                    </div>

                    <!-- Save Edit buttons -->
                    <div class="col-sm-6 col-centered mt-5 text-center">
                        <button class="btn btn-success" type="submit" onclick="updateUserProfile()">Save Edits</button>
                    </div>
                    
                    
                    
                </div>
                
            </div>

          </div>

                    
        </div>
        </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="...HUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        </body>
        <script>
            var username = <?php echo $_SESSION['username'] ?>;

            url = "MySQL/User.php?type=getUser&username=" + username;
            fetch(url)
              .then(response => {
                  if (!response.ok) {
                      throw new Error('Network response was not ok');
                  }
                  return response.json();
              })
              .then(data => {
                console.log(data.user);
                document.getElementById("fullName").value = data.user[0].fullName;
                document.getElementById("email").value = data.user[0].email;
                document.getElementById("bio").value = data.user[0].bio;
              })
              .catch(error => {
                  console.error('Error:', error);
              });

            
              function updateUserProfile() {
                let fullName = document.getElementById("fullName").value;
                let byline = document.getElementById("byline").value;
                let dob = document.getElementById("dob").value;
                let email = document.getElementById("email").value;
                let bio = document.getElementById("bio").value;
                url = "MySQL/User.php?type=updateUser&username=" + username + "&fullName=" + fullName + "&email=" + email + "&age=12" + "&bio=" + bio;
                fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response
                })
                .then(data => {
                })
                .catch(error => {
                    console.error('Error:', error);
                });
              }

            // document.getElementsByName("bday")[0].addEventListener("keypress", submitBday())
            // function submitBday(){
            //     // ageNum = ""
            //     row = "";
            //     var row = "Your age is: "
            //     var bday = document.getElementsByName("bday")[0].value
            //     bDate = new Date(bday);
            //     // ageNum = String(~~ (Date.now() - bDate)/ (31557600000))
            //     // var ageDay = document.getElementById("age");
            //     // age.innerHTML = row + ageNum;
            //     row += ~~((Date.now() - bday) / (31557600000));
            //     var ageNum = document.getElementById('age');
            //     ageNum.innerHTML = row;
                
            //     // console.log(document.getElementsByName("bday")[0]);
            //     // return document.getElementsByName("bday")[0].innerText += row;

            // }

            let input = document.getElementById('dob');

            input.addEventListener('input', function() {
                getAge(input.value)
            })
            function getAge(dateString){
                age = "";
                var today = new Date();
                var birthDate = new Date(dateString);
                var age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate()) && age != NaN) {
                    age--;
                }
                document.getElementById('age').innerHTML += String(age);
                
            }




            // TRIAL CODE FOR FORM VALIDATION

            // var forms = document.querySelectorAll('.needs-validation')
            // Array.prototype.slice.call(forms)
            // .forEach(function (form) {
            //     form.addEventListener('submit', function (event) {
            //     if (!form.checkValidity()) {
            //         event.preventDefault()
            //         event.stopPropagation()
            //     }

            //     form.classList.add('was-validated')
            //     }, false)
            // })


            // for the profile picture upload!! DO NOT DELETE!!!! // !!!!

            /*
                Create the XMLHttpRequest object
                Set the desired HTTP request method
                Create the response handler function
                Send the request by calling the open() method on the XMLHttpRequest object
                Process the response by calling the responseXML property of the XMLHttpRequest object
                Close the XMLHttpResponse object
                Handle any errors that may occur during the process
                Check the response status code to determine whether the request was successful or not.
            */

            document.addEventListener("DOMContentLoaded", function () {
                // Get the necessary elements
                const changePictureButton = document.getElementById("changePicture");
                const imageInput = document.getElementById("imageInput");
                const profilePicture = document.getElementById("profilePicture");

                // Add an event listener to the button
                changePictureButton.addEventListener("click", () => {
                    imageInput.click();
                });

                // Add an event listener to the file input to handle the selected image
                imageInput.addEventListener("change", () => {
                    const selectedImage = imageInput.files[0];

                    if (selectedImage) {
                        const formData = new FormData();
                        formData.append("profileImage", selectedImage);

                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "upload.php", true);

                        xhr.onload = function () {
                            if (xhr.status === 200) {
                                // Update the profile picture with the uploaded image
                                profilePicture.src = xhr.responseText;
                            }
                        };

                        xhr.send(formData);
                    }
            });
                
            });

            



        </script>
    </html>