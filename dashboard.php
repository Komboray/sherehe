<?php
// echo "Connected";
// $ch = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
// curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer cFJZcjZ6anEwaThMMXp6d1FETUxwWkIzeVBDa2hNc2M6UmYyMkJmWm9nMHFRR2xWOQ==']);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $response = curl_exec($ch);
// curl_close($ch);
// echo $response;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="" class= "logo">
                        <img src="images/dashlogo.png" alt="">
                        <span class="nav-items">DashBoard</span>
                    </a>
                 </li>

                 <li><a href="">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                 </a></li>

                 <li><a href="profile.php">
                 <i class="fas fa-user"></i>
                    <span class="nav-item">Profile</span>
                 </a></li>

                 <li><a href="wallet.php">
                 <i class="fas fa-wallet"></i>
                    <span class="nav-item">Wallet</span>
                 </a></li>
 
                 <li><a href="">
                 <i class="fas fa-chart-bar"></i>
                    <span class="nav-item">Analytics</span>
                 </a></li>

                 <li><a href="">
                 <i class="fas fa-tasks"></i>
                    <span class="nav-item">Tasks</span>
                 </a></li>

                 <li><a href="">
                 <i class="fas fa-cog"></i>
                    <span class="nav-item">Settings</span>
                 </a></li>

                 <li><a href="">
                 <i class="fas fa-question-circle"></i>
                    <span class="nav-item">Help</span>
                    </a></li>

                 <li><a href="" class = "logout">
                 <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Logout</span>
                    </a></li>
            </ul>
        </nav>

        <section class= "main">
            <div class="main-top">
                <h1>Skills</h1>
                <i class="fas fa-user-cog">

                </i>
            </div>
            <div class="main-skills">
                <div class="card">
                    <i class="fas fa-laptop-code"></i>
                    <h3>Web Development</h3>
                    <p>Join over 1 million students</p>
                    <button>GetStarted</button>
                </div>
                <div class="card">
                    <i class="fas fa-laptop-code"></i>
                    <h3>Web Development</h3>
                    <p>Join over 1 million students</p>
                    <button>Get Started</button>
                </div>
                <div class="card">
                    <i class="fas fa-laptop-code"></i>
                    <h3>Web Development</h3>
                    <p>Join over 1 million students</p>
                    <button>GetStarted</button>
                </div>
                <div class="card">
                    <i class="fas fa-laptop-code"></i>
                    <h3>Web Development</h3>
                    <p>Join over 1 million students</p>
                    <button>GetStarted</button>
                </div>
            </div>

            <section class="main-course">
                <h1>My Cousres</h1>
                <div class="course-box">
                    <ul>
                        <li>In Progress</li>
                        <li>explore</li>
                        <li>incoming</li>
                        <li>finished</li>
                    </ul>
                    <div class="course">
                        <div class="box">
                            <h3>HTML</h3>
                            <p>80% - progress</p>
                            <button>continue</button>
                            <i class="fab fas-html5 html"></i>
                        </div>
                    </div>
                </div>
            </section>

        </section>

    </div>
</body>
</html>