<?php include_once('view_admin_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Member List</title>
	 <link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css">
</head>
<body class="admin">
 <div class="center">
	<form action="/mess/home/member_details" method="post">
		<table align="center" border="2px">
		    <tr>
				<th colspan="2">Member List</th>
			
			</tr>

			<tr>
				<td>Fullname</td>
				<td>Details Information</td>
			</tr>
			{info}
			<tr>
				<td>{fullname}</td>

				<input type="hidden" value='{id}' name="id">
				
				<td><a class="details" href="/mess/home/member_details/{id}">Details</a></td>
			</tr>

			{/info}
		</table>
	</form>
	</div>
</body>
</html>