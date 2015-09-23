<?php
session_start();
// A list of permitted file extensions
$allowed = array('pdf');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0)
{
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed))
  {
		echo '{"status":"error"}';
		exit;
	}

  $uploaded_name = uniqid('part-');
  mkdir('../private/' . session_id(), 0710, true);
	if(move_uploaded_file($_FILES['upl']['tmp_name'], '../private/' . session_id() . '/' . $uploaded_name))
  {
		echo $uploaded_name;
		exit;
	}
}

echo '{"status":"error"}';
exit;

