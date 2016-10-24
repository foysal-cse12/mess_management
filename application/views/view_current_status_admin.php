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
		<h3 align="center">{month}</h3>
		
		<table align="center" border="1" style="margin-bottom=50px" >
			<tr>
				<th colspan="3">Current Meal Rate</th>
			</tr>
			<tr>
				<td>Total Shopping(Tk)</td>
				<td>Total Meal</td>
				<td>Meal Rate(Tk)</td>
			</tr>
			<tr>
				<td>{total_valuee}</td>
				<td>{total_meall}</td>
				<td>{rate}</td>
			</tr>
		</table>
		<table align="center" border="1" >
			<tr>
				<th colspan="5">Current Account Status</th>
			</tr>
			<tr>
				<td>Username</td>
				<td>Total Value(Tk)</td>
				<td>Total Meal</td>
				<td>Total Cost(Tk)</td>
				<td>Due(-)/Payable(Tk)</td>
			
			</tr>
			{current}
			<tr>
				<td>{username}</td>
				<td>{total_value}</td>
				<td>{total_meal}</td>
				<td>
					<script type="text/javascript">
						var i="{total_meal}";
						var j="{rate}"
						var k=i*j;
						document.write(k);

			        </script>
			    </td>
			    <td>
			    	<script type="text/javascript">
			    		var t="{total_value}";
			    		var d=t-k;
			    		document.write(d);


			    	</script>
			    </td>
				
			</tr>
			{/current}
		</table>


	 
  </div>

	</body>
</html>