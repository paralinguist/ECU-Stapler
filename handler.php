<?php

// A list of permitted file extensions
$allowed = array('pdf');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

        $uploaded_name = uniqid('part-');
	//if(move_uploaded_file($_FILES['upl']['tmp_name'], '../private/'.$_FILES['upl']['name']))
	if(move_uploaded_file($_FILES['upl']['tmp_name'], '../private/'.$uploaded_name))
        {
		echo $uploaded_name;
		exit;
	}
}

echo '{"status":"error"}';
exit;

