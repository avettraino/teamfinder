<?php
	session_start();
	if($_SESSION["pseudo"] == "visiteur")
		header("location:index.php");

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />		
        <title>NightPlans.fr </title>
    </head>
    <body> 
		<?php 
			include 'include/header.php'; 
			include 'include/main_menu.php';
			echo 'Bonjours '.$_SESSION['pseudo'];
		?>			
		
<img src="image/champ.JPG" id="img_back_memb"/>
		<?php
			 
	   
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=site1', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
if (isset($_POST['email']))
{
						
	 $mail = $_POST['email'];
}

if (isset($_POST['age']))
{
						
	 $age = $_POST['age'];
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

if (isset($_POST['locomotion']))
{
						
	 $locom = $_POST['locomotion'];
}



$pseudo = $_SESSION['pseudo'];

$request = 'UPDATE utilisateurs SET email=:email, age=:age, ville=:ville, sexe=:sexe, amour=:amour, locomotion=:locomotion WHERE pseudo="'.$pseudo.'"';

$resultat = $bdd->prepare($request);
$resultat->execute(array('email' =>$mail, 'age' =>$age, 'ville' =>$ville, 'sexe' =>$sexe, 'amour' =>$amour, 'locomotion' =>$locom));

}
catch(Exception $e)
{
	die("Erreur : ".$e->getMessage());
}


			$maxsize = ini_get("upload_max_filesize");
			$maxsize_octet = 1024*1014* str_replace("M", "", $maxsize);
			//Création d'un tableau php avec les extensions valides
			$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
			//chemin en relatif d'upload
			if(!isset( $_SESSION['pseudo']))
				$_SESSION['pseudo'] = "visiteur" ;
			

			//Est ce que le fichier avatar existe
			if(isset($_FILES['avatar']))
			{
				$upload_directory = "./uploads/".$_SESSION['pseudo'];
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
							
								$nom = $_SESSION['pseudo'].".".end($parse_name);
							if (move_uploaded_file($_FILES['avatar']['tmp_name'],$upload_directory."/".$nom))
							{
								
								/*$pseudo = $_SESSION['pseudo'];
								$request2 = 'INSERT INTO photo(nom_photo, pseudo)';
								$resultat = $bdd->prepare($request2);
								$resultat->execute(array('nom_photo' =>$nom_img, 'pseudo' =>$pseudo));*/
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
		
	
	
	<a href="creationgroupe.php" id="text_crea_grp">Creer<br /> un groupe</a>
	<a href="" id="text_rej_grp">Rejoindre<br /> un groupe</a>
	<div id="div_grp">
		<p id="explic_grp">
			Félicitation, vous arrivez à la fin de votre inscription ! :)<br />
			Maintenant deux choix s'offrent à vous :
			<br />
			<br />
			- Créer un groupe qui pourra contenir jusqu'à 20<br /> membres
			  et avec lequel vous pourrez organiser vos sortis en groupe.
			<br />
			<br />
			- Rejoindre un groupe déjà creé par vos amis.
		
		</p>
	</div>
	<?php include 'include/footer.php'; ?>		
    </body>
</html>