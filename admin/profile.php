<?php
$is_maintenance = 1;
include("../core.php");

$page['name'] = "Profilo Amministratore";
$page['rank'] = 4;

$setgui = 2;

//## CAMBIO EMAIL
$error1_mail = false;
$error2_mail = false;
$ok_mail = false;

if(isset($_POST['next']) && $_POST['next'] == '1'){
	$mail = isset($_POST['NewEmail']) ? $input->EscapeString($_POST['NewEmail']) : '';
	$password = isset($_POST['currentPassword']) ? $input->EscapeString($_POST['currentPassword']) : '';
	
	if($mail == '' || !$input->ValidMail($mail))
		$error1_mail = true;
	else if($password == '' || $user->account['password'] != $input->HoloHash($password))
		$error2_mail = true;
	
	if($error1_mail == false && $error2_mail == false){
		mysql_query("UPDATE users SET mail = '".$mail."' WHERE id = '".$user->row['account']."'");
		mysql_query("UPDATE accounts SET email = '".$mail."' WHERE id = '".$user->row['account']."'");
		$descr4 = "";
		$title4 = "";
		
		$input->systemNotify("Modifica indirizzo email", "Hai modificato l\'indirizzo email associata al tuo account", "account", date('d/m/Y H:i:s'), "NOT", "NOT NULL", "NOT NULL");
		$user->Refresh($user->row['id']);
		$ok_mail = true;

		
	}
}

//## CAMBIO Password
$resp = null;
$error1_psw = false;
$error2_psw = false;
$error3_psw = false;
$error4_psw = false;
$ok_psw = false;

if(isset($_POST["next_psw"]) && $_POST["next_psw"] == 1){
	$currentpsw = isset($_POST['currentPassword']) ? $input->EscapeString($_POST['currentPassword']) : '';
	$newpsw = isset($_POST['newPassword']) ? $input->EscapeString($_POST['newPassword']) : '';
	$retypepsw = isset($_POST['retypedNewPassword']) ? $input->EscapeString($_POST['retypedNewPassword']) : '';
	$challange = isset($_POST['recaptcha_challenge_field']) ? $input->EscapeString($_POST['recaptcha_challenge_field']) : '';
	$response = isset($_POST['recaptcha_response_field']) ? $input->EscapeString($_POST['recaptcha_response_field']) : '';
	
	$response = isset($_POST['captchaResponse']) ? $_POST['captchaResponse'] : '';
	$captcha = isset($_SESSION['register-captcha-bubble']) ? $_SESSION['register-captcha-bubble'] : '';
	
	if($currentpsw == '' || $input->HoloHash($currentpsw) != $user->account['password']){
		$error1_psw = true;
	}
	else if(!$input->ValidPass($newpsw) || strlen($newpsw) < 6 || strlen($newpsw) > 23){
		$error2_psw = true;
	}
	else if($newpsw == '' || $newpsw == '' || $newpsw != $retypepsw){
		$error3_psw = true;
	}
	else if ($_SESSION['register-captcha-bubble'] != strtolower($response) || empty($captcha)) {
        $error4_psw = true;
    }
	
	if(!$error1_psw && !$error2_psw && !$error3_psw && !$error4_psw){
		mysql_query("UPDATE users SET password = '".$input->HoloHash($newpsw)."' WHERE id = '".$user->row['account']."'");
		mysql_query("UPDATE accounts SET password = '".$input->HoloHash($newpsw)."' WHERE id = '".$user->row['account']."'");
		$user->Refresh($user->row['id']);
		$ok_psw = true;
	}
}


include("header.php");
?>	


	 <div id="page-wrapper">
	 
	 <script>
