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
		var sei_sicuro = confirm('Sei sicuro di voler rimuovere questo settore?');
		if (sei_sicuro)
		{
			location.href = '?delsector='+id;
		}
	}
	</script>

	 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestione amministratori di sistema  <a type="button" href="?add" class="btn btn-info">Aggiungi</a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Elenco amministratori
                        </div>
                        <!-- /.panel-heading -->
						<?php if(!isset($_GET['edit']) && !isset($_GET['add']) && !isset($_GET['delete'])){ ?>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                       <th>ID</th> 
									   <th>Nominativo</th> 
									   <th>Email</th> 
									   <th>Livello autorizzazione</th> 
									   <th>Operazioni</th>
									
						
                                    </tr>
                                </thead>
                                <tbody>
									<?php
				$input->logSession($user->row['mail'], "Visualizza", "Visualizzazione elenco generale segnalazioni", date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);
				$sql = mysql_query("SELECT * FROM users WHERE rank BETWEEN 5 AND 6 ORDER BY id");
				
				while($row = mysql_fetch_assoc($sql)){
				
				if($row['rank'] == 6) $desc = "Dirigente";
					else $desc = "Dipendente";

				echo '
				<tr class="'.$messtype.'">
   					<td><a href="?edit='.$row['id'].'">'.$row['id'].'</a></td> 
    				<td><a href="?edit='.$row['id'].'">'.$row['surname'].' '.$row['name'].'</a></td> 
    				<td>'.$row['mail'].'</td>
					<td>'.$row['rank'].' - '.$desc.'</td>
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
		
		$adm_surname = isset($_POST['AdminSurname']) ? $_POST['AdminSurname'] : '';
        $adm_name = isset($_POST['AdminName']) ? $_POST['AdminName'] : '';
        $adm_email = isset($_POST['AdminEmail']) ? $_POST['AdminEmail'] : '';
        $adm_level = isset($_POST['AdminLevel']) ? $_POST['AdminLevel'] : '';
        $adm_password = isset($_POST['AdminPassword']) ? $_POST['AdminPassword'] : '';
		
		if($adm_surname == '' || $adm_name == '' || $adm_email == '' || $adm_level == '') $error = 'Controlla tutti i dati inseriti!';
		else{
			mysql_query("UPDATE users SET surname = '".$adm_surname."', name = '".$adm_name."', mail = '".$adm_email."', rank = '".$adm_level."'  WHERE id = ".$id); //,password = '".$input->HoloHash($adm_password)."'
            mysql_query("UPDATE accounts SET email = '".$adm_email."', password = '".$adm_password."' WHERE id = ".$id);
			//$input->logSession($user->row['mail'], "Modifica", "Modifica segnalazione ID ".$id, date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);
			//$input->systemNotify($id,'1'); 
		
		//  mysql_query("INSERT INTO report_log (report_type = '".$report_type."',status = '".$report_status."', hide = '".$report_hide."',priority = '".$report_priority."',answer = '".$report_answer."',report_setdate = '".date('d/m/Y H:i:s')."' WHERE id = ".$id);
			$ok = "Modifica effettuata";
		}
	}
	
	$sql = mysql_query("SELECT * FROM users WHERE id = ".$id) or die();
	
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
                                                <label for="disabledSelect">Cognome</label>
                                                <input class="form-control" id="disabledInput" name="AdminSurname" type="text" value="<?php echo $row['surname']; ?>">
                                            </div>
                                    
                                    	  <div class="form-group">
                                                <label for="disabledSelect">Nome</label>
                                                <input class="form-control" id="disabledInput" name="AdminName" type="text" value="<?php echo $row['name']; ?>">
                                            </div>
											
				
									
                                       
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
																
                                        <div class="form-group">
                                                <label for="disabledSelect">Livello autorizzazione</label>
                                                <input class="form-control" id="disabledInput" name="AdminLevel" type="text" value="<?php echo $row['rank']; ?>">
                                            </div>
                                    
											<div class="form-group">
                                                <label for="disabledSelect">Indirizzo email</label>
                                                <input class="form-control" id="disabledInput" name="AdminEmail" type="text" value="<?php echo $row['mail']; ?>">
                                            </div>
											
												<div class="form-group">
                                                <label for="disabledSelect">Reimposta password</label></br>
												<input type="button" class="btn btn-primary" value="Reimposta password">
                                             </div>
											 
											                         <div class="list-group">
																		<label for="disabledSelect">Settori di competenza</label></br>
<?php
				$sql = mysql_query("SELECT * FROM sector_refer WHERE user_id = ".$id);
				
				
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
				
        $adm_surname = isset($_POST['AdminSurname']) ? $_POST['AdminSurname'] : '';
        $adm_name = isset($_POST['AdminName']) ? $_POST['AdminName'] : '';
        $adm_email = isset($_POST['AdminEmail']) ? $_POST['AdminEmail'] : '';
        $adm_level = isset($_POST['AdminLevel']) ? $_POST['AdminLevel'] : '';
        $adm_password = isset($_POST['AdminPassword']) ? $_POST['AdminPassword'] : '';
		
		if($adm_surname == '' || $adm_name == '' || $adm_email == '' || $adm_level == '' || $adm_password == ''){
            
            $error = 'Controlla tutti i dati inseriti!';
		
		}else{
			
             
		mysql_query("INSERT INTO users (name, surname, password, mail, rank) VALUES ('".$adm_name."', '".$adm_surname."', '".$input->HoloHash($adm_password)."', '".$adm_email."', '".$adm_level."'");
	
		$user_id = mysql_insert_id(); 
		$id = $id == '_id' ? $user_id.'_id' : $id;
		

			mysql_query("INSERT INTO accounts (id, provider, email, password, current) VALUES ('".$id."', 'Admin', '".$adm_email."', '".$input->HoloHash($adm_password)."', '".$user_id."')");
            
							
			$ok = "Amministratore creato correttamente!";
				
		}
    }

		?>

			
   <div class="panel-body">	
			<a href="./administrator" type="button" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-triangle-left"></i>
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
                                                <label for="disabledSelect">Cognome</label>
                                                <input class="form-control" id="disabledInput" name="AdminSurname" type="text" value="">
                                            </div>
                                    
                                    	  <div class="form-group">
                                                <label for="disabledSelect">Nome</label>
                                                <input class="form-control" id="disabledInput" name="AdminName" type="text" value="">
                                            </div>
											
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                            <div class="form-group">
                                                <label for="disabledSelect">Livello autorizzazione</label>
                                                <input class="form-control" id="disabledInput" name="AdminLevel" type="text" value="">
                                            </div>
                                    
											<div class="form-group">
                                                <label for="disabledSelect">Indirizzo email</label>
                                                <input class="form-control" id="disabledInput" name="AdminEmail" type="text" value="">
                                            </div>
                                    
                                    <div class="form-group">
                                                <label for="disabledSelect">Password</label>
                                                <input class="form-control" id="disabledInput" name="AdminPassword" type="password" value="">
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
