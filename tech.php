<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
</head>
<body>
<?php
$id = $_SESSION['id'];
$selectquery = "SELECT * FROM accounts where id = '".$id."'";
$selectresult = mysql_query($selectquery);
while ($row = mysql_fetch_array($selectresult)){
	$picture = $row['picture'];
	$lastname = $row['lastname'];
	$firstname = $row['firstname'];
}
?>
	<table>
		<tr>
			<th style="text-align: right;width: 76.7%;">
				<a href="VIEW_DATA.php" style="text-decoration: none;background-color: #21f794;color: #000;padding: 10px 20px;font-weight: bolder;border: 3px solid #d05a5a;border-style: inset;">STUDENT RECORDS</a>
				<a href="create_stud_account.php" style="text-decoration: none;background-color: #21f794;color: #000;padding: 10px 20px;font-weight: bolder;border: 3px solid #d05a5a;border-style: inset;">CREATE STUDENT accounts</a>
				<!--<a href="choose_grading.php" style="text-decoration: none;background-color: #21f794;color: #000;padding: 10px 20px;font-weight: bolder;border: 3px solid #d05a5a;border-style: inset;">ADD STUDENT GRADE</a>-->
				<a href="logout.php" style="text-decoration: none;background-color: #21f794;color: #000;padding: 10px 20px;font-weight: bolder;border: 3px solid #d05a5a;border-style: inset;">LOGOUT</a>
			</th>
			<th style="padding: 5px 0px; text-align: center;">
				<img src="images/<?php echo "$picture";?>"  style="width: 15%; height: 38px;background-color: #f9f5f5;border: 2px solid black;">
				<span><?php echo "$firstname $lastname";?></span>
			</th>
		</tr>
	</table>
</body>
</html>