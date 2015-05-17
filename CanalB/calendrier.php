
	<div id="container">
			
			<section class="slogan">
			<?php 
			$nom = "";//var_dump($_SESSION);
			if (isset($_SESSION['S_LOGIN'] ["nom"]) && !empty($_SESSION['S_LOGIN'] ["nom"])) { 
				$nom = $_SESSION['S_LOGIN'] ["nom"];
			}
			?>
				<h2>Bienvenu <?php echo $nom;?> sur notre nouvelle application, <i>canal bleu</i></h2>
				<h3>Réservez votre place comme vous voulez pour éviter la file d'attente pour vous renseigner vous pouvez consulter l'animation</h3>
			</section>
			
			<!--div id="content" class="full-width"></div-->
			<?php include_once("calData.php");?>
			
	</div><!-- end of container -->
	<br>