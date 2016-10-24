<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Member List for meal</title>
</head>
<body class="admin">
 <div class="center">
	<table align="center" border="2px">
	<tr>
		<th colspan="2">Name List</th>
	</tr>
		<tr>
			<th>Name</th>
			<th>Status</th>
		</tr>
     {list}
		<tr>
		
			<td>{username}</td>
			<td>ordered</td>

		</tr>
	{/list}
	</table>
	</div>
</body>
</html>