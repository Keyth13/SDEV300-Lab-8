<?php

  // Include the required DBConnection information
  require_once('Includes/Dbconnect.php');
  
  // Include the Faculty999Class definition
  require_once('Includes/FormObjects.php');

	  
	function findTutor($tname,$pass)
  {
	
	// Init count to 0
  $count=0;
	// Connect to the database
	$mysqli = connectdb();
		
	// Define the Query
	// For Windows MYSQL String is case insensitive
	 $Myquery = "SELECT count(*) cnt from TutorDetails
		   where tychoName='$tname' and password='$pass'";	 
		
	 if ($result = $mysqli->query($Myquery)) 
		{
	   /* Fetch the results of the query */	     
	   while( $row = $result->fetch_assoc() )
	   {
	  	$count=$row["cnt"];	
	   }
 	   /* Destroy the result set and free the memory used for it */
	   $result->close();	      
    }
	
	$mysqli->close();   
	    
	return $count;
	       
  }
  
  // Method to see if the session has already been taken
   function checkReservation($id)
  {
		$mycount = 0;	
	 
		// Connect to the database
		$mysqli = connectdb();
		
		// Define the Query
		// For Windows MYSQL String is case insensitive
	 	$Myquery = "SELECT count(*) thecount
	             from StudentSchedules where
	             scheduleID = '$id'";	 	             	   
	  
	 if ($result = $mysqli->query($Myquery)) 
		 {
	   /* Fetch the results of the query */	     
	   while( $row = $result->fetch_assoc() )
	   {	  	
			$mycount = $row["thecount"]; 			
	   }	  
	
 	   /* Destroy the result set and free the memory used for it */
	   $result->close();	      
     }
	
	$mysqli->close();   
	    
	return $mycount;
		       
  }
  
  // Method to see if the session has already been taken
   function getJoinStudent($id)
  {
		$myjoin = "";	
	 
		// Connect to the database
		$mysqli = connectdb();
		
		// Define the Query
		// For Windows MYSQL String is case insensitive
	 	$Myquery = "select  scheduleID, a.tychoName, helpDescription, courseInfo, RegisterDate , email
               from StudentSchedules a, Students b
               where a.tychoName = b.tychoName
               and scheduleID = $id";	 	             	   
	  
	 if ($result = $mysqli->query($Myquery)) 
		 {
	   /* Fetch the results of the query */	     
	   while( $row = $result->fetch_assoc() )
	   {	  	
			$sid = $row["scheduleID"]; 			
			$tychoname = $row["tychoName"]; 			
			$help = $row["helpDescription"]; 
			$course = $row["courseInfo"]; 
			$rdate = $row["RegisterDate"]; 
			$email = $row["email"]; 	
	   }	  
	   $myjoin = new StudentJoinClass ($sid,$tychoname,$help,$course,$rdate,$email);
	
 	   /* Destroy the result set and free the memory used for it */
	   $result->close();	      
     }
	
	$mysqli->close();   
	    
	return $myjoin;
		       
  }
  
   
   // Retrieves tutors schedule between today and the next 14 days
   function getTutorSchedule($tychoname)
  {
		$mySchedule = array();	
	 
		// Connect to the database
		$mysqli = connectdb();
		
		// Define the Query
		// For Windows MYSQL String is case insensitive
	 	$Myquery = "Select scheduleID from GroupSchedules  
	             where scheduleID IN (select scheduleID from StudentSchedules)
	             and scheduleID IN (select scheduleID from TutorSchedules where tychoName = '$tychoname')";
	                  
	               
	 if ($result = $mysqli->query($Myquery)) 
		 {
	   /* Fetch the results of the query */	     
	   while( $row = $result->fetch_assoc() )
	   {
	  	$mySchedule[]=$row["scheduleID"];	    			
	   }	  
	
 	   /* Destroy the result set and free the memory used for it */
	   $result->close();	      
     }
	
	$mysqli->close();   
	    
	return $mySchedule;
	       
  }
  
  
  
   // Retrieves tutors schedule for a specific ID
   function getTutorview($id)
  {
		$mySchedule = "";	
	 
		// Connect to the database
		$mysqli = connectdb();
		
		// Define the Query
		// For Windows MYSQL String is case insensitive
	 	$Myquery = "Select a.scheduleID, thedate,day, timeStart,timeEnd,f2f,sName, b.tychoName, 
	               helpDescription, courseInfo, RegisterDate, firstName, lastName, eMail
	               from GroupSchedules a, StudentSchedules b, Students c
	               where a.scheduleID = b.scheduleID
	               and b.tychoName = c.tychoName
	               and a.scheduleID = '$id'
	               order by thedate,timeStart";	 	             	               	                                                        
	  
	             
	               
	 if ($result = $mysqli->query($Myquery)) 
		 {
	   /* Fetch the results of the query */	     
	   while( $row = $result->fetch_assoc() )
	   {
	   	$id = $row["scheduleID"];	 
	   	$thedate = $row["thedate"];	 
	   	$day = $row["day"];	 
	   	$tstart = $row["timeStart"];	 
	   	$tend = $row["timeEnd"];	 
	   	$f2f = $row["f2f"];	 
	   	$sname = $row["sName"];	 
	   	$tname = $row["tychoName"];	 
	   	$help = $row["helpDescription"];	 
	   	$course =  $row["courseInfo"];	 
	   	$firstname = $row["firstName"];	
	   	$lastname = $row["lastName"];	 
	   	$email = $row["eMail"];	
	   	// Make this an Object
	   	$mySchedule = new TutorViewClass($id,$thedate,$day,$tstart,$tend,$f2f,
              $sname,$tname,$help,$course,$firstname,$lastname,$email);	  			
	   }	  
	
 	   /* Destroy the result set and free the memory used for it */
	   $result->close();	      
     }
	
	$mysqli->close();   
	    
	return $mySchedule;
	       
  }
   
   
   // Retrieves tutors schedule for a specific id
   function getTutorSchedulebyID($id)
  {
		$mySchedule = array();	
	 
		// Connect to the database
		$mysqli = connectdb();
		
		// Define the Query
		// For Windows MYSQL String is case insensitive
	 	$Myquery = "Select a.scheduleID, thedate, day, timeStart, timeEnd, 
              groupName, f2f, sName,tychoName from TutorSchedules a, GroupSchedules b
	             where a.scheduleID = $id 
	             and a.scheduleID=b.scheduleID";		            
	               
	 if ($result = $mysqli->query($Myquery)) 
		 {
	   /* Fetch the results of the query */	     
	   while( $row = $result->fetch_assoc() )
	   {
	  	$id = $row["scheduleID"];	 
	   	$thedate = $row["thedate"];	 
	   	$day = $row["day"];	 
	   	$tstart = $row["timeStart"];	 
	   	$tend = $row["timeEnd"];	
	   	$group = $row["groupName"];	 
	   	$f2f = $row["f2f"];	 
	   	$sname = $row["sName"];	 
	   	$tname = $row["tychoName"];	 	   		   
	   	$mySchedule = new TutorCancelClass($id,$thedate,$day,$tstart,$tend,$group,$f2f,$sname,$tname);	   	                                     	   	
                                          
	   }	  
	
		
 	   /* Destroy the result set and free the memory used for it */
	   $result->close();	      
     }
	
	$mysqli->close();   	
	    
	return $mySchedule;
	       
  }
   
  function getGroupSchedule($id)
  {
		$mySchedule = "";	
	 
		// Connect to the database
		$mysqli = connectdb();
		
		// Define the Query
		// For Windows MYSQL String is case insensitive	 
	  $Myquery = "select scheduleID,thedate,day,timeStart,timeEnd,groupName,f2f,sName
	              from GroupSchedules
                where scheduleID=$id";              
	             
	               
	 if ($result = $mysqli->query($Myquery)) 
		 {
	   /* Fetch the results of the query */	     
	   while( $row = $result->fetch_assoc() )
	   {
	   	$id = $row["scheduleID"];	 
	   	$thedate = $row["thedate"];	 
	   	$day = $row["day"];	 
	   	$tstart = $row["timeStart"];	 
	   	$tend = $row["timeEnd"];	 	   
	   	$groupname = $row["groupName"];	 	   
	   	$f2f = $row["f2f"];		   
	   	$sname = $row["sName"];	
	   		      	
	   	// Make this an Object
	   	$mySchedule = new ScheduleJoinClass($id,$thedate,$day,$tstart,$tend,$groupname,$f2f,
              $sname);	  			
	   }	  
	
 	   /* Destroy the result set and free the memory used for it */
	   $result->close();	      
     }
	
	$mysqli->close();   
	    
	return $mySchedule;	       
  }
  
   function getGroupSchedulebyTutor($tutor)
  {
		$mySchedule = array();	
	 
		// Connect to the database
		$mysqli = connectdb();
		
		// Define the Query
		// For Windows MYSQL String is case insensitive	 
	  $Myquery = "Select scheduleID,thedate,day,timeStart,timeEnd,groupName,f2f,sName from GroupSchedules  
	             where scheduleID IN (select scheduleID from TutorSchedules where tychoName = '$tutor')";
	                          
	             
	               
	 if ($result = $mysqli->query($Myquery)) 
		 {
	   /* Fetch the results of the query */	     
	   while( $row = $result->fetch_assoc() )
	   {
	   	$id = $row["scheduleID"];	 
	   	$thedate = $row["thedate"];	 
	   	$day = $row["day"];	 
	   	$tstart = $row["timeStart"];	 
	   	$tend = $row["timeEnd"];	 	   
	   	$groupname = $row["groupName"];	 	   
	   	$f2f = $row["f2f"];		   
	   	$sname = $row["sName"];	
	   		      	
	   	// Make this an Object
	   	$mySchedule[] = new ScheduleJoinClass($id,$thedate,$day,$tstart,$tend,$groupname,$f2f,$sname);	  			
	   }	  
	
 	   /* Destroy the result set and free the memory used for it */
	   $result->close();	      
     }
	
	$mysqli->close();   
	    
	return $mySchedule;	       
  }
  
  function getTutor($id)
  {
		$mytutor = "";	
	 
		// Connect to the database
		$mysqli = connectdb();
		
		// Define the Query
		// For Windows MYSQL String is case insensitive	 
	  $Myquery = "select scheduleID, a.tychoName, firstName, lastName, eMail 
               from TutorSchedules a, Tutors b
               where a.tychoName = b.tychoName
               and a.scheduleID = $id;";              	             
	               
	 if ($result = $mysqli->query($Myquery)) 
		 {
	   /* Fetch the results of the query */	     
	   while( $row = $result->fetch_assoc() )
	   {
	   	$id = $row["scheduleID"];	 
	   	$tycho = $row["tychoName"];	 
	   	$firstname = $row["firstName"];	 
	   	$lastname = $row["lastName"];	 
	   	$email = $row["eMail"];	 	   	   	
	   		      	
	   	// Make this an Object
	   	$mytutor = new TutorJoinClass($id,$tycho,$firstname,$lastname,$email);	  			
	   }	  
	
 	   /* Destroy the result set and free the memory used for it */
	   $result->close();	      
     }
	
	$mysqli->close();   
	    
	return $mytutor;	       
  }
  
    function insertGuest ($gname, $gcomments) {
		// Connect to the database
		$mysqli = connectdb();
		
		// Now we can insert
		$Query = "INSERT INTO GuestBook (guestname, comments) VALUES ('$gname', '$gcomments')";

		$stmt = $mysqli->prepare($Query);
		
		$stmt->bind_param("ss", $gname,$gcomments);
		
		$stmt->execute();
		$Success=false;   
        
		if ($stm->affected_rows > 0) 
			$Success = true;
		
		$stmt->close();
		$mysqli->close();

		return $Success;

	}
	
	function deleteSession($id) {
		$rowdeleted = 0;
		
		//Connect to the database
		$mysqli = connectdb();
		
		//Define the first query
		$Query = "DELETE FROM TutorSchedules WHERE scheduleID = ?";
		
		$stmt = $mysqli->prepare($Query);
		
		//Bind and Execute
		$stmt->bind_param("s", $id);
		$stmt->execute();
		
		$rowsdeleted = $mysqli->affected_rows();
		
		//Clean-up
		$stmt->close();
		
		//Define the second query
		$Query2 = "DELETE FROM GroupSchedules WHERE scheduleID = ?";
		
		$stmt = $mysqli->prepare($Query2);
		
		//Bind and Execute
		$stmt->bind_param("s", $id);
		$stmt->execute();
		
		$rowsdeleted = $mysqli->affected_rows();
		
		//Clean-up
		$stmt->close();
		$mysqli->close();
		
		return $rowsdeleted;
	}
	
	   // Cancels an existing session
   function cancelSession($id)
  {
		$rowdeleted=0;	 
		// Connect to the database
		$mysqli = connectdb();
		
		if($stmt = $mysqli->prepare("delete from StudentSchedules where scheduleID = ?")) {
			$stmt->bind_param("s", $id);
			$stmt->execute();
			$rowsdeleted=$mysqli->affected_rows;
			$stmt->close();
		}
	    $mysqli->close();   
	        
	  return $rowsdeleted;
  }
  
  function countTutor($tutor) {  	  	 
		// Connect to the database
		$mysqli = connectdb();
		$wsname = $tutor->getPsusername();

		// Define the Query
		// For Windows MYSQL String is case insensitive
		$Myquery = "SELECT count(*) as count from tutors
		where tychoName='$wsname'";	 

		if ($result = $mysqli->query($Myquery)) {
			/* Fetch the results of the query */	     
			while( $row = $result->fetch_assoc()) {
				$count=$row["count"];	    			   	     	  	     	  
			}	 
			/* Destroy the result set and free the memory used for it */
			$result->close();	      
		}

		$mysqli->close();   

		return $count;

	}
		
	function insertTutor($tutor, $password) {
		// Connect to the database
		$mysqli = connectdb();
		$firstname = $tutor->getFirstname();
		$lastname = $tutor->getLastname();
		$email = $tutor->getEmail();
		$wsname = $tutor->getPsusername();
		$f2f = $tutor->getF2f();

		// Add Prepared Statement
		$Query = "INSERT INTO tutors 
		(firstName,lastName,eMail,tychoName,f2f) 
		VALUES (?,?,?,?,?)";

		$stmt = $mysqli->prepare($Query);

		$stmt->bind_param("sssss", $firstname,$lastname,$email,$wsname,$f2f);
		$stmt->execute();		

		$stmt->close();
		
		// Add prepared statement
		$Query = "INSERT INTO tutordetails (tychoName,password) VALUES (?,?)";
		
		$stmt = $mysqli->prepare($Query);
		
		$stmt->bind_param("ss", $wsname,$password);
		$stmt->execute();
		
		$stmt->close();
		
		$mysqli->close();

		return true;
	}
     
?>