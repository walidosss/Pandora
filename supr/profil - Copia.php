
        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Profil Admin</h3>                    

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
                        <li class="active">Profil Admin</li>
                    </ul>

                </div><!-- End .heading-->

                <!-- Build page from here: -->
                <div class="row-fluid">

                    <div class="span12">

                        <div class="page-header">
                            <h4>Mon Profil</h4>
                        </div>

                        <form class="form-horizontal seperator" />
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span3" for="username">Login:</label>
                                        <input class="span4" id="username" type="text" disabled="disabled" value="SuggeElson" />
                                        <span class="hint"><a href="#" class="red">Demander ?</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span3" for="username">Avatar:</label>
                                        <img src="http://placehold.it/60x60" alt="" class="image marginR10" />
                                        <input type="file" name="fileinput" id="file" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span3" for="name">Prénom:</label>
                                        <input class="span4" id="name" type="text" value="Jonh Doe" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span3" for="email">Email:</label>
                                        <input class="span4" id="email" type="text" value="jonhdoe@gmail.com" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span3" for="normal">Mot de passe:</label>
                                        <div class="span4 controls">
                                            <input class="span12" id="password" name="password" type="password" placeholder="Enter your password" value="1234567" />
                                            <input class="span12" id="passwordConfirm" name="confirm_password" type="password" placeholder="Enter your password again" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span3" for="email">Genre:</label>
                                        <div class="left marginT5 marginR10">
                                            <input type="radio" name="gender" id="optionsRadios1" value="option1" checked="checked" />
                                            Masculin
                                        </div>
                                        <div class="left marginT5 marginR10">
                                            <input type="radio" name="gender" id="optionsRadios2" value="option2" />
                                            Feminin
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span3" for="textarea">More info</label>
                                        <textarea class="span4 limit elastic" id="textarea2" rows="3" cols="5"></textarea>
                                    </div>
                                </div>  
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span3" for="email">Want to receive newsletters:</label>
                                        <div class="span4 controls">       
                                            <div class="left marginR10">
                                                <input type="checkbox" id="inlineCheckbox4" checked="checked" class="ibuttonCheck" /> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span3" for="email">Favorite color:</label>
                                        <input id="tags" type="text" value="orange" class="text" />
                                    </div>
                                </div>
                            </div>

                            
                            <div class="form-row row-fluid">        
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="form-actions">
                                        <div class="span3"></div>
                                        <div class="span4 controls">
                                            <button type="submit" class="btn btn-info marginR10">Save changes</button>
                                            <button class="btn btn-danger">Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>


                        </form>
                      
                    </div><!-- End .span12 -->

                </div><!-- End .row-fluid -->

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
                                    <textarea class="elastic" id="textarea1" rows="1" placeholder="Enter your message ..." style="width:98%;"></textarea>
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