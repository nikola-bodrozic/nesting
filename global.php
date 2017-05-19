<?php
class Nesting{
		private static $_instance; 
        private $_host = "localhost";
		private $_user = "logan";
		private $_password = "sdsdsd";
		private $_database = "logan";
		
		public static function getInstance() {
			if(!self::$_instance) { 
				self::$_instance = new self();
			}
			return self::$_instance;
		}
	
		private function __construct() {
			$this->_connection = new mysqli($this->_host, $this->_user, $this->_password, $this->_database);
			if(mysqli_connect_error()) {
				trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(), E_USER_ERROR);
			}
		}

		private function __clone() { }

		public function getConnection() {
			return $this->_connection;
		}
			
		public static function query($parent_id) {
			$db = self::getInstance();
			$mysqli = $db->getConnection();
			$sql_query = "SELECT * FROM `nb_nesting` WHERE `parent_id` = '$parent_id'";
			return $mysqli->query($sql_query);
		}
			
		public static function has_child($query) {
		        $rows = mysqli_num_rows($query);
		        if ($rows > 0) {
		            return true;
		        } else {
		            return false;
		        }
		}
		 
		public static function fetch_menu($query) {
		    while ($result = mysqli_fetch_array($query)) {
		        $id = $result ['id'];
		        $name = $result ['name'];
		        $parent_id = $result ['parent_id'];      
		        echo "\n<li  id='list_$id'><div>&nbsp; $name </div>";
		        if (self::has_child(self::query($id))) {
		            echo "<ol>";
		            self::fetch_menu(self::query($id));
		            echo "\n</ol>";
		        }
		    }
		}			
}
?>