function refreshCaptcha(){
	var img = document.images['captcha'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
	    
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Impostazioni Account</h1>
					    <?php if($error1_mail == true || $error2_mail == true){ ?>
            
					<?php if(!isset($_POST['email']) || !isset($_POST['currentPassword'])){ ?>
					<div class="alert alert-danger">
                                La compilazione di tutti i campi è obbligatoria.
                            </div>
					<?php } ?>
					<?php if($error1_mail == true){ ?>
					<div class="alert alert-danger">
                                Inserisci un indirizzo email valido.
                            </div>
					<?php } ?>
					<?php if($error2_mail == true){ ?>
					<div class="alert alert-danger">
								Password errata: la password inserita non corrisponde alla Password attuale dell'account.
                            </div>
					<?php } ?>
			
			
			<?php }else if($ok_mail == true){ ?>
			<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Indirizzo email modificato correttamente.
                            </div>
			<?php } ?>
		
             <?php
			 if($error1_psw || $error2_psw || $error3_psw || $error4_psw){
					if($error1_psw)
						echo '<div class="alert alert-danger">La tua password attuale non corrisponde.</div>';
					else if($error2_psw)
						echo '<div class="alert alert-danger">Password non valida. Inserisci una Password valida.</div>';
					else if($error3_psw)
						echo '<div class="alert alert-danger">Le password non corrispondono.</div>';
					else if($error4_psw)
						echo '<div class="alert alert-danger">Questo codice di sicurezza non &egrave; valido, inseriscilo nuovamente.</div>';
				} else if($ok_psw == true){ ?>
						<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Password modificata con successo.
                            </div>
				<?php } ?>
    			
				     <div class="panel panel-default">
                        <div class="panel-heading">
                            Profilo Amministratore
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Profilo</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Email</a>
                                </li>
                                <li><a href="#messages" data-toggle="tab">Password</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4>Home Tab</h4>
									  <div class="form-group">
										 
                                            <label>ID:</label> <?php echo $user->row['id']; ?></br>
											
                                            <label>Nome:</label> <?php echo $user->row['name']; ?></br>
										 
                                            <label>Cognome:</label> <?php echo $user->row['surname']; ?></br>
                                          
                                            <label>E-mail:</label> <?php echo $user->row['mail']; ?></br>
											                                          
                                            <label>Permessi di livello:</label> <?php echo $user->row['rank']; ?></br>
                                         </div>
                                    </div>
                                <div class="tab-pane fade" id="profile">
						 <h1>Impostazioni e-mail</h1>
						 
						 
						
			
	

						<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <form name="change_email_form" action="" method="post" id="new-email-form">
									<input type="hidden" name="next" value="1"/>
                                        <div class="form-group">
                                            <label>Indirizzo e-mail attuale:</label>
                                            <input class="form-control" value="<?php echo $user->row['mail']; ?>" disabled>
                                            <p class="help-block">Email da cambiare</p>
                                        </div>
										 <div class="form-group">
                                            <label>Nuovo indirizzo e-mail:</label>
                                            <input class="form-control" name="NewEmail">
                                            <p class="help-block">Nuovo indirizzo da inserire</p>
                                        </div>
										 <div class="form-group">
                                            <label>Password attuale:</label>
                                            <input class="form-control" name="currentPassword" type="password">
                                            <p class="help-block">Ripeti indirizzo email nuovo</p>
                                        </div>
                                 
                                        <button type="submit" onClick="document.change_email_form.submit();" class="btn btn-primary">Aggiorna</button>
                                        <button type="reset" class="btn btn-danger">Resetta campi</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
								  <div class="panel panel-warning">
                        <div class="panel-heading">
                            Scelta indirizzo email
                        </div>
                        <div class="panel-body">
                            <p>E' necessario selezionare un indirizzo email utilizzato periodicamente poiché verrà utilizzato per l'accesso all'Area Riservata.</p>
                        </div>
                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
						
								</div>
                                <div class="tab-pane fade" id="messages">				
								<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
								   <h1>Impostazioni password</h1>
                                    <form id="change-password" method="post" action="">
									  <input type="hidden" name="next_psw" value="1" />
                                        <div class="form-group">
                                            <label>Password attuale:</label>
                                            <input class="form-control" type="password" name="currentPassword">
                                            <p class="help-block">Password attualmente utilizzata</p>
                                        </div>
										<div class="form-group">
                                            <label>Password da impostare:</label>
                                            <input class="form-control" type="password" name="newPassword">
                                            <p class="help-block">Lunghezza minima richiesta di 6 caratteri.</p>
                                        </div>
										<div class="form-group">
                                            <label>Conferma password da impostare:</label>
                                            <input class="form-control" type="password" name="retypedNewPassword">
                                            <p class="help-block">Conferma la password sopra inserita.</p>
                                        </div>
            
									<label>Digita qui sotto il codice di sicurezza.</label>
								<input class="form-control" type="text" name="captchaResponse" id="recaptcha_response_field" autocomplete="off">
               
						<div id="recaptcha_image"><img id="captcha" src="<?php echo PATH; ?>/captcha/captcha.php?rand=<?php echo rand(); ?>" width="300" height="60"></div>
								<p><a href="javascript:refreshCaptcha();">Prova ad usare altre parole</a></p>
            
                                       
                                        <button type="submit" id="next_psw" class="btn btn-primary">Aggiorna</button>
                                        <button type="reset" class="btn btn-danger">Resetta campi</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                 
								   <div class="panel panel-danger">
                        <div class="panel-heading">
                            Scelta password
                        </div>
                        <div class="panel-body">
                            <p>E' necessario selezionare una password che non sia di una complessità e di una lunghezza non banale.</p>
                        </div>
                    </div>
					
					   <div class="panel panel-warning">
                        <div class="panel-heading">
                            Smarrimento password
                        </div>
                        <div class="panel-body">
                            <p>In caso di smarrimento della password è necessario avviare una procedura di ripristino fornendo tutti i dati necessari all'indentificazione univoca ed al recupero.</p>
                        </div>
                    </div>
                                 
                                  
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
			</div>

                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
					 </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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
