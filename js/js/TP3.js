//TP3

function exo1(){
    var semainier = new Array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche') ;
    window.alert(semainier.length) ;
}

function exo2(){
    var semainier = new Array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche') ;
    for (var i=0 ; i<(semainier.length) ; i++){
        document.write(semainier[i] + ' ') ;
    }
}

function exo3(){
    var semainier = new Array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche') ;
    document.write(semainier.join(' puis ')) ;
}

function exo4(){
    var aujourdhui = new Date() ;
    var semainier = new Array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche') ;
    var mois = new Array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre') ;
    document.write('Nous sommes ' + semainier[aujourdhui.getDay()] + ' ' + aujourdhui.getDate() + ' ' + mois[aujourdhui.getMonth()] + ' ' + aujourdhui.getFullYear() + '. ') ;
}

function exo5(){
    var semainier = new Array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche') ;
    document.write('Voici les jours de la semaine en commençant par lundi : ') ;
    for (var i=0 ; i<(semainier.length) ; i++){
        document.write(semainier[i] + ', ') ;
    }
    document.write('<br>') ;
    for (var i=0 ; i<(semainier.length) ; i++){
        document.write(semainier[i].fontcolor("red") + ', ') ;
    }    
}

function exo6(){
    var debut = new Array('Lundi', 'Mardi', 'Mercredi') ;
    var fin = new Array('Jeudi', 'Vendredi', 'Samedi', 'Dimanche') ;
    document.write(debut.concat(fin)) ;
}

function exo7(){
   var semainier = new Array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche') ; 
   document.write('Voici la semaine complète : ') ;
   for (var i=0 ; i<(semainier.length) ; i++){
        document.write('<b>' + semainier[i] + '</b>, ') ;
    }
    semainier.pop() ;
    document.write('<br>Voici la semaine sans dimanche : <b>' + semainier.join(', ') + '</b>') ;
    semainier.pop() ;
    document.write('<br>Voici la semaine sans samedi, ni dimanche : <b>' + semainier.join(', ') + '</b>') ;
    
}

function exo8(){
    var semainier = new Array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche') ; 
    document.write("Voici les jours de la semaine dans l'ordre : ") ;
    for (var i=0 ; i<(semainier.length) ; i++){
        document.write('<b>' + semainier[i] + '</b>, ') ;
    }
    document.write("<br>Voici les jours de la semaine dans l'ordre : <b>" + semainier.reverse() + '</b>') ;
}

function exo9(){
    var semainier = new Array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche') ; 
    document.write("Voici les jours de la semaine en partant du lundi : ") ;
    for (var i=0 ; i<(semainier.length) ; i++){
        document.write('<b>' + semainier[i] + '</b>, ') ;
    }
    document.write("<br>Voici les jours de la semaine en partant du dimanche : <b>" + semainier.pop() + ', ' + semainier.join(', ') + '</b>') ;
}

function exo10(){
    var semainier = new Array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche') ; 
    document.write('Voici la semaine complète : ') ;
    for (var i=0 ; i<(semainier.length) ; i++){
        document.write('<b>' + semainier[i] + '</b>, ') ;
    }
    semainier.shift() ;
    document.write("<br>Voici les jours de la semaine sans lundi : <b>" + semainier.join(', ') + '</b>') ;
    semainier.shift() ;
    document.write("<br>Voici les jours de la semaine sans lundi, ni mardi : <b>" + semainier.join(', ') + '</b>') ;
}

function exo11(){
    var semainier = new Array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche') ; 
    document.write("<br>La semaine de travail comprend les jours suivants : <b>" + semainier.slice(0, 5) + '</b>') ;
}

function exo12(){
    var semainier = new Array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche') ;
    document.write("<br>Les jours de la semaine triés par ordre alphabétique : <b>" + semainier.sort() + '</b>') ;
    document.write("<br>Les jours de la semaine triés en ordre inverse : <b>" + semainier.reverse() + '</b>') ;
}

function exo13(){
    var semainier = new Array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche') ;
    document.write("<br>Les 2 premiers jours de la semaine de travail : <b>" + semainier.slice(0, 2) + '</b>') ;
    document.write("<br>Les 2 derniers jours de la semaine de travail : <b>" + semainier.slice(3, 5) + '</b>') ;
}

function exo14(){
    
}

