<?php include_once('view_member_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Meal Booking</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css">
</head>
<body class="member">
 <div class="center">
   <form action="/mess/home/meal_booking_info" method="post">
   	<table align="center" border="2px">
   	 <tr>
   	 	<th>MEAL BOOKING</th>
   	 </tr>

   	 <tr>
   	 	<td><input type="radio" name="breakfast" value="1">Breakfast</td>
   	 </tr>

   	 <tr>
   	 	<td><input type="radio" name="lunch" value="1">Lunch</td>
   	 </tr>

   	 <tr>
   	 	<td><input type="radio" name="dinner" value="1">Dinner</td>
   	 </tr>

   	 <tr>
   	 	<td><input type="submit" name="submit" value="submit"></td>
   	 </tr>

   	</table>
   </form>
   </div>
</body>
</html>