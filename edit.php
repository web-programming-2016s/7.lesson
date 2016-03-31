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
	}


?>
<br>
<a href="table.php">table</a>
<h2> First application </h2>

<form method="get">
	<label for="to">to:* <label>
	<input type="text" name="to"><br><br>
	
	<label for="message">Message:* <label>
	<input type="text" name="message"><br><br>
	
	<!-- This is the save button-->
	<input type="submit" value="Save to DB">

<form>

