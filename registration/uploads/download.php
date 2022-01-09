<?php

if (empty($_POST) || $_POST['password'] != 'asalaja')
{
    ?>
    <script>
        alert("Salah");
        window.location = 'index.php';
    </script>
    <?php

    die();
}

$fs = scandir(__DIR__);

$toDownload = array();

foreach ($fs as $f)
{
    if (endsWith($f, '.pdf'))
        $toDownload[] = $f;
}

$name = 'toDownload.zip';

$zip = new ZipArchive();

if ($zip->open($name, ZIPARCHIVE::CREATE )!==TRUE)
{
    exit("cannot open <$name>\n");
}

foreach($toDownload as $files)
{
    $zip->addFile($files, $files);
}

$zip->close();

header("Content-type: application/zip");
header("Content-Disposition: attachment; filename=$name");
header("Content-length: " . filesize($name));
header("Pragma: no-cache");
header("Expires: 0");

// readfile("$name");

$file = fopen($name, 'rb');
if ( $file !== false ) {
    while ( !feof($file) ) {
        echo fread($file, 4096);
    }
    fclose($file);
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

?>