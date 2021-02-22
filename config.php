<?php
$sql['hostname'] = 'localhost';
$sql['username'] = 'rooter1';
$sql['password'] = '';
$sql['database'] = 'alcamoreport';

define("PATH", "http://localhost/roadtool/"); //Url Hotel (Con slash finale!)
define("PANEL_KEY", "figoo"); //Codice segreto dell'Amministrazione

//  ****** STILE AREA PERSONALE *********
$mestyle['type'] = 'new'; //new = nuovo, old = classico

//  ****** CHIUSURA/APERTURA *********
define("CLOSING", true); //Stato di Chiusura/Apertura

$closing = array(
	'start'  => '01', //Ora di chiusura
	'finish' => '06' //Ora di apertura
);

//  ****** MONETE A PAGAMENTO ********
$money = array(
	'enabled' => 0, //Abilitarli? 1 = Si, 0 = No
	'name' => 'Stelle' //Nome della moneta
);

//  ****** APP ID & SECRET FACEBOOK *********
define("APP_ID", "618609318163968");
define("APP_SECRET", "09e93cb872159d338791c540d03b36es");

//  ****** RPX API KEY (FOR GOOGLE) *********
define("RPX_API_KEY", "32df64f50df1d2493a28f239179008e48445e2be");

// ******* SITE SETTINGS *********
define("TWITTER_NAME", "habluxitalia");

//	****** BADGES ******
$cimagesurl = "http://images-eussl.habbo.com/c_images/";
$badgesurl = "album1584/";

date_default_timezone_set("Europe/Rome"); 
?>