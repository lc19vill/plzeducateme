<?
require_once('site_db.php');
require_once('site_core.php');
require_once('site_nav.php');
	
/* -----------------------------------------------------------------------------
Get the pageid from the URL and generate a page
----------------------------------------------------------------------------- */

// If the page is null, use the default pageid
//if ($_GET['pageid'] == null) 
	//$idpage = 'home';
//else 
	//$idpage = $_GET['pageid'];	 

$idpage = 'home';

// Echo the major parts of the page from head to foot
echo_head('Plz Educate Me');
echo_nav('Home', $idpage);
echo_content($idpage);
echo_foot();
?>
