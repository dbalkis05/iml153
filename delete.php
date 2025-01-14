<!DOCTYPE html>
<html>
<head>
    <title>Hospital Management: Delete Patient</title>
</head>
<body>

<?php
require 'config.php'; // Include database connection
include 'menu.php';   // Include menu for navigation

// Display all patients in a table
$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Delete Patient Record</h1>";
    echo "<table border='1'>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Contact</th>
                <th>Medical History</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["PatientID"] . "</td>
                <td>" . $row["Name"] . "</td>
                <td>" . $row["DateOfBirth"] . "</td>
                <td>" . $row["ContactInformation"] . "</td>
                <td>" . $row["MedicalHistory"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No patient records found.</p>";
}

$conn->close();
?>

<!-- Form to delete a patient -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2>Enter Patient ID to Delete</h2>
    <label for="deleteID">Patient ID:</label>
    <input type="text" name="deleteID" required>
    <br><br>
    <input type="submit" value="Delete">
    <input type="reset" value="Reset">
</form>

<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php'; // Reconnect to the database
    $deleteID = trim($_POST['deleteID']);

    // SQL to delete the record
    $sql = "DELETE FROM patients WHERE PatientID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $deleteID);

    if ($stmt->execute()) {
        echo "<p>Record with Patient ID $deleteID has been successfully deleted.</p>";
    } else {
        echo "<p>Error deleting record: " . $conn->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

<?php include 'footer.php'; ?>
</body>
</html>
