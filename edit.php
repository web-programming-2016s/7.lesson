<?php

	require_once("../../../config.php");
	
	//the variable does not exist in the URL
	if(!isset($_GET["edit"])){
		
		//redirect user
		echo "redirect";
		
		header("Location: table.php");
		exit(); //dont execute further
		
	}else{
		echo "User want to edit row:".$_GET["edit"];
		
		//ask for latest data for single row
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_romil");

		$stmt = $mysql->prepare("SELECT id, recipient, message FROM messages_sample WHERE id=?");
		
		echo $mysql->error;
		
		//replace the ? mark
		$stmt->bind_param("i", $_GET["edit"]);
		
		//bind result data
		$stmt->bind_result($id, $recipient, $message);
		
		$stmt->execute();
		
		//we have only 1 row of data
		if($stmt->fetch()){
			
			//we had data
			echo $id." ".$recipient." ".$message;
			
		}else{
			
			//smth went wrong
			echo $stmt->error;
			
		}
		
		
		
	}


?>
<br>
<a href="table.php">table</a>
<h2> First application </h2>

<form method="get">

	<input disabled name="edit" value="<?=$id;?>"><br><br>

	<label for="to">to:* <label>
	<input type="text" name="to" value="<?php echo $recipient; ?>"><br><br>
	
	<label for="message">Message:* <label>
	<input type="text" name="message" value="<?=$message;?>"><br><br>
	
	<!-- This is the save button-->
	<input type="submit" value="Save to DB">

<form>

