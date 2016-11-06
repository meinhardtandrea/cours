<?php
$file = fopen('index.php','w');
$montxt='Bonjour SIO';
while (!feof($file)){
    echo fread($file,8192);
}
fwrite($file,$montxt);
while(!feof($file)){
    echo fread($file,8192);
}
fclose($file);
?>