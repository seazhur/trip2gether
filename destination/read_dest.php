<!--
  NAME: Jessyka Flores
  DESCRIPTION: Lets the user READ a destination.
 -->
 <?php include "../connect.php" ?>

<?php 
// TODO: Replace with current user
$curr_user = 4; 
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Destinations</title>
        <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
            integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    </head>

    <body>
        
            <?php
                $sql = "SELECT * FROM destination WHERE attraction='desired_attraction' AND city='desired_city' AND state='desired_state'";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {

                    echo "<table>";
                echo "<tr><th>Destination ID</th><th>Attraction</th><th>City</th><th>State</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["destination_id"] . "</td>";
                    echo "<td>" . $row["attraction"] . "</td>";
                    echo "<td>" . $row["city"] . "</td>";
                    echo "<td>" . $row["state"] . "</td>";
                    echo "</tr>";
                }
            
                echo "</table>";
            }
            else{
                echo "No destinations found";
            }
            ?>
        
    </body>
</html>

<script>
$(function() {
    $("#nav-placeholder").load("../nav.php");
});
</script>

<?php
mysqli_close($conn);
?>