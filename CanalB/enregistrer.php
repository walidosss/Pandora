
<hgroup class="page-head">    		
	<h2>Inscrivez <span>Vous</span></h2>
	<h5>Bénéficiez de notre service canal bleu pour gain de temps <br> il faut tout simplement s'inscrire et réserver.</h5>
</hgroup>

<div id="container" class="clearfix">
		
	<div id="content">
														
		<div class="contact-form-container">
			<h3 class="smart-head">Inscription</h3>
			<p>Compiler le formulaire suivant pour vous inscrire.</p>
			<form action="submit.php" id="contact-form" method="post" novalidate>
				<div class="form-cell">
					<label class="display-ie8" >Nom:</label>
					<input type="text" placeholder="Nom" class="name required" id="nom" name="nom" title="Veuillez saisir votre nom"  /><span>*</span>
				</div>
				
				<div class="form-cell">
					 <label class="display-ie8" >Prénom:</label>
					<input type="text" placeholder="Prénom" class="phone required" id="prenom" name="prenom" title="Veuillez saisir votre prénom" /><span>*</span>
				</div>
				
				<div class="form-cell">
					 <label class="display-ie8" >Email:</label>
					<input type="text" placeholder="Email" class="email required" id="email" name="email" title="Veuillez saisir votre email" /><span>*</span>
				</div>
				
				<div class="form-cell">
					 <label class="display-ie8" >Date de naissance:</label>
					<input type="text" placeholder="Date de naissance" class="subject required" id="naissance" name="naissance" title="Veuillez introduire votre date de naissance" /><span>*</span>
				</div>
				<!--div class="form-cell">
					 <label class="display-ie8" >Mot de passe:</label>
					<input type="password" placeholder="Mot de passe" class="subject required" id="password1" name="password1" title="Veuillez saisir votre mot de passe" /><span>*</span>
				</div>  
				<div class="form-cell">
					 <label class="display-ie8" >Retapez le mot de passe:</label>
					<input type="text" placeholder="Retapez le mot de passe" class="subject required" id="password2" name="password2" title="Veuillez retaper votre mot de passe" /><span>*</span>
				</div-->													
				
				<div class="form-row">													
					<input type="submit" name="submit" value="Inscrire" class="submit readmore"/>
					<!--input type="submit" id="nl_submit" value="Inscrire" class="readmore"-->
				</div>
				
				<div class="error-container" id="div_erreur_c">
				<?php
				//var_dump($_SESSION);
				  if (isset( $_SESSION["S_ERR_REG"])) {
					  if (!empty($_SESSION["S_ERR_REG"])) {
						$err = $_SESSION["S_ERR_REG"];
						echo "<label class='error' generated='true' for='nom'>$err</label>";
					  }
					  unset($_SESSION["S_ERR_REG"]);							  
				  }
				  ?>
				</div>
				<div class="info-container" id="div_info_c">
				<?php
				  if (isset( $_SESSION['S_REG_INFO'])) {
					  if (!empty($_SESSION['S_REG_INFO'])) {
						$inf = $_SESSION['S_REG_INFO'];
						//console.log($inf);
						echo "<p class='text-success'>$inf</p>";
						//echo "<label class='info' generated='true' for='login'>$inf</label>";
					  }
					  unset($_SESSION['S_REG_INFO']);							  
				  }
				?>
				</div>
			</form>
		</div>									
	</div>
	
   <aside id="sidebar">
		<section class="widget"><h3 class="title">Connexion</h3>       
			<div class="newsletter">                  
			  <form action="login.php" id="newsletter" method="post" novalidate>
				  <p>
					  <label class="display-ie8" for="login">Login</label>
					  <input type="text" name="login" id="login" class="email required" placeholder="Login" title="Veuillez saisir votre login"  >
					  <label class="display-ie8" for="password">Password</label>
					  <input type="password" name="password" id="password" class="password required" placeholder="Password" title="Veuillez saisir votre mot de passe"  >
					  <input type="submit" id="nl_submit" value="Login" class="readmore">
				  </p>
				  <div class="error-container" id="div_erreur">
				  
				  <?php
				  if (isset( $_SESSION["S_ERR_LOGIN"])) {
					  if (!empty($_SESSION["S_ERR_LOGIN"])) {
						$err = $_SESSION["S_ERR_LOGIN"];
						echo "<label class='error' generated='true' for='login'>$err</label>";
					  }
					  unset($_SESSION["S_ERR_LOGIN"]);							  
				  }
				  ?>
				  </div>
			  </form>
			</div>               
		</section>
		<section class="widget">
			<h3 class="title">Contactez Nous</h3>        
			<div class="contact-widget">
				<p>
					<strong>Fixe :</strong> +216 - 123 - 456 - 7890<br>
					<strong>Mobile :</strong> +216 - 1234567890<br>
					<strong>Fax :</strong> +216 - 123 - 456 - 7891<br>
				</p>
				<hr>
				<p>
					<a href="mailto:info@yoursite.com">info@votresite.com</a><br>
					<a href="mailto:support@yoursite.com">support@votresite.com</a>            
				</p>
			</div>        
		</section>					
									
	</aside>
										
</div><!-- end of container -->