<?php
require('./php-captcha.inc.php');
$aFonts = array('./segoeprb.ttf');
$oPhpCaptcha = new PhpCaptcha($aFonts, 200, 60);
$oPhpCaptcha->SetWidth(200);
$oPhpCaptcha->SetHeight(60);
$oPhpCaptcha->SetNumChars(5);
$oPhpCaptcha->SetCharSet('0,1,2,3,4,5,6,7,8,9,a,b,c,d,e,f,g,h,j,k,m,n,p,q,r,s,t,u,v,w,x,y,z');
$oPhpCaptcha->SetNumLines(0);
$oPhpCaptcha->DisplayShadow(false);
$oPhpCaptcha->SetMaxFontSize(35);
$oPhpCaptcha->SetMinFontSize(30);
$oPhpCaptcha->UseColour(true);
$oPhpCaptcha->Create();
?>