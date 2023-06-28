<?php
// Starting th session
session_start();

// Creating the account if the user submits the form
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Making connection with the database
    require_once "serverlogin.php";

    //Checking if the columns are filled
    if (isset($_POST["name"]) && isset($_POST["typeArtist"]) && isset($_POST["bio"]) && isset($_POST["image"]) && isset($_POST["username"]) && isset($_POST["password"]))
    {
        if (empty($_POST["name"]) != "Submit" && empty($_POST["typeArtist"]) != "Submit" && empty($_POST["bio"]) != "Submit" && empty($_POST["image"]) != "Submit" && empty($_POST["username"]) != "Submit" && empty($_POST["password"]) != "Submit")
        {
         $password = $_POST["password"];

            $errorMsg = NULL;

            $passwo = $_POST['password'];

            // Password conditions with appropriate error messages 
            if (!preg_match("/.{7,}/", $password))
            {
                $errorMsg = "Need atleast 7 characters.";
            }

            if (!preg_match("/[\W_]/", $password))
            {

                $errorMsg .= "<br>Need atleast 1 special character.";
            }

            if (!preg_match("/[A-Z]/", $password))
            {
                $errorMsg .= "<br>Not atleast 1 Capital Letter.";
            }

            if (!preg_match("/[0-9]/", $password))
            {
                $errorMsg .= "<br>Need atleast 1 number.";
            }

            // Moving forward if the password is correct
            if (empty($errorMsg))
            {
                $errorMsg = "Password Successful!";

                $name = $_POST["name"];
                $typeArtist = $_POST["typeArtist"];
                $bio = $_POST["bio"];
                $img = $_POST["image"];
                $img = "files\\artists\\$img";
                $username = $_POST["username"];

                // Hashing the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                //Making the connection with the database
                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database, 8889);
                mysqli_select_db($conn, $db_database) or die("Unable to select database: ");
                //SQL query to extract information from database
                $myquery = "SELECT * FROM signin
                         WHERE Username = \"$username\"";
                $result = mysqli_query($conn, $myquery); //query database
                if ($result->num_rows > 0)
                {
                    //see anything is returned back
                    while ($row = $result->fetch_assoc())
                    {
                        echo "Username is already in use";
                    }
                }
                else
                {
                    //Making the prepare statement ot insert the data
                    $statement = $conn->prepare("INSERT INTO artists (Name, ArtistImage, Type, Description)
                              VALUES (?, ?, ?, ?)");

                    //Binding the values
                    $statement->bind_param("ssss", $name, $img, $typeArtist, $bio);

                    //Executing the statement
                    $statement->execute();

                    $myquery2 = "SELECT ArtistID FROM artists
                              WHERE Name = \"$name\" AND Description = \"$bio\"";
                    $result2 = mysqli_query($conn, $myquery2); //query database
                    if ($result2->num_rows > 0)
                    {
                        //see anything is returned back
                        while ($row = $result2->fetch_assoc())
                        {
                            $artistID = $row["ArtistID"];
                        }

                        //Making the prepare statement ot insert the data
                        $statement = $conn->prepare("INSERT INTO signin (ArtistID, Username, Password)
                                 VALUES (?, ?, ?)");

                        //Binding the values
                        $statement->bind_param("sss", $artistID, $username, $hashed_password);

                        //Executing the statement
                        $statement->execute();

                        //SQL query to extract information from database
                        $myquery = "SELECT * FROM  signin
                                WHERE Username = \"$username\"";
                        $result = mysqli_query($conn, $myquery); //query database
                        if ($result->num_rows > 0)
                        {
                            //see anything is returned back
                            while ($row = $result->fetch_assoc())
                            {
                                $artistPass = $row["Password"];
                                if (password_verify($password, $hashed_password))
                                {
                                    // Setting the session variables
                                    $_SESSION["username"] = $username;
                                    $_SESSION["password"] = $password;
                                    $_SESSION["UserID"] = $row["UserID"];
                                    $_SESSION["ArtistID"] = $row["ArtistID"];
                                    $_SESSION["login"] = true;
                                    header("Location: post.php");
                                    exit();
                                }
                            }
                        }
                    }

                    $conn->close();
                }
            }
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
      <title>Create a new account</title>
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
                     <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
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
                     <h1 class="fw-bolder">Create a new account</h1>
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
                              <input class="form-control" id="name" type="text" placeholder="Enter your name..."  data-sb-validations="required" name = "name"/>
                              <label for="name">Name</label>
                              <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                           </div>
                           <!-- Type of artist input-->
                           <div class="form-floating mb-3">
                              <input class="form-control" id="typeArtist" type="text" placeholder="Enter type of artist..."  data-sb-validations="required" name = "typeArtist"/>
                              <label for="typeArtist">Type of Artist</label>
                              <div class="invalid-feedback" data-sb-feedback="typeArtist:required">An type is required.</div>
                           </div>
                           <!-- Bio input -->
                           <div class="form-floating mb-3">
                              <input class="form-control" id="bio" type="text" placeholder="Enter a bio..."  data-sb-validations="required" name = "bio"/>
                              <label for="bio">Tell us about you</label>
                              <div class="invalid-feedback" data-sb-feedback="bio:required">An description is required.</div>
                           </div>
                           <!-- image input -->
                           <div class="form-floating mb-3">
                              <input class="form-control" id="image" type="text" placeholder="Enter file name...."  data-sb-validations="required" name = "image"/>
                              <label for="image">Upload an image of yourself</label>
                              <div class="invalid-feedback" data-sb-feedback="image:required">An image is required.</div>
                           </div>
                           <!-- username input -->
                           <div class="form-floating mb-3">
                              <input class="form-control" id="username" type="text" placeholder="Enter a username..." data-sb-validations="required" name = "username"/>
                              <label for="username">Create a username</label>
                              <div class="invalid-feedback" data-sb-feedback="username:required">An username is required.</div>
                           </div>
                           <!-- password input -->
                           <div class="form-floating mb-3">
                              <input class="form-control" id="password" type="password" placeholder="Enter a password..." data-sb-validations="required" name = "password"/>
                              <label for="password">Password</label>
                              <div class="invalid-feedback" data-sb-feedback="password:required">An password is required.</div>
                           </div>


                           <?php
                           echo $errorMsg;


                           ?>
                           <div class="d-grid"><button class="btn btn-primary btn-lg" id="submit" type="submit">Submit</button></div>
                        </form>
                     </div>
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
               <div class="col-auto">
                  <div class="small m-0 text-white">Copyright &copy; Your Website 2022</div>
               </div>
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