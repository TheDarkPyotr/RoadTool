<?php
$is_maintenance = 1;

include("../core.php");

if(isset($user->row) && isset($_SESSION['adm_key']))
	header("Location: home");

if(isset($_POST['key'])){
	$email = isset($_POST['email']) ? $input->EscapeString($_POST['email']) : '';
	$pass = isset($_POST['password']) ? $input->EscapeString($_POST['password']) : '';
	$key = isset($_POST['key']) ? $input->EscapeString($_POST['key']) : '';
	
	
	if($user->login($email, $input->HoloHash($pass), "off", false, 'true') && $key == PANEL_KEY){
		
		$input->logSession($email, "Accesso Area Riservata", "Accesso eseguito", date('d/m/Y H:i:s'), "Accesso Area Riservata", 0, 0);
		
		if($user->login_error == ''){
			$_SESSION['adm_key'] = $key;
			
			header("location: ".PATH."admin");
		}
	}
}

if(isset($_POST['emailAddress'])){
		$forgot_email = $input->EscapeString($_POST['emailAddress']);
		$input->SendMail($forgot_email, 0, true);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Comune di Alcamo - Servizio Segnalazioni | Area Riservata</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<style>
.admin-logo {
	
	height: 60px;
	margin-top: 50px;
}
</style>


	
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
			
			<div class="admin-logo"><center><img src="./dist/img/logo-city.png"></center></div>
		
                <div class="login-panel panel panel-default">
				
                    <div class="panel-heading">
                        <h3 class="panel-title">Area Riservata<b> - <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Recupera Password</button></b></h3>
                    </div>
                    <div class="panel-body">
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Recupera Password</h4>
                                        </div>
                                        <div class="modal-body">
										<form id="change-password" method="post" action="">
									  <input type="hidden" name="emailAddress" value="1" />
										
										Inserisci l'indirizzo email dell'account da recuperare. Se l'email inserita è associata ad un account, verrà spedita un email con le istruzioni per il recupero delle credenziali di accesso.
									  		
										<label>Indirizzo email di ripristino:</label>
                                            <input class="form-control" name="emailAddress" type="text" id="change-password-email-address" maxlength="48">
					
                                    

										 </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annulla</button>
                                            <button type="submit" id="emailAddress" class="btn btn-primary">Recupera</button>
                                        </div>
										</form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
				
						<p><?php echo $user->login_error; ?></p>
						
                     
                            <fieldset>
							<form method="post" action="">
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email"   autofocus> <? // ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Codice amministrazione" name="key" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="commit" class="btn btn-lg btn-info btn-block" value="Accedi">
								
								
								</form>
                            </fieldset>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	

	
    <!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

</body>