<?
require_once('site_forms.php');
require_once('site_core.php');
require_once('site_db.php');

// Set the title of the aside
$title = "Delete Aside";

echo_head($title);

echo '
	<div class="container">
		<h2 class="head">'.$title.'</h2>';
		

$asideid = $_GET['asideid'];
$action = $_GET['action'];

if ($asideid == '') {
		$result = run_query("SELECT asideid, title FROM a01sama_asides");
		
		$asides = array();
		while($row = $result ->fetch_assoc()){
			$asides[ $row['asideid']] = $row['title'];
		}
		
		echo'
		<form method = "get" action ="delete_aside.php">'.
			return_option_select('asideid',$asides,'Select an aside').'
			<input type = "submit">
		</form>';
}
else if ($action=='delete') {
	$sql = "DELETE FROM a01sama_asides WHERE asideid='$asideid'";
	run_query($sql);

	// $sql = "DELETE FROM asides WHERE asideid='$asideid'";
	// $sql = "DELETE FROM has_aside WHERE asideid='$aid' AND asideid='$pid'";
	
	echo '<p><b>'.$asideid.'</b> was deleted from a01sama_asides</p>
	<a href="control_panel.php"" class="btn btn-info">Control Panel</a>';
}
else {		
	echo '
		<p>Are you sure you want to delete <b>'.$asideid.'</b> from a01sama_asides?</p>
		<p>
			<a href="delete_aside.php?action=delete&asideid='.$asideid.'" class="btn btn-danger">Yes</a>
		</p>';
}

echo '</div>';

echo_foot();

?>