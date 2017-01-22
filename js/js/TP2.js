//TP2

//Les instructions if et if . . . else (SI et SI ALORS … SINON)

function exo1(){
    var x = window.prompt('Saisissez un nombre : ') ;
    var y = window.prompt('Saisissez un autre nombre : ') ;
    var choix = window.prompt('Si vous souhaitez effectuer une somme, tapez S (en majuscule). Si vous souhaitez effectuer un produit, tapez P (en majuscule) : ') ;
    
    x = parseInt(x) ;
    y = parseInt(y) ;
    
    var somme = x+y ;
    var produit = x*y ;
    
    if (choix == 'S') {
        window.alert(x + ' + ' + y + ' = ' + somme) ;
    }
    else {
        if (choix == 'P') {
            window.alert(x + ' x ' + y + ' = ' + produit) ;
        }
        else {
            window.alert('Saisie incorrecte.') ;
        }
    }
    
    
}

function exo2(){
    var genre = window.prompt("Si vous êtes une femme, tapez F (en majuscule). Si vous êtes un homme, tapez H (en majuscule) : ") ;
    
    if(genre == 'F'){
        window.alert('Bonjour madame !') ;
    }
    else{
        if(genre == 'H'){
            window.alert('Bonjour monsieur !') ;
        }
        else{
            window.alert('Saisie incorrecte.') ;
        }
    }
}

function exo3(){
    var x = window.prompt('Saisissez un nombre : ') ;
    x = parseInt(x) ;
    
    if(x>=5 && x<=10){
        window.alert(x + " est compris dans l'intervalle 5-10. ") ;
    }
    else{
        if(x>=15 && x<=20){
            window.alert(x + " est compris dans l'intervalle 15-20. ") ;
        }
        else{
            window.alert(x + " n'est pas compris dans l'intervalle 5-10, ni dans l'intervalle 15-20.") ;
        }
    }
}

function exo4(){
    var montant = window.prompt('Quel est le montant de votre facture ?') ;
    montant = parseFloat(montant) ;
    
    if(montant >= 150.0){
        var montantApayer = montant*0.99 ;
        window.alert('Vous avez droit à une remise de 1%. Le montant à payer de votre facture est de ' + montantApayer + ' €.') ;
    }
    else{
        window.alert('Le montant à payer de votre facture est de ' + montant + ' €.') ;
    }
}

function exo5(){
    var ladate = new Date() ;
    var annee = ladate.getFullYear() ;
    
    var anneeNais = window.prompt('Saisissez votre année de naissance :') ;
    anneeNais = parseInt(anneeNais) ;
    
    var age = annee - anneeNais ;
    window.alert('Vous avez ' + age + ' ans. ') ;   
}

function exo6(){
   
}

//L'instruction for (POUR)

function exo7(){
    var produit = 1 ;
    for(var i=0 ; i<3 ; i++){
        var x = window.prompt('Saisissez un nombre : ') ;
        x = parseFloat(x) ;
        produit *= x ;
    }
    window.alert('Le produit de ces 3 nombres est ' + produit + '. ') ;
}

function exo8(){
    for(var i=1 ; i<=10 ; i++){
        document.write(i + ' fois 3 = ' + i*3 + '<br>') ;
    }
}

function exo9(){
    var produit = 1 ;
    var somme = 0 ;
    var moyenne ;
    for(var i=1 ; i<=3 ; i++){
        var x = window.prompt('Saisissez un nombre : ') ;
        x = parseFloat(x) ;
        produit *= x ;
        somme += x ;
        moyenne = somme/i ;
    }
    window.alert('Le produit de ces 3 nombres est ' + produit + '. ') ;
    window.alert('La moyenne de ces 3 nombres est ' + moyenne + '. ') ;
}

function exo10(){
    var produit = 1 ;
    var compteur = 0 ;
    compteur = parseInt(compteur) ;
    
    for(var i=0 ; i<3 ; i++){
        var x = window.prompt('Saisissez un nombre : ') ;
        x = parseFloat(x) ;
        if(x<0){
            compteur = compteur + 1 ;
        }
        produit *= x ;
    }
    window.alert('Le produit de ces 3 nombres est ' + produit + '. ') ;
    window.alert('Vous avez saisi ' + compteur + ' nombres négatifs. ') ;
}

