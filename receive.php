
<?php
//another practice page
require 'connect.php';

$sql = "SELECT * FROM users";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo $row["id"] .  "<br>";
        echo $row["username"] .  "<br>";
        
        // $list[] = $row;

    };

    // echo json_encode($list, JSON_PRETTY_PRINT);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User details</title>
</head>
<body class = "bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Your Users</h2>

                    </div>
                     <div class = "card-body">
                        <table class ="table table-bordered text-center">
                            <tr>
                                <td>User</td>
                            </tr>
                        </table>

                     </div>


                </div>
            </div>
        </div>
    </div>
</body>
</html>