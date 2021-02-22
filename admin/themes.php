<?php
$is_maintenance = 1;
include("../core.php");

$setgui = 2;
$page['name'] = "Gestione tematiche FAQ admin";
$page['rank'] = 7;

include("header.php");
?>	
<script>
		function deleleItem(id){
		var sei_sicuro = confirm('Eliminando questa tematica verranno eliminate anche tutte le FAQ ad essa connesse. Sicuro di voler procedere?');
		if (sei_sicuro)
		{
			location.href = '?delete='+id;
		}
	}
	</script>

	 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestione tematiche FAQ admin <a type="button" href="?add" class="btn btn-info">Aggiungi</a></h1>
                </div> 
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Elenco tematiche

                        </div>
                        <!-- /.panel-heading -->
						<?php if(!isset($_GET['edit']) && !isset($_GET['add']) && !isset($_GET['delete'])){ ?>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                       <th>ID</th> 
									   <th>Denominazione</th> 
									   <th>Data modifica</th> 
									   <th>Elimina</th>
									
						
                                    </tr>
                                </thead>
                                <tbody>
									<?php
				$input->logSession($user->row['mail'], "Visualizza", "Visualizzazione elenco generale segnalazioni", date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);
				$sql = mysql_query("SELECT * FROM faq_theme ORDER BY id DESC");
				
				while($row = mysql_fetch_assoc($sql)){
		

				echo '
				<tr class="'.$messtype.'">
   					<td><a href="?edit='.$row['id'].'">'.$row['id'].'</a></td> 
    				<td><a href="?edit='.$row['id'].'">'.$row['content'].'</a></td> 
    				<td>'.$row['date'].'</td>
					<td>  <center> 
					
					
					<button type="button"  onclick="javascript:deleleItem('.$row['id'].')" class="btn btn-danger">Elimina</button> </center>	</tr>';
				}
			?>
                                    
                                    
                                </tbody>
                            </table>
							
							
							 <!-- /.table-responsive -->
                            <div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">Aggiungi tipologia</a>
                          </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
 
            <div class="row">
      
                <div class="col-lg-6">
                    
					
<?php } elseif(isset($_GET['edit'])){
								
	$id = isset($_GET['edit']) ? $input->EscapeString($_GET['edit']) : '';
	
	
	if(isset($_POST['edit'])){

		$theme_content = isset($_POST['ThemesName']) ? $_POST['ThemesName'] : '';
		$theme_desc = isset($_POST['ThemesDesc']) ? $_POST['ThemesDesc'] : '';
		
		if($theme_content == '') $error = 'La denominazione non può essere vuota!';
		else{
			mysql_query("UPDATE faq_theme SET content = '".$theme_content."', date = '".date('d/m/Y H:i:s')."', description = '".$theme_desc."'   WHERE id = ".$id);
			//$input->logSession($user->row['mail'], "Modifica", "Modifica segnalazione ID ".$id, date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);
			//$input->systemNotify($id,'1'); 
		
		//  mysql_query("INSERT INTO report_log (report_type = '".$report_type."',status = '".$report_status."', hide = '".$report_hide."',priority = '".$report_priority."',answer = '".$report_answer."',report_setdate = '".date('d/m/Y H:i:s')."' WHERE id = ".$id);
			$ok = "Modifica effettuata";
		}
	}
	
	$sql = mysql_query("SELECT * FROM faq_theme WHERE id = ".$id) or die();
	
	if(mysql_num_rows($sql) > 0){
		$row = mysql_fetch_assoc($sql);
	?>

		
		          <div class="panel-body">	
			<a href="./themes" type="button" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-triangle-left"></i>
                              </a>  Torna all'elenco</br></br>
                             
				  	<?php
		if(isset($error))
			echo '<div class="alert alert-danger">
                                '.$error.'
                            </div>';
		else if(isset($ok))
			echo '<div class="alert alert-success">
                                '.$ok.'
                            </div>';
		?>
				 
                            <div class="row">
							<form action="" method="post">
                                <div class="col-lg-6">
								
                                    
									
									 <div class="form-group">
                                                <label for="disabledSelect">ID</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['id']; ?>" disabled>
                                            </div>
											
									  <div class="form-group">
                                                <label for="disabledSelect">Denominazione</label>
                                                <input class="form-control" id="disabledInput" name="ThemeName" type="text" value="<?php echo $row['content']; ?>">
                                            </div>
											
								
								<h3>FAQ area tematica</h3>
								<div class="panel-body">
                            <div class="list-group">
																		
<?php
				$sql = mysql_query("SELECT * FROM faq WHERE theme_id = ".$id);
				
				
				while($row = mysql_fetch_assoc($sql)){	
?>
				<a href="./questions?edit=<?php echo $row['id']; ?>" class="list-group-item">
				<i class="fa fa-gears"></i> <?php echo $row['question']; ?>
                                    <span class="pull-right text-muted small">  <button type="button" href="./questions?edit=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">Modifica</button>
                                    </span>
									</a>
											
				
				<?php 
				}
				
			?>
			
			</div>
                            <!-- /.list-group -->
                  
                        </div>
                        <!-- /.panel-body -->

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
																	

									<div class="form-group">
                                            <label>Descrizione</label>
                                            <textarea class="form-control" name="ThemeDesc" rows="5"><?php echo $row['description']; ?></textarea>
                                        </div>
											
										
                        <!-- /.panel-body -->
                    </div>
					</div>
					<input type="submit" name="edit" value="Aggiorna" class="btn btn-primary btn-lg btn-block" />
					<a href="./themes" value="Annulla" class="btn btn-danger btn-lg btn-block">Annulla</a></br>
			</form>
                                    
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
								
                            </div>
							
							
                            <!-- /.row (nested) -->
                        </div>
	<?php

	} } elseif(isset($_GET['add'])){
	
	if(isset($_POST['add'])){
		$theme_name   = isset($_POST['ThemeName']) ? $_POST['ThemeName'] : '';
		$theme_desc = isset($_POST['ThemeDesc']) ? $_POST['ThemeDesc'] : '';
		
		if($theme_name == '' || $theme_desc == '' )
			$error = 'Tutti i campi contrassegnati con <b>*</b> sono obbligatori!';
		else{
			mysql_query("INSERT INTO faq_theme (content, date, description) VALUES ('".$theme_name."','".date('d/m/Y H:i')."','".$theme_desc."')");
			$ok = "Tematica inserita correttamente!";
		}
	}


		?>

			
   <div class="panel-body">	
			<a href="./themes" type="button" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-triangle-left"></i>
                              </a>  Torna all'elenco</br></br>
                             
				  	<?php
		if(isset($error))
			echo '<div class="alert alert-danger">
                                '.$error.'
                            </div>';
		else if(isset($ok))
			echo '<div class="alert alert-success">
                                '.$ok.'
                            </div>';
		?>
				 
                            <div class="row">
							<form action="" method="post">
                                <div class="col-lg-6">
								
									<div class="form-group">
                                                <label for="disabledSelect">ID</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="ID autogenerato" disabled>
                                            </div>
											
									  <div class="form-group">
                                                <label for="disabledSelect">Denominazione</label>
                                                <input class="form-control" id="disabledInput" name="ThemeName" type="text" value="<?php echo $row['content']; ?>">
                                            </div>
											


                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
																	

									<div class="form-group">
                                            <label>Descrizione</label>
                                            <textarea class="form-control" name="ThemeDesc" rows="5"></textarea>
                                        </div>
											
										
                        <!-- /.panel-body -->
                    </div>
					</div>
					<input type="submit" name="add" value="Aggiungi" class="btn btn-success btn-lg btn-block" />
					<a href="./type" value="Annulla" class="btn btn-danger btn-lg btn-block">Annulla</a></br>
			</form>
                                    
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
								
                            </div>
							
							
                            <!-- /.row (nested) -->
                        </div>
			

		<?php
			
	
		}else if(isset($_GET['delete'])){
			
				$id = isset($_GET['delete']) ? $input->EscapeString($_GET['delete']) : '';
			
	
			//$uid = $input->EscapeString($_GET['delete']);
			//$id = $input->EscapeString($_GET['sector']);
			
			mysql_query("DELETE FROM faq_theme WHERE id = ".$id) or die();
			mysql_query("DELETE FROM faq WHERE theme_id = ".$id) or die();
			echo '<meta http-equiv="refresh" content="0; url=themes" />';
			
		} 

		
		?>  
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
