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
                            </li>                            <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                            <!-- Removed some sections -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Removed some sections -->
            
            <!-- Team members section-->
            <section class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <!-- Changed some of the content of this section of the page -->
                        <h2 class="fw-bolder">Our Artists</h2>
                        <p class="lead fw-normal text-muted mb-5">Dedicated to bring art to our community</p>
                    </div>

                    
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">

                        <?php
                        //Making connection with the database
                         require_once 'serverlogin.php';

                         $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database, 8889);
                         mysqli_select_db($conn, $db_database)
                         or die("Unable to select database: ");
                         //SQL query to extract information from database
                         $myquery = "SELECT * FROM artists";
                         $result = mysqli_query ($conn,$myquery); //query database
                         if ($result->num_rows > 0) {//see anything is returned back
                             while ($row = $result->fetch_assoc()) {
                                $artistName = $row["Name"];
                                $artistImg = $row["ArtistImage"];
                                $artistType = $row["Type"];

                                //Displaying in desired format
                                $output=<<<HTML
                                    <div class= "text-center">
                                    <img class="img-fluid rounded-circle mb-4 px-4" src=$artistImg alt="...">
                                    <h5 class="fw-bolder"><a href = "aboutArtist.php?title=$artistName">$artistName</a></h5>
                                    <div class="fst-italic text-muted">$artistType</div>
                                    <br>
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

                        <!-- Removed some sections -->
                    </div>
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
