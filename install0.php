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
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en"> <!--<![endif]-->
<head>
  <meta charset="ISO-8859-1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Installazione</title>
  <link rel="stylesheet" href="admin/css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
  <center><img src="web-gallery/v2/images/habbo.png"></center>
  <br><br>
    <div class="login">
	<?php if(!isset($_GET['step']) || empty($_GET['step'])){ ?>
	<script type="text/javascript">
		var stile = "top=10, left=10, width=450, height=350, status=no, menubar=no, toolbar=no scrollbars=no";
 
		function Popup(error) {
			window.open('install.php?error='+error, 'ciao', stile);
		}
	</script>
	<h1>Controllo Compatibilit&agrave;</h1>
    <form method="post" action="?step=1" autocomplete=off>
		<p>
		<table>
		
			<tr style="width:100%;">
				<td style="width:100px;">PHP 5.3 </td>
				<td><?php echo version_compare(PHP_VERSION, '5.3') > 0 ? '<img src="web-gallery/v2/images/ok.png">' : '<img src="web-gallery/v2/images/error.png"> <a href="javascript:Popup(1);">Risolvi</a>'?></td>
			</tr>
			<tr style="width:100%;">
				<td style="width:100px;">Estensione CURL </td>
				<td><?php echo function_exists('curl_init') ? '<img src="web-gallery/v2/images/ok.png">' : '<img src="web-gallery/v2/images/error.png"> <a href="javascript:Popup(2);">Risolvi</a>'?></td>
			</tr>
			<tr style="width:100%;">
				<td style="width:140px;">Estensione SOCKET </td>
				<td><?php echo function_exists('socket_create') ? '<img src="web-gallery/v2/images/ok.png">' : '<img src="web-gallery/v2/images/error.png"> <a href="javascript:Popup(3);">Risolvi</a>'?></td>
			</tr>
			<tr style="width:100%;">
				<td style="width:100px;">File scrivibili </td>
				<td><?php echo is_writable('./') ? '<img src="web-gallery/v2/images/ok.png">' : '<img src="web-gallery/v2/images/error.png"> <a href="javascript:Popup(4);">Risolvi</a>'?></td>
			</tr>
		</table>
		</p>
		<p>* Ti consigliamo di risolvere gli eventuali errori prima di proseguire.</p>
		<p class="submit"><input type="submit" name="comp" value="Prosegui"></p>
      </form>
	<?php } else if(isset($_GET['step']) && $_GET['step'] == 1){ ?>
      <h1>Step 1: Dati MySQL</h1>
      <form method="post" action="" autocomplete=off>
		<p><?php echo isset($error) ? $error : ''; ?></p>
		<p><input type="text" name="host" value="localhost" placeholder="Host"></p>
        <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p><input type="text" name="database" value="" placeholder="Database"></p>
        <p class="submit"><input type="submit" name="commit" value="Prosegui"></p>
      </form>
    <?php } else if($_GET['step'] == 2) { ?>
	<script>
	function elaclose(check){
		var opt = document.getElementById("options");
		if(check.checked)
			opt.style.display = 'block'; 
		else
			opt.style.display = 'none'; 
	}
	
	function elamoney(check){
		var opt = document.getElementById("moname");
		if(check.checked)
			opt.style.display = 'block'; 
		else
			opt.style.display = 'none'; 
	}
	</script>
		<h1>Step 2: Hotel</h1>
      <form method="post" action="" autocomplete=off>
		<p><?php echo isset($error) ? $error : ''; ?></p>
		<p>
			<select name="mestyle" style="width:300px">
				<option value="new" selected>Nuova</option>
				<option value="old">Classica</option>
			</select>
			<a href="http://oi40.tinypic.com/jqt7ab.jpg" target="_blank">Quali sono?</a>
		</p>
		<p><input type="text" name="admcode" value="" placeholder="Parola segreta dell'Amministrazione"></p>
        <p><input type="text" name="path" value="" placeholder="Url Hotel (es. http://holoedit.it/)"></p>
        <p><input type="checkbox" name="closing" value="1" onclick="elaclose(this);"> Orario Hotel</p>
        <div id="options" style="display:none;">
		<p>
			<input type="text" name="cl_start" value="" placeholder="Chiusura (es. 02)" style="float:left;width:123px">
			<input type="text" name="cl_finish" value="" placeholder="Apertura (es. 08)" style="width:123px">
		</p>
		</div>
		<p><input type="checkbox" name="moneys" value="1" onclick="elamoney(this);"> Moneta a pagamento</p>
		<div id="moname" style="display:none;">
			<p><input type="text" name="money_name" value="" placeholder="Nome moneta"></p>
		</div>
        <p class="submit"><input type="submit" name="commit2" value="Prosegui"></p>
      </form>
	<?php } else if($_GET['step'] == 3) { ?>
	<h1>Step 3: Social Network</h1>
      <form method="post" action="">
		<p><?php echo isset($error) ? $error : ''; ?></p>
		<p><input type="text" name="fbappid" value="" placeholder="AppID Facebook"></p>
        <p><input type="text" name="fbappsec" value="" placeholder="Chiave segreta dell'Applicazione Facebook"></p>
        <p><input type="text" name="twittername" value="" placeholder="Username Twitter (facoltativo)"></p>
        <p class="submit"><input type="submit" name="commit3" value="Finito"></p>
      </form>
	<?php } else if($_GET['step'] == 'ok'){ ?>
	<h1>Installazione Competata!</h1>
	<p>Complimenti! L'installazione &egrave; competata!<br>
	Adesso, prima di cliccare sul pulsante in basso dovrai <strong>eliminare</strong> il file "install.php" per navigare nel tuo nuovo hotel!</p>
	<p class="submit"><input type="submit" value="Fatto!" onclick="window.location.assign('index');"></p>
	<?php } else if($_GET['step'] == 'error'){ ?>
	<h1>OOPS!</h1>
	<p>Ci dispiace, ma non abbiamo il permesso di modificare i file, dovrai quindi, modificare il file "config.php" a mano!<br>
	Ricordati di eliminare il file "install.php" dopo!</p>
	<p class="submit"><input type="submit" value="Fatto!" onclick="window.location.assign('index');"></p>
	<?php } ?>
	</div>
	
  </section>
</body>
</html>
