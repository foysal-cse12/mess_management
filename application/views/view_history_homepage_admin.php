
<?php include_once('view_admin_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Histroy Home Page</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css"> 
	</head>
	<body class="member">
	<div class="center">
		<h3 align="center"><a href="/mess/home/shopping_history"><b>Shopping History</b></a></h3>
		<h3 align="center"><a href="/mess/home/paid_history"><b>Paid History</b></a></h3>
		<h3 align="center"><a href="/mess/home/current_month_status_admin"><b>Current Month Status</b></a></h3>
			<h4>Select Month to see Previous Status </h4><br>
			<select align="center">
				<option>January</option>
				<option>February</option>
				<option>March</option>
				<option>April</option>
				<option>May</option>
				<option>June</option>
				<option>July</option>
				<option>August</option>
				<option>September</option>
				<option>October</option>
				<option>November</option>
			</select>
		
		<table align="center" border="1" >
			<tr>
				<td>Username</td>
				<td>Total Meal</td>
			</tr>
			{history}
			<tr>
				<td>{username}</td>
				<td>{total_meal}</td>
			</tr>
			{/history}
		</table>



	 </div>


	</body>
</html>