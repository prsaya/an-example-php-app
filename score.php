<?php

	/*
	 * This script is invoked from an Ajax request.
	 * The request parameter is evaluated and the session 
	 * variable with the correct count is updated.
	 */
	session_start();
	if (isset($_REQUEST["value"]) && $_REQUEST["value"] === "CORRECT") {
		$_SESSION["correct"] += 1;
	}
	echo $_SESSION["correct"];

?>