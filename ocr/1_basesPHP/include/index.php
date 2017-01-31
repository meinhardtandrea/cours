<!DOCTYPE html>
<!--Une page PHP peut inclure une autre page (ou un morceau de page) grâce à l'instruction include.-->
<!--L'instruction include sera remplacée par le contenu de la page demandée.-->
<!--Cette technique permet par exemple de placer les menus de son site dans un fichier menus.php que l'on inclura dans toutes les pages. 
Cela permet de centraliser le code des menus alors qu'on était auparavant obligé de le copier dans chaque page sur nos sites statiques en HTML et CSS !-->
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon super site</title>
    </head>
 
    <body>

<?php include 'entete.php';?>
<?php include 'menu.php';?>
        
    <!-- Le corps -->
    
    <div id="corps">
        <h1>Mon super site</h1>
        
        <p>
            Bienvenue sur mon super site !<br />
            Vous allez adorer ici, c'est un site génial qui va parler de... euh... Je cherche encore un peu le thème de mon site. :-D
        </p>
    </div>
    
<?php include 'footer.php';?>
    
    </body>
</html>

