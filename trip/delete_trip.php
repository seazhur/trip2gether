<!-- This was written by Jenny Nguyen
This handles the delete function by deleting a whole trip
for everyone involved. (basically cancels the trip). -->

<?php 
    //connect to the database
    $conn = new mysqli("localhost", "Cesar", "DX8317oZ]XFs0mMo", "trip2gether");
    if (!$conn) { die("Connection failed: " . $conn->connect_error); }
    
    if ( isset($_POST["del_trip_id"]) ) {
        $trip_id = $_POST["del_trip_id"];
        $sql1 = "DELETE FROM assignments WHERE trip_id = $trip_id";
        $sql2 = "DELETE FROM attendances WHERE trip_id = $trip_id";

        $conn->query($sql1);
        $conn->query($sql2);

    }

    header("location: ../trip/read.php");
    exit;

?>

<?php mysqli_close($conn); ?>