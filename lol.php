<?php
$a= [
    'lol',
    'ça',
    'ne',
    'marche',
    'pas',
];

$i= 0;
while( isset($a[$i])){
    $i++;
}

var_dump($i);








$b= 'test';

class Cool{
    public function prout(){
        var_dump($b);
    }
}

$c= new Cool();
$c->prout();