<!DOCTYPE html>
<html>
<head>
    <title>Hospital Management</title>
</head>
<body>

<?php
require 'config.php'; // include file to connect to the database
include 'menu.php'; // include menu list from menu.php

// Retrieve patient names from database
$sql = "SELECT patientID, patientName FROM patients";
$result = $conn->query($sql);

// Form submission handling
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patientID = $_POST['patientName'];
    $appointmentDate = $_POST['appointmentDate'];
    $doctorName = $_POST['doctorName'];

    // Insert into appointments table
    $insertSql = "INSERT INTO appointments (patientID, appointmentDate, doctorName) 
                  VALUES ('$patientID', '$appointmentDate', '$doctorName')";
    if ($conn->query($insertSql) === TRUE) {
        echo "New appointment created successfully";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}
?>

<form action="" method="post">
    <label for="patientName">Patient Name:</label>
    <select name="patientName" id="patientName">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['patientID'] . "'>" . $row['patientName'] . "</option>";
            }
        }
        ?>
    </select><br>
    
    <label for="appointmentDate">Appointment Date:</label>
    <input type="date" name="appointmentDate" id="appointmentDate" required><br>
    
    <label for="doctorName">Doctor Name:</label>
    <input type="text" name="doctorName" id="doctorName" required><br>
    
    <input type="submit" value="Submit">
</form>
<br>

<?php
// Display table of data
$sql = "SELECT patients.patientID, patients.patientName, appointments.appointmentDate, appointments.doctorName 
        FROM patients 
        JOIN appointments ON patients.patientID = appointments.patientID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Appointment Date</th>
                <th>Doctor Name</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["patientID"] . "</td>
                <td>" . $row["patientName"] . "</td>
                <td>" . $row["appointmentDate"] . "</td>
                <td>" . $row["doctorName"] . "</td>
             </tr>";
    }
    echo "</table>";
} else {
    echo "No appointments found";
}

$conn->close();
include 'footer.php';
?>

</body>
</html>
