<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$Nama=$_POST['Nama'];
	$NIM=$_POST['NIM'];
	
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE mahasiswa SET name='$Nama',NIM='$NIM' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$Nama = $user_data['Nama'];
	$NIM = $user_data['NIM'];
	
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
				<td>Name</td>
				<td><input type="text" name="name" value=<?php echo $Nama;?>></td>
			</tr>
			<tr> 
				<td>NIM</td>
				<td><input type="text" name="email" value=<?php echo $NIM;?>></td>
			</tr>
			
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>