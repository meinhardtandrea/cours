<?php
    function MessageErreur ($message) {
        echo '<link href="style.css" rel="stylesheet" type="text/css">';
    	  echo'<center><br>'.$message.'<br><br><a href="javascript:window.history.go(-1)" class="lien3">Retour</a></center><br>';
        include('inc/footer.inc.php');
        exit;
    }

    function Menu () {
    	echo '<td>
    	<img src="images/pixel.gif" width="10" height="1" />
    	<img src="images/point2.gif" width="8" height="8" /> 
    	<a href="index.php" class="lien">Accueil</a> 
    	<img src="images/point2.gif" width="8" height="8" /> 
    	<a href="page_home.php" class="lien">Contenu des pages</a> 
    	<img src="images/point2.gif" width="8" height="8" /> 
    	<a href="projet.php" class="lien">Votre projet</a> 
    	<img src="images/point2.gif" width="8" height="8" /> 
    	<a href="references.php" class="lien">Références</a>  
    	<img src="images/point2.gif" width="8" height="8" /> 
    	<a href="produits_eo.php?action=vieweo" class="lien">Produits</a>  
    	<img src="images/point2.gif" width="8" height="8" />
    	<a href="options.php" class="lien">Options</a> 
    	<img src="images/point2.gif" width="8" height="8" />
    	<a href="page_home_us.php" class="lien">Version anglaise</a> 
    	<img src="images/point2.gif" width="8" height="8" />
    	</td>';
    	}

    function MenuOptions () {
        echo '<p align="left"><b>Options :</b>
        <a href="membres.php" class="lien2">Membres</a> - 
        <a href="profil.php" class="lien2">Votre profil</a> - 
        <a href="fichiers.php?action=viewimg" class="lien2">Gestion des fichiers</a>
        </p><hr>';
    	}

    function MenuMembres () {
        echo '<p align="left"><b>>>> </b><a href="membres.php" class="lien2">Liste des membres</a> - <a href="membres_edit.php" class="lien2">Ajouter un membre</a></p>';
    	}
    	
    function MenuProjet () {
        echo '<p align="left"><b>>>> </b><a href="projet_aut.php?statut=all" class="lien2">L\'Autonomie</a> - <a href="projet_confort.php?statut=all" class="lien2">Le Confort</a> - <a href="projet_pa.php?statut=all" class="lien2">Le Pompage Authentique</a></p>'; 
    	}
    	    	
    function MenuProjetA () {
        echo '<p align="left"><b>Projet Autonomie :</b> <a href="projet_aut.php?statut=ea" class="lien2">En attente</a> - <a href="projet_aut.php?statut=ec" class="lien2">En cours</a> - <a href="projet_aut.php?statut=ok" class="lien2">Validés</a> - <a href="projet_aut.php?statut=all" class="lien2">Tous</a> - <a href="formulaires.php?type=autonomie" class="lien2">Formulaire</a></p>';
    	}
    	
    function MenuProjetB () {
        echo '<p align="left"><b>Projet Confort :</b> <a href="projet_confort.php?statut=ea" class="lien2">En attente</a> - <a href="projet_confort.php?statut=ec" class="lien2">En cours</a> - <a href="projet_confort.php?statut=ok" class="lien2">Validés</a> - <a href="projet_confort.php?statut=all" class="lien2">Tous</a> - <a href="formulaires.php?type=confort" class="lien2">Formulaire</a></p>';
    	}
    	
    function MenuProjetC () {
        echo '<p align="left"><b>Projet Pompage Authentique :</b> <a href="projet_pa.php?statut=ea" class="lien2">En attente</a> - <a href="projet_pa.php?statut=ec" class="lien2">En cours</a> - <a href="projet_pa.php?statut=ok" class="lien2">Validés</a> - <a href="projet_pa.php?statut=all" class="lien2">Tous</a> - <a href="formulaires.php?type=pompage" class="lien2">Formulaire</a></p>';
    	}
    	
    function MenuReferences () {
        echo '<p align="left"><b>Références :</b> <a href="references.php" class="lien2">Voir les références</a> - <a href="references_form.php" class="lien2">Ajouter une référence</a></p>';
    	}

    function MenuModif () {
        echo '<p align="left">
        <a href="page_home.php?cat=home" class="lien2">Accueil</a> - 
        <a href="page_projet.php?action=viewaut" class="lien2">Votre projet</a> - 
        <a href="page_references.php?action=viewintro" class="lien2">Nos références</a> - 
        <a href="page_produits.php?action=viewintro" class="lien2">Les produits</a> - 
        <a href="page_install.php?action=view" class="lien2">Installation</a> - 
        <a href="page_ingenierie.php?action=view" class="lien2">Ingénierie</a> - 
        <a href="page_documentation.php?action=view" class="lien2">Documentation</a> - 
        <a href="page_contact.php?action=view" class="lien2">Contactez-nous</a>
        </p><hr>';
    	}

    function MenuHome () {
        echo '<p align="left">>>> 
        <a href="page_home.php?cat=home" class="lien2">Accueil</a> ( 
        <a href="page_home.php?action=addhome"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_home.php?action=edithome"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_home.php?cat=qdn" class="lien2">Quoi de neuf ?</a> ( 
        <a href="page_home.php?action=addqdn"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_home.php?action=editqdn"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}


    function MenuProjetPage () {
        echo '<p align="left">>>> 
        <a href="page_projet.php?action=viewaut" class="lien2">Autonomie</a> ( 
        <a href="page_projet.php?action=addaut"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_projet.php?action=editaut"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_projet.php?action=viewconf" class="lien2">Confort</a> ( 
        <a href="page_projet.php?action=addconf"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_projet.php?action=editconf"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_projet.php?action=viewpomp" class="lien2">Pompage</a> ( 
        <a href="page_projet.php?action=addpomp"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_projet.php?action=editpomp"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_projet.php?action=viewform" class="lien2">Formation</a> ( 
        <a href="page_projet.php?action=addform"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_projet.php?action=editform"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    function MenuReferencesPage () {
        echo '<p align="left">>>> 
        <a href="page_references.php?action=viewintro" class="lien2">Introduction</a> ( 
        <a href="page_references.php?action=addintro"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_references.php?action=editintro"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_references.php?action=viewaut" class="lien2">Autonomie</a> ( 
        <a href="page_references.php?action=addaut"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_references.php?action=editaut"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_references.php?action=viewconf" class="lien2">Confort</a> ( 
        <a href="page_references.php?action=addconf"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_references.php?action=editconf"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_references.php?action=viewpomp" class="lien2">Pompage</a> ( 
        <a href="page_references.php?action=addpomp"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_references.php?action=editpomp"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_references.php?action=viewform" class="lien2">Formation</a> ( 
        <a href="page_references.php?action=addform"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_references.php?action=editform"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    function MenuProduitsPage () {
        echo '<p align="left">>>> 
        <a href="page_produits.php?action=viewintro" class="lien2">Introduction</a> ( 
        <a href="page_produits.php?action=addintro"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits.php?action=editintro"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits.php?action=vieweo" class="lien2">Eoliennes</a> ( 
        <a href="page_produits.php?action=addeo"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits.php?action=editeo"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits.php?action=viewmats" class="lien2">Mâts</a> ( 
        <a href="page_produits.php?action=addmats"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits.php?action=editmats"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits.php?action=viewmpv" class="lien2">Modules PV</a> ( 
        <a href="page_produits.php?action=addmpv"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits.php?action=editmpv"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits.php?action=viewreo" class="lien2">Rég. Eolien</a> ( 
        <a href="page_produits.php?action=addreo"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits.php?action=editreo"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
        echo '<p align="left">>>> 
        <a href="page_produits.php?action=viewrmpv" class="lien2">Rég. Module PV</a> ( 
        <a href="page_produits.php?action=addrmpv"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits.php?action=editrmpv"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits.php?action=viewond" class="lien2">Onduleurs</a> ( 
        <a href="page_produits.php?action=addond"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits.php?action=editond"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits.php?action=viewbat" class="lien2">Batteries</a> ( 
        <a href="page_produits.php?action=addbat"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits.php?action=editbat"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits.php?action=viewrec" class="lien2">Récepteurs</a> ( 
        <a href="page_produits.php?action=addrec"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits.php?action=editrec"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    function MenuInstallation () {
        echo '<p align="left">>>> 
        <a href="page_install.php?action=view" class="lien2">Installation</a> ( 
        <a href="page_install.php?action=add"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_install.php?action=edit"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    function MenuIngenierie () {
        echo '<p align="left">>>> 
        <a href="page_ingenierie.php?action=view" class="lien2">Ingénierie</a> ( 
        <a href="page_ingenierie.php?action=add"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_ingenierie.php?action=edit"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    function MenuDocumentation () {
        echo '<p align="left">>>> 
        <a href="page_documentation.php?action=view" class="lien2">Documentation</a> ( 
        <a href="page_documentation.php?action=add"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_documentation.php?action=edit"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    function MenuContact () {
        echo '<p align="left">>>> 
        <a href="page_contact.php?action=view" class="lien2">Contact</a> ( 
        <a href="page_contact.php?action=add"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_contact.php?action=edit"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    	    	    	
    function MenuProduits () {
        echo '<p align="left"><b>Produits :</b> 
        <a href="produits_eo.php?action=vieweo" class="lien2">Eoliennes</a>
         - <a href="produits_mats.php?action=viewmats" class="lien2">Mâts</a>
         - <a href="produits_mpv.php?action=viewmpv" class="lien2">Module PV</a>
         - <a href="produits_reo.php?action=viewreo" class="lien2">Rég. Eolien</a>
         - <a href="produits_rmpv.php?action=viewrmpv" class="lien2">Rég. Module PV</a>
         - <a href="produits_ond.php?action=viewond" class="lien2">Onduleurs</a>
         - <a href="produits_bat.php?action=viewbat" class="lien2">Batteries</a>
         - <a href="produits_rec.php?action=viewrec" class="lien2">Récepteurs</a>
        </p>';
    	}


    function MenuPEO () {
        echo '<p align="left"><b>>>> Eoliennes :</b> 
        <a href="produits_eo.php?action=addeo" class="lien2">Ajouter</a>
         - <a href="produits_eo.php?action=vieweo" class="lien2">Modifier</a>
        </p>';
    	}

    function MenuPM () {
        echo '<p align="left"><b>>>> Mâts :</b> 
        <a href="produits_mats.php?action=addmats" class="lien2">Ajouter</a>
         - <a href="produits_mats.php?action=viewmats" class="lien2">Modifier</a>
        </p>';
    	}

    function MenuMPV () {
        echo '<p align="left"><b>>>> Modules Photovoltaïques :</b> 
        <a href="produits_mpv.php?action=addmpv" class="lien2">Ajouter</a>
         - <a href="produits_mpv.php?action=viewmpv" class="lien2">Modifier</a>
        </p>';
    	}

    function MenuREO () {
        echo '<p align="left"><b>>>> Régulateurs Eoliens :</b> 
        <a href="produits_reo.php?action=addreo" class="lien2">Ajouter</a>
         - <a href="produits_reo.php?action=viewreo" class="lien2">Modifier</a>
        </p>';
    	}

    function MenuRMPV () {
        echo '<p align="left"><b>>>> Régulateurs Modules Photovoltaïques :</b> 
        <a href="produits_rmpv.php?action=addrmpv" class="lien2">Ajouter</a>
         - <a href="produits_rmpv.php?action=viewrmpv" class="lien2">Modifier</a>
        </p>';
    	}

    function MenuOND () {
        echo '<p align="left"><b>>>> Onduleurs :</b> 
        <a href="produits_ond.php?action=addond" class="lien2">Ajouter</a>
         - <a href="produits_ond.php?action=viewond" class="lien2">Modifier</a>
        </p>';
    	}

    function MenuBAT () {
        echo '<p align="left"><b>>>> Batteries :</b> 
        <a href="produits_bat.php?action=addbat" class="lien2">Ajouter</a>
         - <a href="produits_bat.php?action=viewbat" class="lien2">Modifier</a>
        </p>';
    	}

    function MenuREC () {
        echo '<p align="left"><b>>>> Récepteurs :</b> 
        <a href="produits_rec.php?action=addrec" class="lien2">Ajouter</a>
         - <a href="produits_rec.php?action=viewrec" class="lien2">Modifier</a>
        </p>';
    	}




// Version anglaise :



    function MenuModif_us () {
        echo '<p align="left">
        <a href="page_home_us.php?cat=home" class="lien2">Home</a> - 
        <a href="page_projet_us.php?action=viewaut" class="lien2">Your project</a> - 
        <a href="page_references_us.php?action=viewintro" class="lien2">Our references</a> - 
        <a href="page_produits_us.php?action=viewintro" class="lien2">Products</a> - 
        <a href="page_install_us.php?action=view" class="lien2">Installation</a> - 
        <a href="page_ingenierie_us.php?action=view" class="lien2">Engineering</a> - 
        <a href="page_documentation_us.php?action=view" class="lien2">Documentation</a> - 
        <a href="page_contact_us.php?action=view" class="lien2">Contact-us</a>
        </p><hr>';
    	}

    function MenuHome_us () {
        echo '<p align="left">>>> 
        <a href="page_home_us.php?cat=home" class="lien2">Home</a> ( 
        <a href="page_home_us.php?action=addhome"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_home_us.php?action=edithome"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_home_us.php?cat=qdn" class="lien2">What\'s up ?</a> ( 
        <a href="page_home_us.php?action=addqdn"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_home_us.php?action=editqdn"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}


    function MenuProjetPage_us () {
        echo '<p align="left">>>> 
        <a href="page_projet_us.php?action=viewaut" class="lien2">Standalone systems</a> ( 
        <a href="page_projet_us.php?action=addaut"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_projet_us.php?action=editaut"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_projet_us.php?action=viewconf" class="lien2">Grid tied systems</a> ( 
        <a href="page_projet_us.php?action=addconf"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_projet_us.php?action=editconf"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_projet_us.php?action=viewpomp" class="lien2">Windmills</a> ( 
        <a href="page_projet_us.php?action=addpomp"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_projet_us.php?action=editpomp"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_projet_us.php?action=viewform" class="lien2">Training courses</a> ( 
        <a href="page_projet_us.php?action=addform"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_projet_us.php?action=editform"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    function MenuReferencesPage_us () {
        echo '<p align="left">>>> 
        <a href="page_references_us.php?action=viewintro" class="lien2">Introduction</a> ( 
        <a href="page_references_us.php?action=addintro"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_references_us.php?action=editintro"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_references_us.php?action=viewaut" class="lien2">Standalone systems</a> ( 
        <a href="page_references_us.php?action=addaut"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_references_us.php?action=editaut"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_references_us.php?action=viewconf" class="lien2">Grid tied systems</a> ( 
        <a href="page_references_us.php?action=addconf"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_references_us.php?action=editconf"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_references_us.php?action=viewpomp" class="lien2">Windmills</a> ( 
        <a href="page_references_us.php?action=addpomp"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_references_us.php?action=editpomp"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_references_us.php?action=viewform" class="lien2">Training courses</a> ( 
        <a href="page_references_us.php?action=addform"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_references_us.php?action=editform"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    function MenuProduitsPage_us () {
        echo '<p align="left">>>> 
        <a href="page_produits_us.php?action=viewintro" class="lien2">Introduction</a> ( 
        <a href="page_produits_us.php?action=addintro"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits_us.php?action=editintro"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits_us.php?action=vieweo" class="lien2">Wind turbines</a> ( 
        <a href="page_produits_us.php?action=addeo"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits_us.php?action=editeo"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits_us.php?action=viewmats" class="lien2">Towers</a> ( 
        <a href="page_produits_us.php?action=addmats"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits_us.php?action=editmats"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits_us.php?action=viewmpv" class="lien2">PV modules</a> ( 
        <a href="page_produits_us.php?action=addmpv"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits_us.php?action=editmpv"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits_us.php?action=viewreo" class="lien2">Wind turbine controllers</a> ( 
        <a href="page_produits_us.php?action=addreo"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits_us.php?action=editreo"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
        echo '<p align="left">>>> 
        <a href="page_produits_us.php?action=viewrmpv" class="lien2">PV regulators</a> ( 
        <a href="page_produits_us.php?action=addrmpv"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits_us.php?action=editrmpv"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits_us.php?action=viewond" class="lien2">Inverters</a> ( 
        <a href="page_produits_us.php?action=addond"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits_us.php?action=editond"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits_us.php?action=viewbat" class="lien2">Batteries</a> ( 
        <a href="page_produits_us.php?action=addbat"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits_us.php?action=editbat"><img src="images/edit.png" alt="Modifier" border="0" /></a> ) - 
        <a href="page_produits_us.php?action=viewrec" class="lien2">Appliances</a> ( 
        <a href="page_produits_us.php?action=addrec"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_produits_us.php?action=editrec"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    function MenuInstallation_us () {
        echo '<p align="left">>>> 
        <a href="page_install_us.php?action=view" class="lien2">Installation</a> ( 
        <a href="page_install_us.php?action=add"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_install_us.php?action=edit"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    function MenuIngenierie_us () {
        echo '<p align="left">>>> 
        <a href="page_ingenierie_us.php?action=view" class="lien2">Engineering</a> ( 
        <a href="page_ingenierie_us.php?action=add"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_ingenierie_us.php?action=edit"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    function MenuDocumentation_us () {
        echo '<p align="left">>>> 
        <a href="page_documentation_us.php?action=view" class="lien2">Documentation</a> ( 
        <a href="page_documentation_us.php?action=add"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_documentation_us.php?action=edit"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    function MenuContact_us () {
        echo '<p align="left">>>> 
        <a href="page_contact_us.php?action=view" class="lien2">Contact</a> ( 
        <a href="page_contact_us.php?action=add"><img src="images/plus.png" alt="Ajouter" border="0" /></a> / 
        <a href="page_contact_us.php?action=edit"><img src="images/edit.png" alt="Modifier" border="0" /></a> )
        </p>';
    	}

    	

?>    	