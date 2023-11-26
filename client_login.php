<?php
session_start();

// You may include any necessary PHP code here, such as handling login logic or displaying user information.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Client Login</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<body class="login" background="images/new.jpeg" style="background-repeat: no-repeat; background-size: cover">
    <section style="margin: auto; margin-bottom: 50px">
        <header style="text-align: center">
            <h3 style="color: aliceblue; font-family: Google Sans">
                Client Login Portal <br />
                Welcome Back!
            </h3>
        </header>
        <div class="container">
            <div class="row align-items-center mt-5">
                <div class="col-md-6 col-sm-12">
                    <!-- You can customize this part with your client login content, e.g., a login form -->
                    <form action="process_login.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required />
                        </div>
                        <button type="submit" class="btn btn-primary bg-lg">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
