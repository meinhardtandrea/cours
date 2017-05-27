<?php
include('inc/header.inc.php');
include('inc/classes.inc.php');

$train75 = new Train();
$train76 = new Train();
$train77 = new Train();

//$train75->vitesse=10000;
echo '<p><b>'.Train::$nb_trains.'</b><br/></p>'."\n";

echo $train75->Accelerer(50).'<br/>'."\n";
echo $train75->Monter()."\n";
echo $train75->Accelerer(10).'<br/>'."\n";
echo $train75->Monter()."\n";
echo $train75->Accelerer(20).'<br/>'."\n";
echo $train75->Monter()."\n";
echo $train75->Accelerer(50).'<br/>'."\n";
echo $train75->Monter().'<br/>'."\n";
echo $train75->Stopper().'<br/>'."\n";
echo $train75->Monter().'<br/>'."\n";
echo $train75->Accelerer(10).'<br/>'."\n";
echo $train75->Monter().'<br/>'."\n";
echo $train75->Accelerer(20).'<br/>'."\n";
echo $train75->Monter().'<br/>'."\n";
echo $train75->Accelerer(50).'<br/>'."\n";
echo $train75->Monter().'<br/>'."\n";
echo $train75->Ralentir(50).'<br/>'."\n";
echo $train75->Monter().'<br/>'."\n";
echo $train75->Ralentir(50).'<br/>'."\n";
echo $train75->Monter().'<br/>'."\n";

include('inc/footer.inc.php');
?>