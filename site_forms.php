<?
	
/* -----------------------------------------------------------------------------
Returns the HTML of a labeled input text element with Bootstrap class names

Input: 
  Name of element (string)
  Text label of element (string)
  Value of element (string)
  Is the element required (boolean)
  

Output: HTML text (string)	
----------------------------------------------------------------------------- */
	
function return_input_text($name, $label, $value='', $required=false) {
	if ($required) $req = 'required';
	else $req = '';
	return '
		<div class="form-group">
			<label for="'.$name.'">'.$label.'</label>
			<input type="text" class="form-control" name="'.$name.'" id="'.$name.'" value="'.$value.'" '.$req.'>
		</div>';
}

function return_input_password($name, $label, $value='', $required=false) {
	if ($required) $req = 'required';
	else $req = '';
	return '
		<div class="form-group">
			<label for="'.$name.'">'.$label.'</label>
			<input type="password" class="form-control" name="'.$name.'" id="'.$name.'" value="'.$value.'" '.$req.'>
		</div>';
}
/* -----------------------------------------------------------------------------
Echos return_input_text
----------------------------------------------------------------------------- */
function echo_input_text($name, $label, $value) {
	echo return_input_text($name, $label, $value);
}


function return_textarea($name, $label, $value='', $required=false) {
	if ($required) $req = 'required';
	else $req = '';
	return '
		<div class="form-group">
			<label for="'.$name.'">'.$label.'</label>
			<textarea class="form-control" name="'.$name.'" id="'.$name.'" rows="10" '.$req.'>'.$value.'</textarea>
		</div>';
}
/* -----------------------------------------------------------------------------
Echos return_textarea
----------------------------------------------------------------------------- */
function echo_textarea($name, $label, $value) {
	echo return_textarea($name, $label, $value);
}


/* -----------------------------------------------------------------------------
Returns the HTML of a form for inserting rows into the pages table

Input:  Previously submitted values (associative array)
Output: HTML text (string)	
----------------------------------------------------------------------------- */
function return_page_form($values) {
	return '
		<form action="?action=insert" method="post">'.
			return_input_text('pageid','Page ID',$values['pageid'],true).
			return_input_text('title','Page Title',$values['title'],true).
			return_textarea('content','Page Content',$values['content']).'
			<input type="submit" class="btn btn-primary" value="Submit">
			<a href="?" class="btn btn-warning">Clear</a>
		</form>';
}
/* -----------------------------------------------------------------------------
Echos return_page_form
----------------------------------------------------------------------------- */
function echo_page_form($values) {
	echo return_page_form($values);
}

/* -----------------------------------------------------------------------------
Inserts a new row into the pages table.

Input:  Posted values (associative array)
Output: None	
----------------------------------------------------------------------------- */
function insert_page($values) {
	$pageid = $values['pageid'];
	$title = $values['title'];
	$content = $values['content'];
	$sql = "INSERT INTO a01sama_pages (pageid, title, content) VALUES ('$pageid','$title','$content')";
	run_query($sql);
}
		

		

/* -----------------------------------------------------------------------------
Returns the HTML of a form for inserting rows into the pages table

Input:  Previously submitted values (associative array)
Output: HTML text (string)	
----------------------------------------------------------------------------- */
function return_user_form($values) {
	return '
		<form action="?action=insert" method="post">'.
			#return_input_text('id','User ID',$values['id'],true).
			#return_input_text('name','Name',$values['name'],true).
			#return_input_password('passwd','Password',$values['passwd'],true).
			#return_input_text('phonenumber','Phone Number',$values['phonenumber'],true).
			#return_input_text('estresponsetime','Estimated Response Time',$values['estresponsetime'],true).'
			
			return_input_text('id','User ID',$values[0],true).
			return_input_text('name','Name',$values[1],true).
			return_input_password('passwd','Password',$values[2],true).
			return_input_text('phonenumber','Phone Number',$values[3],true).
			return_input_text('estresponsetime','Estimated Response Time',$values[4],true).'
			<input type="submit" class="btn btn-primary" value="Submit">
			<a href="?" class="btn btn-warning">Clear</a>
		</form>';
}
/* -----------------------------------------------------------------------------
Echos return_page_form
----------------------------------------------------------------------------- */



function echo_user_form($values) {
	echo return_user_form($values);
}

