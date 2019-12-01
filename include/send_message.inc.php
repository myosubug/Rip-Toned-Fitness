
<?php
	include_once 'dbHandler.php';
	session_start();
	
	$sender = $_POST['username'];
	$message = $_POST['message'];
	$date = date("Y/m/d");
	$recipient = "riptonedsupport";

	$sql = "INSERT INTO timestamp (sender, date, messagecontent, recipient) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	else{
		mysqli_stmt_bind_param($stmt, "ssss", $sender, $date, $message, $recipient);
		
		if(mysqli_stmt_execute($stmt)){
			header("Location: ../message_success.php?Message=success");	
		}
		else{
			header("Location: ../message_failure.php?Message=failure");	
		}
	}
	
?>
