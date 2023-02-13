<?php

	/*
	 * Class to create an object with a database connection. Has methods
	 * to perform select queries on the provided table and its id column.
	 */
	class DatabaseTable {

		/*
		 * Class constructor with parameters.
		 */
		public function __construct(private mysqli $conn, private string $table, private string $pk) {
		}

		/*
		 * Common method called from all the methods.
		 * Creates a prepared statement using the supplied SQL and the 
		 * parameters. Returns the executed statement object.
		 * [ You can run various methods on the returned object to retrieve 
		 * appropriate information; get_result() in case of select queries
		 * and affected_rows() in case of insert, update or delete query.]
		 */
		private function query($sql, $params = []) {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($params);
			return $stmt;
		}

		public function findAllIds() {
			$stmt = $this->query("SELECT id FROM " . $this->table);
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		}

		public function findById($value) {
			$sql = "SELECT * FROM " . $this->table . " WHERE " . $this->pk . " = ?";
			$stmt = $this->query($sql, [$value]);
			return $stmt->get_result()->fetch_assoc();
		}

		public function findByColumn($column, $value) {
			$sql = "SELECT * FROM " . $this->table . " WHERE " . $column . " = ?";
			$stmt = $this->query($sql, [$value]);
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		}
	}

?>