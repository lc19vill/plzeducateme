<?

require_once('site_core.php');
require_once('site_db.php');
require_once('site_nav.php');

// Set the title of the page
$title = "Requests";

echo_head($title);

echo '
	<div class="container">
		<h2 class="head">'.$title.'</h2>';


// Get the column info first
$tid = $_GET['tid'];
$result = run_query("SHOW COLUMNS FROM request");

// Output the column titles
echo '<table class="table">';
echo '<tr>
			<th>Action</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Phone Number</th>';

echo '</tr>';

$result->close();

$sql = run_query("SELECT * FROM subject where id=$tid");
while ($row1 = $sql->fetch_row()){
    $result = run_query("SELECT * FROM request where pteacher=$tid and teacher!='none' or teacher='none' and subject=$row1[1]");
    while ($row2 = $result->fetch_row()){ 
        echo '<tr>
                    <td>
                        <a href="accept.php?tid='.$tid.'&sid='.$row2[0].'"class="btn btn-success">Accept</a>
                    </td>';
        // Loops for each column in a row
	    foreach ($row as $value) {
		   echo '<td>'.$value.'</td>';
	    }
	    echo '</tr>';
    }
    
}
echo '</table>';

#$result->close();

echo '</div>';

echo_foot();

?>
