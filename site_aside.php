<?
function return_aside_content($pageid, $title)
{
	
	$aside_content = '';
	$aside_content.= return_asidemenu($pageid, $title);
	$aside_content.= return_asides($pageid);
	
	if ($aside_content!='')
	{
		$aside_content ='
		<div class = "col-sm-4">'.
		$aside_content.'
		</div>';
	}
	return $aside_content;
	
}

function echo_aside_content($pageid, $title)
{
	echo return_aside_content($pageid, title);
}


function return_asides($pageid)
{
	$output='';
	$sql = "SELECT asideid FROM a01sama_has_aside WHERE pageid= '".$pageid."' by ASC order";
	$asides = run_query($sql);
	if ($asides -> num_rows >0)
	{
		while ($asides = $asides -> fetch_assoc())
		{
			$asideid = $aside['asideid'];
			$sql = "SELECT title, content, color FROM a01sama_asides WHERE asideid = '".$asideid."'";
			$content = run_query($sql)->fetch_assoc();
			$output.='
			<aside style = "background-color: '.$content['color'].'">
			<h3>'.$content['title'].'</h3>
			'.content['content'].'
			</aside>';
			
		}
		
	}
	return $output;
}
function echo_asides($pageid)
{
	echo return_asides($pageid);
}