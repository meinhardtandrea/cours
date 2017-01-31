function cb() {
    var nbre = window.prompt('Saisissez votre numéro de CB à 16 chiffres (sans espace): ');
    var cle = 0;
    for(var i=0 ; i<16 ; i++){
       var chiffre = nbre[i];
       chiffre = parseInt(chiffre);
       
       if(i%2 == 0){
           var pdt = chiffre* 2;
           
           if(pdt > 9){
               var dizaine = 1;
               var unite = pdt - 10;
               var plus = dizaine + unite ; 
               cle = cle + plus ; 
           }else{
               cle = cle + pdt ;
           }
       }else{
          pdt = chiffre* 1;
          cle = cle + pdt;
       }
    }
    document.write('Votre clé = ' + cle);
    if(cle%10 == 0){
        document.write('<br>La clé est un multiple de 10. Votre numéro de carte est <b>valide</b>. ');
    }else{
        document.write("<br>La clé n'est pas un multiple de 10. Votre numéro de carte <b>n'est pas valide</b>. ");
    }
}


