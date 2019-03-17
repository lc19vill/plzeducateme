<?
	
require_once('site_db.php');

$sq1 = "CREATE TABLE IF NOT EXISTS `a01sama_pages` (
  `pageid` varchar(32) NOT NULL,
  `title` varchar(64) NOT NULL,
  `parent` varchar(32) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`pageid`)
)";
run_query($sq1);
echo 'SUCCESS: The following query executed: <pre>'.$sq1.'</pre>';

$sq2 = "CREATE TABLE IF NOT EXISTS `a01sama_asides` (
  `asideid` varchar(32) NOT NULL,
  `title` varchar(64) NOT NULL,
  `color` varchar(32) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`asideid`)
)";

run_query($sq2);

echo 'SUCCESS: The following query executed: <pre>'.$sq2.'</pre>';
	
$sq3= "CREATE TABLE IF NOT EXISTS `a01sama_has_aside` (
  `pageid` varchar(32) NOT NULL,
  `asideid` varchar(32) NOT NULL,
  `ord` int(11) DEFAULT NULL,
  PRIMARY KEY (`pageid`,`asideid`)
)";
run_query($sq3);

echo 'SUCCESS: The following query executed: <pre>'.$sq3.'</pre>';

?>