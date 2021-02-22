<?php
session_start();

if(isset($_GET['error'])){
	switch($_GET['error']){
		case 1:
		?>
		Andare su <a href="http://php.net/downloads.php" target="_blank">PHP Downloads</a> e scaricare PHP 5.3. Una volta fatto ci&ograve; rinominate la cartella
		in 'php', estraetela e sostituitela nella cartella dove si trova la vostra versione precedente di php.
		<?php
		exit;
		break;
		
		case 2:
		?>
		Estensione CURL non attiva.<br><br><b>Come fare:</b><br>
		<br>
		XAMPP:<br>
		- dirigetevi nella cartella "xampp\php\php.ini"<br>
		- cercate la stringa ";extension=php_curl.dll" e togliete il ; all'inizio.<br>
		- riavviate Apache.<br><br>
		
		IIS:<br>
		- Aprite IIS.<br>
		- Dirigetevi nel PHP Manager.<br>
		- Cliccate su 'Enable or disable an extensions'.<br>
		- Cercate l'estensione php_curl.dll e abilitatela.<br>
		- Aggiornate la pagina.
		<?php
		exit;
		break;
		
		case 3:
		?>
		Estensione SOCKETS non attiva.<br><br><b>Come fare:</b><br>
		<br>
		XAMPP:<br>
		- dirigetevi nella cartella "xampp\php\php.ini"<br>
		- cercate la stringa ";extension=php_sockets.dll" e togliete il ; all'inizio.<br>
		- riavviate Apache.<br><br>
		
		IIS:<br>
		- Aprite IIS.<br>
		- Dirigetevi nel PHP Manager.<br>
		- Cliccate su 'Enable or disable an extensions'.<br>
		- Cercate l'estensione php_sockets.dll e abilitatela.<br>
		- Aggiornate la pagina.
		<?php
		exit;
		break;
		
		case 4:
		?>
		IIS:
		- Cliccare col tasto destro la cartella "wwwroot" e cliccare su "Propriet&agrave;".
		- Andare su "Sicurezza" e cliccare sul tasto "Modifica...".
		- Selezionare "Users".
		- Schiacciare "Consenti" in "Controllo completo" e cliccare su "Applica".
		<?php
		exit;
		break;
	}
}
function EscapeString($string = ''){
	return stripslashes(trim(htmlspecialchars($string)));
}

if(isset($_GET['step']) && $_GET['step'] == 2){
	if(!isset($_SESSION['INS_MYSQL']))
		header('Location: ?step=1');
} else if(isset($_GET['step']) && $_GET['step'] == 3){
	if(!isset($_SESSION['INS_MYSQL']) || !isset($_SESSION['INS_GRAPH']))
		header('Location: ?step=1');
}

if(isset($_POST['commit'])){
	$host = isset($_POST['host']) ? EscapeString($_POST['host']) : '';
	$name = isset($_POST['username']) ? EscapeString($_POST['username']) : '';
	$pass = isset($_POST['password']) ? EscapeString($_POST['password']) : '';
	$database = isset($_POST['database']) ? EscapeString($_POST['database']) : '';
	
	if($host == '' || $name == '' || $pass == '' || $database == '')
		$error = 'Tutti i campi sono obbligatori!';
	else {
		$_SESSION['INS_MYSQL'] = array(
			'host'     => $host,
			'username' => $name,
			'password' => $pass,
			'database' => $database
		);
		header('Location: ?step=2');
	}
}

