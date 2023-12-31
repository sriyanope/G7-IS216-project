<!doctype html>
    <html lang="en">
        <head>
            
            <?php
                require_once "MySQL/Protect.php";
            ?>
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
            <link rel="stylesheet" href="CSS/style.css">
            <!--Vue-->
            <script src="https://unpkg.com/vue@next"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


            <!-- styling -->
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
                
                @media screen and (max-width:900px){
                    .centerOnMobile {
                        text-align:center
                }}

                @media screen and (max-width: 331px) { 
                    .logo { 
                        display: none;
                }}

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
                    font-family: 'Outfit', sans-serif;
                    font-size:70px;
                    margin-top:10px;                    
                    
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

                .featureTitle{
                    font-family: 'Orelega One', sans-serif;
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

                .image-container {
                    display: flex;
                    flex-wrap: wrap;
                }

                .image-container img {
                    width: 150px;
                    margin-right: 10px;
                }
                .nav-link {
                    transition: all o.2s;
                }

                .nav-link:hover {
                    border-bottom: 2px solid #547D2E;
                }
                
            </style>

            <!-- title -->
            <title>Edit Profile Page</title>
            
        </head>
        <body>

            <!-- loading page -->
            <div id="preloader">
                <p>Loading...</p>
            </div>
            
            <!-- nav bar -->
            <nav class="navbg navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm">
                <div class="container-fluid m-0 p-0" style="flex-wrap: wrap; margin: 0;">
                    <img src="../public/images/logo.png" alt="Logo" style="width: 88px; height: 50px;" class="me-0 logo">
                    <a class="navbar-brand me-auto" href="index.html"> <strong>ECOmmunity</strong></a>
                    <button class="navbar-toggler align-content-center ms-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                
                    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-family: 'Outfit', serif;">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item ms-auto mt-1">
                                <a class="nav-link mx-2" href="index.html"><i class="about"></i> About</a>
                            </li>
                            <li class="nav-item ms-auto mt-1">
                                <a class="nav-link mx-2" href="JoinAnEvent.php"><i class="events"></i> Events</a>
                            </li>
                            <li class="nav-item ms-auto mt-1">
                                <a class="nav-link mx-2" href="FindAGarden.php"><i class="findAGarden"></i> Find A Garden</a>
                            </li>
                            <li class="nav-item ms-auto mt-1">
                                <a href="Profile.php"><button class="btn btn-success text-white" href="#">
                                    <img src="../public/images/icons.png" width="30">
                                <span id="profileBtnText">My Profile</span></button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- user profile -->
            <div class="container-fluid">
                <div class="row">
                    <div class="text-center mt-4">
                        <img src="../public/ProfileIcon.jpg" id="profilePhoto" style="width: 200px; height: 200px; margin-bottom:20px;" alt="Profile Picture" class="profilePhotoFrame">
                        
                    </div>
                    <div class="text-center mt-2">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" id="notificationBtn">Change Profile Photo</button>
                    </div>
                </div>

                <!-- modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Choose your new Profile Photo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="image-container justify-content-center">
                                    <img src="ProfileImage\1.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\2.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\3.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\4.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\5.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\6.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\7.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\8.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\9.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\10.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\11.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\12.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\13.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\14.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\15.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                    <img src="ProfileImage\16.png" style="margin-bottom:10px" onclick="updateProfilePhoto(this.src)" data-dismiss="modal">
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>

            
                <div class="row">
                    <div class="form-group">

                        <!-- username -->
                        <div class="col-sm-6 col-centered">
                            <h2 class="featureTitle">Username:</h2>
                        </div>
                        <div class="col-sm-6 col-centered">
                            <input type="text" class="form-control f-field" id="username" disabled>
                            <br>
                        </div>

                        <!-- full name -->
                        <div class="col-sm-6 col-centered">
                            <h2 class="featureTitle">Full Name:</h2>
                        </div>
                        <div class="col-sm-6 col-centered" id="appFullName">
                            <input type="text" class="form-control f-field" name="fname" id="fullName" Placeholder="This name will be displayed for all users to see" v-model="fullName1">
                            <span v-if="fullNameCheck()" style="color:red;">Full Name has to be at least 3 characters and does not contain spaces only</span>
                        </div>

                        <!-- gender -->
                        <div class="col-sm-6 col-centered">
                            <h2 class="featureTitle">Gender:</h2>
                        </div>
                        <div class="col-sm-6 col-centered">
                            <input type="text" class="form-control f-field" name="gender" id="gender" disabled >
                        </div>

                        <!-- email -->
                        <div class="col-sm-6 col-centered">
                            <h2 class="featureTitle">Email:</h2>
                        </div>
                        <div class="col-sm-6 col-centered" id="appEmail">
                            <input type="email" class="form-control f-field" name="email" id="email" Placeholder="ilovetrees@email.com" v-model="email1">
                            <span v-if="emailCheck()" style="color:red;" style="color:red;">Enter a valid email</span>
                        </div>



                        <!-- social media -->
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
                                                    <div class="col-9 d-inline-block m-auto">
                                                        <label for="instagram"></label>
                                                        <input
                                                            type="text"
                                                            class="form-control d-inline-block mx-auto"
                                                            name="instagram" placeholder="https://instagram.com/username"
                                                            id="instagram"/> 
                                                    </div>
                                                </li>
                                            </div>
                                            

                                        </div>
                                    
                                        <li>
                                            <img src="../public/images/telegram.png" class="social-img">
                                            <div class="col-9 d-inline-block m-auto">
                                                <label for="telegram"></label>
                                                <input
                                                    type="text"
                                                    class="form-control d-inline-block mx-auto"
                                                    name="telegram" placeholder="username"
                                                    id="telegram"/> 
                                            </div>
                                        </li>
                                        
                                    </ul>
                                
                                </div>
                            </div>
                        </div>

                        <!-- bio -->
                        <div class="col-sm-6 col-centered">
                            <h2 class="featureTitle">Bio:</h2>
                        </div>
                        <div class="col-sm-6 col-centered">
                            <div class="mb-3"> 
                                <textarea class="form-control f-field" id="bio" rows="5" col="70"></textarea> 
                            </div> 
                        </div>

                        <!-- save edit button -->
                        <div class="col-sm-6 col-centered mt-5 text-center">
                            <button class="btn btn-success" type="submit" onclick="updateUserProfile()">Save Edits</button>
                        </div>

                    </div> 
                </div>
            </div>

                    
            </div>
        </div>

        <div class="container m-5"></div>

        </body>

        <!-- javascript -->
        <script>

            // retrieve profile information from MySQL and populate page
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
                    document.getElementById("username").value = data.user[0].username;
                    document.getElementById("gender").value = data.user[0].gender;
                    document.getElementById("fullName").value = data.user[0].fullName;
                    document.getElementById("email").value = data.user[0].email;
                    document.getElementById("bio").value = data.user[0].bio;
                    document.getElementById("instagram").value = data.user[0].instagram;
                    document.getElementById("telegram").value = data.user[0].telegram;
                    document.getElementById("profilePhoto").setAttribute("src", data.user[0].profilePhoto);
                })
                .catch(error => {
                    console.error('Error:', error);
                });

            // function to update MySQL on edited profile information
            function updateUserProfile() {
                let fullName = document.getElementById("fullName").value;
                let email = document.getElementById("email").value;
                let bio = document.getElementById("bio").value;
                let instagram = document.getElementById("instagram").value;
                let telegram = document.getElementById("telegram").value;

                check = true;
                msg = "";
                if(fullName.length < 3){
                    check = false;
                    msg += "Full Name cannot contain less than 3 characters\n";
                }
                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                if(!emailPattern.test(email)){
                    check = false;
                    msg += "Email is not valid\n";
                }                    
                if(!check){
                    alert(msg);
                }else{

                    url = "MySQL/User.php?type=updateUser&fullName="+fullName+"&email="+email+"&bio="+bio+"&instagram="+instagram+"&telegram="+telegram;
                    fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response;
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });

                    window.location="Profile.php";
                }
            }



            // vue for input validation
            const appFullName = Vue.createApp({
                data(){
                    return {fullName1: ""}
                },
                methods: {
                    fullNameCheck() {
                    if(this.fullName1.length > 0 && (!/[^ ]/.test(this.fullName1) || this.fullName1.length < 3)){
                        return true
                    }
                    }
                }
                }).mount('#appFullName');

                const appEmail = Vue.createApp({
                data(){
                    return {email1: ""}
                },
                methods: {
                    emailCheck() {
                    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                    if (this.email1.length > 0 && !emailPattern.test(this.email1)) {
                        return true
                    }
                    }
                }
                }).mount('#appEmail');

                function updateProfilePhoto(link){
                    document.getElementById("profilePhoto").setAttribute("src", link);
                    url = "MySQL/User.php?type=updatePhoto&photo=" + link;
                    fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }

        </script>

        <script>

            var loader = document.getElementById("preloader");
            window.addEventListener("load", function(){
                setTimeout(() => {
                loader.style.display = "none";
                }, 800);
            });

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 

    </html>