<?php

	/*
	 * Controller class for all actions.
	 */
	class Controller {

		/*
		 * Constructor takes params for the tables used in this app.
		 * Each method represents an action and is started in a session.
		 */
		public function __construct(private DatabaseTable $dataTable, private DatabaseTable $optionsTable) {
			session_start();
		}

		public function other() {
			header("Location: " . "./index.php");
		}

		public function home() {

			if (!isset($_SESSION["ids"])) {
				foreach($this->dataTable->findAllIds() as $val) {
					$ids[] = $val["id"];
				}
				$_SESSION["ids"] = $ids;
			}

			shuffle($_SESSION["ids"]);
			$_SESSION["index"] = $_SESSION["correct"] = 0;

			return [ 
				"template" => "home_html.php", 
				"title" => "Start",
				"variables" => [
					"dataCount" => count($_SESSION["ids"])
				]
			];
		}

		public function play() {

			$id = $_SESSION["ids"][$_SESSION["index"]];
			$data = $this->dataTable->findById($id);
			$options = $this->optionsTable->findByColumn("quiz_id", $id);
			$_SESSION["index"] += 1;

			return [ 
				"template" => "play_html.php", 
				"title" => "Play",
				"variables" => [
					"no" => $_SESSION["index"],
					"data" => $data,
					"options" => $options,
					"last" => ($_SESSION["index"] === count($_SESSION["ids"]))
				]
			];
		}

		public function end() {

			$result = "There are total <code>" . count($_SESSION["ids"]) . "</code> quiz items. You have played <code>" . $_SESSION["index"] . "</code> item(s), and scored <code>" . $_SESSION["correct"] . "</code> correctly!";

			return [ 
				"template" => "end_html.php", 
				"title" => "End",
				"variables" => [
					"result" => $result
				]
			];
		}
	}

?>