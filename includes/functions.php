<?php
class Input {
	
	function cutString($text, $maxChar) {

		//$maxChar = 20;

		$chars = strlen($text);
		
		if($chars > $maxChar) {

		return substr($text, 0, $maxChar)."...";

		} else {

		return $text;

		}

	}

    function HoloHash($password){
        return sha1($password . "xCg532%@%gdvf^5DGaa6&*rFTfg^FD4\$OIFThrR_gh(ugf*/");
    }

	 function ValidPass($u_name = ''){
        if(preg_match('/^[a-zA-Z0-9]+$/i', $u_name))
            return true;
        else
            return false;
    }

    function NameTaken($u_name = ''){
        return (mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '".$u_name."'")) > 0  ? true : false);
    }

/*		REWRITE		*/
    function ValidMail($email, $check = false) {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        
        if (preg_match($regex, $email)){
            
            if($check)
                return mysql_num_rows(mysql_query("SELECT * FROM accounts WHERE email = '".$email."'")) > 0 ? false : true;
            
            return true;
        }else
            return false;
    }


    function filter_format($str){
        $str = str_replace("Pagliaccio", " **CENSURA**", $str); 
       
        $simple_search = array( 
                                '/\[b\](.*?)\[\/b\]/is', 
                                '/\[i\](.*?)\[\/i\]/is', 
                                '/\[u\](.*?)\[\/u\]/is', 
                                '/\[s\](.*?)\[\/s\]/is', 
                                '/\[quote\](.*?)\[\/quote\]/is', 
                                '/\[link\=(.*?)\](.*?)\[\/link\]/is', 
                                '/\[url\=(.*?)\](.*?)\[\/url\]/is', 
                                '/\[color\=(.*?)\](.*?)\[\/color\]/is', 
                                '/\[size=small\](.*?)\[\/size\]/is', 
                                '/\[size=large\](.*?)\[\/size\]/is', 
                                '/\[code\](.*?)\[\/code\]/is', 
                                '/\[habbo\=(.*?)\](.*?)\[\/habbo\]/is', 
                                '/\[room\=(.*?)\](.*?)\[\/room\]/is', 
                                '/\[group\=(.*?)\](.*?)\[\/group\]/is',
                                '/\[img\](.*?)\[\/img\]/is' 
                                ); 


        $str = preg_replace ($simple_search, $simple_replace, $str);
		$str = utf8_decode($str);
        return $str; 
    } 


	function GetUserInfo($id, $info){
        $sql = mysql_query("SELECT ".$info." FROM user_info WHERE user_id = '".$id."'"); 
        return mysql_num_rows($sql) > 0 ? mysql_result($sql,0) : 1;
    }
	
	
    function IsUserOnline($intUID){
        $result = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$intUID."' LIMIT 1")) or die(mysql_error()); 
		
		if($result['hide_online'] == 0){
			if($result['online'] == 1)
				return true; 
			else
				return false; 
        } else
			return false;
        
        /*$fp = fsockopen($result['ip_last'], '1232', $errno, $errstr, 30); 
        if($fp){ 
        return true;
        fclose($fp); 
        } else { 
        return false;
        }*/
    } 

	/* REWRITE FOR IP SEARCH */
    function IsUserBanned($name){
		$sql = mysql_query("SELECT * FROM bans WHERE value = '".$name."' OR value = '".$_SERVER['REMOTE_ADDR']."' LIMIT 1");
        if(mysql_num_rows($sql) > 0){
            $stamp_expire = mysql_fetch_assoc($sql);
            $stamp_expire = $stamp_expire['expire'];
            $stamp_now = time();
            if($stamp_now < $stamp_expire)
                return true;
            else {
                mysql_query("DELETE FROM bans WHERE value = '".$name."' OR value = '".$_SERVER['REMOTE_ADDR']."' LIMIT 1");
                return false;
            }
        } else
            return false;
    }

