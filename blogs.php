<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crisis Hero Blogs</title>
    <link rel="icon" href="images/CrisisCrew.png" type="image/x-icon">

    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" />

    <style>
          body {
            font-family: 'Google Sans', sans-serif;
        }

        h4{
            font-size: 16px; /* Adjust the size as needed */
        }
        p{
            font-size: 14px; /* Adjust the size as needed */
        }

        .table-container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-12 col-md-3 col-lg-2 sidebar">
                <a href="index.php">
                    <img src="images/CrisisCrew.png" alt="logo" class="img-fluid" />
                </a>
                <div class="list-group mt-3">
                    <a href="client_dashboard.php">Dashboard</a>
                    <a href="My Profile.php">My Profile</a>
                    <a href="training.php">Training Module</a>
                    <a href="blogs.php">Blogs</a>
                    <a href="coming_soon.php">Community Forum</a>
                </div>

                <!-- Logout Link -->
                <footer class="mt-3">
                    <a href="index.php">Logout</a>
                </footer>
            </nav>

            <div class="col-lg-10 col-md-9 col-12">

                <div class="welcome-message">
                    <?php
                    // Assuming you have a PHP variable for the user's name
                    $userName = "John Smith";
                    ?>
                    <h4>Welcome, <?php echo $userName; ?>!</h4>
                    <p style="color: #676a6a;">
                        Here is some Insightful Crisis Response Blogs!
                    </p>
                </div>

                <div class="container mt-5">
                    <div class="row">
                        <?php
                        // Sample data for the blog cards
                        $blogs = [
                            [
                                'image' => 'images/flood.gif',
                                'title' => 'Guardians of the Community',
                                'content' => 'Firefighters are the guardians of our communities, standing tall in the face of danger. Their quick response and decisive actions during emergencies save lives and protect properties, making them true local heroes.',
                                'link' => 'coming_soon.php',
                            ],
                            [
                                'image' => 'images/fireman.jpg',
                                'title' => 'Bravery Amidst Flames',
                                'content' => 'Firefighters risk their lives to rescue people and animals trapped in burning buildings. Their heroic acts showcase unwavering courage and selflessness, embodying the true spirit of bravery.',
                                'link' => 'coming_soon.php',
                            ],
                            [
                                'image' => 'images/fireman2.jpg',
                                'title' => 'Courage Under Pressure',
                                'content' => 'Firefighters exhibit extraordinary courage under pressure, battling raging fires and hazardous conditions to ensure the safety of others.',
                                'link' => 'coming_soon.php',
                            ],
                            // Add more blog entries as needed
                        ];

                        foreach ($blogs as $blog) {
                        ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="<?php echo $blog['image']; ?>" class="card-img-top" alt="Blog Image" />
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $blog['title']; ?></h5>
                                        <p class="card-text"><?php echo $blog['content']; ?></p>
                                        <a href="<?php echo $blog['link']; ?>" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="blogs.php">1</a></li>
                        <li class="page-item"><a class="page-link" href="coming_soon.php">2</a></li>
                        <li class="page-item"><a class="page-link" href="coming_soon.php">3</a></li>
                        <li class="page-item"><a class="page-link" href="coming_soon.php">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Custom Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="myscript.js"></script>
</body>

</html>
