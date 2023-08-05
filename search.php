<?php
include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <form action="" method="POST">
            <input type="text" placehoolder="Search data" name ="search">
            <button class="btn btn-dark" name = "submit">Search</button>
        </form>

        <div class="container my-5">
            <table class="table">
                <?php
                if(isset($_POST["submit"])){
                    $search = $_POST["search"];

                    $sql = "SELECT * FROM users WHERE id like '%$search%'
                    or username like '%$search%' ";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        if(mysqli_num_rows($result)>0){
                            echo '<thead>
                            <tr>
                            <th>S1 no</th>
                            <th>Name</th>
                            </tr>
                            </thead>
                            ';
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<tbody>
                            <tr>
                            <td><a href="searchData.php?data='.$row['id'].'">'.$row['id'].'</a></td>
                            <td>'.$row['username'].'</td>
                            </tr>
                            </tbody>';
                            }
                            
                        }else{
                            echo"<h2 class =tex-danger>Data Not found</h2>";
                        }
                    }
                }

                ?>
                
                

                
                
            </table>
        </div>
    </div>
</body>
</html>