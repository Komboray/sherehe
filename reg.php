<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="regPage.css">
</head>
<body>
    <div class="container">
        <div class="title">Registration</div>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" id = "form" method = "POST">


           <div class="user-details">
             <div class="input-box">
                <span class="details">Full Name</span>
                <input type="text" placeholder = "Enter your name" name="fname" id="fname" required>
                <div class ="error"></div> 
             </div>

             <div class="input-box">
                <span class="details">Username</span>
                <input type="text" placeholder = "Enter your Username" name="username" id="username" required maxLength = "12" >
                <div class ="error"></div> 
             </div>

             <div class="input-box">
                <span class="details">Email</span>
                <input type="email" placeholder = "Enter your email" name="email" id="email" required> 
                <div class ="error"></div> 
             </div>

             <div class="input-box">
                <span class="details">Phone Number</span>
                <input type="phone " placeholder = "(+254)" name="phone" id="phone" required>
                <div class ="error"></div>
             </div>

             <div class="input-box">
                <span class="details">Password</span>
                <input type="password" placeholder = "Enter your Password" name ="password" id ="password" maxLength= "12" required>
                <div class ="error"></div>
                
             </div>

             <div class="input-box">
                <span class="details">Confirm Password</span>
                <input type="password" placeholder = "Enter the password again" name="cpass" id="cpass" required>
                <div class ="error"></div>
                
             </div>

             <div class="campus-details">
                
                <span class="roles">Your roll in the institution</span>
                <div class="category">
                 <input type="radio" name="dot-1" id ="dot-1" title ="radio">
                
                    <label for="dot-1" >
                        <span class="dot-1"></span>
                        <span class="gender">Lecturer</span>
                    </label>
                    <input type="radio" name="dot-1" id ="dot-2" title ="radio">
                    <label for="dot-2" >
                        <span class="dot-2"></span>
                        <span class="gender">Registrar</span>
                    </label>
                    <input type="radio" name="dot-1" id ="dot-3" title ="radio">
                    <label for="dot-3">
                        <span class="dot-3"></span>
                        <span class="gender">Parent</span>
                    </label>
                </div>
                
             </div>
               
           </div>
           <div class="button">
                <input type="submit" value ="Register" name = "submit">
               </div>
        </form>
    </div>

    <script src = "reg.js"></script>
</body>
</html>
<?php

try{
    $db_server = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'brands';
    $conn = '';
    
    $conn = mysqli_connect($db_server, $db_username,$db_password, $db_name);
    if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["submit"])){
        // $_SESSION["fname"] = $_POST["fname"];
        // $_SESSION["username"] = $_POST["username"];
        // $_SESSION["email"] = $_POST["email"];
        // $_SESSION["phone"] = $_POST["phone"];
        // $_SESSION["password"] = $_POST["password"];
        // $_SESSION["cpass"] = $_POST["cpass"];

        //so far this one below is working
        //we need to add error class in the html....enjoy

        
        $fname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    
        if($_SESSION["password"] != $_SESSION["cpass"]){
            echo "The passwords do not match";
        }

        $sql = "INSERT INTO registration (fullN,username,email,phone,password) VALUES ('$fname','$username','$email','$phone','$password')";
        mysqli_query($conn,$sql);
        header("Location:dashboard.php");
    }
    
}catch(error){

    echo "${error}";

}
?>