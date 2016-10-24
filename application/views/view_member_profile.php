<?php include_once('view_member_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>member profile</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css">
</head>
<body class="member">
 <div class="center">
	<table align="center" border="2px">
	    <tr>
	    	<th colspan="2">PROFILE</th>
	    </tr>

		<tr>
			<td>Username:</td>
			<td>{username}</td>
		</tr>

		<tr>
			<td>Fullname:</td>
			<td>{fullname}</td>
		</tr>

		<tr>
			<td>Email:</td>
			<td>{email}</td>
		</tr>

		<tr>
			<td>Mobile:</td>
			<td>{mobile}</td>
		</tr>
	</table>
</div>
</body>
</html>