<?php
// Starting th session
    session_start();
    //Setting the error message to null at the start 
    $_SESSION["error"] = NULL;
    
    

    // Checking if the user is loged in
    if((isset($_SESSION["login"]) && $_SESSION["login"] === true)){
        header('Location: post.php');
        exit;

    }
    
    // Checking the username and password and loggin in the user if correct
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Making connection with the database
        require_once 'serverlogin.php';

                                    
        
        // Storing the input from the files in variables
        if (isset($_POST['name']) && isset($_POST['password'])) { 
            if(empty($_POST['name'])!='Submit' && empty($_POST['password'])!='Submit'){
            $username = trim($_POST["name"]);
            $password = trim($_POST["password"]);


             //Making the connection with the database
             $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database, 8889);
             mysqli_select_db($conn, $db_database)
             or die("Unable to select database: ");
             //SQL query to extract information from database
             $myquery = "SELECT * FROM  signin
             WHERE Username = \"$username\"";
             $result = mysqli_query ($conn,$myquery); //query database
             if ($result->num_rows > 0) {//see anything is returned back
                while ($row = $result->fetch_assoc()) {

                $artistPass = $row["Password"];  
                //Matching the passwords  
                if(password_verify($password, $artistPass)){
                    //Setting the session variables
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;
                    $_SESSION["UserID"] = $row["UserID"];
                    $_SESSION["ArtistID"] = $row["ArtistID"];
                    $_SESSION["login"] = true;
                    header('Location: post.php');
                    exit;
    
                 }
                 else{
                    $error =  "Sorry password is incorrect, please try again";
                    $_SESSION["error"] = $error;
                 }                                             
                }
             }
             else {
                $error =  "Username is incorrect, please try again";
                $_SESSION["error"] = $error;
             }

             



             $conn->close();

                


         }
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <!-- Changed the title of the page -->
        <title>Sign In</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <!-- Changed the heading of the page -->
                    <a class="navbar-brand" href="index.php">Art by You</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <!-- Changed the navigation bar of the page -->
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="artists.php">Artists</a></li>
                            <li class="nav-item"><a class="nav-link" href="collections_T.php">Collections</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Signin</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="Signin.php">Signin</a></li>
                                    <li><a class="dropdown-item" href="Signout.php">Signout</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                            <!-- Removed some sections -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <h1 class="fw-bolder">Sign In</h1>
                        </div>
                        <!-- Removed many inputs of the form and changed text of the remaining -->
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- * * SB Forms Contact Form * *-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- This form is pre-integrated with SB Forms.-->
                                <!-- To make this form functional, sign up at-->
                                <!-- https://startbootstrap.com/solution/contact-forms-->
                                <!-- to get an API token!-->
                                <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="post">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" name="name" />
                                        <label for="name">Username</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                    </div>
                                    <!-- email input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" type="password" placeholder="passw..." data-sb-validations="required" name ="password"/>
                                        <label for="password">Password</label>
                                        <div class="invalid-feedback" data-sb-feedback="password:required">An password is required.</div>                                    </div>
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button></div>

                                    <br><br>
                                    <?php
                            
                                    if(isset($_SESSION["error"])){
                                    echo $_SESSION["error"];

                                     }
                                    ?>
                                    <br><br><br>
                                </form>
                                <h5 class = "text-md-center" >Don't have an account?<br>Join now and start posting your artwork.</h5>
                                <a href=createAccount.php> <div class="d-grid"><button class="btn btn-primary btn-lg" id="createIDButton" type="createID">Create Account</button></div></a>
                        </div>
                        

                        

                    </div>
                </div>
            </section>


            <!-- Removed section after the form -->
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2022</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
