<?php
	require_once('config.php');
	$sql_query ="SELECT * FROM employee WHERE emp_id='1'";
	$sql_result = mysqli_query($connection, $sql_query);
	$row = mysqli_fetch_assoc($sql_result); 
	print_r($row); die;
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Maria DB Demo</title>
</head>
<body>
		<h1>Swatantra Gupta at Maria DB !</h1>
		<table border="1">
			<thead>
				<th>S No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile No</th>
			</thead>
			<tbody>
				<?php while($row = mysqli_fetch_assoc($sql_result)) { 
print_r($row);
					?>
				<tr>
					<td><?php echo $row['emp_id']; ?></td>
					<td><?php echo $row['emp_name']; ?></td>
					<td><?php echo $row['emp_email']; ?></td>
					<td><?php echo $row['emp_mobile_no']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
</body>
</html>