function exo15(){
    var tab = new Array(4) ;
    tab[0] = new Array(10, 20, 30, 40, 50) ;
    tab[1] = new Array(25, 25, 25, 25, 25) ;
    tab[2] = new Array(50, 40, 30, 20, 10) ;
    tab[3] = new Array(1, 2, 3, 4, 5) ;
    
    var sumL1 = tab[0][0] + tab[0][1] + tab[0][2] + tab[0][3] + tab[0][4] ;
    var sumL2 = tab[1][0] + tab[1][1] + tab[1][2] + tab[1][3] + tab[1][4] ;
    var sumL3 = tab[2][0] + tab[2][1] + tab[2][2] + tab[2][3] + tab[2][4] ;
    var sumL4 = tab[3][0] + tab[3][1] + tab[3][2] + tab[3][3] + tab[3][4] ;
    
    var sumC1 = tab[0][0] + tab[1][0] + tab[2][0] + tab[3][0] ;
    var sumC2 = tab[0][1] + tab[1][1] + tab[2][1] + tab[3][1] ;
    var sumC3 = tab[0][2] + tab[1][2] + tab[2][2] + tab[3][2] ;
    var sumC4 = tab[0][3] + tab[1][3] + tab[2][3] + tab[3][3] ;
    var sumC5 = tab[0][4] + tab[1][4] + tab[2][4] + tab[3][4] ;
    
    var total = sumC1 + sumC2 + sumC3 + sumC4 +sumC5 ;
    
    document.write('<table border="1" cellpadding="8"> \n\
        <tr> \n\
            <td Align=CENTER> ' + tab[0][0] + ' </td> \n\
            <td Align=CENTER> ' + tab[0][1] + ' </td> \n\
            <td Align=CENTER> ' + tab[0][2] + ' </td> \n\
            <td Align=CENTER> ' + tab[0][3] + ' </td> \n\
            <td Align=CENTER> ' + tab[0][4] + ' </td> \n\
            <td Align=CENTER><b> ' + sumL1 + ' </b></td> \n\
        </tr> \n\
        <tr> \n\
            <td Align=CENTER> ' + tab[1][0] + ' </td> \n\
            <td Align=CENTER> ' + tab[1][1] + ' </td> \n\
            <td Align=CENTER> ' + tab[1][2] + ' </td> \n\
            <td Align=CENTER> ' + tab[1][3] + ' </td> \n\
            <td Align=CENTER> ' + tab[1][4] + ' </td> \n\
            <td Align=CENTER><b> ' + sumL2 + ' </b></td> \n\
        </tr> \n\
        <tr> \n\
            <td Align=CENTER> ' + tab[2][0] + ' </td> \n\
            <td Align=CENTER> ' + tab[2][1] + ' </td> \n\
            <td Align=CENTER> ' + tab[2][2] + ' </td> \n\
            <td Align=CENTER> ' + tab[2][3] + ' </td> \n\
            <td Align=CENTER> ' + tab[2][4] + ' </td> \n\
            <td Align=CENTER><b> ' + sumL3 + ' </b></td> \n\
        </tr> \n\
        <tr> \n\
            <td Align=CENTER> ' + tab[3][0] + ' </td> \n\
            <td Align=CENTER> ' + tab[3][1] + ' </td> \n\
            <td Align=CENTER> ' + tab[3][2] + ' </td> \n\
            <td Align=CENTER> ' + tab[3][3] + ' </td> \n\
            <td Align=CENTER> ' + tab[3][4] + ' </td> \n\
            <td Align=CENTER><b> ' + sumL4 + ' </b></td> \n\
        </tr>\n\
        <tr> \n\
            <td Align=CENTER><b> ' + sumC1 + ' </b></td> \n\
            <td Align=CENTER><b> ' + sumC2 + ' </b></td> \n\
            <td Align=CENTER><b> ' + sumC3 + ' </b></td> \n\
            <td Align=CENTER><b> ' + sumC4 + ' </b></td> \n\
            <td Align=CENTER><b> ' + sumC5 + ' </b></td> \n\
            <td Align=CENTER><b> ' + total + ' </b></td> \n\
        </tr></table>');   
}

function exo16(){
    var tab = new Array(3) ;
    tab[0] = new Array(1, 2, 3, 4) ;
    tab[1] = new Array(5, 6, 7, 8) ;
    tab[2] = new Array(9, 10, 11, 12) ;
    
    var sumL1 = tab[0][0] + tab[0][1] + tab[0][2] + tab[0][3] ;
    var sumL2 = tab[1][0] + tab[1][1] + tab[1][2] + tab[1][3] ;
    var sumL3 = tab[2][0] + tab[2][1] + tab[2][2] + tab[2][3] ;
        
    var sumC1 = tab[0][0] + tab[1][0] + tab[2][0] ;
    var sumC2 = tab[0][1] + tab[1][1] + tab[2][1] ;
    var sumC3 = tab[0][2] + tab[1][2] + tab[2][2] ;
    var sumC4 = tab[0][3] + tab[1][3] + tab[2][3] ;
    
    var total = sumC1 + sumC2 + sumC3 + sumC4 ;
    
    document.write('<table border="1" cellpadding="8"> \n\
        <tr> \n\
            <td Align=CENTER> ' + tab[0][0] + ' </td> \n\
            <td Align=CENTER> ' + tab[0][1] + ' </td> \n\
            <td Align=CENTER> ' + tab[0][2] + ' </td> \n\
            <td Align=CENTER> ' + tab[0][3] + ' </td> \n\
            <td Align=CENTER><b> ' + sumL1 + ' </b></td> \n\
        </tr> \n\
        <tr> \n\
            <td Align=CENTER> ' + tab[1][0] + ' </td> \n\
            <td Align=CENTER> ' + tab[1][1] + ' </td> \n\
            <td Align=CENTER> ' + tab[1][2] + ' </td> \n\
            <td Align=CENTER> ' + tab[1][3] + ' </td> \n\
            <td Align=CENTER><b> ' + sumL2 + ' </b></td> \n\
        </tr> \n\
        <tr> \n\
            <td Align=CENTER> ' + tab[2][0] + ' </td> \n\
            <td Align=CENTER> ' + tab[2][1] + ' </td> \n\
            <td Align=CENTER> ' + tab[2][2] + ' </td> \n\
            <td Align=CENTER> ' + tab[2][3] + ' </td> \n\
            <td Align=CENTER><b> ' + sumL3 + ' </b></td> \n\
        </tr> \n\
        <tr> \n\
            <td Align=CENTER><b> ' + sumC1 + ' </b></td> \n\
            <td Align=CENTER><b> ' + sumC2 + ' </b></td> \n\
            <td Align=CENTER><b> ' + sumC3 + ' </b></td> \n\
            <td Align=CENTER><b> ' + sumC4 + ' </b></td> \n\
            <td Align=CENTER><b> ' + total + ' </b></td> \n\
        </tr></table>');   
}

 