function exo11(){
    var produit = 1 ;
    var compteur = 0 ;
    compteur = parseInt(compteur) ;
    
    for(var i=0 ; i<3 ; i++){
        var x = window.prompt('Saisissez un nombre : ') ;
        x = parseFloat(x) ;
        if(x%2==0){
            compteur = compteur + 1 ;
        }
        produit *= x ;
    }
    window.alert('Le produit de ces 3 nombres est ' + produit + '. ') ;
    window.alert('Vous avez saisi ' + compteur + ' nombres pairs. ') ;
}

function exo12(){
    var produit = 1 ;
    var compteurPair = 0 ;
    compteurPair = parseInt(compteurPair) ;
    var compteurNeg = 0 ;
    compteurNeg = parseInt(compteurNeg) ;
    
    for(var i=0 ; i<3 ; i++){
        var x = window.prompt('Saisissez un nombre : ') ;
        x = parseFloat(x) ;
        if(x%2==0){
            compteurPair = compteurPair + 1 ;
        }
        if(x<0){
            compteurNeg = compteurNeg + 1 ;
        }
        produit *= x ;
    }
    window.alert('Le produit de ces 3 nombres est ' + produit + '. ') ;
    window.alert('Vous avez saisi ' + compteurPair + ' nombres pairs. ') ;
    window.alert('Vous avez saisi ' + compteurNeg + ' nombres pairs. ') ;
}

function exo13(){
    var x = window.prompt('Saisissez un nombre : ') ;
    x = parseFloat(x) ;
    var n = window.prompt('Saisissez son exposant : ') ;
    n = parseInt(n) ;
    var exp = Math.pow(x,n) ;
    document.write(x + '<sup>' + n + '</sup> = ' + exp) ;
}

function exo14(){
    var x = window.prompt('Saisissez un nombre : ') ;
    x = parseFloat(x) ;
    var n = window.prompt('Saisissez son exposant : ') ;
    n = parseInt(n) ;
    var exp = 1 ;
    for(var i=1 ; i<=n ; i++){
        exp *= x ;  
    }
    document.write(x + '<sup>' + n + '</sup> = ' + exp) ;
}

//L'instruction while (TANT QUE)

function exo15(){
    var produit = 1 ;
    var i = 0 ;
    while (i<3){
        var x = window.prompt('Saisissez un nombre : ') ;
        x = parseFloat(x) ;
        produit *= x ;
        i++ ;
    }
    window.alert('Le produit de ces 3 nombres est ' + produit + '. ') ;
}

function exo16(){
    var n = window.prompt('Saisissez le nombre de nombres que vous souhaitez saisir : ') ;
    n = parseInt(n) ;
    var i = 1 ;
    var produit = 1 ;
    while (i<=n){
        var x = window.prompt('Saisissez un nombre : ') ;
        x = parseFloat(x) ;
        produit *= x ;
        i++ ;
    }
    window.alert('Le produit de ces ' + n + ' nombres est ' + produit + '. ') ;
}

function exo17(){
    
}

function exo18(){

}

function exo19(){
    var x = window.prompt('Saisissez un nombre : ') ;
    x = parseFloat(x) ;
    var n = window.prompt('Saisissez son exposant : ') ;
    n = parseInt(n) ;
    var exp = 1 ;
    var i = 1 ;
    while(i <= n){
        exp *= x ; 
        i++ ;
    }
    document.write(x + '<sup>' + n + '</sup> = ' + exp) ;
}

//Les instructions if et if . . . else (SI et SI ALORS … SINON) imbriquées

function exo20(){
    var mois = window.prompt('Saisissez un mois (format mm) : ') ;
    mois = parseInt(mois) ;
    if (mois < 3 ) {
        document.write("C'est l'hiver.") ;
    }
    else{
        if (mois < 6) {
            document.write("C'est le printemps.") ;
        }
        else {
            if (mois < 9) {
            document.write("C'est l'été.") ;
            }
            else {
               if (mois < 12) {
                    document.write("C'est l'automne.") ;
                }
                else {
                    document.write("C'est l'hiver.") ;
                }
            }
        }
    }
}

function exo21(){
    var etatCivil = window.prompt("Merci de saisir votre état-civil : tapez L pour Mademoiselle, tapez F pour Madame, tapez M pour Monsieur (en majuscule)") ;
    
    if(etatCivil == 'F'){
        window.alert('Bonjour Madame !') ;
    }
    else{
        if(etatCivil == 'M'){
            window.alert('Bonjour Monsieur !') ;
        }
        else{
            if(etatCivil == 'L'){
                window.alert('Bonjour Mademoiselle !') ;
            }
            else {
                window.alert('Saisie incorrecte.') ;
            }
        }
    }
}

