
			
<?php 
session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=teamfinder', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
	
	/*$req = $bdd->prepare('SELECT prenom FROM membre WHERE pseudo = '.$_SESSION['pseudo'].' ');
			$req->execute(array('pseudo'=>$_SESSION['pseudo']));
			$resultat2 = $req->fetch();
			$nbr_ligne = $req->rowCount();
			$prenom = $resultat2["prenom"] ;*/	
	
	
		
}
catch(Exception $e)
{
	die("Erreur : ".$e->getMessage());
}

?> 

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />
		<link rel="stylesheet" href="style/onglet.css" />
		<script type="text/javascript" src="JS/onglet.js"></script>
		<link rel="stylesheet" href="style/animate.css" />
        <title>TeamFinder.fr </title>
    </head>
    <body> 		
		
		 
		 
		  <div id="div_fond">
				<img src="image/night.JPG" id="img_back_co2"/> 
			</div>
		   <h1 class="titre_header">TeamFinder</h1>
		   <div id="rond1" class="animated fadeIn"></div>
		   <div id="rond2" class="animated fadeIn"></div>
		   <div id="rond3" class="animated fadeIn"></div>
		   <div id="rond4" class="animated fadeIn"></div>
		   <div id="rond5" class="animated fadeIn"></div>
		   <div id="rond6" class="animated fadeIn"></div>
		   <div id="rond7" class="animated fadeIn"></div>
		   <div id="rond8" class="animated fadeIn"></div>
		 <div id="box_info_memb">
		
		
		 <div class="systeme_onglets">
        <div class="onglets">
            <span class="onglet_0 onglet" id="onglet_quoi" onclick="javascript:change_onglet('quoi');">Profil</span>
            <span class="onglet_0 onglet" id="onglet_qui" onclick="javascript:change_onglet('qui');">Groupe</span>
            <span class="onglet_0 onglet" id="onglet_pourquoi" onclick="javascript:change_onglet('pourquoi');">Rencontre</span>
        </div>
        <div class="contenu_onglets">
            <div class="contenu_onglet" id="contenu_onglet_quoi">
			<div id="profil">
              <?php
			  echo'<img src="uploads/'.$_SESSION['pseudo'] ."/". $_SESSION['pseudo'] .".JPG".'" id="photo_membre2" class="animated bounceIn"> ';		
			  echo $_SESSION['prenom'];
			  

			  
			  ?>
			  <div id="info">
				
			  </div>
			 </div>
			   
			   
            </div>
            <div class="contenu_onglet" id="contenu_onglet_qui">
              
			  
			  
            </div>
            <div class="contenu_onglet" id="contenu_onglet_pourquoi">
                
				
				
				
            </div>
        </div>
    </div>
    <script type="text/javascript">
        //<!--
             var anc_onglet = 'quoi';
			 change_onglet(anc_onglet);  
        //-->
    </script>
		</div>
		 
		
    </body>
</html>
		