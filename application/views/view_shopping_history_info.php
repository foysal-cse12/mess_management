<?php include_once('view_member_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shopping History List</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css">
</head>
<body class="member">
<div class="center">
	<table align="center" border="2px">
		<tr>
			<th colspan="3">Shopping History List</th>
		</tr>

		<tr>
			<td>Date</td>
			<td>Name</td>
			<td>Amount(Tk.)</td>
		</tr>
		{info}
		<tr>
			<td>{date}</td>
			<td>{username}</td>
			<td>{shop_value}</td>
		</tr>
		{/info}
	</table>
	</div>
</body>
</html>