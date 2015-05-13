<?php

$id_service=$_GET['id'];
$query  = "SELECT * FROM `service` where id_service=$id_service";
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
                                        <span>Données Service</span>
                                    </h4>
                                    
                                </div>
                                <div class="content">
                                   
                                    <form class="form-horizontal" id="form-validate" action="modif_service.php" />

					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">ID Service</label>
								<input class="span9" id="id" name="id" type="text" value="<?php echo $line['id_service'];?>" readonly/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Nom Service</label>
								<input class="span9" id="name" name="name" type="text" value="<?php echo $line['nom_service'];?>"/>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span3" for="required">Couleur</label>
								<input class="span9" id="name" name="name" type="text" value="<?php echo $line['couleur'];?>"/>
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
                                           <button type="button" class="btn" onclick="document.location='liste_services.php';">Annuler</button>
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