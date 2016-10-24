<?php include_once('view_member_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>meal Status and update</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css">
</head>
<body class="member">
<div class="center">
	<form action="/mess/home/meal_update" method="post">
		<table align="center" border="2px">
			<tr>
				<th colspan="2">MEAL STATUS AND UPDATE MEAL</th>
			</tr>

			<tr>
				<td><input type="radio" name="breakfast" value="1" <?php if ($breakfast == 1) echo 'checked="checked"'; ?> />Breakfast</td>
				<td><input type="radio" name="Breakfast" value="0" <?php if ($breakfast == 0) echo 'checked="checked"'; ?> />Cancel/Empty</td> 
			</tr>

			<tr>
				<td><input type="radio" name="lunch" value="1"   <?php if ($lunch == 1) echo 'checked="checked"'; ?> />Lunch</td>
				<td><input type="radio" name="lunch" value="0" <?php if ($lunch == 0)     echo    'checked="checked"'; ?> />Cancel/Empty</td>
			</tr>

			<tr>
				<td><input type="radio" name="dinner" value="1" <?php if ($dinner == 1)      echo 'checked="checked"'; ?> />Dinner</td>
				<td><input type="radio" name="dinner" value="0" <?php if ($dinner == 0) echo 'checked="checked"'; ?> />Cancel/empty</td>
			</tr>

			<tr>

				<td colspan="2"><input type="submit" name="submit" value="submit"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>