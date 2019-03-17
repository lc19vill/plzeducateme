<?
require_once('site_forms.php');
require_once('site_core.php');
require_once('site_db.php');

// Set the title of the page
$title = "Update Page";

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
		<form method = "get" action ="update.php">'.
			return_option_select('pageid',$pages,'Select a page').'
			<input type = "submit">
		</form>';
}
else if ($action=='update') {
	$title = $_POST['title'];
	$content = $_POST['content'];
	$parent = $_POST['parent'];
	$sql = "UPDATE a01sama_pages SET title = '$title', content = '$content', parent = '$parent' WHERE pageid = '$pageid'";
	run_query($sql);
	
	echo '
	<p><a href="index.php?pageid='.$pageid.'">'.$pageid.'</b> was updated for a01sama_pages</p>
	<a href="control_panel.php"" class="btn btn-info">Control Panel</a>';
}
else {
		$result = run_query("SELECT pageid, title FROM a01sama_pages");
		$pages = array();
		while($row = $result ->fetch_assoc()){
			$pages[ $row['pageid']] = $row['title'];
		}
		$result = run_query("SELECT * FROM a01sama_pages WHERE pageid='$pageid'");
		$values = $result->fetch_assoc();
		
	// Ouput the edit form
	echo '
		<form action="update.php?action=update&pageid='.$pageid.'" method="post">
			<label>Page ID: </label> <b>'.$pageid.'</b><br>'.
			return_input_text('title','Page Title',$values['title'],true).
			return_textarea('content','Page Content',$values['content']). 	
			return_option_select('parent',$pages,'Parent Page',$values['parent']).'
			<input type="submit" class="btn btn-primary" value="Update">
		</form>';	
}

echo '</div>';

echo_foot();

?>