<? 
session_start();
if(!$_SESSION['authenticated']) die('access denied');

require_once('site_db.php');
require_once('site_core.php');
require_once('site_nav.php');


$title = "Control Panel";

echo_head($title);

echo '
<div class="container">
	<h2 class="head">'.$title.'</h2>

	<h3>Manage Asides</h3>
	<ul>
	<li><a href="insert_aside.php"" class="btn btn-info">Insert Aside</a></li>
	<h3></h3>
	<li><a href="show_asides_table.php?table=a01sama_asides"" class="btn btn-info">Update/Delete Asides</a></li>
	<h3></h3>
	</ul>
	<h3>Manage Pages</h3>
	<ul>
	<li><a href="insert_page.php"" class="btn btn-info">Insert Page</a></li>
	<h3></h3>
	<li><a href="show_pages_table.php?table=a01sama_pages"" class="btn btn-info">Update/Delete Pages</a></li>
	<h3></h3>
	</ul>
	<h3>Manage Users</h3>
	<ul>
	<li><a href="insert_user.php"" class="btn btn-info">Insert User</a></li>
	<h3></h3>
	<li><a href="show_table.php?table=a01sama_users"" class="btn btn-info">Update/Delete Users</a></li>
	<h3></h3>
	</ul>
	<h3>Manage Aside Relationships</h3>
	<ul>
	<li><a href="insert_has_aside.php"" class="btn btn-info">Insert Aside Relationship</a></li>
	<h3></h3>
	<li><a href="show_has_aside_table.php?table=a01sama_has_aside"" class="btn btn-info">Update/Delete Asides Relationships</a></li>
	<h3></h3>
	</ul>
	<h3></h3>
	<h3></h3>
	<h3></h3>
	<a href="admin_logout.php" class="btn btn-primary">Logout</a>
	</div>';

echo_foot();
?>