/*  SQL Query Exe*/
    function mysql_evaluate($query, $default_value="undefined") { 
        $result = mysql_query($query) or die(mysql_error()); 

        if(mysql_num_rows($result) < 1){ 
            return $default_value; 
        } else { 
            return mysql_result($result, 0); 
        } 
    } 

    function FilterText($str, $advanced=false) { 
        if($advanced == true){ return mysql_real_escape_string($str); } 
        $str = mysql_real_escape_string(htmlspecialchars($str)); 
        return $str; 
    }

    function EscapeString($string = ''){
        return mysql_real_escape_string(stripslashes(trim(htmlspecialchars($string))));
    }

    function HoloText($str, $advanced=false, $bbcode=false, $chars=false){ 
        if($advanced == true){ return stripslashes($str); } 
        $str = stripslashes(nl2br(htmlspecialchars($str))); 
        if($bbcode == true){$str = $this->bbcode_format($str); } 
		if($chars == true){
			$str = utf8_decode($str);
		} 
        return $str; 
    }
	
	function PageText($str, $html){
		$str = stripslashes($str);
		if($html != true){ $str = htmlspecialchars($str,ENT_COMPAT,"UTF-8"); }
		return $str;
	}

/* TIME EXCEPTION REQUEST*/
    function nicetime($date){
        if(empty($date))
            return "Data non esistente";
        $periods = array("secondi", "minuti", "ore", "giorni", "settimane", "mesi", "anni", "decenni");
        $lengths = array("60","60","24","7","4.35","12","10");
        $now = time();
        $unix_date = strtotime($date);
        if(empty($unix_date))  
            return "Data non valida";
		else if($date == "01-01-1970")
			return 0;
        if($now > $unix_date) {    
            $difference = $now - $unix_date;
            $tense = "fa";
        } else {
            $difference = $unix_date - $now;
            $tense = "da adesso";
        }
        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++)
            $difference /= $lengths[$j];
        $difference = round($difference);
        return "$difference $periods[$j] {$tense}";
    }

    function stringToURL($str,$lowercase=true,$spaces=false){
        $str = trim(preg_replace('/\s\s+/',' ',preg_replace("/[^A-Za-z0-9-]/", " ", $str)));
        if($lowercase == true){ $str = strtolower($str); }
        if($spaces == true){ $str = str_replace(" ", "-", $str); }else{ str_replace(" ", "", $str); }
        return $str;
    }
	
