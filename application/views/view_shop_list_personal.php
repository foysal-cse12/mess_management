<?php include_once('view_member_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Shopping List</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css">
	</head>
	<body class="member" >
	<div class="center">
		<table align="center" border="2">
		<tr>
			<th colspan="2">SHOPING LIST</th>
		</tr>
			<tr>
				<td>Date</td>
				<td>Amount(TK.)</td>
			</tr>
			{list}
			<tr>
				<td>{date}</td>
				<td>{shop_value}</td>					
				</td>
			
			</tr>
			{/list}
		</table>
		

</div>
	</body>
</html>