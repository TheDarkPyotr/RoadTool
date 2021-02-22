<?php
$is_maintenance = 1;
include("../core.php");

$error = '';
$setgui = 2;
$page['name'] = "Comunicazioni pubbliche";
$page['rank'] = 7;


if(isset($_POST['next'])){
    
	$message = isset($_POST['Message']) ? $input->EscapeString($_POST['Message']) : '';
    $msg_status = isset($_POST['MessageStatus']) ? $input->EscapeString($_POST['MessageStatus']) : '';
   
		mysql_query("UPDATE cms_system SET public_message = '".$message."', viewm_status = '".$msg_status."'");
		$ok = "Comunicazione correttamente modificata!";
	
}

											
include("header.php");


$row = mysql_fetch_assoc(mysql_query("SELECT * FROM cms_system"));
?>	


	 <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Impostazioni comunicazioni pubbliche</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
							
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Impostazioni comunicazioni
                        </div>
		          <div class="panel-body">	
					<form action="" method="post">
                            <div class="row">
							

                                
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>Visibilit&agrave;</label>
                                            <select class="form-control" name="MessageStatus">

                                                <?php if($row['viewm_status'] == 0) { ?>
                                                    <option value="0" selected>Non attiva</option> <?php } else { ?>
                                                    <option value="0">Non attiva</option><?php } ?>

                                                <?php if($row['viewm_status'] == 1) { ?>
                                                    <option value="1" selected>Attiva</option> <?php } else { ?>
                                                    <option value="1">Attiva</option><?php } ?>
                                            </select>

                                        </div>
								
										Le comunicazioni al pubblico sono visibili in intestazione alla home page pubblica del sito e dunque visibili da chiunque lo visiti.
								
                                </div>

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Comunicazioni al pubblico</label>
                                        <textarea class="form-control" name="Message" rows="5"><?php echo $row['public_message']; ?></textarea>
                                    </div>

                                </div>
					

					<input type="submit" name="next" value="Aggiorna" class="btn btn-primary btn-lg btn-block" />
					<a href="./home" value="Annulla" class="btn btn-danger btn-lg btn-block">Annulla</a>

			</form>
                      </div>
                      </div>
                                    </div>
                                    </div>

                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
							
                            </div>
							
							
                            <!-- /.row (nested) -->
                        </div>
 
                    <!-- /.panel -->
                </div>
				
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
	 </div> 
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="./vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
