<?php

if (!empty($_POST))
{

	$pdfa = explode(',', $_POST['pdf']);
    $data = base64_decode($pdfa[1]);
 
	$breed = $_POST['breedsd']; 
	$exhibitor = $_POST['exhibitorsd']; 
	$phonenumber = $_POST['phonenumbersd']; 
	

    $vdir_upload = __DIR__ . "/uploads/";
    $nama_file = 'pdf_' . $breed . "_" . $exhibitor . "_" . $phonenumber . "_" . microtime(true) . '.pdf';
    $vfile_upload = $vdir_upload . $nama_file;

    file_put_contents($vfile_upload, $data);
}

?>