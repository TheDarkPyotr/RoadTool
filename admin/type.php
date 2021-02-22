<?php
$is_maintenance = 1;
include("../core.php");

$setgui = 2;
$page['name'] = "Elenco Segnalazioni";
$page['rank'] = 7;

include("header.php");
?>	
<script>
		function deleleItem(id){
		var sei_sicuro = confirm('Sei sicuro di voler rimuovere questa tipologia?');
		if (sei_sicuro)
		{
			location.href = '?delete='+id;
		}
	}
	</script>

	 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestione Tipologia  <a type="button" href="?add" class="btn btn-info">Aggiungi</a></h1>  
                </div> 
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Elenco tipologie segnalazioni
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
				$sql = mysql_query("SELECT * FROM typology ORDER BY id DESC");
				
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
		
		if(!empty($_POST['refer_list'])) {

				$checked_count = count($_POST['refer_list']);
				foreach($_POST['refer_list'] as $selected) {
					
								mysql_query("INSERT INTO sector_refer (user_id, sector_id) VALUES ('".$selected."','".$id."')");
						}
				}
						
		if(!empty($_POST['type_list'])) {

				$checked_count = count($_POST['type_list']);
				foreach($_POST['type_list'] as $selected) {
					
								mysql_query("INSERT INTO type_refer (type_id, sector_id) VALUES ('".$selected."','".$id."')");
						}
				}
			

		$sector_content = isset($_POST['SectorName']) ? $_POST['SectorName'] : '';
		$sector_desc = isset($_POST['SectorDesc']) ? $_POST['SectorDesc'] : '';
		
		if($sector_content == '') $error = 'La denominazione non può essere vuota!';
		else{
			mysql_query("UPDATE typology SET content = '".$sector_content."', date = '".date('d/m/Y H:i:s')."', description = '".$sector_desc."'   WHERE id = ".$id);
			//$input->logSession($user->row['mail'], "Modifica", "Modifica segnalazione ID ".$id, date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);
			//$input->systemNotify($id,'1'); 
		
		//  mysql_query("INSERT INTO report_log (report_type = '".$report_type."',status = '".$report_status."', hide = '".$report_hide."',priority = '".$report_priority."',answer = '".$report_answer."',report_setdate = '".date('d/m/Y H:i:s')."' WHERE id = ".$id);
			$ok = "Modifica effettuata";
		}
	}
	
	$sql = mysql_query("SELECT * FROM typology WHERE id = ".$id) or die();
	
	if(mysql_num_rows($sql) > 0){
		$row = mysql_fetch_assoc($sql);
	?>

					<script>
	function del(id){
		var sei_sicuro = confirm('Sei sicuro di voler rimuovere questo amministratore dal seguente settore?');
		if (sei_sicuro)
		{
			location.href = '?delete='+id+'&sector='+<?php echo $id; ?>;
		}
	}
	
		function delt(id){
		var sei_sicuro = confirm('Sei sicuro di voler rimuovere questa tipologia dal seguente settore?');
		if (sei_sicuro)
		{
			location.href = '?type='+id+'&sector='+<?php echo $id; ?>;
		}
	}
	</script>
		
		          <div class="panel-body">	
			<a href="./sector" type="button" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-triangle-left"></i>
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
                                                <input class="form-control" id="disabledInput" name="SectorName" type="text" value="<?php echo $row['content']; ?>">
                                            </div>
											
								
								<h1>Settori di riferimento</h1>
								<div class="panel-body">
                            <div class="list-group">
																		
<?php
				$sql = mysql_query("SELECT * FROM type_refer WHERE type_id = ".$id);
				
				
				while($row = mysql_fetch_assoc($sql)){	
				
				
				$sqlm = mysql_query("SELECT * FROM sector WHERE id = ".$row['sector_id']) or die();
	
					$row2 = mysql_fetch_assoc($sqlm);
		
		
	
		
					
						
				?> 
				<a href="./sector?edit=<?php echo $row['sector_id']; ?>" class="list-group-item">
				<i class="fa fa-gears"></i> <?php echo $row2['content']; ?>
                                    <span class="pull-right text-muted small">  <button type="button" href="./sector?edit=<?php echo $row['sector_id']; ?>" class="btn btn-primary btn-xs">Modifica</button>
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
                                            <textarea class="form-control" name="SectorDesc" rows="5"></textarea>
                                        </div>
											
										
                        <!-- /.panel-body -->
                    </div>
					</div>
					<input type="submit" name="edit" value="Aggiorna" class="btn btn-primary btn-lg btn-block" />
					<a href="./type" value="Annulla" class="btn btn-danger btn-lg btn-block">Annulla</a></br>
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
		$title   = isset($_POST['SectorName']) ? $_POST['SectorName'] : '';
		$desc = isset($_POST['SectorDesc']) ? $_POST['SectorDesc'] : '';
		
		if($title == '' || $desc == '' )
			$error = 'Tutti i campi contrassegnati con <b>*</b> sono obbligatori!';
		else{
			mysql_query("INSERT INTO typology (content, date, description) VALUES ('".$title."','".date('d/m/Y H:i')."','".$desc."')");
			$ok = "Tipologia inserita correttamente!";
		}
	}

		if(isset($error))
			echo '<div class="alert alert-danger">
                                '.$error.'
                            </div>';
		else if(isset($ok))
			echo '<div class="alert alert-success">
                                '.$ok.'
                            </div>';
		?>

			
   <div class="panel-body">	
			<a href="./type" type="button" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-triangle-left"></i>
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
                                                <input class="form-control" id="disabledInput" name="SectorName" type="text" value="<?php echo $row['content']; ?>">
                                            </div>
											


                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
																	

									<div class="form-group">
                                            <label>Descrizione</label>
                                            <textarea class="form-control" name="SectorDesc" rows="5"></textarea>
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
			
			mysql_query("DELETE FROM typology WHERE id = ".$id) or die();
			mysql_query("DELETE FROM type_refer WHERE type_id = ".$id) or die();
			echo '<meta http-equiv="refresh" content="0; url=type" />';
			
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
