<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">   
		<title>Create Tutor </title>
	</head>
	<body OnLoad="document.createtutor.firstname.focus();">

<?php   	
	session_start();
    //require_once('Includes/SQLFunctions.php');	
	require_once('Includes/Utils.php');	
	require_once('Includes/DBObjects.php');
	show_form();

	function show_form() { 		
	?>
	<h5>Complete the information in the form below and click Submit to create your account. All fields are required.</h5>
		<form name="createtutor" method="POST" action="Registration.php">	
			<table border="1" width="75%" cellpadding="0">			
				<tr>
					<td width="157">Firstname:</td>
					<td><input type="text" name="firstname" value='<?php echo $firstname ?>' size="30"></td>
				</tr>
				<tr>
					<td width="157">Lastname:</td>
					<td><input type="text" name="lastname" value='<?php echo $lastname ?>' size="30"></td>
				</tr>
				<tr>
					<td width="157">Email:</td>
					<td><input type="text" name="email" value='<?php echo $email ?>' size="30"></td>
				</tr>
				<tr>
					<td width="157">F2f:</td>
					<td><input type="text" name="f2f" value='<?php echo $f2f ?>' size="30"></td>
				</tr>
				<tr>
					<td width="157">Username:</td>
					<td><input type="text" name="wsname" value='<?php echo $wsname ?>' size="30"></td>
				</tr>
				<tr>
					<td width="157">Password:</td>
					<td><input type="password" name="password" value='<?php echo $password ?>' size="30"></td>
					<td width="157">Must include: 8 characters, 1 upper, 1 lower, 1 number and 1 special character</td>
				</tr>
				<tr>
					<td width="157"><input type="submit" value="Submit" name="CreateSubmit"></td>
					<td>&nbsp;</td>
				</tr>
			</table>			
		</form>
	<?php
	} // End Show form
	?>
	</body>
</html>