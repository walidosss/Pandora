	<div id="slider-wrap">
			<div class="flexslider">
				<ul class="slides">                                        		
						<!--li>
							<a href="single-service.html" title="Qualified Doctors"  class="img-hover" ><img src="images/anim/animation1.png" alt="Slider Image"></a>
						</li>
						<li>
							<a href="single-service.html" title="Clinical Excellence"  class="img-hover" ><img src="images/Refined/clinical.jpg" alt="Slider Image"></a>
						</li>
						<li>
							<a href="single-service.html" title="Dental Treatment"  class="img-hover" ><img src="images/Refined/dental.jpg" alt="Slider Image"></a>
						</li>
						<li>
							<a href="single-service.html" title="Caring Staff"  class="img-hover" ><img src="images/Refined/caring-staff.jpg" alt="Slider Image"></a>
						</li>
						<li>
							<a href="single-service.html" title="Medical Counseling"  class="img-hover" ><img src="images/Refined/couseling.jpg" alt="Slider Image"></a>
						</li-->
					<li>
						<a href="#" title=""  class="img-hover" ><img src="images/anim/animation1.png" alt="Slider Image"></a>
					</i>
					<li>
						<a href="#" title=""  class="img-hover" ><img src="images/anim/animation2.png" alt="Slider Image"></a>
					</i>
					<li>
						<a href="#" title=""  class="img-hover" ><img src="images/anim/animation3.png" alt="Slider Image"></a>
					</i>
					<li>
						<a href="#" title=""  class="img-hover" ><img src="images/anim/animation4.png" alt="Slider Image"></a>
					</i>
					<li>
						<a href="#" title=""  class="img-hover" ><img src="images/anim/animation5.png" alt="Slider Image"></a>
					</i>
					<li>
						<a href="#" title=""  class="img-hover" ><img src="images/anim/animation6.png" alt="Slider Image"></a>
					</i>
					<li>
						<a href="#" title=""  class="img-hover" ><img src="images/anim/animation7.png" alt="Slider Image"></a>
					</i>
					<li>
						<a href="#" title=""  class="img-hover" ><img src="images/anim/animation8.png" alt="Slider Image"></a>
					</i>
				</ul>
				<!--ul class="slide-nav slides-7">
						<li>
							<h4>Qualified Doctors</h4>
							<p>Team of Expert Doctors</p>
						</li> 
						<li>
							<h4>Clinical Excellence</h4>
							<p>Expert in Clinical Work</p>
						</li> 
						<li>
							<h4>Dental Treatment</h4>
							<p>Specialized in Dental</p>
						</li> 
						<li>
							<h4>Caring Staff</h4>
							<p>Caring Staff</p>
						</li> 
						<li>
							<h4>Medical Counseling</h4>
							<p>Discuss Your Health</p>
						</li>   
						<li>
							<h4>Medical Counseling</h4>
							<p>Discuss Your Health</p>
						</li> 
						<li>
							<h4>Medical Counseling</h4>
							<p>Discuss Your Health</p>
						</li> 
				</ul><!-- end of slider nav -->
			</div>
	</div><!-- end of slider-wrap -->
	
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
			
			<ul class="services">                                        
				  <li class="service">
					  <figure class="service-thumb"><a href="index.php?page=calendrier"><img src="images/Refined/small/serv1.png" alt="Réservation"></a></figure>
					  <h4><a href="index.php?page=calendrier">Réservation</a></h4>
					  <p>Soyez les premiers de réservez  votre place Chez un guichet de poste.</p>
				  </li>
				  <li class="service">
					  <figure class="service-thumb"><a href="index.php?page=home"><img src="images/Refined/small/serv2.png" alt="Renseignement"></a></figure>
					  <h4><a href="index.php?page=home">Renseignement</a></h4>
					  <p>Pour tout renseignements suivez l animation.</p>
				  </li>
				  <li class="service">
					  <figure class="service-thumb"><a href="index.php?page=contact"><img src="images/Refined/small/serv4.png" alt="Numéro Vert"></a></figure>
					  <h4><a href="index.php?page=contact">Contacts</a></h4>
					  <p>Pour tous vos questions un numero vert est mis à disposition .</p><p><span>Téléphone:</span> +216 123 4567</p>
				  </li>
				  <li class="service">
					  <figure class="service-thumb"><a href="#"><img src="images/Refined/small/serv5.png" alt="F.A.Q"></a></figure>
					  <h4><a href="#">FAQ</a></h4>
					  <p>.</p>
				  </li>                                               
			</ul><!-- end of services -->                                                               
			
			<div id="content" class="full-width"></div>
	</div><!-- end of container -->