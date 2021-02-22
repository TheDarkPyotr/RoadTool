<?php
$is_maintenance = 1;
include("../core.php");

$setgui = 2;
$page['name'] = "Elenco FAQ admin";
$page['rank'] = 7;

include("header.php");
?>	
<script>
		function deleleItem(id){
		var sei_sicuro = confirm('Sei sicuro di voler rimuovere questa domanda?');
		if (sei_sicuro)
		{
			location.href = '?delsector='+id;
		}
	}
	</script>

	 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestione FAQ admin  <a type="button" href="?add" class="btn btn-info">Aggiungi</a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Elenco FAQ
                        </div>
                        <!-- /.panel-heading -->
						<?php if(!isset($_GET['edit']) && !isset($_GET['add']) && !isset($_GET['delete'])){ ?>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                       <th>ID</th> 
									   <th>Domanda</th>
									   <th>Risposta</th>
									   <th>Elimina</th>
									
						
                                    </tr>
                                </thead>
                                <tbody>
									<?php
				$input->logSession($user->row['mail'], "Visualizza", "Visualizzazione elenco generale segnalazioni", date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);
				$sql = mysql_query("SELECT * FROM faq ORDER BY id DESC");
				
				while($row = mysql_fetch_assoc($sql)){
		

				echo '
				<tr class="'.$messtype.'">
   					<td><a href="?edit='.$row['id'].'">'.$row['id'].'</a></td> 
    				<td><a href="?edit='.$row['id'].'">'.$row['question'].'</a></td>
    				<td>'.$input->cutString($row['answer'],55).'</td>
					<td><center>
						<button type="button" onclick="javascript:deleleItem('.$row['id'].')" style="position: center" class="btn btn-danger btn-circle btn-lg"><i class="fa fa-trash-o"></i>
                            </button></center></td>
			
				
				</tr>';
				}
			?>
                                    
                                    
                                </tbody>
                            </table>
							
							
							 <!-- /.table-responsive -->
                            <div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
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
					
								mysql_query("INSERT INTO sector_refer (user_id, sector_id, rank_id) VALUES ('".$selected."','".$id."','6')");
						}
				}
						
		if(!empty($_POST['type_list'])) {

				$checked_count = count($_POST['type_list']);
				foreach($_POST['type_list'] as $selected) {
					
								mysql_query("INSERT INTO type_refer (type_id, sector_id) VALUES ('".$selected."','".$id."')");
						}
				}
			

		$sector_content = isset($_POST['SectorName']) ? $_POST['SectorName'] : '';
		
		if($sector_content == '') $error = 'La denominazione non può essere vuota!';
		else{
			mysql_query("UPDATE sector SET content = '".$sector_content."', date = '".date('d/m/Y H:i:s')."'  WHERE id = ".$id);
			//$input->logSession($user->row['mail'], "Modifica", "Modifica segnalazione ID ".$id, date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);
			//$input->systemNotify($id,'1'); 
		
		//  mysql_query("INSERT INTO report_log (report_type = '".$report_type."',status = '".$report_status."', hide = '".$report_hide."',priority = '".$report_priority."',answer = '".$report_answer."',report_setdate = '".date('d/m/Y H:i:s')."' WHERE id = ".$id);
			$ok = "Modifica effettuata";
		}
	}
	
	$sql = mysql_query("SELECT * FROM sector WHERE id = ".$id) or die();
	
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
											
											<div class="form-group">
                                            <label>Account riferimento</label>
											
											                                        						<?php
				$sql = mysql_query("SELECT * FROM users WHERE rank = '6' ORDER BY id DESC");
				
				
				while($row = mysql_fetch_assoc($sql)){	
				
				
				$sqlm = mysql_query("SELECT * FROM sector_refer WHERE user_id = ".$row['id']." AND sector_id = ".$id) or die();
	
					if(mysql_num_rows($sqlm) > 0) $check = "checked disabled";
						else $check = "";
		
		
	
		
					
						
				?><div class="checkbox">
                                                <label>
												
                                                    <input type="checkbox" name="refer_list[]" value="<?php echo $row['id'] ?>" <?php echo $check ?>><?php echo $row['surname'].' '.$row['name'] ?>
                                                </label>
												<?php if($check != ""){?><button onclick="javascript:del(<?php echo $row['id'] ?>)" type="button" class="btn btn-danger btn-xs">X</button><?php } ?>
							
                                            </div>
											
				
				<?php 
				}
				
			?>
                            
                                        </div>	
									
                                       
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
																	

								<div class="form-group">
                                            <label>Tipologia di riferimento</label>
 <?php
				$sql = mysql_query("SELECT * FROM typology ORDER BY id ASC");
				while($row = mysql_fetch_assoc($sql)){		

					$sqlc = mysql_query("SELECT * FROM type_refer WHERE type_id = ".$row['id']);
					
					$sql_dtype = mysql_query("SELECT * FROM type_refer WHERE type_id = ".$row['id']." AND sector_id = ".$id);
	
					if(mysql_num_rows($sqlc) > 0 || mysql_num_rows($sql_dtype) > 0) $check = "checked disabled";
						else $check = "";
					
						if(mysql_num_rows($sql_dtype) > 0) $del = "delete";
							else $del = "";
						
					
						

						
				 ?> <div class="checkbox">
                                                <label>
												
                                                    <input type="checkbox" name="type_list[]" value="<?php echo $row['id']; ?>" <?php echo $check; ?>><?php echo $row['content']; ?>
                                                </label>
												<?php if($del == "delete"){?><button onclick="javascript:delt(<?php echo $row['id'] ?>)" type="button" class="btn btn-danger btn-xs">X</button><?php } ?>
                                           
												 </div>
				<?php	}  ?>
                                        </div>
										 			
									
											
										
                        <!-- /.panel-body -->
                    </div>
					</div>
					<input type="submit" name="edit" value="Aggiorna" class="btn btn-primary btn-lg btn-block" />
					<a href="./sector" value="Annulla" class="btn btn-danger btn-lg btn-block">Annulla</a></br>
			</form>
                                    
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
								
                            </div>
							
							
                            <!-- /.row (nested) -->
                        </div>
	<?php 	} } elseif(isset($_GET['add'])){
	
	if(isset($_POST['add'])){
				
		$title   = isset($_POST['SectorName']) ? $_POST['SectorName'] : '';
		$desc = isset($_POST['SectorDesc']) ? $_POST['SectorDesc'] : '';
		
		if($title == ''){
			$error = 'Tutti i campi contrassegnati con <b>*</b> sono obbligatori!';
		
		}else{
			
			mysql_query("INSERT INTO sector (content, date, description) VALUES ('".$title."','".date('d/m/Y H:i')."','".$desc."')");
			
			$sql = mysql_query("SELECT * FROM sector WHERE content = ".$title." AND description = ".$desc."") or die();
			
					
					$row = mysql_fetch_assoc($sql);
			
			if(!empty($_POST['refer_list'])) {

				$checked_count = count($_POST['refer_list']);
				foreach($_POST['refer_list'] as $selected) {
					
								mysql_query("INSERT INTO sector_refer (user_id, sector_id, rank_id) VALUES ('".$selected."','".$row['id']."', '6')");
						}
				}
						
		if(!empty($_POST['type_list'])) {

				$checked_count = count($_POST['type_list']);
				foreach($_POST['type_list'] as $selected) {
					
								mysql_query("INSERT INTO type_refer (type_id, sector_id) VALUES ('".$selected."','".$row['id']."')");
						}
				} 
				
				
			$ok = "Settore inserito correttamente!";
				
		}
	}

		?>

			
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
                                                <input class="form-control" id="disabledInput" type="text" placeholder="ID autogenerato" disabled>
                                            </div>
											
									  <div class="form-group">
                                                <label for="disabledSelect">Denominazione</label>
                                                <input class="form-control" id="disabledInput" name="SectorName" type="text" value="">
                                            </div>
											
									 <div class="form-group">
                                            <label>Descrizione</label>
                                            <textarea class="form-control" name="SectorDesc" rows="5"></textarea>
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
																	
														<div class="form-group">
                                            <label>Account riferimento</label>
											
<?php				$sql = mysql_query("SELECT * FROM users WHERE rank = '6' ORDER BY id DESC");
				
				while($row = mysql_fetch_assoc($sql)){	?>
				
							<div class="checkbox">
                                                <label>
												
                                                    <input type="checkbox" name="refer_list[]" value="<?php echo $row['id'] ?>"><?php echo $row['surname'].' '.$row['name'] ?>
                                                </label>
											
                                            </div>
											
				
				<?php 
				}
				
			?>
                            
                                        </div>	
										

																<div class="form-group">
                                            <label>Tipologia di riferimento</label>
 <?php
				$sql = mysql_query("SELECT * FROM typology ORDER BY id ASC");
				while($row = mysql_fetch_assoc($sql)){		

		
						
				 ?> <div class="checkbox">
                                                <label>
												
                                                    <input type="checkbox" name="type_list[]" value="<?php echo $row['id']; ?>"><?php echo $row['content']; ?>
                                                </label>
											
												 </div>
				<?php	}  ?>
                                        </div>
										
                        <!-- /.panel-body -->
                    </div>
					</div>
					<input type="submit" name="add" value="Aggiungi" class="btn btn-success btn-lg btn-block" />
					<a href="./sector" value="Annulla" class="btn btn-danger btn-lg btn-block">Annulla</a></br>
			</form>
                                    
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
								
                            </div>
							
							
                            <!-- /.row (nested) -->
                        </div>
			

		<?php
			
	
		
	
		}else if(isset($_GET['delete'])){
			
				$uid = isset($_GET['delete']) ? $input->EscapeString($_GET['delete']) : '';
				$id = isset($_GET['sector']) ? $input->EscapeString($_GET['sector']) : '';
	
			//$uid = $input->EscapeString($_GET['delete']);
			//$id = $input->EscapeString($_GET['sector']);
			
			mysql_query("DELETE FROM sector_refer WHERE user_id = ".$uid."  AND sector_id = ".$id) or die();
			echo '<meta http-equiv="refresh" content="0; url=sector?edit='.$id.'" />';
			
		} 

		if(isset($_GET['type'])){
			
				$type = isset($_GET['type']) ? $input->EscapeString($_GET['type']) : '';
				$id = isset($_GET['sector']) ? $input->EscapeString($_GET['sector']) : '';
	
			//$uid = $input->EscapeString($_GET['delete']);
			//$id = $input->EscapeString($_GET['sector']);
			
			mysql_query("DELETE FROM type_refer WHERE type_id = ".$type."  AND sector_id = ".$id) or die();
			echo '<meta http-equiv="refresh" content="0; url=sector?edit='.$id.'" />';
			
		}
		
		if(isset($_GET['delsector'])){
			
				$id = isset($_GET['delsector']) ? $input->EscapeString($_GET['delsector']) : '';

	
			//$uid = $input->EscapeString($_GET['delete']);
			//$id = $input->EscapeString($_GET['sector']);
			
			mysql_query("DELETE FROM sector WHERE id = ".$id) or die();
			mysql_query("DELETE FROM sector_refer WHERE sector_id = ".$id) or die();
			mysql_query("DELETE FROM type_refer WHERE sector_id = ".$id) or die();
			echo '<meta http-equiv="refresh" content="0; url=sector" />';
			
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
