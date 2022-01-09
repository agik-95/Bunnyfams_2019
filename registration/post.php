<?php

if (!empty($_POST))
{

	$pdfa = explode(',', $_POST['pdf']);
    $data = base64_decode($pdfa[1]);
	
	$earno = $_POST ['earnosd'];
	$exhibitor = $_POST['exhibitorsd']; 
	$phonenumber = $_POST['phonenumbersd'];
	$city = $_POST['citysd'];  
	$breed = $_POST['breedsd']; 
	$variety = $_POST['varietysd']; 
	$buck = $_POST['bucksd']; 
	$prejr = $_POST['prejrsd']; 
	

    $vdir_upload = __DIR__ . "/uploads/";
    $nama_file = '' . $earno . "_" . $exhibitor . "_" . $phonenumber . "_" . $city . "_" . $breed . "_" . $variety . "_" . $buck . "_" . $prejr . "_" . microtime(true) . '.pdf';
    $vfile_upload = $vdir_upload . $nama_file;

    file_put_contents($vfile_upload, $data);
}

?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="css/stylepost.css"> 
<script src=""></script>
</head>

<body>
<!--
<a href="uploads" target="_blank">Buka folder</a>
-->
<?php if (!empty($_POST)) { ?>
<script>
    alert("Sukses upload");
</script>
<?php } ?>


</body>

</html>
