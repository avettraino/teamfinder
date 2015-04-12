<?php
	session_start();
	if(!isset($_SESSION["pseudo"]) )
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
		?>			
		

		<?php
			 
	   
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=site1', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
	
if (isset($_POST['nom_grp']) && trim($_POST['nom_grp']))
{
						
	  $nom_grp = $_POST['nom_grp'];
	  
}

if (isset($_POST['nb_pers']))
{
						
	  $nombre = $_POST['nb_pers'];
	  
}

if (isset($_POST['devise']))
{
						
	 $devise= $_POST['devise'];
	 
}

$pseudo = $_SESSION['pseudo'];
$resultat = $bdd->prepare('INSERT INTO groupe(nom, nombre_pers, devise) VALUES(:nom_grp, :nb_pers, :devise)');
$resultat->execute(array('nom_grp'=>$nom_grp, 'nb_pers' =>$nombre, 'devise'=>$devise));
$request2 = 'UPDATE utilisateurs SET groupe=:nom_grp WHERE pseudo="'.$pseudo.'"';
$resultat2 = $bdd->prepare($request2);
$resultat2->execute(array('nom_grp' =>$nom_grp));

//echo $request;
}
catch(Exception $e)
{
	die("Erreur : ".$e->getMessage());
}
echo $_SESSION['pseudo'];

echo'<img src="uploads/'.$_SESSION['pseudo'] ."/". $_SESSION['pseudo'] .".JPG".'" width="150" height="200" id="affichage_photo"> ';
?>
<img src="image/villa.JPG" id="img_memb_conf">
<div id="memb_conf_grp">
	<p id="txt_grp_memb"><b><?php echo $nom_grp ?></b></p>
</div>
	<br />
	<?php
	
	$request3 = 'SELECT pseudo FROM utilisateurs WHERE groupe="'.$nom_grp.'"';
	$resultat3 = $bdd->prepare($request3);
	$resultat3->execute();
	$result = $resultat3->fetchAll(PDO::FETCH_COLUMN, 0);
	print_r($result);
	?>
	<?php include 'include/footer.php'; ?>		
    </body>
</html>