<?
require_once('site_forms.php');
require_once('site_core.php');
require_once('site_db.php');

// Set the title of the aside
$title = "Update User";

echo_head($title);

echo '
	<div class="container">
		<h2 class="head">'.$title.'</h2>';
		

$userid = $_GET['userid'];
$action = $_GET['action'];

if ($userid == '') {
		$result = run_query("SELECT userid, passwd FROM users");
		
		$users = array();
		while($row = $result ->fetch_assoc()){
			$users[ $row['userid']] = $row['passwd'];
		}
		
		echo'
		<form method = "get" action ="update_user.php">'.
			return_option_select('userid',$users,'Select a user').'
			<input type = "submit">
		</form>';
}
else if ($action=='update') {
	$passwd = $_POST['passwd'];
	$type = $_POST['type'];
	
	$sql = "UPDATE users SET passwd = '$passwd', type = '$type' WHERE userid = '$userid'";
	run_query($sql);
	
	echo '
	<p><a href="index.php?userid='.$userid.'">'.$userid.'</b> was updated for users</p>
	<a href="control_panel.php"" class="btn btn-info">Control Panel</a>';
}
else {
		$result = run_query("SELECT userid, passwd FROM users");
		$users = array();
		while($row = $result ->fetch_assoc()){
			$users[ $row['userid']] = $row['passwd'];
		}
		$result = run_query("SELECT * FROM users WHERE userid='$userid'");
		$values = $result->fetch_assoc();
		
	// Output the edit form
	echo '
		<form action="update_user.php?action=update&userid='.$userid.'" method="post">
			<label>User ID: </label> <b>'.$userid.'</b><br>'.
			return_input_password('passwd','Password',$values['passwd'],true).
			return_input_text('type','Type',$values['type'],true).'
			<input type="submit" class="btn btn-primary" value="Submit">
			<a href="?" class="btn btn-warning">Clear</a>
		</form>';	
}

echo '</div>';
echo_foot();

?>