<?
require_once('site_forms.php');
require_once('site_core.php');
require_once('site_db.php');

// Set the title of the aside
$title = "Delete Aside Relationship";

echo_head($title);

echo '
	<div class="container">
		<h2 class="head">'.$title.'</h2>';
		

$asideid = $_GET['asideid'];
$pageid = $_GET['pageid'];
$action = $_GET['action'];

if ($asideid == '') {
		$result = run_query("SELECT asideid, title FROM a01sama_asides");
		
		$asides = array();
		while($row = $result ->fetch_assoc()){
			$asides[ $row['asideid']] = $row['title'];
		}
		
		echo'
		<form method = "get" action ="delete_has_aside.php">'.
			return_option_select('asideid',$asides,'Select an aside').'
			<input type = "submit">
		</form>';
}
if ($pageid == '') {
		$result2 = run_query("SELECT pageid, title FROM a01sama_pages");
		
		$pages= array();
		while($row = $result2 ->fetch_assoc()){
			$pages[ $row['pageid']] = $row['title'];
		}
		
		echo'
		<form method = "get" action ="delete_has_aside.php">'.
			return_option_select('asideid',$asides,'Select an aside').'
			<input type = "submit">
		</form>';
}
else if ($action=='delete') {
	$sql = "DELETE FROM a01sama_has_aside WHERE asideid = '$asideid' and pageid = '$pageid'";
	run_query($sql);

	// $sql = "DELETE FROM asides WHERE asideid='$asideid'";
	// $sql = "DELETE FROM has_aside WHERE asideid='$aid' AND asideid='$pid'";
	
	echo'
	<p><a href="index.php?asideid='.$asideid.'">'.$asideid.'</b> was updated for a01sama_has_asides</p>
	<a href="control_panel.php"" class="btn btn-info">Control Panel</a>';
}
else {		
	echo '
		<p>Are you sure you want to delete <b>'.$asideid.'</b> from a01sama_has_asides?</p>
		<p>
			<a href="delete_has_aside.php?action=delete&asideid='.$asideid.'&pageid='.$pageid.'" class="btn btn-danger">Yes</a>
		</p>';
}

echo '</div>';

echo_foot();

?>