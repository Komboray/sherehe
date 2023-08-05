<?php
//this is a simple show of the details obtained from the database
include("log.php");

$sql = "SELECT * FROM users";
$point = mysqli_query($conn, $sql);


if(mysqli_num_rows($point)>0){
    while($row = mysqli_fetch_assoc($point)){
        echo $row["id"] . "<br>";
    echo $row["username"] . "<br>";
    echo $row["reg_time"] . "<br>";
    }
    
}

?>