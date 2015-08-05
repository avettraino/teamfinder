
			
<?php 
session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=teamfinder', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
	if(isset($_POST["boutton_valider_groupe"]))
	{
		//Initialisation de la variable d'erreur
		$erreur_inscription = "" ;
		//Recuperation des valeurs du formulaire dans des variables
		$nom_grp		= htmlspecialchars(trim($_POST["nom_grp"])) ;
		$statut_grp		= htmlspecialchars(trim($_POST["statut_groupe"]));
		$devise_grp    	= htmlspecialchars(trim($_POST["devise_grp"]));

		//Test si tout les champs sont remplis
		if(empty($nom_grp))
		{
			$erreur_inscription .= "<p style='color:red; margin-top: 300px; margin-left : 280px; width : 200px; position: absolute'><strong>- Remplissez tous les champs du formulaire</strong></p>" ;
		}
		
		//Test de la taille des valeurs
		if(strlen($nom_grp) > 30)
		{
			$erreur_inscription .= "<p style='color:red; margin-top: 300px; margin-left : 280px; width : 200px; position: absolute'><strong>- Votre nom de groupe est trop long\n</strong></p>" ;
		}
		
		//Test si le pseudo est disponible
		$sql_pseudo = $bdd->prepare("SELECT * FROM groupe WHERE nom = :nom_grp");
		$sql_pseudo -> execute(array(":nom_grp" => $nom_grp));
		if (($sql_pseudo->rowCount() != 0))
		{
			$erreur_inscription .= "<p style='color:red; margin-top: 300px; margin-left : 280px; width : 200px; position: absolute'><strong>- Ce nom de groupe est déja utilisé \n</strong></p>";
		}
		$sql_pseudo->closeCursor();
	
		if($erreur_inscription == "")
		{
			
			/*setcookie("nom_groupe", $nom_groupe);
			setcookie("mdp_groupe", $mdp_groupe);*/
			 if (isset($_POST['nom_grp']) && trim($_POST['nom_grp']))
			{						
				  $nom_grp = $_POST['nom_grp'];
			}

			if (isset($_POST['statut_grp']))
			{					
				 $statut_grp = $_POST['statut_grp'];
			}
			
			if (isset($_POST['devise_grp']))
			{					
				 $devise_grp = $_POST['devise_grp'];
			}
			
			$resultat = $bdd->prepare('INSERT INTO groupe(nom, statut, devise) VALUES(:nom_grp, :statut_grp, :devise_grp)');
			$resultat->execute(array('nom_grp'=>$nom_grp, 'statut_grp' =>$statut_grp, 'devise_grp' =>$devise_grp));
		}	
	}
		
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
		<script type="text/javascript" src="JS/affichermasquer.js"></script>
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
			
			<!--GROUPE -->
			
            <div class="contenu_onglet" id="contenu_onglet_qui">
				
				<!-- BOUTTON(S) GROUPE -->
				
				<div id="bouttons_grp">
					<input type="submit" value="+" name="boutton_creation_groupe"   onClick="AfficherMasquer()" id="boutton_creation_groupe">
				</div>
				
				<!-- FORMULAIRE CREATION GROUPE -->
				
				<div id="formulaire_creation_groupe">
				<form method="post" action="test2.php">
					<label for="box_creation_grp">Nom du groupe : </label><input type="text" name ="nom_grp" placeholder="Nom de votre groupe" id="box_creation_grp" ></br>
					<label for="box_statut_grp">Statut du groupe : </label>
					<select name="statut_groupe" id="box_statut_grp">
						<option value="Prive">Prive</option>
						<option value="Public">Public</option>
					</select></br>
					<label for="box_devise_grp">Devise du groupe : </label><input type="text" name ="devise_grp" placeholder="(facultatif)" id="box_devise_grp" >
					<input type="submit" value="Creer" name="boutton_valider_groupe" id="boutton_valider_groupe">
				</form>	
				</div>
			
			  
			  
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
		