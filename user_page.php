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
echo '<tr>
		<td>
			<a href="https://forms.zoho.com/sienamlhtest/report/INEEDHELP_Report/records/web"class="btn btn-success">Accept</a>
		</td>
		<td>
			Luis
		</td>
		<td>
			Math
		</td>
		<td>
			555-3332
		</td>
	</tr>';

while ($row1 = $sql->fetch_row()){
    $result = run_query("SELECT * FROM request where pteacher=$tid");
    while ($row2 = $result->fetch_row()){ 
        echo '<tr>
                    <td>
                        <a href="accept.php?tid='.$tid.'&sid='.$row2[0].'"class="btn btn-success">Accept</a>
                    </td>';
        // Loops for each column in a row
	foreach ($row2 as $value) {
		 echo '<td>'.$value.'</td>';
	 }
	 echo '</tr>';
    }
    
}
echo '</table>';
echo '<a href="https://zfrmz.com/xLzi2uZ9Pyo9yf1hOUsi"class="btn btn-danger btn-lg">Panic!</a>';
echo '<a href="https://zfrmz.com/xLzi2uZ9Pyo9yf1hOUsi"class="btn btn-warning btn-lg">Request</a>';
#$result->close();

echo '</div>';

echo_foot();

?>
