<?php
class Categorie{
    private $cat_id;
    private $cat_name;
    
    public function __get($var){
        return $var;
    }
    
    public function __setNom($var){
        $this->cat_name = $var;
        $this->cat_name = substr($this->cat_name, 0, 28);
    }
}


?>