/* IP BANNER*/
	function GiveVIP($user_id, $months){ 
	$sql = mysql_query("SELECT * FROM user_subscriptions WHERE user_id = '".$user_id."' LIMIT 1") or die(mysql_error()); 
	$valid = mysql_num_rows($sql); 
	
    if($valid > 0){ 
		mysql_query("UPDATE users SET vip = 1 WHERE id = ".$user_id);
        mysql_query("UPDATE user_subscriptions SET timestamp_expire = timestamp_expire + ".$months.",subscription_id = 'habbo_vip' WHERE user_id = '".$user_id."' LIMIT 1") or die(mysql_error()); 
        
		$check = mysql_query("SELECT * FROM user_badges WHERE badge_id = 'ACH_VipClub1' AND user_id = '".$user_id."' LIMIT 1") or die(mysql_error()); 
        $found = mysql_num_rows($check); 
        if($found < 1)
            mysql_query("INSERT INTO user_badges (user_id,badge_id,badge_slot) VALUES ('".$user_id."','ACH_VipClub1','0')") or die(mysql_error()); 
		
		$this->MUS("updatevip", $user_id);
		$this->MUS("alert", $user_id ." Sei diventato VIP!.");
    } else {
        mysql_query("INSERT INTO user_subscriptions (user_id,subscription_id,timestamp_activated,timestamp_expire) VALUES ('".$user_id."','habbo_vip','".time()."','".time()."')") or die(mysql_error()); 
        $this->GiveVIP($user_id, $months); 
    }
}



	
    
    	function AddUser($month, $day, $year, $id, $provider, $username, $password, $email, $credits, $add = false, $figure = ''){
		$date = mktime($month, $day, $year);
		mysql_query("INSERT INTO users (username, password, mail, credits, look, motto, account_created, last_online, ip_last, ip_reg, home_room) VALUES ('".$username."', '".$password."', '".$email."', '".$credits."', '".($figure == '' ? "hd-180-2.lg-285-81.hr-828-42.sh-290-90.ch-215-92" : $figure)."', 'Benvenuto!', UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), '".$_SERVER['REMOTE_ADDR']."', '".$_SERVER['REMOTE_ADDR']."', '0')");
	
		$user_id = mysql_insert_id(); 
		$id = $id == '_id' ? $user_id.'_id' : $id;
		
		if($add == false)
			mysql_query("INSERT INTO accounts (id, provider, email, name, password, current) VALUES ('".$id."', '".$provider."', '".$email."', '".$username."', '".$password."', '".$user_id."')");
		else
			mysql_query("UPDATE accounts SET current = ".$user_id." WHERE id = '".$id."'");
			
		mysql_query("INSERT INTO user_stats (id, RoomVisits, OnlineTime, Respect, RespectGiven, GiftsGiven, GiftsReceived, DailyRespectPoints, DailyPetRespectPoints) VALUES ('".$user_id."', 0, 0, 0, 0, 0, 0, 3, 3)"); 
		mysql_query("INSERT INTO user_info (user_id, bans, cautions, reg_timestamp, login_timestamp, cfhs, cfhs_abusive) VALUES ('".$user_id."', '0', '0', UNIX_TIMESTAMP(), '0', '0', '0')"); 
		mysql_query("INSERT INTO cms_homes_stickers (userid, x, y, z, data, type, subtype, skin, groupid, var) VALUES (".$user_id.", '20', '19', '302', '', '2', '1', 'defaultskin', -1, NULL)");

		mysql_query("UPDATE users SET account = '".$id."' WHERE id = ".$user_id);
	}
		
	function systemNotify($title, $desc, $type = NULL, $date = NULL, $name = NULL, $surname = NULL, $address = NULL){
		
	if($desc = '1') mysql_query("UPDATE system_notify SET view = '1' WHERE link = '".$title."'") or die(mysql_error());
		
	else {
		
		$anchor = "./home";
		
		switch($type){
			
			case 'report':
					$anchor = "./all?edit=".$this->toID($date, $name, $surname, $address)."";
			break;
			
			case 'account':
					$anchor = "./profile";
			break;
		
		}
		
		mysql_query("INSERT INTO system_notify (type, title, info, link, date, view) VALUES ('".$type."', '".$title."', '".$desc."', '".$anchor."', '".date('d/m/Y H:i:s')."','0')") or die(mysql_error());;
		
		//mysql_query("INSERT INTO system_notify (type, title, info, link, date, view) VALUES ('".$type."', '".$title."', '".$desc."', '".$anchor."', '".date('d/m/Y H:i:s')."', '0')") 
	
		
	}
	
}


	function toID($date, $name, $surname, $address){
		
		
		
		$queryset = mysql_query("SELECT * FROM city_report WHERE name = '".$name."' AND surname = '".$surname."' AND report_insertdate = '".$date."' AND report_address = '".$address."'");
		if ($queryset) {
			while($row = mysql_fetch_assoc($queryset)) {
				
				return $row['id'];
			//code
    }
} else return 0;
		
		/*
		$sql = mysql_query("SELECT * FROM city_report WHERE report_title = '".$title."' AND report_desc = '".$desc."' AND report_insertdate = '".$date."' AND report_address = '".$address."'");
		$report = mysql_fetch_assoc($sql); 
		return $report['id'];*/
		
	}
	
	

	function SendMail($email, $date, $forgot = true){
		
	if($forgot == true){
		
		if(mysql_num_rows(mysql_query("SELECT * FROM accounts WHERE email = '".$email."'")) > 0){
		
		$token = sha1(md5($email));
		
		mysql_query("INSERT INTO cms_reset (mail, token) VALUES ('".$email."', '".$token."')");
		
		// The message
		$message = '
		<table width="98%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td align="center">
						<table border="0" cellpadding="0" cellspacing="0" width="595">
							<tbody>
								<tr>
									<td align="left" style="border-bottom:1px solid #aaaaaa;" height="70" valign="middle">
										<table border="0" cellpadding="0" cellspacing="0">
											<tbody>
												<tr>
													<td>
														<img src="'.PATH.'web-gallery/v2/images/habbo.png" alt="" width="110" height="40" style="display:block;">
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td align="left" style="border-bottom:1px dashed #aaaaaa;" valign="middle">
										<table style="padding:0 0 10px 0;width:100%;" border="0" cellpadding="0" cellspacing="0">
											<tbody>
												<tr>
													<td valign="top">
														<p style="font-family:Verdana,Arial,sans-serif;font-size:20px;padding-top:15px;">
															Ciao, '.$email.'
														</p>
														<p style="font-family:Verdana,Arial,sans-serif;font-size:12px;padding-bottom:5px;">
															Per scegliere una nuova Password clicca <a href="'.PATH.'account/password/resetIdentity/'.$token.'" target="_blank" class="">questo Link</a>.
														</p>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td align="left" style="border-bottom:1px solid #aaaaaa;" height="100" valign="middle">
										<table style="" border="0" cellpadding="0" cellspacing="0">
											<tbody>
												<tr>
													<td valign="middle">
														<table style="background-color:#51b708;height:50px;" height="50px;" cellpadding="0" cellspacing="0">
															<tbody>
																<tr>
																	<td style="height:100%;vertical-align:middle;border:solid 2px #000000;" valign="middle">
																		<p style="font-family:Verdana,Arial,sans-serif;font-weight:bold;font-size:18px;color:#ffffff;">
																			<a style="text-decoration:none;padding:15px 20px;color:#ffffff;" href="'.PATH.'account/password/resetIdentity/'.$token.'" target="_blank">Scegli una nuova Password</a>
																		</p>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td valign="top" align="center">
										<table style="font-family:Verdana,Arial,sans-serif;text-align:justify;font-size:11px;color:#aaaaaa;padding-top:10px;padding-right:10px;padding-left:10px;padding-bottom:10px;" border="0" cellpadding="0" cellspacing="0" width="595">
											<tbody>
												<tr>
													<td style="height:8px;"></td>
												</tr>
												<tr>
													<td valign="top">
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
		';

		// In case any of our lines are larger than 70 characters, we should use wordwrap()
		$message = wordwrap($message, 70, "\r\n");
		
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Comune di Alcamo | Servizio Segnalazioni - Area Riservata (IT)';
		// Send
		mail($email, 'Comune di Alcamo | Servizio Segnalazioni - Richiesta modifica password amministratore', $message, $headers);
		
		}
	} else {
	
			$sql = mysql_query("SELECT * FROM city_report WHERE report_insertdate = ".$date." LIMIT 1") or die(mysql_error());
			$row = mysql_fetch_array($sql);
			$this->row = $row;
	
	//	The message
		$message = '
		
		<b>ID: </b> '.$this->row['id'].' </br>
		<b>Titolo: </b> '.$this->row['report_title'].' </br>
		<b>Tipologia: </b> '.$this->row['report_type'].' </br>
		<b>Descrizione: </b> '.$this->row['report_desc'].' </br>
		<b>Indirizzo: </b> '.$this->row['report_address'].' </br>
		-----------------------------------------------  </br>
		<b>Segnalatore: </b> '.$this->row['surname'].' '.$this->row['name'].'</br>
		';

		// In case any of our lines are larger than 70 characters, we should use wordwrap()
		$message = wordwrap($message, 70, "\r\n");
		
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Comune di Alcamo | Servizio Segnalazioni - Area Riservata (IT)';
		// Send
		mail($email, 'Comune di Alcamo | Servizio Segnalazioni - Nuova Segnalazione ID: '.$report['id'].'', $message, $headers);
	
	
	}
}


	function logSession($account, $activity, $description, $date, $toolpage, $toolrank, $userrank){
		
		//if($account != '' && $activity != '' && $date != '' && $toolpage != ''){
		
				mysql_query("INSERT INTO system_log (account, type, description, date, toolpage, toolrank, userrank) VALUES ('".$account."','".$activity."','".$description."','".$date."','".$toolpage."', '".$toolrank."', '".$userrank."')");
		
		//}
	}
	
}
$input = new Input();
?>