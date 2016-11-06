<?php include 'Header.php';?>
<?php

for($Nombre=1;$Nombre<=30;$Nombre++)
{
    $Carre=$Nombre*$Nombre;
    echo'<li>' . $Nombre . '<sup>2</sup>=' . $Carre . '</li>';  
}
?>
<?php include 'Footer.php';?>