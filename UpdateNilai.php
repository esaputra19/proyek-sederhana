<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
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

	
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE ujian SET Mapel='$Mapel',Tanggal='$Tanggal', Nilai=$Nilai WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM ujian WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$Mapel= $_POST['Mapel'];
        $Tanggal= $_POST['Tanggal'];
        $Nilai= $_POST['Nilai'];
        $Grade= $_POST['Grade'];
	
}
?>
<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Mapel</td>
				<td><input type="text" name="Mapel" value=<?php echo $Mapel;?>></td>
			</tr>
			<tr> 
				<td>Tanggal</td>
				<td><input type="text" name="Tanggal" value=<?php echo $Tanggal;?>></td>
			</tr>

			<tr> 
				<td>Nilai</td>
				<td><input type="text" name="Nilai" value=<?php echo $Nilai;?>></td>
			</tr>
			
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>