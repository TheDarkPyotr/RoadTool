<?php
$is_maintenance = 1;
include("../core.php");

$setgui = 2;
$page['name'] = "Elenco Segnalazioni Approvate";
$page['rank'] = 6;

include("header.php");
?>	


	 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Segnalazioni</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Elenco segnalazioni approvate
                        </div>
                        <!-- /.panel-heading -->
						<?php if(!isset($_GET['edit']) && !isset($_GET['add']) && !isset($_GET['delete'])){ ?>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                       <th>ID</th> 
									   <th>Titolo</th> 
									   <th>Tipologia</th> 
									   <th>Indirizzo</th> 
									   <th>Data</th>
									   <th>Segnalato da</th>
								       <th>Status </th>
									   <th>Priorità</th>
								       <th>Visibile</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
				$input->logSession($user->row['mail'], "Visualizza", "Visualizzazione elenco segnalazioni approvate", date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);
				$sql = mysql_query("SELECT * FROM city_report WHERE status = 'APPROVATA' ORDER BY id DESC");
				$priorityset = "Non definito";
				$hideset = "Non definito";
				while($row = mysql_fetch_assoc($sql)){
					if($row['priority'] == 1) $priorityset = "Si";
						else $priorityset = "No";
						
					if($row['hide'] == 1) $hideset = "No";
						else $hideset = "Si";
						
					$messtype = "default";
					switch($row['status']){
					
					case "ATTESA":
						$messtype = "warning"; // giallo
					break;
					case "APPROVATA":
						$messtype = "info"; //verde
					break;
					case "RIGETTATA":
						$messtype = "danger"; //rosso
					break;
					case "RISOLTA":
						$messtype = "success"; //blu
					break;
					/*case "IN ATTESA":
						$messtype = "danger"; //rosso
					break;*/
				}
				echo '
				<tr class="'.$messtype.'">
   					<td><a href="?edit='.$row['id'].'">'.$row['id'].'</a></td> 
    				<td><a href="?edit='.$row['id'].'">'.$row['report_title'].'</a></td> 
    				<td>'.$row['report_type'].'</td> 
					<td>'.$row['report_address'].'</td> 
					<td>'.$row['report_insertdate'].'</td> 
					<td>'.$row['surname'].' '.$row['name'].'</td> 
					<td>'.$row['status'].'</td> 
					<td>'.$priorityset.'</td> 
					<td>'.$hideset.'</td> 					
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kitchen Sink
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Table
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Striped Rows
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bordered Table
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Hover Rows
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Context Classes
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="success">
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr class="info">
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr class="warning">
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        <tr class="danger">
                                            <td>4</td>
                                            <td>John</td>
                                            <td>Smith</td>
                                            <td>@jsmith</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
					
<?php } elseif(isset($_GET['edit'])){
								
	$id = isset($_GET['edit']) ? $input->EscapeString($_GET['edit']) : '';
	
	if(isset($_POST['edit'])){
		$report_type = isset($_POST['ReportType']) ? $_POST['ReportType'] : '';
		$report_status = isset($_POST['ReportStatus']) ? $_POST['ReportStatus'] : '';
		$report_hide = isset($_POST['ReportHide']) ? 1 : 0;
		$report_priority = isset($_POST['ReportPriority']) ? 1 : 0;
		$report_answer  = isset($_POST['ReportAnswer']) ? $_POST['ReportAnswer'] : '';

		
		if($report_status == 3 && $report_answer == '' || $report_status == 4 && $report_answer == '')
			$error = 'L\'inserimento dello stato di <b>RISOLUZIONE</b> o <b>RIGETTO</b> necessita di una <b>motivazione</b> da parte dell\'Amministrazione!';
		
		else{
			
			mysql_query("UPDATE city_report SET report_type = '".$report_type."',status = '".$report_status."', hide = '".$report_hide."',priority = '".$report_priority."',answer = '".$report_answer."',report_setdate = '".date('d/m/Y H:i:s')."' WHERE id = ".$id);
			$input->logSession($user->row['mail'], "Modifica", "Modifica segnalazione approvata ID ".$id, date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);
			$ok = "La segnalazione è stata correttamente aggiornata!";
		}
	}
	
	$sql = mysql_query("SELECT * FROM city_report WHERE status = 'APPROVATA' AND id = ".$id) or die();
	
	if(mysql_num_rows($sql) > 0){
		$row = mysql_fetch_assoc($sql);
	?>
		<script>
		function addtext(){
			var text = $("#textadding").html();
			var check = $("#btn_enable").attr('checked');
			
			if(check == true)
				text = '<input name="btn_title" type="text" placeholder="Titolo buttone"><input name="btn_link" type="text" placeholder="Link buttone">';
			else
				text = '';
				
			$("#textadding").html(text);
		}
		</script>
		
		          <div class="panel-body">	
			<a href="./all" type="button" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-triangle-left"></i>
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
				  <div class="panel panel-warning">
                        <div class="panel-heading">
                            Sensibilità dei dati
                        </div>
                        <div class="panel-body">
                            <p>I dati contenuti in questa pagina sono altamente sensibili e la visualizzazione da parte di utenti/soggetti non autorizzati comporta una violazione delle disposizioni di legge applicate agli utilizzatori di tale servizio.</p>							
						</div>
						<div class="panel-footer">
                            <a href="./all" type="button" class="btn btn-warning btn-circle"><i class="fa fa-eye"></i>
                              </a>  Leggi l'informativa sulla Privacy e le indicazioni per il Trattamento dei Dati Personali
                        </div>
                    </div>
							<div class="panel panel-info">
                        <div class="panel-heading">
                            Cronologia delle operazioni
                        </div>
                        <div class="panel-body">
                            <p>Al fine di garantire i principi di trasparenza e tracciabilità ogni modifica apportata verrà salvata, identificando per ogni modifica avvenuta il rispettivo operatore. L'elenco di tali operazioni
								è consultabile nella sezione "Cronologia operazioni".</p>
                        </div>
                    </div>
					
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Blocco modifica dati
                        </div>
                        <div class="panel-body">
                            <p>Alcuni campi non sono modificabili al fine di garantire una congruenza dei dati tra segnalatore e amministratore. Tale impostazione può essere rimossa unicamente contattando lo sviluppatore. </p>
                        </div>
                    </div>
                            <div class="row">
							<form action="" method="post">
                                <div class="col-lg-6">
								 <h1>Dettagli Segnalazione</h1>
                                    
									
									 <div class="form-group">
                                                <label for="disabledSelect">ID</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['id']; ?>" disabled>
                                            </div>
											
									  <div class="form-group">
                                                <label for="disabledSelect">Titolo</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['report_title']; ?>" disabled>
                                            </div>
											
											<div class="form-group">
											 <label>Tipologia</label>
                                            <select class="form-control" name="ReportType">
        <?php if($row['report_type'] == 'URBANISTICA') { ?> <option value="1" selected>Urbanistica</option> <?php } else { ?><option value="1">Urbanistica</option><?php } ?>
        <?php if($row['report_type'] == 'STRADALE') { ?> <option value="2" selected>Stradale</option> <?php } else { ?><option value="2">Stradale</option><?php } ?>
		<?php if($row['report_type'] == 'PEDONALE') { ?> <option value="3" selected>Pedonale</option> <?php } else { ?><option value="3">Pedonale</option><?php } ?>
		<?php if($row['report_type'] == 'SANITARIA') { ?> <option value="4" selected>Sanitaria</option> <?php } else { ?><option value="4">Sanitaria</option><?php } ?>
		<?php if($row['report_type'] == 'INSEGNISTICA') { ?> <option value="5" selected>Insegnistica</option> <?php } else { ?><option value="5">Insegnistica</option><?php } ?>
                                            </select>
										</div>
											
											<div class="form-group">
                                            <label>Descrizione</label>
                                            <textarea class="form-control" rows="3" disabled><?php echo $row['report_desc']; ?></textarea>
                                        </div>
										
										  <div class="form-group">
                                                <label for="disabledSelect">Data inoltro</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['report_insertdate']; ?>" disabled>
                                            </div>
											
										<div class="form-group">
                                                <label for="disabledSelect">Indirizzo segnalazione</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['report_address']; ?>" disabled>
                                            </div>
										
												<div class="form-group">
											 <label>Stato</label>
                                            <select class="form-control" name="ReportStatus">
        <?php if($row['status'] == 'ATTESA') { ?> <option value="1" selected>In attesa</option> <?php } else { ?><option value="1">In attesa</option><?php } ?>
        <?php if($row['status'] == 'APPROVATA') { ?> <option value="2" selected>Approvata</option> <?php } else { ?><option value="2">Approvata</option><?php } ?>
		<?php if($row['status'] == 'RIGETTATA') { ?> <option value="3" selected>Rigettata</option> <?php } else { ?><option value="3">Rigettata</option><?php } ?>
		<?php if($row['status'] == 'RISOLTA') { ?> <option value="4" selected>Risolta</option> <?php } else { ?><option value="4">Risolta</option><?php } ?>

                                            </select>
										</div>
										
										  <div class="form-group">
                                                <label for="disabledSelect">Data ultima modifica</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['report_setdate']; ?>" disabled>
                                            </div>
											
											<div class="form-group">
											<label>Impostazioni segnalazioni</label>
                                            <div class="checkbox">
                                                <label>
												<?php if($row['priority'] == 0) { ?> <input name="ReportPriority" type="checkbox" value="0">Prioritaria</option> <?php } else { ?><input name="ReportPriority" type="checkbox" value="1" checked>Prioritaria<?php } ?>
                                                </label>
                                            </div>
											</div>
										
											<div class="form-group">
                                            <label>Risposta dell'amministrazione alla segnalazione</label>
                                            <textarea class="form-control" rows="7" name="ReportAnswer"><?php echo $row['answer']; ?></textarea>
                                        </div>
										
                                       
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
								<h1>Dettagli Segnalatore</h1>
										 
										 	<div class="form-group">
                                                <label for="disabledSelect">Segnalato da</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['surname'],' ',$row['name']; ?>" disabled>
                                            </div>
											
											<div class="form-group">
                                                <label for="disabledSelect">Indirizzo residenza</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['home_address']; ?>" disabled>
                                            </div>
											
											<div class="form-group">
                                                <label for="disabledSelect">Indirizzo email</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['email']; ?>" disabled>
                                            </div>
											
											<div class="form-group">
                                                <label for="disabledSelect">Cellulare/Telefono</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['phone']; ?>" disabled>
                                            </div>
											
											   <div class="checkbox">
                                                <label>
										<?php if($row['visibility'] == 1) { ?><input type="checkbox" checked disabled>Nominativo Visibile  <?php } else { ?><input type="checkbox" disabled>Nominativo Visibile <?php } ?>
                                                </label>
                                            </div>
											
											
											<div class="panel panel-danger">
													<div class="panel-heading">
														Contenuti Inopportuni
													</div>
													<div class="panel-body">
														<p>Una richiesta inopportuna, offensiva, trattante contenuti non inerenti allo scopo del servizio è oscurabile dall'elenco sia pubblico che privato delle segnalazioni. I meccanismi di sicurezza tuttavia impediscono una cancellazione totale della richiesta che permarrà in memoria.</p>
													
											<div class="checkbox">
                                                <label>
												<?php if($row['hide'] == 0) { ?> <input name="ReportHide" type="checkbox" value="0">Oscura</option> <?php } else { ?><input name="ReportHide" type="checkbox" value="1" checked>Oscura<?php } ?>
                                                </label>
                                            </div>
													
													</div>
													
										</div>
					
											
											            <div class="panel panel-default">
                        <div class="panel-heading">
                            Descrizione status segnalazione
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#home-pills" data-toggle="tab">In attesa</a>
                                </li>
                                <li><a href="#profile-pills" data-toggle="tab">Approvata</a>
                                </li>
                                <li><a href="#messages-pills" data-toggle="tab">Rigettata</a>
                                </li>
                                <li><a href="#settings-pills" data-toggle="tab">Risolta</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                    <h4>Status: In attesa </h4>
                                    <p><?php echo $status_set['ATTESA']; ?>:
									</br><span class="label label-warning pull-left" data-effect="pop">In attesa</span></p>
                                </div>
                                <div class="tab-pane fade" id="profile-pills">
                                    <h4>Status: Approvata</h4>
                                    <p><?php echo $status_set['APPROVATA']; ?>
									</br><span class="label label-info pull-left" data-effect="pop">Approvata</span></p>
                                </div>
                                <div class="tab-pane fade" id="messages-pills">
                                    <h4>Status: Rigettata</h4>
                                    <p><?php echo $status_set['RIGETTATA']; ?>
									</br><span class="label label-danger pull-left" data-effect="pop">Rigettata</span></p>
                                </div>
                                <div class="tab-pane fade" id="settings-pills">
                                    <h4>Status: Risolta</h4>
                                    <p><?php echo $status_set['RISOLTA']; ?>
									</br><span class="label label-success pull-left" data-effect="pop">Risolta</span></p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
					<input type="submit" name="edit" value="Aggiorna" class="btn btn-primary btn-lg btn-block" />
					<a href="./all" value="Annulla" class="btn btn-danger btn-lg btn-block">Annulla</a></br>
			</form>
                                    
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
								</br>
								<center><iframe width="98%" height="500px" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=Alcamo&key=AIzaSyAQXt8aeCYIFpKwqa8qwcX17jLOBXN0Zqc" allowfullscreen></iframe>
								</center>
                            </div>
							
							
                            <!-- /.row (nested) -->
                        </div>
	<?php } } ?>  
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
