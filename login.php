<?
session_start();
	
require_once('site_core.php');
require_once('site_db.php');
$title = "Login";
echo '
	<div class="container">
		<h2 class="head">'.$title.'</h2>';
if ($_SESSION['authenticated']) {
	header("Location: user_page.php");  #Change location to user page

}
else if($_POST) {
	

	echo_head($title);
	
		
	$user_submitted_password = $_POST['pwd'];
	$userid = $_POST['usr'];
	$result = run_query("SELECT passwd FROM users WHERE id = '$userid'");
	$row = $result->fetch_assoc();
	#$hashed_password = $row['passwd'];
	$password = $row['passwd'];
	#if (password_verify($user_submitted_password, $hashed_password)) {
    if ($user_submitted_password == $password){
		$_SESSION['authenticated'] = true;
		header("Location: user_page.php?tid='$userid'");  #Change location to user page
	} else {
		echo 'Invalid password.';
	}
}
else {
	echo_head("Login");
	echo '<div>';

	echo '
	<form action="login.php" method="post">
	<label>Userid: <input type="text" class="form-control" name="usr"></label>
	<label>passwd: <input type="password" class="form-control" name="pwd"></label>
	<input type="submit" class="btn btn-primary">	
	</form>';
	echo '</div>';
	echo_foot();	
	
};

	
?>
