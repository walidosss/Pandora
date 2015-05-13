
        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Data tables</h3>                    

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
                        <li class="active">Utilisateurs</li>
                    </ul>

                </div><!-- End .heading-->
    				
                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        <span>Liste Utilisateurs</span>
                                    </h4>
                                </div>
                                <div class="content noPad clearfix">
                                    <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>nom</th>
                                                <th>prénom</th>
                                                <th>login</th>
                                                <th>date naissance</th>
												<th>mot de passe</th>
												<th>email</th>
												<th>type</th>
												<th>date enregistrement</th>
												<th>date suppression</th>
												<th>numéro compte</th>
												<th>Modifier</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 
$i=0;
$array_s_login = $_SESSION["S_LOGIN"];
$id_admin=$array_s_login['id'];
$query  = "SELECT * FROM `user` where id<>$id_admin";
$connect = connectDB();
$res = mysqli_query($connect, $query);
while ($line = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	echo "<tr class='gradeA'>";
	echo "<td>".$line['id']."</td>";
	echo "<td>".$line['name']."</td>";
	echo "<td>".$line['surname']."</td>";
	echo "<td>".$line['username']."</td>";
	echo "<td>".$line['naissance']."</td>";
	echo "<td>".$line['password']."</td>";
	echo "<td>".$line['email']."</td>";
	echo "<td>".$line['id_type_user']."</td>";
	echo "<td>".$line['date_ins']."</td>";
	echo "<td>".$line['date_del']."</td>";
	echo "<td>".$line['num_compte']."</td>";
	echo "<td><a href='modification_u.php?id=".$line['id']."'><span class='brocco-icon-pencil' aria-hidden='true'></span></a></td>";
	echo "</tr>";
	$i++;
}
disconnectDB($connect);
?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>nom</th>
                                                <th>prénom</th>
                                                <th>login</th>
                                                <th>date naissance</th>
												<th>mot de passe</th>
												<th>email</th>
												<th>type</th>
												<th>date enregistrement</th>
												<th>date suppression</th>
												<th>numéro compte</th>
												<th>Modifier</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
