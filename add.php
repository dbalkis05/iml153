<!DOCTYPE html>
<html>
<head>
	<title>Hospital Management System - Patient Registration</title>
</head>
<body>

<?php
require 'config.php'; // include file to connect to database
include 'menu.php'; // include menu list from menu.php, you may edit accordingly

if(empty(trim(isset($_POST["patientName"])))) {
    echo "<br><br><br>";
} else {
    $patientName = trim($_POST['patientName']);
    $patientFamilyName = trim($_POST['patientFamilyName']);
    $patientAge = trim($_POST['patientAge']);
    $patientGender = trim($_POST['patientGender']);
    $patientContact = trim($_POST['patientContact']);
    
    // SQL to insert patient record into database
    $sql = "INSERT INTO patients (name, family_name, age, gender, contact)
            VALUES ('$patientName', '$patientFamilyName', '$patientAge', '$patientGender', '$patientContact')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<br><br>New patient registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <table>
        <tr>
            <td>
                <label for="patientName">Patient Name:</label>
                <input type="text" name="patientName" required>
            </td>
        </tr>
        
        <tr>
            <td>
                <label for="patientFamilyName">Family Name:</label>
                <input type="text" name="patientFamilyName" required>
            </td>
        </tr>

        <tr>
            <td>
                <label for="patientAge">Age:</label>
                <input type="number" name="patientAge" required>
            </td>
        </tr>

        <tr>
            <td>
                <label for="patientGender">Gender:</label>
                <select name="patientGender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                <label for="patientContact">Contact Number:</label>
                <input type="text" name="patientContact" required>
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit" value="Register">
            </td>
        </tr>
    </table>
</form>

<?php
include 'footer.php';
?>

</body>
</html>
