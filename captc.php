<?php
session_start();
$error4 = false;

	$challange = isset($_POST['recaptcha_challenge_field']) ? $input->EscapeString($_POST['recaptcha_challenge_field']) : '';
	$response = isset($_POST['recaptcha_response_field']) ? $input->EscapeString($_POST['recaptcha_response_field']) : '';
	
	$response = isset($_POST['captchaResponse']) ? $_POST['captchaResponse'] : '';
	$captcha = isset($_SESSION['register-captcha-bubble']) ? $_SESSION['register-captcha-bubble'] : '';

if ($_SESSION['register-captcha-bubble'] != strtolower($response) || empty($captcha)) {
        $error4 = true;
    }
	



?>	 <form id="change-password" method="post" action="">
	  <script>
function refreshCaptcha(){
	var img = document.images['captcha'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>

	<?php if($error4) echo '<div class="alert alert-warning">
								<strong>Attenzione:</strong> Codice di sicurezza non valido! '.$_SESSION['register-captcha-bubble'].' e '.$response.'
								</div>';?>
	<div id="register-fieldset-captcha" class="field field-captcha">
           <b>Digita qui sotto il codice di sicurezza.</b>
           <!--     <input type="text" name="captchaResponse" id="recaptcha_response_field" value="" autocomplete="off" class="text-field"/> -->
				<input type="text" name="captchaResponse" id="recaptcha_response_field" value="" autocomplete="off" class="form-control" placeholder="Codice">
            <br>

		<div id="recaptcha_image"><img id="captcha" src="./captcha/captcha.php?rand=<?php echo rand(); ?>" width="300" height="60"></div>
		<p><a href="javascript:refreshCaptcha();">Prova ad usare altre parole</a></p>
            </div>

			</br>
			
				   <div style="overflow: hidden">
				   <!-- <input type="submit" id="next" value="Cambia" /> -->
             	<input class="btn btn-success btn-block" type="submit" id="next" value="Segnala" />
		
            </div>
			
			
			</form>