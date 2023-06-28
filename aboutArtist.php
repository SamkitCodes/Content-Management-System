<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
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
                            </li>                            <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                            <!-- Removed some sections -->
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="py-5 bg-light" id="scroll-target">
                <div class="container px-5 my-5">

            

                    <?php
                    // Getting the artist name
                    $name = $_GET['title'];

                    //Making connection with the database
                    require_once 'serverlogin.php';

                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database, 8889);
                    mysqli_select_db($conn, $db_database)
                    or die("Unable to select database: ");
                    //SQL query to extract information from database
                    $myquery = "SELECT * FROM `artists` WHERE Name = \"$name\"";
                    $result = mysqli_query ($conn,$myquery); //query database
                    if ($result->num_rows > 0) {//see anything is returned back
                        while ($row = $result->fetch_assoc()) {
                            $artistName =  $row["Name"];
                            $artistType = $row["Type"];
                            $artistDesc = $row["Description"];
                            $artistImg = $row["ArtistImage"];

                            // Outputing in desired format
                    $output=<<<HTML
                    
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src=$artistImg alt="..." /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder">$artistName - $artistType</h2>
                            <p class="lead fw-normal text-muted mb-0">$artistDesc</p>
                        </div>
                    </div>
                
            
            

                    HTML;
                    echo $output;
                        }
                    }
                    else {
                        echo "Nothing here to display! Sorry!";
                    }

                    //Closing the connection
                    $conn->close();




                    


                    ?>

                
                    <!-- Blog preview section-->
                    <section class="py-5">
                        <div class="row gx-5">
                
                            <?php
                            
                            // Getting the artist name

                            $name = $_GET['title'];

                            //Making connection with the database
                            require_once 'serverlogin.php';

                            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database, 8889);
                            mysqli_select_db($conn, $db_database)
                            or die("Unable to select database: ");
                            //SQL query to extract information from database
                            $myquery = "SELECT * FROM `artists`, `artwork` WHERE artists.ArtistID = artwork.ArtistID AND artists.Name = \"$name\"";
                            $result = mysqli_query ($conn,$myquery); //query database
                            if ($result->num_rows > 0) {//see anything is returned back
                                //Displaying the number of art
                                $rowcount=mysqli_num_rows($result);
                                $output2=<<<HTML
                                <p>$rowcount</p>
                            HTML;
                            echo $output2;
                                while ($row = $result->fetch_assoc()) {
                                    $artTitle =  $row["Title"];
                                    $artistName = $row["Name"];
                                    $artImg = $row["ArtImage"];
                                    


                                    

                                    // Outputing in desired format
                                    $output=<<<HTML
                                        
                                        <div class="col-lg-4 mb-5">
                                            <div class="card h-100 shadow border-0">
                                                <img class="card-img-top" src=$artImg alt="..." />
                                                <div class="card-body p-4">
                                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">$artistName</h5></a>
                                                    <p class="card-text mb-0">$artTitle</p>
                                                </div>
                                            </div>
                                        </div>

                                    HTML;
                                    echo $output;
                            
                                }
                            }
                            else {
                                echo "Nothing here to display! Sorry!";
                            }

                            //Closing the connection
                            $conn->close();


                            ?>
                        </div>
                    </section>
                </div>
               
            </section>
          
           
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
    </body>
</html>
