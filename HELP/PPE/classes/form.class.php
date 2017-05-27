<?php
class Formulaire{
    const DEB_FORM = '<form method="';
    const FIN_FORM = '</form>';
    private $method;
    private $action;
    private $label;
    private $inputname;
    private $submitval;
    private static $nbinput = 0;

    public function form($method,$action){
        $this->method = $method;
        $this->action = $action;
        return self::DEB_FORM.$this->method.'" action="'.$this->action.'">';
    }
    public function inputText($label,$inputname){
        $this->inputname = $inputname;
        $this->label = $label;
        self::$nbinput++;
        return '<p>'.$this->label.' : <input type="text" name="'.$this->inputname.'"></p>';
    }
    public function submit($submitval){
        $this->submitval = $submitval;
        return '<input type="submit" value="'.$this->submitval.'" class="envoy">';
    }
    public function fabriqueForm(){
        return self::FIN_FORM;
    }
}