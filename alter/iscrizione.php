<?php
/*
© by alemoppo (Moroni Alessandro)
*/
require_once('./funzioni.php');
if(isset($_POST['username'],$_POST['password'],$_POST['verify_password'],$_POST['email'],$_POST['captcha']))
{
	//session_start();
	$stop = FALSE;
	if($_POST['captcha'] != $_SESSION['captcha'])
	{
		$stop = TRUE;
		echo('Codice di conferma errato');
	}
	$_SESSION['captcha'] = '';		//se torna indietro, il captcha non è più valido
    if(empty($_POST['username']))
	{
		$stop = TRUE;
        echo('username vuoto!');
	}
    if(empty($_POST['password']))
	{
		$stop = TRUE;
        echo('Password vuota!');
	}
    if(empty($_POST['verify_password']))
	{
		$stop = TRUE;
        echo('password di verifica vuota!');
	}
    if(empty($_POST['email']))
	{
		$stop = TRUE;
        echo('email vuota!');
	}
    if($_POST['verify_password'] != $_POST['password'])
	{
		$stop = TRUE;
        echo('Le due password non coincidono');
	}
    if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST['email']))
	{
		$stop = TRUE;
        echo('Email non valida');
	}

	if(!$stop)
	{
		require('./config.php');

		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$email = mysql_real_escape_string($_POST['email']);

		$q = mysql_query('SELECT username FROM utenti WHERE username = \''.$username.'\'');
		if(mysql_num_rows($q) == 1)
		    echo 'Questo utente risulta esistente';
		else
		{
			$attivazione = stringa_random();
			$q = mysql_query('INSERT INTO utenti (username,password,email,attivazione) VALUES (\''.$username.'\',\''.md5($password).'\',\''.$email.'\',\''.$attivazione.'\')');			
			if(!$q)
				echo 'Problemi durante la query: '.mysql_error();
			else
			{
				$oggetto = 'Registrazione su '.nick().'.altervista.org';
				$testo = "Ti sei registrato correttamente su .altervista.org.\n\nNick: ".$username."\nPassword: ".$password."\n\n Visita questa pagina per attivare l\'account: \n\nhttp://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?att=".$attivazione."\n\nGrazie per esserti registrato!";

				if(mail($email,$oggetto,$testo,HEADER_MAIL))
					echo 'Iscrizione avvenuta correttamente. Prima di poter usare l\'account, &egrave; necessario seguire il link sulla email.';
				else echo 'Problemi durante invio email';
			}
		}
		mysql_close($db);
	}
}
else if(isset($_GET['att']) || isset($_GET['riatt']))
{
	require('./config.php');
	if(isset($_GET['att']))
		$attivazione = mysql_real_escape_string($_GET['att']);
	else 
	{
		$attivazione = mysql_real_escape_string($_GET['riatt']);
		$q = mysql_query('SELECT pass FROM utenti WHERE attivazione = \''.$attivazione.'\'');
		if($q === FALSE)
			echo 'Errore durante una query: '.mysql_error();
		else if(mysql_num_rows($q) == 1)
		{
			$q = mysql_fetch_assoc($q);
			if(!empty($q['pass']))
				if(!mysql_query('UPDATE utenti SET password = \''.$q['pass'].'\' WHERE attivazione = \''.$attivazione.'\''))
					echo 'Errore durante una query: '.mysql_error();
		}
	}
	
	if(mysql_query('UPDATE utenti SET attivazione = \'\' WHERE attivazione = \''.$attivazione.'\''))
		if(mysql_affected_rows($db) == 1)
			echo 'Account attivato correttamente!<br>';
		else echo 'Problemi con attivazione account.<br>';
	if(isset($INDIRIZZO_REDIRECT))
		echo '<a href="http://'.$INDIRIZZO_REDIRECT.'">Premi qui per continuare</a>';
	else
		echo '<a href="http://'.nick().'.altervista.org">Torna alla home</a>';
	mysql_close($db);
}
else
{
?>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
<table style="cellpadding:5px; background-color:<?php require_once('./funzioni.php'); echo colore(); ?>; width:200px;" >
<tr><td>Username:</td><td><input type="text" name="username" value=""></td></tr> 
<tr><td>Password:</td><td><input type="password" name="password" value=""></td></tr> 
<tr><td>Verifica Password:</td><td><input type="password" id="verify_password" name="verify_password" value=""></td></tr> 
<tr><td>Email:</td><td><input type="text" name="email" value=""></td></tr>
<tr><td><img src="./config.php?captcha=1&r=<?= time(); ?>"></td><td>Conferma codice:<br><input type="text" name="captcha" value="" maxlength="5"></td></tr>
<tr><td colspan="2" style="text-align:center;"><input type="submit" id="submit" name="submit" value="Invia" /></td></tr>  
</table>
</form>
<?php
}
?>
