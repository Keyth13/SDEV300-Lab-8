
<html>
	<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="tutors.css">   
   <title>Guestbook</title>
</head>
<body > 

<?php   
	
	
		// Show the page header
		include('Includes/Header.php');	
		require_once('Includes/Utils.php');		
		require_once('Includes/SQLFunctions.php');		

	if( isset( $_POST[ 'Guest' ] ) ) {
	
	
		// Get input
		$newstring = trim( $_POST[ 'Message' ] );
		$message = filter_var($newstring, FILTER_SANITIZE_STRING);
		$newstr    = trim( $_POST[ 'guestname' ] );
		$gname = filter_var($newstr, FILTER_SANITIZE_STRING);
		
	//$message = stripslashes( $message );
	//$gname = stripslashes( $gname );
	echo "<p> </p>";
	//echo "Processing the Guest comments for " . $gname ;
	echo htmlspecialchars("Processing the Guest comments for " . $gname);
	
	// Call function to insert data
	$success = insertGuest($gname,$message);
	echo "<p> </p>";
	//echo "Successfully entered the data " .$success;
	echo htmlspecialchars("Successfully entered the data " .$message);
	echo "<p></p>";
	echo "<a href='index.html'>Click Here to return to the Home screen.</a>"; 
	}
?>
</body>

</html>