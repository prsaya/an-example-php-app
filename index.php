<?php

	/*
	 * Application starter script.
	 * Builds the database connection, table access and controller objects.
	 * Performs an action on the controller.
	 * Shows appropriate GUI with the action output.
	 */ 

	try {
		spl_autoload_register(function ($class_name) {
    		    include __DIR__ . "/" . $class_name . ".php";
		});

		$conn = DatabaseConnection::get();

		$dataTable = new DatabaseTable($conn, "data", "id");
		$optionsTable = new DatabaseTable($conn, "options", "id");
		$controller = new Controller($dataTable, $optionsTable);

		$action = $_GET["action"] ?? "home";

		if (!in_array($action, get_class_methods($controller))) {
			$action = "other";
		}

		$page = $controller->$action();

		$title = $page["title"];
		$variables = $page["variables"] ?? [];
		extract($variables);

		ob_start();
		include __DIR__ . "/" . $page["template"];
		$output = ob_get_clean();
	}
	catch(Exception $ex) {
		$title = "Error!";
		$output = "<p>Database error: " . $ex->getMessage() . " in " . $ex->getFile() . ":" . $ex->getLine() . "</p>";
	}

	include __DIR__ . "/layout_html.php";

?>
