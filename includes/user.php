<?php
class User {
    var $row = '';
	var $banned = false;
	var $ban_reason = '';
	var $ban_expire = 0;
	var $login_error = '';
	var $account = '';
	
    function login($username, $password, $remember, $noob, $hk = 'false') {
		$username = $GLOBALS['input']->EscapeString($username);
		$password = $GLOBALS['input']->EscapeString($password);
		$sql = mysql_query("SELECT * FROM users WHERE mail = '".$username."' AND password = '".$password."' LIMIT 1") or die(mysql_error());
		if(mysql_num_rows($sql) > 0){
			
			$row = mysql_fetch_array($sql);
			$sql2 = mysql_query("SELECT * FROM users WHERE id = ".$row['id']." LIMIT 1") or die(mysql_error());
			$row2 = mysql_fetch_array($sql2);
			$this->row = $row2;
			$this->account = $row;
			
			$check = mysql_query("SELECT * FROM bans WHERE value = '".$this->row['id']."' OR value = '".$_SERVER['REMOTE_ADDR']."' LIMIT 1") or die(mysql_error());
			$is_banned = mysql_num_rows($check);
			
			if($is_banned > 0){
				$bandata = mysql_fetch_assoc($check);
				$reason = $bandata['reason'];
				$expire = $bandata['expire'];

				if(time() < $expire){
					$this->banned = true;
					$this->ban_reason = $reason;
					$this->ban_expire = $expire;
					$this->login_error = "Sei stato bannato per \"".$reason."\". Scade Il ".date('d/m/Y H:i:s',$expire).".";
				}else
					mysql_query("DELETE FROM bans WHERE value = '".$this->row['username']."' OR value = '".$_SERVER['REMOTE_ADDR']."' LIMIT 1") or die();
			}
		} else {
			$sql = mysql_query("SELECT * FROM users WHERE mail = '".$username."' LIMIT 1") or die(mysql_error());
			if(mysql_num_rows($sql) > 0){
				$row = mysql_fetch_array($sql);
				$sql2 = mysql_query("SELECT * FROM users WHERE id = '".$row['id']."' AND password = '".$password."' LIMIT 1") or die(mysql_error());
				if(mysql_num_rows($sql2) > 0){
					$row2 = mysql_fetch_array($sql2);
					mysql_query("UPDATE users SET id = '".$row['id']."' WHERE id = '".$row['id']."'");
					$this->row = $row;
					$this->account = $row2;
					
					$check = mysql_query("SELECT * FROM bans WHERE value = '".$this->row['username']."' OR value = '".$_SERVER['REMOTE_ADDR']."' LIMIT 1") or die(mysql_error());
					$is_banned = mysql_num_rows($check);
			
					if($is_banned > 0){
						$bandata = mysql_fetch_assoc($check);
						$reason = $bandata['reason'];
						$expire = $bandata['expire'];

						if(time() < $expire){
							$this->banned = true;
							$this->ban_reason = $reason;
							$this->ban_expire = $expire;
							$this->login_error = "Sei stato bannato per \"".$reason."\". Scade Il ".date('d/m/Y H:i:s',$expire).".";
						} else
							mysql_query("DELETE FROM bans WHERE value = '".$this->row['username']."' OR value = '".$_SERVER['REMOTE_ADDR']."' LIMIT 1") or die();
					}
				} else
					$this->login_error = 'Username o Password non corretti';
			} else
				$this->login_error = 'Email o Password non corretti';
		}
		
		if($this->login_error == ''){
			
			$_SESSION['user'] = serialize($this);
			
			if($remember == "on"){
				setcookie("remember", "remember", time()+60*60*24*100, "/");
				setcookie("rusername", $this->account['email'], time()+60*60*24*100, "/", ".localhost");
				setcookie("rpassword", $this->account['password'], time()+60*60*24*100, "/", ".localhost");
			}
			mysql_query("UPDATE users SET last_online = '".time()."' WHERE id = '".$this->row['id']."'") or die(mysql_error());
			
			if($hk == 'true')
				header("location: ".PATH."admin");
			
		}
		return true;
    }
	
	
	
	function Refresh($id){
		$sql = mysql_query("SELECT * FROM users WHERE id = '".$id."' LIMIT 1") or die(mysql_error());
		if(mysql_num_rows($sql) > 0){
			$row = mysql_fetch_assoc($sql);
			$sql2 = mysql_query("SELECT * FROM accounts WHERE id = '".$row['account']."' LIMIT 1") or die(mysql_error());
			$row2 = mysql_fetch_assoc($sql2);
			$this->row = $row;
			$this->account = $row2;
			
			$_SESSION['user'] = serialize($this);
		}else{
			session_destroy();
			header("Location: ".PATH);
		}
		return true;
	}
	
	function avatarURL($figure,$style, $action = ''){
		if($figure == "self"){ $figure = $this->row['look']; }
		$style = explode(",", $style);
		if($style[0] == "s"){ $style[6] = "1"; }else{ $style[6] = "0"; }
		if($style[3] == "sml"){ $style[7] = "1"; }else{ $style[7] = "0"; }
		
		return "http://www.habbo.it/habbo-imaging/avatarimage?figure=".$figure."&size=".$style[0]."&direction=".$style[1]."&head_direction=".$style[2]."&crr=".$style[5]."&action=".$action."&gesture=".$style[3]."&frame=".$style[4];
	}
}
$user = new User();
?>