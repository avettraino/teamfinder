<?php	
	session_start();
	if(!isset( $_SESSION['pseudo']))
		$_SESSION['pseudo'] = "visiteur" ;
	if($_SESSION["pseudo"] == "visiteur")
		header("location:index.php");
?>
			

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />
		
        <title>TeamFinder.fr </title>
    </head>
    <body> 
	<?php include 'include/header.php'; 
		  include 'include/main_menu.php';?>	
		  
		  <img src="image/crea_group.JPG" id="img_crea_grp">
		  <div id="div_deco"></div>
		  <p class="titre_crea_grp">Creation d'un groupe : </p> 
		  <form method="post" action="membre_conf.php" id="form_crea_grp">
			<div id="nom_crea_grp">
				<label id="text_nom_grp">Nom du groupe</label>  :  <input type="text" name="nom_grp" placeholder="Nom du groupe">
			</div>
			
			<div id="nb_pers_grp">
				<label id="text_nb_pers">Nombre de personne </label>: <input type="text" name="nb_pers" placeholder="Nombre de personnes">
			</div>
			
			<div id="devise_grp">
				<label id="text_devise">Devise du groupe </label>: <input type="text" name="devise" placeholder="Devise">
			</div>
			
			<input type="submit" value="Envoyer" id="boutton_crea_grp">
		  </form>
		  <p>Bonjours <?php echo $_SESSION['pseudo'] ;?> !</p>
		 
	<?php include 'include/footer.php'; ?>		
    </body>
</html>