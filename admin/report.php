<?php
$is_maintenance = 1;
include("../core.php");

$error = '';
$setgui = 2;
$page['name'] = "Segnala errore";
$page['rank'] = 7;


if(isset($_POST['next'])){
    
	$message = isset($_POST['Message']) ? $input->EscapeString($_POST['Message']) : '';
   
        mysql_query("INSERT INTO cms_alert (user_id text) VALUES ('".$user->row['id']."', '".$message."'");
        // INVIO EMAIL
		$ok = "Comunicazione correttamente modificata!";
	
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


?>	


	 <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Segnala errore</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
							
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Invio segnalazione d'errore
                        </div>
		          <div class="panel-body">	
					<form action="" method="post">
                            <div class="row">
							
                                <div class="col-lg-6">
								
										<div class="form-group">
                                            <label>Descrizione </label>
                                            <textarea class="form-control" name="Message" rows="5"></textarea>
                                    </div>
								
                                </div>
                                
                                    <div class="col-lg-6">
								
										Le segnalazioni d'errore saranno notificate via email allo sviluppatore e/o al personale competente. E' possibile che vengano richieste ulteriori informazioni tramite email.
								
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
