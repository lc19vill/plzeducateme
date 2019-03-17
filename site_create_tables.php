<?
	
require_once('site_db.php');

$sq1 = "CREATE TABLE IF NOT EXISTS `reqPanic` (
  `reqid` varchar(32) NOT NULL,
  `reqname` varchar(64) NOT NULL,
  `subject` varchar(32) DEFAULT NULL,
  `phone` varchar(32),
  PRIMARY KEY (`reqid`)
)";
run_query($sq1);
echo 'SUCCESS: The following query executed: <pre>'.$sq1.'</pre>';

$sq2 = "CREATE TABLE IF NOT EXISTS `teacher` (
  `tid` varchar(32) NOT NULL,
  `tname` varchar(64) NOT NULL,
  `rating` varchar(32) DEFAULT NULL,
  `subject` varchar(32),
  `pta` varchar(32),
  `phone` varchar(32),
  PRIMARY KEY (`tid`)
)";

run_query($sq2);

echo 'SUCCESS: The following query executed: <pre>'.$sq2.'</pre>';
	
$sq3= "CREATE TABLE IF NOT EXISTS `request` (
  `reqID` varchar(32) NOT NULL,
  `tID` varchar(32) NOT NULL,
  `subjectR` varchar(32) DEFAULT NULL,
  FOREIGN KEY(`reqID`)
  REFERENCES sq1 (`reqid`),
  FOREIGN KEY(`tID`)
  REFERENCES sq2 (`tid`),
  FOREIGN KEY(`subjectR`)
  REFERENCES sq1 (`subject`),
  PRIMARY KEY (`reqID`, `tID`)
)";
run_query($sq3);

echo 'SUCCESS: The following query executed: <pre>'.$sq3.'</pre>';

?>