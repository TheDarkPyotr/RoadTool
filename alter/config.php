<?php
/*
© by alemoppo (Moroni Alessandro)
*/
require_once('./funzioni.php');
if(isset($_GET['captcha']))
{
	session_start();
	$testo = substr(stringa_random(),0,5);
	$_SESSION['captcha'] = $testo;
	$x = 100;
	$y = 50;
	$image = imagecreatetruecolor($x, $y);

	$sfondo = imagecolorallocate($image,hexdec(substr(colore(),1,2)),hexdec(substr(colore(),3,2)),hexdec(substr(colore(),5,2)));
	$nero = imagecolorallocate($image,0,0,0);

	imagefilledrectangle($image, 0, 0, $x, $y, $sfondo);

	imagettftext( 
		        $image, //immagine 
		        15,  //dimensione carattere 
		        rand(-5, 5), //angolo di rotazione 
		        10+rand(-10,10), //offset sulla x 
		        30, //offset sulla y 
		        $nero, //colore 
		        './caratteri/arial.ttf', //font
		        $testo //da stampare 
		    ); 

	header("Content-Type: image/png");
	imagepng($image);
}
else if(isset($_GET['logout']))
{
	session_start();
	session_destroy();
	if(isset($_COOKIE['user']) || isset($_COOKIE['pass']))
	{
		setcookie('user',$user,time()-500);
    	setcookie('pass',$pass,time()-500);
	}
	redirect_home();
	//header('location:  http://'.nick().'.altervista.org');
}
else
{
	if(isset($ACCOUNT_DB))
		$nick = $ACCOUNT_DB;
	else $nick = nick();
	$db = mysql_connect('localhost',$nick,'');
	if(!$db)
		die('Impossibile connettersi al database: '.mysql_error()); 
	if(!mysql_select_db('my_'.$nick,$db)) 
		 die('Impossibile selezionare il database');
}
?>
