<?

session_start();
if (!$_SESSION['authenticated']) die ('Access Denied');
require_once('site_forms.php');
require_once('site_core.php');
require_once('site_db.php');

// Set the title of the user
$title = "Delete User";

echo_head($title);

echo '
	<div class="container">
		<h2 class="head">'.$title.'</h2>';
		

$userid = $_GET['userid'];
$action = $_GET['action'];

if ($userid == '') {
		$result = run_query("SELECT userid FROM a01sama_users");
		
		$users = array();
		while($row = $result ->fetch_assoc()){
			$users[ $row['userid']] = $row['userid'];
		}
		
		echo'
		<form method = "get" action ="delete_user.php">'.
			return_option_select('userid',$users,'Select a User').'
			<input type = "submit">
		</form>';
}
else if ($action=='delete') {
	$sql = "DELETE FROM a01sama_users WHERE userid='$userid'";
	run_query($sql);
	
	echo '<p><b>'.$userid.'</b> was deleted from a01sama_users</p>
	<a href="control_panel.php"" class="btn btn-info">Control Panel</a>';
}
else {		
	echo '
		<p>Are you sure you want to delete <b>'.$userid.'</b> from a01sama_users?</p>
		<p>
			<a href="delete_user.php?action=delete&userid='.$userid.'" class="btn btn-danger">Yes</a>
		</p>';
}

echo '</div>';

echo_foot();

?>