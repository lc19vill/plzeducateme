<?
 require_once('site_core.php');
 require_once('site_nav.php');
 echo_head('Site Test');
 echo '
  <div class="container">
	<div class="alert alert-primary" role="alert">
	This is a primary alert—check it out!
	<button type="button" class="btn btn-primary">Primary</button>
	</div>
  </div>';
 echo_foot();
?>