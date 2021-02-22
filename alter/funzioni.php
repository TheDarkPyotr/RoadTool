<?php
/*
© by alemoppo (Moroni Alessandro)
*/
/*
$ACCOUNT_DB = '';			#[=<account>]
$INDIRIZZO_REDIRECT = '';	#[=<account>.altervista.org]
$EMAIL = '';				#[=<account>@altervista.org]
$COLORE = '';				#[=#9370DB]
*/
$COLORE = '#D3D3D3';
define('HEADER_MAIL','From: '.(isset($EMAIL)?$EMAIL:(nick().'@altervista.org<')).(isset($EMAIL)?('<'.$EMAIL.'>'):(nick().'>')));
function colore()
{
	global $COLORE;
	if(isset($COLORE))
		return $COLORE;
	else
		return '#9370DB';
}
function nick()
{
	return substr($_SERVER['SERVER_NAME'],0,(strpos($_SERVER['SERVER_NAME'],'.')===FALSE)?strlen($_SERVER['SERVER_NAME']):strpos($_SERVER['SERVER_NAME'],'.'));
}
function stringa_random()
{
    $str = 'ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
    $r = '';
    $l = 8+rand(0,5);
    for($i=0;$i<$l;$i++)
        $r .= $str{rand(0,strlen($str))};
    return $r;
}
function cartella()	//ritorna il percorso dei file
{
	$arr = parse_url($_SERVER['PHP_SELF']);
	$t = strrpos(substr($arr['path'],1),'/');
    return substr($arr['path'].'/',1,$t?$t+1:0);
}
function redirect_home($param = '')
{
	global $INDIRIZZO_REDIRECT;
	if(isset($INDIRIZZO_REDIRECT))
	{
		if(!headers_sent())
			header('Location: http://'.$INDIRIZZO_REDIRECT.'/?'.$param);
		else die('<meta HTTP-EQUIV="REFRESH" content="0; url=http://'.$INDIRIZZO_REDIRECT.'/?'.$param.'">');
	}
	else 
	{
		if(!headers_sent())
			header('Location: http://'.nick().'.altervista.org/?'.$param);
		else die('<meta HTTP-EQUIV="REFRESH" content="0; url=http://'.nick().'.altervista.org/?'.$param.'">');
	}
	exit;
}
?>