function exo22(){
    var x = window.prompt('Saisissez un nombre : ') ;
    x = parseInt(x) ;
    
    if(x>=5 && x<10){
        window.alert(x + " est compris dans l'intervalle 5-10. ") ;
    }
    else{
        if(x>=10 && x<15){
            window.alert(x + " est compris dans l'intervalle 10-15. ") ;
        }
        else{
           if(x>=15 && x<=20){
                window.alert(x + " est compris dans l'intervalle 15-20. ") ;
            }
            else{
                window.alert("Hors intervalle !") ;
            } 
        }
        
    }
}

function exo23(){
    var montant = window.prompt('Quel est le montant de votre facture ?') ;
    montant = parseFloat(montant) ;
    
    if(montant < 150.0){
        window.alert('Le montant à payer de votre facture est de ' + montant + ' €.') ;
    }
    else{
        if(montant < 250.0){
            var montantRem1 = montant*0.99 ;
            window.alert('Vous avez droit à une remise de 1%. Le montant à payer de votre facture est de ' + montantRem1 + ' €.') ;
        }
        else{
            if(montant < 350.0){
                var montantRem2 = montant*0.98 ;
                window.alert('Vous avez droit à une remise de 2%. Le montant à payer de votre facture est de ' + montantRem2 + ' €.') ;
            }
            else{
                var montantRem3 = montant*0.97 ;
                window.alert('Vous avez droit à une remise de 3%. Le montant à payer de votre facture est de ' + montantRem3 + ' €.') ;
            }
        }
    }
    
}

//L'instruction switch (SELON)

function exo24(){
    var mois = window.prompt('Saisissez un mois (format mm) : ') ;
    mois = parseInt(mois) ;
    
    switch (mois) {
        case 1 :
            document.write("C'est l'hiver.") ;
        break ;
        case 2 :
            document.write("C'est l'hiver.") ;
        break ;
        case 3 :
            document.write("C'est le printemps.") ;
        break ;
        case 4 :
            document.write("C'est le printemps.") ;
        break ;
        case 5 :
            document.write("C'est le printemps.") ;
        break ;
        case 6 :
            document.write("C'est l'été.") ;
        break ;
        case 7 :
            document.write("C'est l'été.") ;
        break ;
        case 8 :
            document.write("C'est l'été.") ;
        break ;
        case 9 :
            document.write("C'est l'automne.") ;
        break ;
        case 10 :
            document.write("C'est l'automne.") ;
        break ;
        case 11 :
            document.write("C'est l'automne.") ;
        break ;
        case 12 :
            document.write("C'est l'hiver.") ;
        break ;
    }
}

function exo25(){
    var etatCivil = window.prompt("Merci de saisir votre état-civil : tapez L pour Mademoiselle, tapez F pour Madame, tapez M pour Monsieur (en majuscule)") ;
    
    switch (etatCivil) {
        case "L" :
            window.alert('Bonjour Mademoiselle !') ;
        break ;
        case "F" :
            window.alert('Bonjour Madame !') ;
        break ;
        case "M" :
            window.alert('Bonjour Monsieur !') ;
        break ;
    }
}

//L'instruction do … while (Répéter tant que)

function exo26(){

}

function exo27(){

}

function exo28(){

}

function exo29(){
    var etoile = '*' ;
    var i = 1 ;
    var j = 1 ;
    var vide = ' ' ;
    
    var L = window.prompt('Saisissez la largeur de votre rectangle :') ;
    L = parseInt(L) ;
    document.write('Largeur saisie : ' + L + '<br>') ;
    var H = window.prompt('Saisissez la hauteur de votre rectangle :') ;
    H = parseInt(H) ;
    document.write('Hauteur saisie : ' + H + '<br><br>') ;
    
    do{
        document.write(etoile + ' ') ;
        j++ ;
    }
    while (j <= L) ;
    document.write('<br>') ;
    do{
        document.write(etoile) ;
        document.write(etoile + '<br>') ;
        i++ ;
    }
    while (i < H) ;
    
}

function exo30(){

}

function exo31(){

}

function exo32(){

}

function exo33(){

}

function exo34(){

}

function exo35(){

}