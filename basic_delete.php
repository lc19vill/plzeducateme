<?
require_once('site_forms.php');
require_once('site_core.php');
require_once('site_db.php');

// Set the title of the page
$title = "Delete Page";

echo_head($title);

echo '
	<div class="container">
		<h2 class="head">'.$title.'</h2>';
		

$pageid = $_GET['pageid'];
$action = $_GET['action'];

if ($pageid == '') {
		$result = run_query("SELECT pageid, title FROM a01sama_pages");
		
		$pages = array();
		while($row = $result ->fetch_assoc()){
			$pages[ $row['pageid']] = $row['title'];
		}
		
		echo'
		<form method = "get" action ="basic_delete.php">'.
			return_option_select('pageid',$pages,'Select a page').'
			<input type = "submit">
		</form>';
}
else if ($action=='delete') {
	$sql = "DELETE FROM a01sama_pages WHERE pageid='$pageid'";
	run_query($sql);

	// $sql = "DELETE FROM asides WHERE asideid='$pageid'";
	// $sql = "DELETE FROM has_aside WHERE asideid='$aid' AND pageid='$pid'";
	
	echo '<p><b>'.$pageid.'</b> was deleted from a01sama_pages</p>
	<a href="control_panel.php"" class="btn btn-info">Control Panel</a>';
}
else {		
	echo '
		<p>Are you sure you want to delete <b>'.$pageid.'</b> from a01sama_pages?</p>
		<p>
			<a href="basic_delete.php?action=delete&pageid='.$pageid.'" class="btn btn-danger">Yes</a>
		</p>';
}

echo '</div>';

echo_foot();

?>