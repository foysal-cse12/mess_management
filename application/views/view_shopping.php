<?php include_once('view_member_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Shopping Insert</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css">
	</head>
	<body class="member" >
	<div class="center">
		<form method="post" action="/mess/home/add_shopping">

        <h1 align="center">Please Enter Your shopping</h1>
		 <h4 align="center"><a href="/mess/home/personal_shoplist">Your Shopping List </a></h4>
		<table align="center">
			<tr>
				<td>Amount(Tk.):</td>
				<td><input type="text" name="value" value="<?php echo set_value('value');?>"></td>
                <td><input type="submit" name="shopvalue" value="SUBMIT"></td>
			</tr>
			<tr>

			
				<td></td>
				<td><?php echo form_error('value');?></td>
			</tr>
		</table>
		</form>	

</div>
	</body>
</html>