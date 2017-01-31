//TP6

function exo1(){
    var villes = new Array('Carcassonne', 'Mende', 'Montpellier', 'Nîmes', 'Perpignan') ;
    var reg1=new RegExp("[M]","g");
    for (var i=0 ; i<(villes.length) ; i++){
        document.write(villes[i] + ', ') ;
        if (villes.match(reg1)) {
            document.write(villes[i] + ', ');
        }else{
            document.write('yapo');
        }      
    }