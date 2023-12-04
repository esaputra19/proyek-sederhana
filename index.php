<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="Nilai.php">Nilai Siswa</a>
<a href="add.php">Add New User</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>Name</th> <th>NIM</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['Nama']."</td>";
        echo "<td>".$user_data['NIM']."</td>";
        echo "<td><a href='Update.php?id=$user_data[id]'>Edit</a> | <a href='Delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
    
    <a href='Delete.php?id=$user_data[id]'>Delete</a>
    <a href='Update.php?id=$user_data[id]'>Edit</a> 
</html>