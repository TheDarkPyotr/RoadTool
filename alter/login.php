<?php
/*
© by alemoppo (Moroni Alessandro)
*/
session_start();
require_once('./funzioni.php');
require('./config.php');
if(isset($_SESSION['utente']))
    echo 'benvenuto, '.$_SESSION['utente'];

else if(isset($_COOKIE['user'],$_COOKIE['pass']))
{
    $user = mysql_real_escape_string($_COOKIE['user']);
    $pass = mysql_real_escape_string($_COOKIE['pass']);

    #rinnovo i cookie
    setcookie('user',$user,time()+(60*60*24*30));    //dura 30 gg
    setcookie('pass',$pass,time()+(60*60*24*30));    //dura 30 gg
}
if(isset($_POST['username'],$_POST['password']))
{
    $user = mysql_real_escape_string($_POST['username']);
    $pass = md5(mysql_real_escape_string($_POST['password']));
}

if(isset($user,$pass))
{
    $q = mysql_query('SELECT attivazione,pass FROM utenti WHERE username = \''.$user.'\' AND password=\''.$pass.'\' LIMIT 1');
    mysql_close($db);
    if(!$q)
        echo 'Errore durante la query: '.mysql_error();
    else if(mysql_num_rows($q) == 1)
    {
		$q = mysql_fetch_assoc($q);

		if(empty($q['attivazione']) || (!empty($q['pass'])))
		{
		    $_SESSION['utente'] = htmlentities($user);
		    if(isset($_POST['ricordami']))
		    {
		        setcookie('user',$user,time()+(60*60*24*30));    //dura 30 gg
		        setcookie('pass',$pass,time()+(60*60*24*30));    //dura 30 gg
		    }
		    redirect_home();
		}
		else 
			echo 'Account non attivato. Attivalo dall\'indirizzo specificato nell\'email!.';
    }
    else echo 'I dati non sono corretti.';
}
if(!isset($_SESSION['utente']))
{
?>
<form name="login" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">  
<table style="cellpadding:5px; background-color:<?php require_once('./funzioni.php'); echo colore(); ?>" >
<tr><td>Username:</td><td><input type="text" name="username"></td></tr>  
<tr><td>password:</td><td><input type="password" name="password"></td></tr>
<tr><td colspan="2">Ricordami<input type="checkbox" name="ricordami" value="on" class="check"></td></tr>
<tr><td colspan="2"><input type="submit" value="Invia" name="submit" id="submit" class="button"></td></tr>
</table>  
</form>
<?php
}
?>