if(isset($_POST['commit2'])){
	if(!isset($_SESSION['INS_MYSQL']))
		header('Location: ?step=1');
		
	$mestyle = isset($_POST['mestyle']) ? EscapeString($_POST['mestyle']) : 'new';
	$path = isset($_POST['path']) ? EscapeString($_POST['path']) : '';
	$admcode = isset($_POST['admcode']) ? EscapeString($_POST['admcode']) : '';
	$closing = isset($_POST['closing']) ? EscapeString($_POST['closing']) : 0;
	$cl_start = isset($_POST['cl_start']) ? EscapeString($_POST['cl_start']) : '02';
	$cl_finish = isset($_POST['cl_finish']) ? EscapeString($_POST['cl_finish']) : '08';
	$moneys = isset($_POST['moneys']) ? EscapeString($_POST['moneys']) : 0;
	$money_name = isset($_POST['money_name']) ? EscapeString($_POST['money_name']) : 'Stelle';
	
	if($path == '' || $admcode == '')
		$error = 'Scegli una parola segreta e/o inseriti l\'url del tuo sito!';
	else {
		$srchttp   = substr($path, 0, 7);
		$srchslash = substr($path, strlen($path) - 1);
	
		if($srchslash != '/')
			$path = $path.'/';
		
		if($srchttp != 'http://')
			$path = 'http://'.$path;
			
		$_SESSION['INS_GRAPH'] = array(
			'mestyle'     => $mestyle,
			'path' => $path,
			'closing' => $closing,
			'admcode' => $admcode,
			'cl_start' => $cl_start,
			'cl_finish' => $cl_finish,
			'moneys' => $moneys,
			'money_name' => $money_name
		);
		header('Location: ?step=3');
	}
}

