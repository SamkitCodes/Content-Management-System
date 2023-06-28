<?php
session_start();

if(!(isset($_SESSION["login"]) && $_SESSION["login"] === true)){
    header('Location: signin.php');
    exit;

}

else{
// //Making connection with the database
// require_once 'serverlogin.php';
// //Making the connection with the database
// $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database, 8889);
// mysqli_select_db($conn, $db_database)
// or die("Unable to select database: ");
// //SQL query to extract information from database
// $myquery = "SELECT *  FROM  artists
// WHERE ArtistID = '{$_SESSION['ArtistID']}'" ;
// $result = mysqli_query ($conn,$myquery); //query database
// if ($result->num_rows > 0) {//see anything is returned back
//     while ($row = $result->fetch_assoc()) {
        $artistname = $_SESSION['ArtistID'];                                                 
    }
// }
// }


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <!-- Changed the title of the page -->
        <title>Art by You</title>
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
                            <?php
                            
                            $output = <<<HTML
                            <h1 class="fw-bolder">$artistname Upload New Art</h1>


                            HTML;
                            echo $output;

                            ?>
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


                                <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="post" action = "post.php">
                                    
                                    <!-- Art title input -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="title" type="text" placeholder="Enter your title..." data-sb-validations="required" name = "title" />
                                        <label for="title">Art Title</label>
                                        <div class="invalid-feedback" data-sb-feedback="title:required">A title is required.</div>
                                    </div>
                                    <!-- Theme input -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="theme" type="text" placeholder="Enter your theme..." data-sb-validations="required" name = "theme"/>
                                        <label for="theme">Theme</label>
                                        <div class="invalid-feedback" data-sb-feedback="theme:required">A theme is required.</div>
                                    </div>
                                    <!-- File name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="file" type="text"  placeholder="Enter your file..." data-sb-validations="required" name = "file"/>
                                        <label for="file">File Name</label>
                                        <div class="invalid-feedback" data-sb-feedback="file:required">A file is required.</div>
                                    </div>
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button></div>

                                    

                                    <?php
                                    

                                    

                                    // Storing the input from the files in variables
                                    if (isset($_POST['title']) && isset($_POST['theme']) && isset($_POST['file'])) {
                                        if(empty($_POST['title'])!='Submit' && empty($_POST['theme'])!='Submit' && empty($_POST['file'])!='Submit'){
                                            $title = $_POST['title'];
                                            $theme = $_POST['theme'];
                                            $file = $_POST['file'];
                                            $file = "files\\$theme\\$file";


                                            //Making the connection with the database
                                            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database, 8889);
                                            mysqli_select_db($conn, $db_database)
                                            or die("Unable to select database: ");
                                            //SQL query to extract information from database
                                            $myquery = "SELECT DISTINCT ThemeID FROM  themes
                                            WHERE Theme = \"$theme\"";
                                            $result = mysqli_query ($conn,$myquery); //query database
                                            if ($result->num_rows > 0) {//see anything is returned back
                                                while ($row = $result->fetch_assoc()) {
                                                    $artTheme = $row["ThemeID"];                                                 
                                                }
                                            }
                                            else {
                                                //Making the prepare statement ot insert the data
                                                $statement = $conn->prepare("INSERT INTO themes (Theme, ThemeImage)
                                                VALUES (?, ?)");
                                                //Binding the values
                                                $statement->bind_param("ss", $theme, $file);
                                                //Executing the statement
                                                $statement->execute();

                                                // Getting the themeID after adding the theme to the table if not previously added
                                                $result = mysqli_query ($conn,$myquery); //query database
                                                while ($row = $result->fetch_assoc()) {
                                                    $artTheme = $row["ThemeID"]; 
                                                }
                                            }


                                            // Getting the artistID
                                            $myquery = "SELECT DISTINCT ArtistID FROM artists
                                            WHERE Name = \"$artistname\"";
                                            $result = mysqli_query ($conn,$myquery); //query database
                                            if ($result->num_rows > 0) {//see anything is returned back
                                                while ($row = $result->fetch_assoc()) {
                                                    $artistID = $row["ArtistID"];                                                
                                                }
                                            }
                                            


                                            


                                        //Making the prepare statement ot insert the data
                                        $statement = $conn->prepare("INSERT INTO artwork (Title, ArtImage, ThemeID, ArtistID)
                                        VALUES (?, ?, ?, ?)");

                                        //Binding the values
                                        $statement->bind_param("ssss", $title, $file, $artTheme, $artistID);



                                        //Executing the statement
                                        $statement->execute();

                                        //Closing the connection
                                        $conn->close();
                                        
                                        }
                                    }


                                    ?>



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