/* -----------------------------------------------------------------------------
Inserts a new row into the pages table.

Input:  Posted values (associative array)
Output: None	
----------------------------------------------------------------------------- */
function insert_user($values) {
	$id = $values['id'];
	$name = $values['name'];
	$passwd = $values['passwd'];
	$hashed_passwrd = password_hash($passwd, PASSWORD_DEFAULT);
	
	$phonenumber = $values['phonenumber'];
	$rating = 5;
	$estresponsetime = $values['estresponsetime'];
	$sql = "INSERT INTO users (id, name, passwd, phonenumber,rating, estresponsetime) VALUES ('$id', '$name','$hashed_passwrd', '$phonenumber', $rating, $estresponsetime)";
	run_query($sql);
}

		
		
		
		
		
		
		
/* -----------------------------------------------------------------------------
Returns the HTML of a form for inserting rows into the pages table

Input:  Previously submitted values (associative array)
Output: HTML text (string)	
----------------------------------------------------------------------------- */
function return_aside_form($values) {
	return '
		<form action="?action=insert" method="post">'.
			return_input_text('asideid','Aside ID',$values['asideid'],true).
			return_input_text('title','Aside Title',$values['title'],true).
			return_textarea('content','Aside Content',$values['content']). 	
			return_input_text('color','Color Page',$values['color']).'
			<input type="submit" class="btn btn-primary" value="Submit">
			<a href="?" class="btn btn-warning">Clear</a>
		</form>';
}
/* -----------------------------------------------------------------------------
Echos return_page_form
----------------------------------------------------------------------------- */
function echo_aside_form($values) {
	echo return_aside_form($values);
}
/* -----------------------------------------------------------------------------
Inserts a new row into the pages table.

Input:  Posted values (associative array)
Output: None	
----------------------------------------------------------------------------- */
function insert_aside($values) {
	$asideid = $values['asideid'];
	$title = $values['title'];
	$content = $values['content'];
	$color = $values['color'];
	$sql = "INSERT INTO a01sama_asides (asideid, title, content, color) VALUES ('$asideid','$title','$content','$color')";
	run_query($sql);
}



function return_has_aside_form($values) {
	return '
		<form action="?action=insert" method="post">'.
			return_input_text('asideid','Aside ID',$values['asideid'],true).
			return_input_text('pageid','Page ID',$values['pageid'],true).
			//return_textarea('content','Aside Content',$values['content']). 	
			return_input_text('ord','Order',$values['ord']).'
			<input type="submit" class="btn btn-primary" value="Submit">
			<a href="?" class="btn btn-warning">Clear</a>
		</form>';
}
/* -----------------------------------------------------------------------------
Echos return_page_form
----------------------------------------------------------------------------- */
function echo_has_aside_form($values) {
	echo return_has_aside_form($values);
}

/* -----------------------------------------------------------------------------
Inserts a new row into the pages table.

Input:  Posted values (associative array)
Output: None	
----------------------------------------------------------------------------- */
function insert_has_aside($values) {
	$asideid = $values['asideid'];
	$pageid = $values['pageid'];
	//$content = $values['content'];
	$ord = $values['ord'];
	$sql = "INSERT INTO a01sama_has_aside (asideid, pageid,ord) VALUES ('$asideid','$pageid','$ord')";
	run_query($sql);
}

/* -----------------------------------------------------------------------------
Echo an option select menu

Input:
label - The label of the form element (string)
name - Uses as both the name and id of the element (string)
list - An assoicative array of unique ids and display titles

Output:  None, this function will echo HTML but return null	
----------------------------------------------------------------------------- */
		
function return_option_select($name, $list, $label='', $v='') {
	$ouput = '
	<div class="form-group">';
	
	if ($label != '')
	$ouput .= '
		<label for="'.$name.'">'.$label.'</label>';
		
	$ouput .= '		
		<select class="form-control" id="'.$name.'" name="'.$name.'">';

	foreach ($list as $id => $title) {
		$selected = '';
		if ($id == $v) $selected = 'selected';
		$ouput .= '
			<option value="'.$id.'" '.$selected.'>'.$title.'</option>';
	}
	$ouput .=  '
		</select>
	</div>';
	return $ouput;
}
/* -----------------------------------------------------------------------------
Echos eturn_option_select
----------------------------------------------------------------------------- */
function echo_option_select($name, $list, $label, $v) {
	echo return_option_select($name, $list, $label, $v);
}


/* ------------------------------------------------------
	
Create a page and test the echo_option_select functions
	
------------------------------------------------------ */
		
?>
