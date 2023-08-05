<?php
//page that deals with the query
//we must import the previous page details
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,200&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="center">
        <input type="checkbox" id = "show">
        <label for="show" class ="show-btn">View Form</label>
        <div class="container">
            <label for="show" class = "close-btn fas fa-times" title = "close"></label>
            <div class="text">Login Form</div>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "POST">

              <div class="data">
                <label >Username</label>
                <input type="text" name = "username" id = "username" onkeyup= "validateName()" required> <br>
                <span id="errorName"></span>
              </div>

              <div class="data">
                <label >Email</label>
                <input type="email" name = "email" id = "email" onkeyup= "validateEmail()" required> <br>
                <span id="errorEmail"></span>
              </div>

              <div class="data">
                <label >Password</label>
                <input type="password" name = "password" id = "password" onkeyup= "validatePass()" required> <br>
                <span id="errorPass"></span>
              </div>

              <div class="forgot-pass">
                <a href="">Forgot Password</a>
              </div>

              <div class="btn">
                <!-- <div class = "inner"></div> -->
                <button type = "submit" name = "submit" onclick = "validateForm()" >Login</button><br>
                <span id ="errorForm"></span>
              </div>
            </form>
        </div>
    </div>

    <script src = "log.js"></script>
  
</body>
</html>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //get the details of the user into the database with these variables that we have created
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($username)){

    echo"please enter a username";

}
elseif(empty($password)){

    echo"please enter a username";
}else{

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash')";

    //we are creating the query to handle all the connection and insertion logic
    $result = mysqli_query($conn, $sql);
    //check whether the process worked, we tell the user some message

    if($result){
        echo "Details sent to the database";
    }

}

}


?>