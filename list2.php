<!DOCTYPE html>
<html>
<head>
    <title>Hospital Management: Patients and Appointments</title>
</head>
<body>

<?php
require 'config.php'; // Include the database connection file
include 'menu.php';   // Include the navigation menu from menu.php

// Join patients and appointments tables based on PatientID
$sql = "SELECT patients.PatientID, patients.Name, patients.DateOfBirth, appointments.AppointmentID 
        FROM patients 
        INNER JOIN appointments ON patients.PatientID = appointments.PatientID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in an HTML table
    echo "<table border='1'>
            <tr>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Date of Birth</th>
                <th>Appointment ID</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["PatientID"] . "</td>
                <td>" . $row["Name"] . "</td>
                <td>" . $row["DateOfBirth"] . "</td>
                <td>" . $row["AppointmentID"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

$conn->close(); // Close the database connection
include 'footer.php'; // Include the footer (if any)
?>

</body>
</html>

