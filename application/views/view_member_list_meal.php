<?php include_once('view_admin_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Member list for meal</title>
	<script src="<?php echo base_url();?>/public/js/member_list_meal.js"></script>
	 <link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css">
	 
</head>
<body class="admin">
<div class="center">
	<table align="center" border="2px">
		<tr>
			<th colspan="2">Member list</th>
		</tr>

		<tr>
			<td>Select Meal Type</td>
			<td>
				<select name="mealtype" onchange="member_list(this.value)" >
					<option value="breakfast">Breakfast</option>
					<option value="lunch">Lunch</option>
					<option value="dinner">Dinner</option>
				</select>
			</td>
		</tr>
		<!-- <tr>
			<td colspan="2"><input type="submit" name="submit" value="submit"></td>
		</tr> -->
	</table>
	<div id="list"></div>
	</div>
</body>
</html>