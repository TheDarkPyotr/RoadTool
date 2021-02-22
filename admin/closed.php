<?php
$is_maintenance = 1;
include("../core.php");

$error = '';
$setgui = 2;
$page['name'] = "Impostazioni Manutenzione";
$page['rank'] = 7;


if(isset($_POST['next'])){
    
	$main = isset($_POST['Closed']) ? $input->EscapeString($_POST['Closed']) : '';
    $message = isset($_POST['ClosedMessage']) ? $input->EscapeString($_POST['ClosedMessage']) : '';
    $rdr_status = isset($_POST['RedirectStatus']) ? $input->EscapeString($_POST['RedirectStatus']) : '';
    $rdr_link = isset($_POST['RedirectLink']) ? $input->EscapeString($_POST['RedirectLink']) : '';
	
	if($rdr_status == '1' && $rdr_link == '') $error = 'Controlla la correttezza dei dati!';
	else{
		mysql_query("UPDATE cms_system SET site_closed = '".$main."', message ='".$message."', redirect_status = '".$rdr_status."', redirect_link = '".$rdr_link."' ");
		$ok = "Stato di manutenzione settato correttamente!";
	}
}

/*											-- GESTIONE F.A.Q.
											-- INGLOBARE CODICE ESTERNO (ES: Poll)
											-- GESTIONE STATO MANUTENZIONE (ON/OFF)
											-- GESTIONE AMMINISTRATORI II LIVELLO
											-- BLOCCO IP 
											-- CRONOLOGIA MODIFICHE ACCOUNT ADMIN II LIVELLO
											-- GESTIONE SOCIAL (ATTIVAZIONE E CODICE)
											-- INVIO MAIL GENERALI (ATTIVAZIONI E CONTENUTI - EMAIL SEGNALATORE)
											-- INVIO MAIL SPECIFICA
											-- CONTROLLO PRODUTTIVITA' AMMINISTRATORE II LIVELLO (OPERAZIONI SEGNALAZIONI)
													- TEMPO ATTIVITA' GIORNALIERA (FINE - INIZIO)
													- TEMPO ATTIVITA' SETTIMANALE (FINE - INIZIO)
													- TEMPO ATTIVITA' MENSILE (FINE - INIZIO)
													- TEMPO ATTIVITA' MEDIA (FINE - INIZIO)
													- TEMPO CONFRONTO MEDIO
											-- ATTUALMENTE ONLINE
											-- GOOGLE ANALYTICS (???)
											-- ESECUZIONE QUERY (? - PROBLEMATICHE DI SICUREZZA - ?)
											
											### V 2.0
											-- VISIONE FILE SEGNALATORE
											-- VISIONE FILE AMMINISTRATORE
											
											
										
											*/
											
include("header.php");


$row = mysql_fetch_assoc(mysql_query("SELECT * FROM cms_system"));
?>	


	 <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Impostazioni manutenzione</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
	<?php echo $error; ?>
							
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Impostazioni stato manutenzione
                        </div>
		          <div class="panel-body">	
					<form action="" method="post">
								 
					<div class="panel panel-danger">
                        <div class="panel-heading">
                            Modalità manutenzione
                        </div>
                        <div class="panel-body">
                            <form action="" method="post">
                            <p>L'attivazione di tale modalità comporta il blocco di nuovi accessi al servizio e il preservare l'utilizzo degli utenti i quali hanno già eseguito l'accesso e/o l'utilizzo del servizio al fine di assicurare congruenza tra dati e operazioni.</p>
                       
										<div class="form-group">
											 <label>Stato Manutenzione</label>
                                            <select class="form-control" name="Closed">
						<?php if($row['site_closed'] == '1') { ?> <option value="1" selected>Attivato</option> <?php } else { ?><option value="1">Attivato</option><?php } ?>
						<?php if($row['site_closed'] == '0') { ?> <option value="0" selected>Disattivato</option> <?php } else { ?><option value="0">Disattivato</option><?php } ?>
                                            </select>
										</div>
						
						
					   </div>
                    </div>
				
                            <div class="row">
							
                                <div class="col-lg-6">
                                    
                                    		 
																			<div class="form-group">
											 <label>Redirect</label>
                                            <select class="form-control" name="RedirectStatus">
                                                
                                            <?php if($row['redirect_status'] == '1') { ?>
                                                <option value="1" selected>Attivo</option> <?php } else { ?>
                                                <option value="1">Attivo</option><?php } ?>
                                                
                                            <?php if($row['redirect_status'] == '0') { ?>
                                                <option value="0" selected>Non attivo</option> <?php } else { ?>
                                                <option value="0">Non attivo</option><?php } ?>
                                            </select>
                                                
										</div>
										
										  <div class="form-group">
                                                <label for="disabledSelect">Link Redirect</label>
                                                <input class="form-control" name="RedirectLink" type="text" value="<?php echo $row['redirect_link']; ?>">
                                            </div>
								 		
									
				
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
										<div class="form-group">
                                            <label>Comunicazioni</label>
                                            <textarea class="form-control" name="ClosedMessage" rows="5"><?php echo $row['message']; ?></textarea>
                                    </div>
								
                                </div>
					

					<input type="submit" name="next" value="Aggiorna" class="btn btn-primary btn-lg btn-block" />
					<a href="./home" value="Annulla" class="btn btn-danger btn-lg btn-block">Annulla</a></br>
			</form>
                                    
                                    </form>
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
