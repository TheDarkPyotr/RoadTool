<?php
/*
© by alemoppo (Moroni Alessandro)
*/
if(isset($_POST['user'],$_POST['email']))
{
	require('./config.php');
	require_once('./funzioni.php');
	$procedi = FALSE;
	if(!empty($_POST['user']))
	{
		$username = mysql_real_escape_string($_POST['user']);
		$q = mysql_query('SELECT email FROM utenti WHERE username = \''.$username.'\' LIMIT 1');
		if(!$q)
			echo 'Errore durante la query 1'.mysql_error();
		if(mysql_num_rows($q) != 1)
		{
			echo 'Nessun utente '.$_POST['user'].' trovato. <br>';
		}
		else
		{
			$row = mysql_fetch_assoc($q);
        	$email = $row['email'];
			$procedi = TRUE;
		}
	}
	else if(!empty($_POST['email']))
	{
		$email = mysql_real_escape_string($_POST['email']);
		$q = mysql_query('SELECT username FROM utenti WHERE email=\''.$email.'\' LIMIT 1');
        if(!$q)
            echo 'Errore durante la query1: '.mysql_error();
		if(mysql_num_rows($q) != 1)
		{
			echo 'Nessuna email '.$_POST['email'].' trovata. <br>';
		}
		else
		{
			$row = mysql_fetch_assoc($q);
        	$username = $row['username'];
			$procedi = TRUE;
		}
	}
	else
		echo 'Occorre inserire o username, o email.<br>';

	if($procedi)
	{
		$new_pass = stringa_random();
		$attivazione = stringa_random();
		$q = mysql_query('UPDATE utenti SET pass = \''.md5($new_pass).'\', attivazione=\''.$attivazione.'\' WHERE username = \''.$username.'\'');
		if(!$q)
		    echo 'Errore durante la query2: '.mysql_error();
		else
		{
			$oggetto = 'Reset password';
			$testo = "Reset effettuato correttamente.\n\nNuova password: $new_pass\n(potrai modificarla)\n\nUtente: $username\n\nVisita questo indirizzo per confermare:\nhttp://".$_SERVER['SERVER_NAME'].'/'.cartella()."iscrizione.php?riatt=".$attivazione."\n";
			if(!mail($email,$oggetto,$testo,HEADER_MAIL))
				echo 'Errore invio durante email';
			else echo 'Abbiamo inviato un email con la nuova password generata automaticamente. Prima che diventi attiva, occorre confermare dall\'email.<br>';
		}
	}
	mysql_close($db);
}
?>
Immetti nome utente o email per ricevere via email una nuova password:
<form name="login" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">  
<table style="cellpadding:5px; background-color:<?php require_once('./funzioni.php'); echo colore(); ?>" >
<tr><td>Username:</td><td><input type="text" name="user"></td></tr>  
<tr><td>email:</td><td><input type="text" name="email"></td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="Invia" name="submit"></td></tr>
</table>  
</form>
