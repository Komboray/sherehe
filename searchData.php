<?php
include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display search data</title>

    <!--BOOTSRAP-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>
    <?php
    $data = $_GET['data'];

    $sql = "SELECT * FROM users WHERE id = $data";
    $result = mysqli_query($conn, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        echo '<div class="container">
        <div class="jumbotron">
            <h1 class = "display-4" text-success>'.$row['username'].'</h1>
            <p class ="lead"> The email id is: '.$row['email'].'</p>
            <hr class = "my-4">
            <p>
                <a class = "btn btn-primary btn-lg" href="search.php" role="button">Back</a>
            </p>
        </div>
    </div>';
    }
    ?>

    
</body>
</html>