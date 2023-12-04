<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM ujian");
$mahasiswa = mysqli_query($mysqli, "SELECT * FROM mahasiswa");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="addNilai.php">Add Nilai</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
           
        <th>Mapel</th> <th>Tanggal</th> <th>Nilai</th> <th>Grade</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result) ) {         
        echo "<tr>";
        echo "<td>".$user_data['Mapel']."</td>";
        echo "<td>".$user_data['Tanggal']."</td>";
        echo "<td>".$user_data['Nilai']."</td>";
        echo "<td>".$user_data['Grade']."</td>";
        echo "<td><a href='Update.php?id=$user_data[id]'>Edit</a> | <a href='DeleteNilai.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
    
</html>