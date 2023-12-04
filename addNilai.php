
<html>
<head>
	<title>Add Nilai</title>
</head>
 
<body>
	<a href="Nilai.php">Go to Home</a>
	<br/><br/>
	<form action="addNilai.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Mapel</td>
				<td><input type="text" name="Mapel"></td>
			</tr>
			<tr> 
				<td>Tanggal</td>
				<td><input type="text" name="Tanggal"></td>
			</tr>
			<tr> 
				<td>Nilai</td>
				<td><input type="text" name="Nilai"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {

        $Mapel= $_POST['Mapel'];
        $Tanggal= $_POST['Tanggal'];
        $Nilai= $_POST['Nilai'];
        $Grade= $_POST['Grade'];
        if ($Nilai >= 85) {

            $Grade = 'A';
           
            } elseif ($Nilai >= 70) {
           
            $Grade = 'B';
           
            } elseif ($Nilai >= 55) {
           
            $Grade = 'C';
           
            } elseif ($Nilai >= 40) {
           
            $Grade = 'D';
           
            } else {
           
            $Grade = 'E';
           
            } 


	
			
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO ujian(Mapel,Tanggal,Nilai,Grade) VALUES('$Mapel','$Tanggal','$Nilai','$Grade')");
		
		// Show message when user added
		echo "User added successfully. <a href='Nilai.php'>View Users</a>";
	}
	?>
</body>
</html>