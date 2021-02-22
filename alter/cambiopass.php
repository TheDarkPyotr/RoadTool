<?php 
/*
© by alemoppo (Moroni Alessandro)
*/
if(isset($_POST['username'],$_POST['password'],$_POST['verify_password'],$_POST['vecchia_password']))
{
	if(empty($_POST['username']))
        echo 'username vuoto!';
    else if(empty($_POST['password']))
        echo 'Password vuota!';
    else if(empty($_POST['verify_password']))
        echo 'password di verifica vuota!';
    else if(empty($_POST['vecchia_password']))
        echo 'vecchia password vuota!';
	else if($_POST['verify_password'] != $_POST['password'])
		echo 'Le due password non coincidono!';
	else
	{
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$vecchia_pass = mysql_real_escape_string($_POST['vecchia_password']);
		require('./config.php');
		if($q = mysql_query('UPDATE utenti SET password=\''.md5($password).'\' WHERE username = \''.$username.'\' AND password = \''.md5($vecchia_pass).'\''))
		{
			if(mysql_affected_rows($db) == 1)
				echo 'Password modificata correttamente!<br>';
			else echo 'Combinazione username/password non accettata<br>';
		}
		else echo 'Errore nella query: '.mysql_error();
		mysql_close($db);
	}
}
?>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
<table style="cellpadding:5px; background-color:<?php require_once('./funzioni.php'); echo colore(); ?>" >
<tr><td>Username:</td><td><input type="text" name="username" value=""></td></tr> 
<tr><td>Password (nuova):</td><td><input type="password" name="password" value=""></td></tr> 
<tr><td>Verifica password (nuova):</td><td><input type="password" name="verify_password" value=""></td></tr>
<tr><td>Vecchia password:</td><td><input type="password" name="vecchia_password" value=""></td></tr>
<tr><td colspan="2" style="text-align:center;"><input type="submit" id="submit" name="submit" value="Invia" /></td></tr>  
</table>
</form>
