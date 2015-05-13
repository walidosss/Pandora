<?php

$id_bureau=$_GET['ID'];
$query  = "SELECT * FROM `bureau` where ID=$id_bureau";
$connect = connectDB();
$res = mysqli_query($connect, $query);
$line = mysqli_fetch_array($res, MYSQLI_ASSOC);
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
                        <li>Emplacement:</li>
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
                                        <span>Données Bureau</span>
                                    </h4>
                                    
                                </div>
                                <div class="content">

                                    <form class="form-horizontal" id="form-validate" method="post" action="modif_bureau.php" />
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
								<input class="span9" id="id_bureau" name="id_bureau" type="text" value="<?php echo $line['ID'];?>" readonly/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Nom</label>
								<input class="span9" id="nom_bureau" name="nom_bureau" type="text" value="<?php echo $line['Nom'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Rue</label>
								<input class="span9" id="rue" name="rue" type="text" value="<?php echo $line['Rue'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Cité</label>
								<input class="span9" id="cite" name="cite" type="text" value="<?php echo $line['Cite'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Province</label>
								<input class="span9" id="province" name="province" type="text" value="<?php echo $line['Province'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Longitude</label>
								<input class="span9" id="longitude" name="longitude" type="text" value="<?php echo $line['Longitude'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Lattitude</label>
								<input class="span9" id="lattitude" name="lattitude" type="text" value="<?php echo $line['Lattitude'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Altitude</label>
								<input class="span9" id="altitude" name="altitude" type="text" value="<?php echo $line['Altitude'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Reference</label>
								<input class="span9" id="reference" name="reference" type="text" value="<?php echo $line['Reference'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Note</label>
								<input class="span9" id="note" name="note" type="text" value="<?php echo $line['Note'];?>"/>
							</div>
						</div>
					</div>


                                        <!--div class="form-row row-fluid">
                                            
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <div class="form-actions">
                                                        <div class="span3"></div>
                                                        <div class="span9 controls">
                                                            <button type="submit" class="btn marginR10">Save changes</button>
                                                            <button class="btn btn-danger">Cancel</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </div-->
										<div class="form-actions">
                                           <button type="submit" class="btn btn-info">Appliquer Changements</button>
                                           <button type="button" class="btn" onclick="document.location='liste_bureaux.php';">Annuler</button>
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