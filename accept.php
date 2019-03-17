<?

require_once('site_core.php');
require_once('site_db.php');
require_once('site_nav.php');

// Set the title of the page
$title = "Success";

echo_head($title);

$tid = $_GET['tid'];

$sql = "UPDATE users SET teacher = '$tid', type = '$type' WHERE userid = '$userid'";
run_query($sql);

header("Location: user_page.php");

echo_foot();

?>