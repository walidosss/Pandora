<?php

$id_user=$_GET['id'];
$query  = "SELECT * FROM `user` where id=$id_user";
$connect = connectDB();
$res = mysqli_query($connect, $query);
$line = mysqli_fetch_array($res, MYSQLI_ASSOC);
//while ($line = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
disconnectDB($connect);

?>
        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Form validation</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 brocco-icon-search"></span></a>
                    </div>

                    <div class="search">

                        <form id="searchform" action="search.html" />
                            <input type="text" id="tipue_search_input" class="top-search" placeholder="Search here ..." />
                            <input type="submit" id="tipue_search_button" class="search-btn" value="" />
                        </form>
                
                    </div><!-- End search -->
                    
                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="#" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-screen"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right"></span>
                            </span>
                        </li>
                        <li class="active">Form validation</li>
                    </ul>

                </div><!-- End .heading-->
    				
                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        <span class="icon16 brocco-icon-grid"></span>
                                        <span>Données Utilisateur</span>
                                    </h4>
                                    
                                </div>
                                <div class="content">
                                   
                                    <form class="form-horizontal" id="form-validate" action="modif_user.php" />
				<?php 
				if(isset($_SESSION["S_ERR_REG"]) && !empty($_SESSION["S_ERR_REG"])) { 
					echo "<div class='alert alert-error'>";
					echo "<button class='close' data-dismiss='alert'>×</button>";
					echo "<strong>Attention! </strong> ".$_SESSION["S_ERR_REG"];
                    echo "</div>";
					unset($_SESSION["S_ERR_REG"]);
				} 
				if(isset($_SESSION['S_REG_INFO']) && !empty($_SESSION['S_REG_INFO'])) { 
					echo "<div class='alert alert-info'>";
					echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
					echo "<strong>Ok: </strong> ".$_SESSION['S_REG_INFO'];
					echo "</div>";
					unset($_SESSION['S_REG_INFO']);
				}
				?>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">ID</label>
								<input class="span9" id="id" name="id" type="text" value="<?php echo $line['id'];?>" readonly/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Nom</label>
								<input class="span9" id="nom" name="nom" type="text" value="<?php echo $line['name'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Prénom</label>
								<input class="span9" id="prenom" name="prenom" type="text" value="<?php echo $line['surname'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Login</label>
								<input class="span9" id="username" name="username" type="text" value="<?php echo $line['username'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="normal">Date de naissance</label>
								<?php 
								$tmp = explode('-', $line['naissance']);
								$date_naissance = $tmp['2'].'/'.$tmp['1'].'/'.$tmp['0'];?>
								<input class="span9 mask" id="naissance" name="naissance" type="text" value="<?php echo $date_naissance; ?>"/>
								<span class="help-block blue span9">99/99/9999</span>
							</div>
						</div> 
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="email">Email</label>
								<input class="span9" id="email" name="email" type="text" value="<?php echo $line['email'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="normal">Mot de passe</label>
								<div class="span9 controls">
									<input class="span9" id="password" name="password" type="password" placeholder="Enter your password" value="<?php echo $line['password'];?>"/>
									<input class="span9" id="passwordConfirm" name="confirm_password" type="password" placeholder="Enter your password again" value="<?php echo $line['password'];?>"/>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="normal">Type utilisateur</label>
								<div class="span9 controls">
									<input class="span9" id="id_type_user" name="id_type_user" type="text" value="<?php echo $line['id_type_user'];?>"/>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="normal">Date insertion</label>
								<?php 
								$tmp2 = explode(' ', $line['date_ins']);
								$tmp = explode('-', $tmp2[0]);
								//2015-05-10 18:16:26.000000
								$date_insertion = $tmp['2'].'/'.$tmp['1'].'/'.$tmp['0'];?>
								<input class="span9 mask" id="date_ins" name="date_ins" type="text" value="<?php echo $date_insertion; ?>"/>
								<span class="help-block blue span9">99/99/9999</span>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="normal">Date suppression</label>
								<?php 
								$tmp2 = explode(' ', $line['date_del']);
								$tmp = explode('-', $tmp2[0]);
								//2015-05-10 18:16:26.000000
								$date_suppression = $tmp['2'].'/'.$tmp['1'].'/'.$tmp['0'];?>
								<input class="span9 mask" id="date_del" name="date_del" type="text" value="<?php echo $date_suppression; ?>"/>
								<span class="help-block blue span9">99/99/9999</span>
								
							</div>
						</div>
					</div>

					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="normal">Numéro compte poste</label>
								<div class="span9 controls">
									<input class="span9" id="num_compte" name="num_compte" type="text" value="<?php echo $line['num_compte'];?>"/>
								</div>
							</div>
						</div>
					</div>


                                        <div class="form-row row-fluid">
                                            
                                                <div class="span12">
												<div class="alert">
                                                    <div class="row-fluid">
                                                        <div class="form-actions">
                                                        <div class="span3"></div>
                                                        <div class="span9 controls">
                                                            <button type="submit" class="btn marginR10">Modifier</button>
                                                            <button class="btn btn-danger">Annuler</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </form>
                                 
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div><!-- End .row-fluid -->  
               
    			<!-- Page end here -->
    				
                <div class="modal fade hide" id="myModal1">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span class="icon12 minia-icon-close"></span></button>
                        <h3>Chat layout</h3>
                    </div>
                    <div class="modal-body">
                        <ul class="messages">
                            <li class="user clearfix">
                                <a href="#" class="avatar">
                                    <img src="images/avatar2.jpeg" alt="" />
                                </a>
                                <div class="message">
                                    <div class="head clearfix">
                                        <span class="name"><strong>Lazar</strong> says:</span>
                                        <span class="time">25 seconds ago</span>
                                    </div>
                                    <p>
                                        Time to go i call you tomorrow.
                                    </p>
                                </div>
                            </li>
                            <li class="admin clearfix">
                                <a href="#" class="avatar">
                                    <img src="images/avatar3.jpeg" alt="" />
                                </a>
                                <div class="message">
                                    <div class="head clearfix">
                                        <span class="name"><strong>Sugge</strong> says:</span>
                                        <span class="time">just now</span>
                                    </div>
                                    <p>
                                        OK, have a nice day.
                                    </p>
                                </div>
                            </li>

                            <li class="sendMsg">
                                <form class="form-horizontal" action="#" />
                                    <textarea class="elastic" id="textarea" rows="1" placeholder="Enter your message ..." style="width:98%;"></textarea>
                                    <button type="submit" class="btn btn-info marginT10">Send message</button>
                                </form>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                    </div>
                </div>
                
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->