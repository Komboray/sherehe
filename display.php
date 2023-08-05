<?php
include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display from Crud</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="crud.php" class="text-light"></a> 
             Add room
        </button>
        <table class = "table">
            <thead>
                <tr>
                    <th scope = "col">S1 no</th>
                    <th scope = "col">Room</th>
                    <th scope = "col">Facility</th>
                    <th scope = "col">rent</th>
                    <th scope = "col">Services</th>
                    <th scope = "col">Availability</th>
                    <th scope = "col">Operations</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM crud";
            $result = mysqli_query($conn, $sql);
            if($result){
                
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $room = $row['room'];
                    $facility = $row['facility'];
                    $rent = $row['rent'];
                    $services = $row['services'];
                    $availaility = $row['availability'];
                    echo '<tr>
                    <th scope= "row">'.$id.'</th>
                    <td>'.$room.'</td>
                    <td>'.$facility.'</td>
                    <td>'.$rent.'</td>
                    <td>'.$services.'</td>
                    <td>'.$availability.'</td>
                    <td>
                     <button class = "btn btn-primary"><a href="update.php?updateid = '.$id.' " class ="text-light">Update</a></button>
                     <button class = "btn btn-danger"><a href="delete.php?deleteid='.$id.' " class ="text-light">Delete</a></button>
                    </td>
                </tr>';
                }
            }

            ?>  
                
            </tbody>
        </table>
    </div>
</body>
</html>