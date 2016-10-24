<?php include_once('view_member_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Member Profile</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css">
</head>
<body class="member">
 <div class="center">
 <form action="/mess/home/edit_member_info" method="post">
  <input type="hidden" name="username" value="{username}">
	<table align="center" border="2px">
		<tr>
			<th colspan="4">Edit Profile</th>
		</tr>

		<tr>
			<td>Full Name: </td>
			<td><input type="text" name="fullname" value="{fullname}"></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><input type="email" name="email" value="{email}"></td>
		</tr>

		<tr>
			<td>Mobile</td>
			<td><input type="text" name="mobile" value="{mobile}"></td>
		</tr>

		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="submit"></td>
		</tr>
	</table>
  </form>
  </div>
</body>
</html>