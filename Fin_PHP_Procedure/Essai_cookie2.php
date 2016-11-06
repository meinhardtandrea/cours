<?php
if(isset($_COOKIE['identification'])){
    foreach ($_COOKIE['identification'] as $name => $value){
        echo 'Vous vous appelez ' . $value . '.<br />';
    }
}
?>
