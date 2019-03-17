<?
require_once('site_forms.php');
require_once('site_core.php');
require_once('site_db.php');

// Set the title of the aside
$title = "Update Aside";

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
		<form method = "get" action ="update_aside.php">'.
			return_option_select('asideid',$asides,'Select an aside').'
			<input type = "submit">
		</form>';
}
else if ($action=='update') {
	$title = $_POST['title'];
	$content = $_POST['content'];
	$color = $_POST['color'];
	$sql = "UPDATE a01sama_asides SET title = '$title', content = '$content', color = '$color' WHERE asideid = '$asideid'";
	run_query($sql);
	
	echo '
	<p><a href="index.php?asideid='.$asideid.'">'.$asideid.'</b> was updated for a01sama_asides</p>
	<a href="control_panel.php"" class="btn btn-info">Control Panel</a>';
}
else {
		$result = run_query("SELECT asideid, title FROM a01sama_asides");
		$asides = array();
		while($row = $result ->fetch_assoc()){
			$asides[ $row['asideid']] = $row['title'];
		}
		$result = run_query("SELECT * FROM a01sama_asides WHERE asideid='$asideid'");
		$values = $result->fetch_assoc();
		
	// Ouput the edit form <form action="update_aside.php?action=update&asideid='.$asideid.'" method="post">
		
	//		<label>Aside ID: </label> <b>'.$asideid.'</b><br>'.
		//	return_input_text('title','Aside Title',$values['title'],true).
		//	return_textarea('content','Aside Content',$values['content']). 	
		//	return_option_select('color',$asides,'Color',$values['color']).'
		//	<input type="submit" class="btn btn-primary" value="Update">
	//	</form>';
	
	echo '
		<form action="update_aside.php?action=update&asideid='.$asideid.'" method="post">
			<label>Aside ID: </label> <b>'.$asideid.'</b><br>'.
			return_input_text('title','Aside Title',$values['title'],true).
			return_textarea('content','Aside Content',$values['content']). 	
			return_input_text('color','Color Page',$values['color']).'
			<input type="submit" class="btn btn-primary" value="Update">
			
		</form>';
}

echo '</div>';
echo_foot();

?>