
	<?php	
	$bdd = new PDO('mysql:host=localhost;dbname=teamfinder', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
	 /****************CONNEXION MEMBRE*********************/
	 
	if(isset($_POST["boutton_submit_conn"]))
	{
		
		//Initialisation de la variable d'erreur
		$erreur_connexion = "" ;
		//Recuperation des valeurs du formulaire dans des variables
		$pseudo			= htmlspecialchars(trim($_POST["pseudo"])) ;
		$mdp 			= htmlspecialchars(trim($_POST["mdp"]));
		$mdp_md5 = md5($mdp);
		
		//Verification de la connexion
		$sql_pseudo = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo and mdp = :mdp");
		$sql_pseudo -> execute(array(":pseudo" => $pseudo, ":mdp" => $mdp_md5));
		
		if (($sql_pseudo->rowCount() != 0))
		{
			$erreur_connexion .= "<p style='color:red; margin-top: 300px; margin-left : 280px; width : 200px; position: absolute'><strong>- Nom ou mdp invalide \n</strong></p>";
		}
		$sql_pseudo->closeCursor();
		if($erreur_connexion == "")
		{
				
			$_SESSION["pseudo"] = $pseudo ;
			header("location:test2.php");
			
		}
		
	}
	
	/*******************INSCRIPTION MEMBRE*********************/
	
	if(isset($_POST["boutton_submit_creation"]))
	{
		//Initialisation de la variable d'erreur
		$erreur_inscription = "" ;
		//Recuperation des valeurs du formulaire dans des variables
		$pseudo			= htmlspecialchars(trim($_POST["pseudo"])) ;
		$mdp 			= htmlspecialchars(trim($_POST["mdp"]));
		$mdp2        	= htmlspecialchars(trim($_POST["mdp2"]));
		$prenom       	= htmlspecialchars(trim($_POST["prenom"]));
		$nom        	= htmlspecialchars(trim($_POST["nom"]));
		$ville      	= htmlspecialchars(trim($_POST["ville"]));
		
		//$confirm_mdp 		= trim($_POST["mdp2"]) ;

		//Test si tout les champs sont remplis
		if(empty($pseudo) || empty($mdp) || empty($mdp2) || empty($prenom) || empty($nom) || empty($ville))
		{
			$erreur_inscription .= "<p style='color:red; margin-top: 300px; margin-left : 280px; width : 200px; position: absolute'><strong>- Remplissez tous les champs du formulaire</strong></p>" ;
		}
		//Test si les deux mot de passe sont identiques
		if($mdp != $mdp2)
		{
			$erreur_inscription .= "<p style='color:red; margin-top: 300px; margin-left : 280px; width : 200px; position: absolute'><strong>- Les mots de passes doivent être identiques\n</strong></p>" ;
		}
		//Test de la taille des valeurs
		if(strlen($pseudo) > 20)
		{
			$erreur_inscription .= "<p style='color:red; margin-top: 300px; margin-left : 280px; width : 200px; position: absolute'><strong>- Votre pseudo est trop long\n</strong></p>" ;
		}
		//Verification de la complexiter du mot de passe : doit comporter 1 chiffre minimum et doit faire entre 5 et 11 caracteres
		if((!preg_match("#^[a-z][a-z]*[0-9]+[a-z0-9]$#i", $mdp)) || (!preg_match("#^.{5,11}$#", $mdp)))
		{
			$erreur_inscription .= "<p style='color:red; margin-top: 300px; margin-left : 280px; width : 200px; position: absolute'><strong>- Le mot de passe doit faire entre 5 et 11 caractères et doit contenir au minimum 1 chiffre</strong></p>" ;
		}
		//Test si le pseudo est disponible
		$sql_pseudo = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
		$sql_pseudo -> execute(array(":pseudo" => $pseudo));
		if (($sql_pseudo->rowCount() != 0))
		{
			$erreur_inscription .= "<p style='color:red; margin-top: 300px; margin-left : 280px; width : 200px; position: absolute'><strong>- Ce nom de groupe est déja utilisé \n</strong></p>";
		}
		$sql_pseudo->closeCursor();
		//Si il n'y a aucune erreur alors on passe a la suite de l'inscription
		if($erreur_inscription == "")
		{
			session_start();
			/*setcookie("nom_groupe", $nom_groupe);
			setcookie("mdp_groupe", $mdp_groupe);*/
			 if (isset($_POST['pseudo']) && trim($_POST['pseudo']))
			{
									
				  $pseudo = $_POST['pseudo'];
				  $_SESSION['pseudo'] = $pseudo;
				  
				  
			}

			if (isset($_POST['mdp']))
			{
									
				 $mdp = md5($_POST['mdp']);
			}
			
			if (isset($_POST['prenom']))
			{
									
				 $prenom = $_POST['prenom'];
				 $_SESSION['prenom'] = $prenom;
			}
			
			if (isset($_POST['nom']))
			{
									
				 $nom = $_POST['nom'];
				  $_SESSION['nom'] = $nom;
				 
			}
			
			if (isset($_POST['ville']))
			{
									
				 $ville = $_POST['ville'];
			}
			
			if (isset($_POST['sexe']))
			{
									
				 $sexe = $_POST['sexe'];
			}
			
			if (isset($_POST['amour']))
			{
									
				 $amour = $_POST['amour'];
			}
			
			if (isset($_POST['age']))
			{
									
				 $age = $_POST['age'];
			}


			$resultat = $bdd->prepare('INSERT INTO membre(pseudo, mdp, prenom, nom, ville, age, sexe, amour) VALUES(:pseudo, :mdp, :prenom, :nom, :ville, :age, :sexe, :amour)');
			$resultat->execute(array('pseudo'=>$pseudo, 'mdp' =>$mdp, 'prenom' =>$prenom, 'nom' =>$nom, 'ville' =>$ville, 'age' =>$age, 'sexe' =>$sexe, 'amour' =>$amour));
			
			/*$req = $bdd->prepare('SELECT id_grp FROM groupe WHERE nom_grp = :nom_groupe');
			$req->execute(array('nom_groupe'=>$nom_groupe));
			$resultat2 = $req->fetch();
			$nbr_ligne = $req->rowCount();
			$id = $resultat2["id_grp"] ;
			$_SESSION['id'] = $id;*/
			
			
			header("location:test2.php");
		}
	}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="style/style.css" />
		<link rel="stylesheet" href="style/animate.css" />
		<link rel="stylesheet" media="screen and (max-width: 640px)" href="style/smallscreen.css" type="text/css" />
		
        <title>TeamFinder.fr </title>
    </head>
	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		$("#bloc_crea_grp_smart").hide();
		$("#bloc_co_grp_smart").hide();
		
		$("#boutton_insc_smartphone").click(function(){
			$("#bloc_crea_grp_smart").show();
			$("#bloc_co_grp_smart").hide();
		});
		
		$("#boutton_co_smartphone").click(function(){
			$("#bloc_co_grp_smart").show();
			$("#bloc_crea_grp_smart").hide();
		});
		
		$("#div_fond").click(function(){
			$("#bloc_co_grp_smart").hide();
			$("#bloc_crea_grp_smart").hide();
		});
		
	});
	</script>
	
    <body> 		
			<div id="div_fond">
			 <img src="image/night.JPG" id="img_back_co2"/> 
			</div>
		   <h1 class="titre_header">TeamFinder</h1>
		   <h1 id="titre_header_small">TeamFinder</h1>
		   <div id="boutton_insc_smartphone" class="animated bounceIn">Inscription</div>
		   <div id="boutton_co_smartphone" class="animated bounceIn">Connexion</div>
		   <div id="rond1" class="animated fadeIn"></div>
		   <div id="rond2" class="animated fadeIn"></div>
		   <div id="rond3" class="animated fadeIn"></div>
		   <div id="rond4" class="animated fadeIn"></div>
		   <div id="rond5" class="animated fadeIn"></div>
		   <div id="rond6" class="animated fadeIn"></div>
		   <div id="rond7" class="animated fadeIn"></div>
		   <div id="rond8" class="animated fadeIn"></div>
		   
		  
		   
		  <a href="#" id="dsc_teamfinder">TeamFinder, qu'est ce que c'est ?
			<span>
				<p id="titre_bulle">LE PRINCIPE</p>
				TeamFinder est un reseau social permettant de <b>rentrer en contacte avec d'autres groupes d'ami(e)s</b>.
				Pour ce faire, creez un groupe et vous pourrez :</br>
				- Tchater avec des groupes de votre region</br>
				- Tchater avec une personne individuellement</br>
				- Donner des rendez vous à d'autres groupes</br>
				</br>
				<p id="titre_bulle2">LES GROUPES</p>
				Les groupes sont composés de 20 personnes maximum, les informations de chaques membres du groupe se limitent à son prénom, son âge, son surnom au sein du groupe et une photo.
				L'administrateur du groupe possede les pouvois suivant :</br>
				- Ajouter qui il veut à son groupe</br>
				- Supprimer qui il veut de son groupe</br>
				- Donner les surnoms des membres de son groupe
				
			</span>
		  </a>
		  
		  <!-- FORMULAIRES INSCRIPTION SMARTPHONE -->
		  
		 <div id="bloc_crea_grp_smart">
				<p  id="titre_crea_grp"> Inscription </p>
				<form method="post" action="test.php" id="form_crea_grps" enctype="multipart/form-data">
						<div id="saisie_insc_grp">
							<input type="text" name ="pseudo" placeholder="Votre Pseudo" id="box_pseudo" > 
							<input type="password" name="mdp" placeholder="Mot de passe " id="box_mdp">
							<input type="password" name="mdp2" placeholder="Retapper votre mot de passe" id="box_mdp2">
							<br/>
							<input type="text" name ="prenom" placeholder="Prenom" id="box_prenom" >
							<input type="text" name ="nom" placeholder="Nom" id="box_nom" >
							<input type="text" name ="ville" placeholder="Ville" id="box_ville" >
							<select name="sexe" id="sexe_memb">
									<option value="Homme">Homme</option>
									<option value="Femme">Femme</option>
							</select>
							<select name="amour" id="amour_memb">
									<option value="Celibataire">Celibataire</option>
									<option value="En couple">En couple</option>
							</select>
							<input type="file" name="avatar"><br>
							<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $maxsize_octet;?>">
						</div>
						<input type="submit" value="Go" name="boutton_submit_creation_smart"  id="boutton_submit_creation_smart">	
						
				</form>
			</div>
			
			<div  id="bloc_co_grp_smart">
				<?php
				if(isset($erreur_connexion) && $erreur_connexion != "")
		   		{
		   			echo $erreur_connexion ;
		   		}
			?>
			
			<!-- FORMULAIRES CONNEXION SMARTPHONE -->
			
				<form method="post" action="test.php" id="form_co_grps" >
				<div id="saisie_insc_grp">
							<input type="text" name ="pseudo" placeholder="Votre Pseudo" id="pseudo" > 
							<input type="password" name="mdp" placeholder="Mot de passe" id="mdp">
				</div>
				<input type="submit" value="Connexion" name="boutton_submit_conn"  id="boutton_submit_conn">
				</form>
				
			</div>
			
		  <div id="bloc">
		    	<?php
				if(isset($erreur_inscription) && $erreur_inscription != "")
		   		{
		   			echo $erreur_inscription ;
		   		}
			?>
			
			
			<div id="bloc_crea_grp">
				<p  id="titre_crea_grp"> Inscription </p>
				<form method="post" action="test.php" id="form_crea_grps" enctype="multipart/form-data">
						<div id="saisie_insc_grp">
							<input type="text" name ="pseudo" placeholder="Votre Pseudo" id="box_pseudo" > 
							<input type="password" name="mdp" placeholder="Mot de passe " id="box_mdp">
							<input type="password" name="mdp2" placeholder="Retapper votre mot de passe" id="box_mdp2">
							<input type="text" name ="prenom" placeholder="Prenom" id="box_prenom" >
							<input type="text" name ="nom" placeholder="Nom" id="box_nom" >
							<input type="text" name ="ville" placeholder="Ville" id="box_ville" >
							<input type="number" name="age" id="box_age2" placeholder="Age">
							<select name="sexe" id="sexe_memb">
									<option value="Homme">Homme</option>
									<option value="Femme">Femme</option>
							</select>
							<select name="amour" id="amour_memb">
									<option value="Celibataire">Celibataire</option>
									<option value="En couple">En couple</option>
							</select>
						</div>
						<?php $maxsize = ini_get("upload_max_filesize");?>
						<?php $maxsize_octet = 1024*1014* str_replace("M", "", $maxsize);?>
						<input type="file" name="avatar" id="photo_membre"><br>
						<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $maxsize_octet;?>">
						
						<?php
					//Création d'un tableau php avec les extensions valides
					$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
					//chemin en relatif d'upload
					$upload_directory = "./uploads/".$_SESSION['pseudo'];

					//Est ce que le fichier avatar existe
					if(isset($_FILES['avatar']))
					{
						
						if ($_FILES['avatar']['error'] == 0)
						{
							if ($_FILES['avatar']['size'] > $maxsize_octet) 
							{
								$erreur = "Le fichier est trop gros";
							}else
							{

								$parse_name = explode(".", $_FILES['avatar']['name']);


								$extension_upload = strtolower(end($parse_name));

								if ( in_array($extension_upload,$extensions_valides) )
								{

									if(!file_exists($upload_directory))
									{
										mkdir("./uploads/".$_SESSION['pseudo']);
									}

									$nom_photo = $_SESSION['pseudo'].".".end($parse_name);
									
									if (move_uploaded_file($_FILES['avatar']['tmp_name'],$upload_directory."/". $nom_photo))
									{
										echo "Transfert réussi";
										
									}
									else
									{
										echo "Transfert echec";
									}

								}else
								{
									echo "Extension incorrecte<br>";
								}

							}

						}else{
							switch ($_FILES['avatar']['error']) {
								case UPLOAD_ERR_NO_FILE:
									echo "fichier manquant<br>";
									break;
								case UPLOAD_ERR_INI_SIZE:
									echo "fichier dépassant la taille maximale autorisée par PHP<br>";
									break;
								case UPLOAD_ERR_FORM_SIZE:
									echo "fichier dépassant la taille maximale autorisée par le formulaire<br>";
									break;
								case UPLOAD_ERR_PARTIAL:
									echo "fichier transféré partiellement<br>";
									break;
								default:
									echo "Erreur inconnue ... <br>";
									break;
							}
						}
					}

				?>

						
						
						<input type="submit" value="Creer" name="boutton_submit_creation"  id="boutton_submit_creation">	
						
				</form>
			</div>
			
		
			
			<div  id="bloc_co_grp">
			<?php
				if(isset($erreur_connexion) && $erreur_connexion != "")
		   		{
		   			echo $erreur_connexion ;
		   		}
			?>
				<p id="titre_co_grp"> Connexion </p>
				<form method="post" action="test.php" >
				<div id="saisie_insc_grp">
							<input type="text" name ="pseudo" placeholder="Pseudo" id="pseudo" > 
							<input type="password" name="mdp" placeholder="Mot de passe" id="mdp">
				</div>
				<input type="submit" value="Connexion" name="boutton_submit_conn"  id="boutton_submit_conn">
				</form>
			</div>
		  </div>
		  
		  <?php
				if(isset($erreur_inscription2) && $erreur_inscription2 != "")
		   		{
		   			echo "Erreur : \n" . $erreur_inscription2 ;
		   		}
			?>
		
    </body>
</html>