<!DOCTYPE html>
<html>
<head>
    <title>Hospital Management System - Patient Records</title>
</head>
<body>

<?php
require 'config.php'; // include file to connect to the database
include 'menu.php'; // include the menu list from menu.php, you may edit accordingly

$sql = "SELECT * FROM patients"; // Assuming the table is now called 'patients'
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Father's Name</th>
                <th>Age</th>
                <th>Contact</th>
            </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["idPatient"] . "</td>
                <td>" . $row["patientName"] . "</td>
                <td>" . $row["fatherName"] . "</td>
                <td>" . $row["age"] . "</td>
                <td>" . $row["contact"] . "</td>
             </tr>";
    }
} else {
    echo "0 results";
}

$conn->close();

include 'footer.php'; // footer file included at the bottom

?>

</body>
</html>

