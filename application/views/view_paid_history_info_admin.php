<?php include_once('view_admin_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css"> 

</head>
<body>
<div class="center">
	<table border="2px">
		<tr>
			<th colspan="2">Total Amount By Members</th>
		</tr>
		<tr>
			 <td>Username</td> 
			<td>total amount</td>
		</tr>
       {info}
		<tr>
			 <td>{username}</td> 
			<td>{total}</td>
		</tr>
		{/info}
	</table>
	</div>
</body>
</html>