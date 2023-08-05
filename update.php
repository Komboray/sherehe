<?php
include 'connect.php';
$id = $_GET['updateid'];

$sql = "SELECT * FROM crud WHERE id= $id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$room = $row["room"];
$facility= $row["facility"];
$rent = $row["rent"];
$services = $row["services"];
$availability = $row["availability"];

if(isset($_POST["submit"])){

    $room = $_POST["room"];
    $facility = $_POST["facility"];
    $rent = $_POST["rent"];
    $services = $_POST["services"];
    $availability = $_POST["availability"];

    $sql = " UPDATE crud set id = '$id', name='$room', facility = '$facility', rent= '$rent', services = '$services', availability = '$availability' 
    WHERE id= '$id' ";

    $result = mysqli_query($conn, $sql);
    if($result){
        echo 'Updated successfully';
        // header('Location:display.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud ops</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form method ="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" action="POST">
            <div class="form-group">

                <label for="room">Room</label>
                <input type="text" class = "form-control" id = "room" name ="room" placeholder = "Enter place" value = <?php echo $room;?>>
                
            </div>

            <div class="form-group">
                
                <label for="facilities">Facilities</label>
                <input type="text" class = "form-control" id = "facilities" name ="facilities" placeholder = "What are the facilities" <?php echo $facility;?>>
                
            </div>

            <div class="form-group">
                
                <label for="rent">Rent</label>
                <input type="number" class = "form-control" id = "rent" name ="rent" placeholder = "What is the rent in digits" <?php echo $rent;?>>
                
            </div>

            <div class="form-group">
                
                <label for="room">Services</label>
                <input type="text" class = "form-control" id = "services" name ="services" placeholder = "What are the services?" <?php echo $services;?>>
                
            </div>

            <div class="form-group">
                
                <label for="availability">Availability</label>
                <input type="text" class = "form-control" id = "availability" name ="availability" placeholder = "What is the room's availability?" <?php echo $availability;?>>
                
            </div>

            <button type = "submit" name = "submit" class = "btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>