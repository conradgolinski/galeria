<?php
$result = 1;
if($_POST['folder'] != ''){
    $result = 2;
    $path = "../zdjecia/".$_POST['folder'];
    mkdir($path, 0777, true);
}
echo json_encode($result);
?>