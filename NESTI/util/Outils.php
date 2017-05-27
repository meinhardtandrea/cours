<?php
namespace Outils {
    
    function hashMdp($mdp){
        if(strlen($mdp) < 7){
            return NULL;
        }else{
            $mdp = hash('sha256',$mdp); 
            return $mdp;
        }
    }
    
    function decryptMdp($mdp_hash){
        
    }
}
?>