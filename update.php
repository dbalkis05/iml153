<!DOCTYPE html>
<html>
<head>
	<title>Update Patient Record</title>
</head>
<body>

<?php
require 'config.php'; // Include file to connect to the database
include 'menu.php'; // Include menu list from menu.php, you may edit accordingly

$sql = "SELECT * FROM patients"; // Change to your patient table name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row if record found
    echo "<table border='1'>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Father's Name</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td> ". $row["idPatient"]. " </td>
                <td> ". $row["patientName"]. " </td>
                <td>" . $row["fatherName"] . "</td>
             </tr>";
    }
} else {
    echo "0 results";
}

$conn->close();

// Check if form is submitted and validate keys before accessing them
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idPatient'], $_POST['patientName'], $_POST['fatherName'])) {
        $idPatient = trim($_POST['idPatient']);
        $patientName = trim($_POST['patientName']);
        $fatherName = trim($_POST['fatherName']);

        // SQL query to update patient record
        $sql2 = "UPDATE patients SET patientName='$patientName', fatherName='$fatherName' WHERE idPatient='$idPatient'";			

        if ($conn->query($sql2) === TRUE) {
            echo "<br><br>Record has been successfully updated.";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Please fill in all the required fields.";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <table>
        <br>
        <tr>
            <th>Patient ID to Update</th>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                <label for="idPatient">Patient ID:</label>
                <input type="text" name="idPatient" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="patientName">Patient Name:</label>
                <input type="text" name="patientName" required>
            </td>
        </tr>  
        
        <tr>
            <td>
                <label for="fatherName">Father's Name:</label>
                <input type="text" name="fatherName" required>
            </td>
        </tr>  

        <tr>
            <td>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>

<?php
include 'footer.php'; // Include footer
?>

</body>
</html>

