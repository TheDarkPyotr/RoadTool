<?php
@session_start(); 

if(file_exists('install.php')){
	header('Location: install');
	exit;
}

@include('/config.php');
@include('/includes/mysql.php');
@include('/includes/functions.php');
@include('/includes/user.php');



$configsql = mysql_query('SELECT * FROM cms_system LIMIT 1') or die(mysql_error()); 
$config = mysql_fetch_assoc($configsql); 


$load_set = array(
	'ATTESA'      => "warning",
	'ATTESA-perc' => "20%",
	'APPROVATA'   => "info",
	'APPROVATA-perc' => "50%",
	'RISOLTA'     => "success",
	'RISOLTA-perc' => "100%",
	'RIGETTATA'   => "danger",
	'RIGETTATA-perc' => "100%"
);

$status_set = array(
	'ATTESA'      => "I'm in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.",
	'APPROVATA'   => "I'm in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.",
	'RISOLTA'     => "I'm in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.",
	'RIGETTATA'   => "I'm in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit."
);



$maintenance = $config['site_closed'];

if(!isset($_SESSION['user']) && (isset($_COOKIE['remember']) && $_COOKIE['remember'] == "remember")){ 
    $cname = $input->FilterText($_COOKIE['rusername']); 
    $cpass_hash = $_COOKIE['rpassword']; 
    $csql = mysql_query("SELECT * FROM accounts WHERE email = '".$cname."' LIMIT 1") or die(mysql_error()); 
    $cnum = mysql_num_rows($csql); 
    if($cnum < 1){ 
        setcookie("remember", "", time()-60*60*24*100, "/", ".localhost");
        setcookie("rusername", "", time()-60*60*24*100, "/", ".localhost");
        setcookie("rpassword", "", time()-60*60*24*100, "/", ".localhost");
    } else { 
        $crow = mysql_fetch_assoc($csql); 
        $correct_pass = $crow['password']; 
        if($cpass_hash == $correct_pass){ 
            $user->login($cname, $cpass_hash, "on");
            if($user->login_error != ''){
                setcookie("remember", "", time()-60*60*24*100, "/", ".localhost");
                setcookie("rusername", "", time()-60*60*24*100, "/", ".localhost");
                setcookie("rpassword", "", time()-60*60*24*100, "/", ".localhost");
                header("location: ".PATH);
            }
            exit; 
        } else { 
            setcookie("remember", "", time()-60*60*24*100, "/", ".localhost");
            setcookie("rusername", "", time()-60*60*24*100, "/", ".localhost");
            setcookie("rpassword", "", time()-60*60*24*100, "/", ".localhost");
            header("location: ".PATH);
        }
    }
}

if(isset($_SESSION['user'])){ 
	$user = unserialize($_SESSION['user']);
    $rawname = $user->row['id'];
    $rawpass = $user->account['password'];
	$usersql = mysql_query("SELECT * FROM accounts WHERE current = '".$rawname."' AND password = '".$rawpass."' LIMIT 1"); 
    $password_correct = mysql_num_rows($usersql); 
    if($password_correct < 1){
        session_destroy(); 
		setcookie("remember", "", time()-60*60*24*100, "/");
        setcookie("rusername", "", time()-60*60*24*100, "/");
        setcookie("rpassword", "", time()-60*60*24*100, "/");
        header("location: ".PATH."?error=21"); 
        exit;
    } elseif($input->IsUserBanned($user->row['id'])){
        $bandata = mysql_fetch_assoc(mysql_query("SELECT * FROM bans WHERE value = '".$user->row['username']."' OR value = '".$_SERVER['REMOTE_ADDR']."' LIMIT 1")) or die(mysql_error()); 
        $reason = $bandata['reason']; 
        $expire = $bandata['expire']; 
        $login_error = "Sei stato bannato per  \"" . $reason . "\". il tuo ban finisce il " . date('d/m/Y H:i:s',$expire) . ".";  
        include("logout.php");
		@session_destroy(); 
        exit;
    }
    if($password_correct == 1)
		mysql_query("UPDATE users SET ip_last = '".$_SERVER['REMOTE_ADDR']."' WHERE id = '".$user->row['id']."' LIMIT 1") or die(mysql_error()); 
    $logged_in = true; 
} else {
    $user->row['username'] = "Visitatore"; 
    $user->row['id'] = "0"; 
    $logged_in = false; 
}

if($maintenance == 1 && !isset($is_maintenance) && (!isset($user->row['rank']) || $user->row['rank'] < 4)){ 
    header("Location: ".PATH."closed"); 
    exit; 
}
?>