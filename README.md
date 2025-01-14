# Hospital Management System (Basic CRUD)

This project implements a **Hospital Management System** using PHP and MySQL/MariaDB. It provides basic CRUD (Create, Retrieve, Update, Delete) operations to manage patients, doctors, appointments, and staff records effectively.

---

## Files Included:
1. **add.php** - Add new records (e.g., patients, doctors, appointments).  
2. **config.php** - Database connection settings.  
3. **delete.php** - Delete records from the database.  
4. **footer.php** - Footer page for copyrights.  
5. **index.php** - Main page (Dashboard/Homepage).  
6. **list.php** - List records from a single table (e.g., patients or doctors).  
7. **list2.php** - List records using two related tables (e.g., appointments with patient and doctor details).  
8. **menu.php** - Displays the main navigation menu.  
9. **dropMenu.php** - Dropdown menu for selecting items (e.g., selecting doctors or patients).  
10. **README.md** - This documentation file.  
11. **update.php** - Update existing records.  
12. **ims506.sql** - SQL dump file containing dummy data (recommended for importing into your database).  
13. **ims506.csv** - Dummy data in CSV format (alternative for data import).

---

## Steps to Get Started:
### 1. Database Configuration:
- Open **config.php** and modify the following lines according to your hosting settings:
  ```php
  $servername = "localhost"; // Change to your database server
  $username = "your_username"; // Update with your database username
  $password = "your_password"; // Update with your database password
  $dbname = "hospital_db"; // Change to your database name
  ```

### 2. Import the Database:
- Use the `ims506.sql` file to set up your database.  
- Import it into your MySQL/MariaDB instance. You can use phpMyAdmin or a MySQL client to do this.

### 3. Modify Content:
#### **index.php**
- Update the homepage content to reflect hospital-specific information, such as:
  - Total number of patients
  - List of available doctors
  - Upcoming appointments
  - Reports summary

#### **list.php**
   - Example: Listing patients
     ```php
     $sql = "SELECT * FROM patients"; // Change 'patients' to the table name you want to list

     echo "<th>ID</th>
           <th>Name</th>
           <th>Age</th>
           <th>Gender</th>";
     ```
   - Adjust table headers (`<th>`) and database column names accordingly.

#### **list2.php**
   - Example: Listing appointments (from two tables using primary and foreign keys)
     ```php
     $sql = "SELECT appointments.id, patients.name AS patient_name, doctors.name AS doctor_name, appointments.date, appointments.time, appointments.status
             FROM appointments
             JOIN patients ON appointments.patient_id = patients.id
             JOIN doctors ON appointments.doctor_id = doctors.id";
     ```

#### **add.php**
   - Modify the form inputs to match the fields for the hospital system (e.g., name, age, gender for patients; specialization and availability for doctors).

#### **update.php**
   - Adjust the logic to update fields based on hospital management needs (e.g., editing patient information or appointment status):
     ```php
     if(empty(trim(isset($_POST["idPatient"])))) {
         $idPatient = trim($_POST['idPatient']);
         $name = trim($_POST['name']);
         $age = trim($_POST['age']);
         $gender = trim($_POST['gender']);
     }
     ```

---

## Key Features:
1. **Patient Management:**  
   Add, view, update, and delete patient records, including their name, age, gender, contact details, and medical history.

2. **Doctor Management:**  
   Manage doctor profiles, including their specialization, contact information, and availability.

3. **Appointments:**  
   Schedule, view, update, and cancel appointments, linking patients to doctors with specific dates and times.

4. **Staff Management:**  
   Keep records of hospital staff, including their roles, shifts, and contact details.

5. **Dashboard:**  
   Display an overview of the hospital system, including counts of patients, doctors, staff, and appointments.

6. **Reports:**  
   Generate basic reports for management purposes (future enhancement).

---

## Instructions for Use:
1. **Run the Project:**
   - Place the project folder on a local server like XAMPP or WAMP in the `htdocs` directory.
   - Access the system via `http://localhost/hospital_management/`.

2. **Add Data:**
   - Use **add.php** to create new records for patients, doctors, and appointments.

3. **List Data:**
   - Use **list.php** or **list2.php** to view existing records in a tabular format.

4. **Update Records:**
   - Navigate to **update.php** to modify existing records (e.g., editing patient or doctor information).

5. **Delete Records:**
   - Use **delete.php** to remove unwanted records from the database.

---

## Remarks:
- This system serves as a basic template for a **Hospital Management System**. You are encouraged to customize and improve the design, functionality, and security features based on your specific needs.
- The code is based on foundational PHP and MySQL concepts and can be enhanced with frameworks such as Laravel or CodeIgniter for scalability.
- Refer to PHP documentation for additional features like input validation, secure database operations (prepared statements), and advanced UI design.

---
