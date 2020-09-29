<?php
// include database connection file
// include_once("config.php");
$conn = new mysqli('db', 'root', 'example', 'mysql');
$name = '';
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = (int)$_POST['id'];
	$name=$_POST['name'];
		
	// update user data
    $result = mysqli_query($conn, "UPDATE tasks SET task_name='$name' WHERE task_id=$id");
	
	// Redirect to homepage to display updated user in list
	header("location: index.php");
}
// Display selected user data based on id
// Getting id from url
$id = (int)$_GET['id'];
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM tasks WHERE task_id=$id");
if (!$result) {
    die('Invalid query: '. $conn->errno);
}
while($user_data = mysqli_fetch_array($result))
{
	$name = $user_data['task_name'];

}
?>
<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<br/>
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr>
                <div class="form-group">
                    <label for="task">Your Todo Task</label>
                    <input type="text" width=200px; class="form-control" name="name" value=<?php echo $name;?>>
                </div>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>