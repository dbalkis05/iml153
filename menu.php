<!DOCTYPE html>
<html>
<head>
    <title>Navigation Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .menu {
            margin: 20px;
        }
        .menu a {
            text-decoration: none;
            color: #333;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 5px;
            display: inline-block;
            transition: background-color 0.3s, color 0.3s;
        }
        .menu a:hover {
            background-color: #f0f0f0;
            color: #007BFF;
        }
    </style>
</head>
<body>

<div class="menu">
    <?php
    echo "
    <a href='index.php' target='_self'>Rumah</a>
    <a href='list.php' target='_self'>Senarai</a>
    <a href='list2.php' target='_self'>Senarai 2 Table</a>
    <a href='add.php' target='_self'>Tambah</a>
    <a href='dropMenu.php' target='_self'>Tambah Kereta</a>
    <a href='delete.php' target='_self'>Padam</a>
    <a href='update.php' target='_self'>Kemaskini</a>
    ";
    ?>
</div>

<br><br><br>
</body>
</html>