if(isset($_POST['commit3'])){
	if(!isset($_SESSION['INS_MYSQL']) || !isset($_SESSION['INS_GRAPH']))
		header('Location: ?step=1');
		
	$fbappid = isset($_POST['fbappid']) ? EscapeString($_POST['fbappid']) : 0;
	$fbappsec = isset($_POST['fbappsec']) ? EscapeString($_POST['fbappsec']) : 0;
	$twittername = isset($_POST['twittername']) ? EscapeString($_POST['twittername']) : '';
	
	$_SESSION['INS_SOCIAL'] = array(
		'fbappid'     => $fbappid,
		'fbappsec' => $fbappsec,
		'twittername' => $twittername
	);
	
	$config = "<?php
//	****** DATABASE SETTINGS ******
"."$"."sql['hostname'] = '".$_SESSION['INS_MYSQL']['host']."';
"."$"."sql['username'] = '".$_SESSION['INS_MYSQL']['username']."';
"."$"."sql['password'] = '".$_SESSION['INS_MYSQL']['password']."';
"."$"."sql['database'] = '".$_SESSION['INS_MYSQL']['database']."';

define(\"PATH\", \"".$_SESSION['INS_GRAPH']['path']."\"); //Url Hotel (Con slash finale!)
define(\"PANEL_KEY\", \"".$_SESSION['INS_GRAPH']['admcode']."\"); //Codice segreto dell'Amministrazione

//  ****** STILE AREA PERSONALE *********
"."$"."mestyle['type'] = '".$_SESSION['INS_GRAPH']['mestyle']."'; //new = nuovo, old = classico

//  ****** CHIUSURA/APERTURA *********
define(\"CLOSING\", ".($_SESSION['INS_GRAPH']['closing'] == 1 ? "true" : "false")."); //Stato di Chiusura/Apertura

"."$"."closing = array(
	'start'  => '".$_SESSION['INS_GRAPH']['cl_start']."', //Ora di chiusura
	'finish' => '".$_SESSION['INS_GRAPH']['cl_finish']."' //Ora di apertura
);

//  ****** MONETE A PAGAMENTO ********
"."$"."money = array(
	'enabled' => ".$_SESSION['INS_GRAPH']['moneys'].", //Abilitarli? 1 = Si, 0 = No
	'name' => '".$_SESSION['INS_GRAPH']['money_name']."' //Nome della moneta
);

//  ****** APP ID & SECRET FACEBOOK *********
define(\"APP_ID\", \"".$_SESSION['INS_SOCIAL']['fbappid']."\");
define(\"APP_SECRET\", \"".$_SESSION['INS_SOCIAL']['fbappsec']."\");

//  ****** RPX API KEY (FOR GOOGLE) *********
define(\"RPX_API_KEY\", \"32df64f50df1d2493a28f239179008e48445e2be\");

// ******* SITE SETTINGS *********
define(\"TWITTER_NAME\", \"".$_SESSION['INS_SOCIAL']['twittername']."\");

//	****** BADGES ******
"."$"."cimagesurl = \"http://images-eussl.habbo.com/c_images/\";
"."$"."badgesurl = \"album1584/\";

date_default_timezone_set(\"Europe/Rome\"); 
?>";
	chmod("config.php", 0777);
	$temp = fopen("config.php","w");
	
	if (!fwrite($temp, $config)) {
		fclose($temp);
		header("Location: ?step=error");
	} else {
		fclose($temp);
		header("Location: ?step=ok");
	}
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
    <link href="./admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	

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
			
			<div class="admin-logo"><center><img src="./admin/dist/img/logo-city.png"></center></div>
		
                <div class="login-panel panel panel-default">
				
                    <div class="panel-heading">
                        <h3 class="panel-title">Installazione Guidata<b> - <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Elenco Step</button></b></h3>
                    </div>
                    <div class="panel-body">
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Elenco Step</h4>
                                        </div>
                                        <div class="modal-body">
										
									  <input type="hidden" name="emailAddress" value="1" />
										
										<div class="alert alert-danger">
                                L'esecuzione errata o non  consecutiva di alcuni step potrebbe causare l'inutilizzo del sistema.
                            </div>
							
										
										<dl>
                                <dt>Step 1 - PHPMyAdmin</dt>
                                <dd>Login e creazione account</dd>
								<dd>Creazione e import database</dd></br>
								
                                <dt>Step 2 - MySQL</dt>
                                <dd>Configurazione dati di accesso</dd></br>
								
								<dt>Step 3 - Configurazione Sistema</dt>
                                <dd>Configurazione sistema di sicurezza</dd>
								<dd>Configurazione impostazioni generali</dd></br>
								
								<dt>Step 4 - Gestione</dt>
                                <dd>Indicazioni sull'utilizzo</dd>
								<dd>Documentazione generica</dd>
								<dd>Legislazione</dd></br>
                            </dl>
					

										 </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annulla</button>
                                        </div>
									
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
				<?php if(!isset($_GET['step']) || empty($_GET['step'])){ ?>
						<h3>Requisiti di Configurazione</h3>
						
                     
                            <fieldset>
							<form method="post" action="?step=1" autocomplete=off>
                              
							  <p>La seguente guida seppur semplificata si rivolge a coloro che hanno conoscenze basilari nella configurazione e nell'utilizzo di gestori di database.</p>
							  <p></p>
							  L'installazione si articola in: 
	
							  <dl>
                                <dt>Step 1 - PHPMyAdmin</dt>
                                <dd>Login e creazione account</dd>
								<dd>Creazione e import database</dd></br>
								
                                <dt>Step 2 - MySQL</dt>
                                <dd>Configurazione dati di accesso</dd></br>
								
								<dt>Step 3 - Configurazione Sistema</dt>
                                <dd>Configurazione sistema di sicurezza</dd>
								<dd>Configurazione impostazioni generali</dd></br>
								
								<dt>Step 4 - Gestione</dt>
                                <dd>Indicazioni sull'utilizzo</dd>
								<dd>Documentazione generica</dd>
								<dd>Legislazione</dd></br>
                            </dl>
                         
										<div class="alert alert-danger">
                                L'esecuzione errata o non  consecutiva di alcuni step potrebbe causare l'inutilizzo del sistema.
                            </div>
							
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="comp" class="btn btn-lg btn-info btn-block" value="Inizia">
								
								
								</form>
                            </fieldset>
							
						<?php } else if(isset($_GET['step']) && $_GET['step'] == 1){ ?>
						
												<h3>Step1 - PHPMyAdmin</h3>
													<h4>Login e creazione account</h4>
						
                     
                            <fieldset>
							<form method="post" action="">
                              
							  <p>Il servizio utilizzato per la gestione dei dati, utilizzato in questa guida, è PHPMyAdmin, strumento integrato standard nei vari servizi host di base. </p>
	
							 
                            <p>Se non si è ancora eseguito il primo accesso, è necessario effettuarlo.</p>
                            <p>
                                <small>This is an example of small, fine print text.</small>
                            </p>
                            <p>
                                <strong>This is an example of strong, bold text.</strong>
                            </p>
                            <p>
                                <em>This is an example of emphasized, italic text.</em>
                            </p>
                         
										<div class="alert alert-danger">
                                L'esecuzione errata o non  consecutiva di alcuni step potrebbe causare l'inutilizzo del sistema.
                            </div>
							
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="commit" class="btn btn-lg btn-info btn-block" value="Inizia">
								
								
								</form>
                            </fieldset>
							  <?php } else if($_GET['step'] == 2) { }?>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	

	
    <!-- jQuery -->
    <script src="./admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./admin/dist/js/sb-admin-2.js"></script>

</body>