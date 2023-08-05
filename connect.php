<?php
//this is the establishment of the connection
//variables that hold the details
$db_server = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'brands';
$conn = '';

$conn = mysqli_connect($db_server, $db_username,$db_password, $db_name);
//checking the connection status
//try catch block needed for the dangerous code...

try{
    if($conn){
    // echo "You have a healthy connection";
}
else{
    echo "You have a connection problem";
}

}catch(error){
    echo "${error}";
}
?>