<?
	
/* -----------------------------------------------------------------------------
Connects to server, executes SQL statement, closes connection
and returns MySQLi result object  	

Input: SQL Statement (string)
Output: MySQLi result object (iterator) 	
----------------------------------------------------------------------------- */
function run_query($sql) {
  $mysqli = new mysqli('localhost', 'root', 'mouse', 'educateme');
  #$mysqli = new mysqli('104.154.215.21', 'bk30davi', '$HackRPI2019', 'plzeducateme-sql-instance');
  if ($mysqli->connect_errno) {
    die('Failed to connect to MySQL: '.$mysqli->connect_error);
  }	
  $result = $mysqli->query($sql);
  if (!$result) {
    die('Error executing query: '.$mysqli->error.'<br> SQL: '.$sql);
  }
  $mysqli->close();
  return $result;
}	
		
?>
