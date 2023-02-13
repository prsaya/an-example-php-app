<?php

	/*
	 * Connect to MySQL Server by extending the mysqli class.
	 *
	 * The class has static method to return a newly constructed
	 * connection object.
	 */
	class DatabaseConnection extends mysqli {

		/*
		 * Constructor to open a connection using the provided parameters.
		 */
		private function __construct($host, $user, $pass, $db, $port, $charset) {

			$driver = new mysqli_driver();
			$driver->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;

			parent::__construct($host, $user, $pass, $db, $port);

			if (!parent::options(MYSQLI_INIT_COMMAND, "SET AUTOCOMMIT = 0")) {
			    die("Setting MYSQLI_INIT_COMMAND failed");
			}

			if (!parent::options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
			    die("Setting MYSQLI_OPT_CONNECT_TIMEOUT failed");
			}

			if (!parent::real_connect($host, $user, $pass, $db, $port)) {
			    die("Connect Error (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
			}

			$this->set_charset($charset);
		}

		/*
		 * Return a newly constructed connection object, with the provided
		 * database connection parameters - host, user, password, database name,
		 * port and the characterset.
		 */
		public static function get() {
			return new DatabaseConnection("localhost", "root", "root", "quiz", 3306, "utf8mb4");
		}
	}	

?>