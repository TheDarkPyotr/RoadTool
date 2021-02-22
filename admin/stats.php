<?php
$is_maintenance = 1;
include("../core.php");

$dev = true;
$setgui = 2;
$page['name'] = "Elenco Segnalazioni";
$page['rank'] = 7;


if(isset($_POST['next'])){
	$main = isset($_POST['Closed']) ? $input->EscapeString($_POST['Closed']) : '';
	
	if($main == '')
		$error = 'Scegli se chiudere o aprire l\'hotel';
	else{
		mysql_query("UPDATE cms_system SET site_closed = '".$main."'");
		$ok = "Il sito &egrave; stato ".($main == 1 ? "chiuso" : "aperto")." correttamente!";
	}
}

include("header.php");
?>	


	 <div id="page-wrapper">
	 
	 <?php if($dev && $user->row['rank'] < 7) { ?>
	 
	   <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sezione in sviluppo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
	 
	 <?php } else { ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Board Statistiche  <small> Super amministratore</small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Impostazioni
                        </div>
		          <div class="panel-body">	
			
    
				  <div class="panel panel-danger">
                        <div class="panel-heading">
                            Utilizzo non consentito
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
											
											<?php /*
											-- GESTIONE AMMINISTRATORI II LIVELLO
											-- BLOCCA IP 
											-- CRONOLOGIA MODIFICHE ACCOUNT ADMIN II LIVELLO
											-- GESTIONE SOCIAL (ATTIVAZIONE E CODICE)
											-- INVIO MAIL GENERALI (EMAIL SEGNALATORE)
											-- INVIO MAIL SPECIFICA
											-- CONTROLLO PRODUTTIVITA' AMMINISTRATORE (OPERAZIONI SU SEGNALAZIONI)
											-- ATTUALMENTE ONLINE
											
											
											
											
											*/?>
											
											<div class="form-group">
											 <label>Stato Manutenzione</label>
                                            <select class="form-control" name="Closed">
						<?php if($maintenance == 1) { ?> <option value="1" selected>Attivato</option> <?php } else { ?><option value="1">Attivato</option><?php } ?>
						<?php if($maintenance == 0) { ?> <option value="0" selected>Disattivato</option> <?php } else { ?><option value="0">Disattivato</option><?php } ?>
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
					<input type="submit" name="next" value="Aggiorna" class="btn btn-primary btn-lg btn-block" />
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
 
                    <!-- /.panel -->
                </div>
				
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
	 </div> <?php } ?>
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
