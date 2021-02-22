<?php  

/**************************************************
     #       #
    # #      #
   #   #     #
  #######    #
 #       #   # 
#         #  #######

TO DO:
-Selettori su Google Maps

INDEFINITO (?):
-Inserimento quartieri (statistiche) 

#UTILIZZO FILTRO PAROLE
-Funzione filter_format per censurare parole
-Da connettere al database per listato censura gestibile da admin

#nl2br(utf8_decode( -- AGGIUNGERE AD OGNI TESTO DB CON CARATTERI SPECIALI

#SISTEMARE GRAFICA ERRORE LOGIN ADMIN

#MANUTENZIONE

#MESSAGGI PUBBLICI

#NEWSLETTERER

#INVIO STATO SEGNALAZIONE MAIL SEGNALATORE (SE PRESENTE)

#INVIO MESSAGGIO TELEFONO (VEDERE ONLINE) - SERV. PAGAMENTO

#REFRESH SEGNALAZIONE (ADMIN TOOL)

#NOTIFICHE NUOVE SEGNALAZIONI (NON VISTE - LIMIT 4/6)

#LISTATO SEGNALAZIONI NON VISTE

#SEGNALAZIONI APERTE TROPPO TEMPO

***************************************************/

include('core.php');


//## INIZIALIZZAZIONE STATI D'ERRORE E RISPOSTE AI MODULI
$resp = null;
$error1 = false;
$error2 = false;
$error3 = false;
$error4 = false;
$error5 = false;
$error6 = false;
$error7 = false;
$error8 = false;
$error9 = false;
$ok = false;
$guiset = 1; 


if(isset($_POST["next"]) && $_POST["next"] == 1){
	
	//### Gestione informazioni segnalatore
	//Obbligate
	$currentname = isset($_POST['Name']) ? $input->EscapeString($_POST['Name']) : '';
	$currentsurname = isset($_POST['Surname']) ? $input->EscapeString($_POST['Surname']) : '';
	$currentaddresshome = isset($_POST['AddressHome']) ? $input->EscapeString($_POST['AddressHome']) : '';
	//Non obbligate
	$currentemail = isset($_POST['EmailAddress']) ? $input->EscapeString($_POST['EmailAddress']) : '';
	$currentphone = isset($_POST['CellPhoneNumber']) ? $input->EscapeString($_POST['CellPhoneNumber']) : '';
	
	//Gestione informazioni segnalazione - obbligate
	$reportaddress = isset($_POST['ReportAddress']) ? $input->EscapeString($_POST['ReportAddress']) : '';
	$reporttitle = isset($_POST['ReportTitle']) ? $input->EscapeString($_POST['ReportTitle']) : '';
	$reporttype = isset($_POST['ReportType']) ? $input->EscapeString($_POST['ReportType']) : '';
	$reportdesc = isset($_POST['ReportDesc']) ? $input->EscapeString($_POST['ReportDesc']) : '';
	
	//Gestione disposizioni legislative inerenti alla privacy - da sviluppare
	$rulesagree = isset($_POST['rulesagree']) ? $input->EscapeString($_POST['rulesagree']) : 1;
	$visibility = isset($_POST['visibility']) ? $input->EscapeString($_POST['visibility']) : 1;
	
	//Gestione controllo di sicurezza - obbligato
	$challange = isset($_POST['recaptcha_challenge_field']) ? $input->EscapeString($_POST['recaptcha_challenge_field']) : '';
	$response = isset($_POST['recaptcha_response_field']) ? $input->EscapeString($_POST['recaptcha_response_field']) : '';
	
	$response = isset($_POST['captchaResponse']) ? $_POST['captchaResponse'] : '';
	$captcha = isset($_SESSION['register-captcha-bubble']) ? $_SESSION['register-captcha-bubble'] : '';
	

	
	
	//## Determinazione stati d'errore
	//Nome non valido
	if($currentname == '' || $currentname == 'sconosciuto') $error1 = true;
	//Cognome non valido
	if($currentsurname == '' || $currentsurname == 'sconosciuto' || $currentsurname == $currentname) $error2 = true;
	//Indirizzo di residenza non valido
	if($currentaddresshome == '') $error3 = true;
	//Indirizzo segnalazione non valido
	if($reportaddress == '' ) $error4 = true;
	//Tipologia segnalazione non valida
	if($reporttype == 'null') $error5 = true;
	//Titolo segnalazione non valida
	if($reporttitle == '') $error6 = true;
	//Descrizione segnalazione non valida
	if($reportdesc == '') $error7 = true; // CONFIGURARE ERRORI SOTTOSTANTI!!!
	//Titolo segnalazione non valido
	else if($rulesagree != 'agree') $error8 = true;
	//Codice di sicurezza non valido
	else if ($_SESSION['register-captcha-bubble'] != strtolower($response) || empty($captcha)) $error9 = true;
    
	
	/*if($visibility != 'agree' ){
		$error7 = true;
	}*///WORK ON IT
	if(!$error1 && !$error2 && !$error3 && !$error4 && !$error5 && !$error6 && !$error7 && !$error8 && !$error9){
		mysql_query("INSERT INTO city_report (name,surname,phone,email,home_address,report_address,report_type,report_title,report_desc,report_insertdate,status,visibility) VALUES ('".$currentname."','".$currentsurname."','".$currentphone."','".$currentemail."','".$currentaddresshome."','".$reportaddress."','".$reporttype."','".$reporttitle."','".$reportdesc."','".date('d/m/Y H:i:s')."','1','".$visibility."')") or die(mysql_error());
		$input->systemNotify($reporttitle, $reportdesc, "report", date('d/m/Y H:i:s'), $currentname, $currentsurname, $reportaddress);
		$input->systemNotify("Modifica indirizzo email", "Hai modificato lindirizzo email associata al tuo account", "account", date('d/m/Y H:i:s'), "Disabled", "Disabled", "Disabled");
		
		//$input->SendMail("lucapinta@live.it", date('d/m/Y H:i:s'), false);
		
		$ok = true;
	}
}

include('gui/header.php');


?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


	
 <div class="container">
  
  
   <?php if($maintenance == 1){ ?>
   
	<div class="alert alert-danger">
          <strong>ATTENZIONE: </strong> Il servizio è attualmente in manutenzione! Al fine di evitare perdita di dati è <b>necessario</b> abbandonare l'utilizzo del servizio.<br>
										Ci scusiamo per il disagio.
        </div>

   
   <?php } ?>	
  
 <script>

function refreshCaptcha(){
	var img = document.images['captcha'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
  
                <?php
				
				
					//Cognome non valido

					if($error1)
						echo '<div class="alert alert-danger">
									<strong>Errore: </strong> Nome non valido!
								</div>';
					if($error2)
						echo '<div class="alert alert-danger">
									<strong>Errore: </strong> Cognome non valido!
								</div>';
					if($error3)
						echo '<div class="alert alert-danger">
									<strong>Errore: </strong> Indirizzo di residenza non valido!
								</div>';
					if($error4)
						echo '<div class="alert alert-danger">
									<strong>Attenzione: </strong> Indirizzo segnalazione non valido!
								</div>';
					if($error5)
						echo '<div class="alert alert-danger">
									<strong>Errore: </strong> Tipologia segnalazione non valida!
								</div>';
					
					if($error6)
						echo '<div class="alert alert-danger">
								<strong>Attenzione:</strong> Titolo segnalazione non valido!
								</div>';
								
					if($error7)
						echo '<div class="alert alert-danger">
									<strong>Errore: </strong> Descrizione segnalazione valida!
								</div>';
					else if($error8)
						echo '<div class="alert alert-danger">
									<strong>Attenzione: </strong> E\' necessario accettare le <b>disposizioni di legge</b> al fine di inviare la segnalazione!
								</div>';
					else if($error9)
						echo '<div class="alert alert-danger">
									<strong>Attenzione: </strong> Codice di sicurezza non valido!
								</div>';
				?>
				
  <?php if($ok == true){ ?>
   <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>La tua segnalazione è stata inoltrata con successo!</strong> 
        </div>
			
		<?php } ?>
<div class="row">
    <div class="col-sm-12 col-lg-12">
        <h2>Dati segnalazione</h2>
		   <form  method="post" action="">
		   <!-- 		   <form id="change-password" method="post" action="">-->

        <div class="row">
          <div class="col-sm-4 col-lg-3">
            <p class="lead text-muted">1. Dati segnalatore</p>
          
			  <input type="hidden" name="next" value="1" />
			   <input type="text" id="name" name="Name" class="form-control" placeholder="Nome*"> <!--  <input type="password" id="current-password" size="35" name="currentPassword" value="" class="password-field" maxlength="32"/>-->
			<br>
			
            <input type="text" id="surname" name="Surname" class="form-control" placeholder="Cognome*">
            <br>
	
			
			<input type="text" id="cellphonenumber" name="CellPhoneNumber" class="form-control" placeholder="Telefono/Cellulare">
            <br>
			
			<input type="text" id="emailaddress" name="EmailAddress" class="form-control" placeholder="Indirizzo email">
            <br>
			
			<input type="text" id="addresshome" name="AddressHome" class="form-control" placeholder="Indirizzo residenza*">
            <br>
			
		
            
          </div>
          <div class="col-sm-4 col-lg-3">
		  
		  <p class="lead text-muted">2. Dettagli segnalazione</p>
            <input type="text" id="reportaddress" name="ReportAddress" class="form-control" placeholder="Indirizzo segnalazione*">
            <br>
			
              <select class="form-control" name="ReportType">
              <option value="null">Tipologia segnalazione</option>
                  <?php
                  $input->logSession($user->row['mail'], "Visualizza", "Visualizzazione elenco generale segnalazioni", date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);
                  $sql = mysql_query("SELECT * FROM typology ORDER BY id DESC");

                  while($row = mysql_fetch_assoc($sql)){

                      echo ' <option value="'.$row['id'].'">'.$row['content'].'</option>';
				}
                  ?>
              <option value="1">Urbanistica</option>
              <option value="2">Stradale</option>
              <option value="3">Pedonale</option>
              <option value="4">Sanitaria</option>
            </select>
            <br>
			
			<input type="text" id="reporttitle" name="ReportTitle" class="form-control" placeholder="Titolo segnalazione*">
            <br>
			
			<textarea class="form-control" name="ReportDesc" placeholder="Descrizione segnalazione*" rows="4"></textarea>
            <br>
			
                   
          </div>
          <div class="col-sm-4 col-lg-3">
            <p class="lead text-muted">3. Disposizioni di legge</p>
            <div class="radio">
              <label>
                <input type="radio" name="rulesagree" id="optionsRadios1" value="agree">
                Il titolo III della parte I del D.Lgs. 196/03 ("Codice della privacy") detta le regole generali per il trattamento dei dati.
              </label>
            </div>
			
			  <div class="radio">
              <label>
                <input type="radio" name="visibility" id="optionsRadios1" value="0">
                Se ritieni necessario non visualizzare il nominativo nella richiesta resa pubblica è possibile oscurarlo. Tuttavia al fine della segnalazione l'Amministrazione recepirà tali dati come sensibili e dunque non divulgabili.
              </label>
            </div>
           
          </div>
          <div class="clearfix visible-sm visible-md"></div>
          <div class="col-sm-6 col-lg-3">
            <p class="lead text-muted">4. Controllo di sicurezza</p>
			
			
			
			<div id="register-fieldset-captcha" class="field field-captcha">
           
           <!--     <input type="text" name="captchaResponse" id="recaptcha_response_field" value="" autocomplete="off" class="text-field"/> -->
			

		<div id="recaptcha_image"><img id="captcha" src="<?php echo PATH; ?>/captcha/captcha.php?rand=<?php echo rand(); ?>" width="300" height="60"></div>
		<p><a href="javascript:refreshCaptcha();">Prova ad usare altre parole</a></p>
		
			<b>Digita qui sotto il codice di sicurezza.</b>
			<input type="text" name="captchaResponse" id="recaptcha_response_field" value="" autocomplete="off" class="form-control" placeholder="Codice">
           
            </div>

			</br>
		
					 <div class="panel-body">
                            <!-- Button trigger modal -->
							<input class="btn btn-primary btn-block" value="Segnala" data-toggle="modal" data-target="#myModal"  />
                            <!-- <button class="btn btn-primary btn-block" id="not" type="" > 
                                Segnala
                            </button>-->
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Conferma Segnalazione</h4>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											
									
											<input class="btn btn-primary btn-success" type="submit" id="next" value="Conferma" />
											
											
                                        
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                        <!-- .panel-body -->
		
          </div>
       
        </div>
   </form>   


   
      <!-- Toggle -->
      <!-- Toogle are the same as accordion by without data-parent attribute. It allows to have all boxes opened at the same time. -->
	  
	  	  <p class="lead text-muted">Informazioni</p>
            <div class="tabbable tabs-left">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab21" data-toggle="tab">Segnalazione</a></li>
                <li><a href="#tab22" data-toggle="tab">Section 2</a></li>
				<li><a href="#tab22" data-toggle="tab">Section 2</a></li>
				<li><a href="#tab22" data-toggle="tab">Section 2</a></li>
				<li><a href="#tab22" data-toggle="tab">Section 2</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab21">
                
<h3>Paragraph</h3>
          <p>Lorem ipsum dolor sit amet, <mark>a mark here</mark> adipisicing elit. Atque, iusto, minus sequi natus nesciunt rerum tenetur corrupti autem officiis fugiat expedita laudantium ea aspernatur</p>
          <p><b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, velit, facere eos molestias rerum nesciunt consequatur voluptate minus quod</b></p>
          <p><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, vitae, dolore, ratione, neque deleniti officia atque dignissimos porro.</i></p>
          <p><strong class="text-success">Consectetur adipisicing elit</strong>. Corrupti, aliquam, voluptates, nulla, blanditiis totam voluptatem <strong class="text-danger">voluptatum quod ipsa debitis non</strong> ab odio natus.</p>
        

				</div>
                <div class="tab-pane" id="tab22">
                  <p>Howdy, I'm in Section 2. Aenean tempor luctus sem quis euismod. Praesent nec metus eu urna tempor varius id quis mauris. Quisque interdum sollicitudin sollicitudin. </p>
                </div>
              </div>
            </div>
			
			
	  
	  
	  
	  <h3>Alcamo Social</h3>
	  
	  <div class="col-sm-6 col-lg-6">
	<div class="fb-page" data-href="https://www.facebook.com/comunedialcamo/" data-tabs="timeline" data-width="600" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/comunedialcamo/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/comunedialcamo/">Comune di Alcamo</a></blockquote></div>
	  </div>
	  
	  <div class="col-sm-6 col-lg-6">
	  
	  <a class="twitter-timeline" data-lang="it" data-width="600" data-height="500" href="https://twitter.com/comunedialcamo">Tweets by comunedialcamo</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
	  
	  </div>
          <p>Lorem ipsum dolor sit amet, <mark>a mark here</mark> adipisicing elit. Atque, iusto, minus sequi natus nesciunt rerum tenetur corrupti autem officiis fugiat expedita laudantium ea aspernatur</p>
          <p><b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, velit, facere eos molestias rerum nesciunt consequatur voluptate minus quod</b></p>
          <p><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, vitae, dolore, ratione, neque deleniti officia atque dignissimos porro.</i></p>
          <p><strong class="text-success">Consectetur adipisicing elit</strong>. Corrupti, aliquam, voluptates, nulla, blanditiis totam voluptatem <strong class="text-danger">voluptatum quod ipsa debitis non</strong> ab odio natus.</p>
        

    
  </div> <!-- /container -->

  <footer class="text-center">
    <p>&copy; Techie Skin</p>
    <div class="credits">
        <!-- 
            All the links in the footer should remain intact. 
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=Techie
        -->
        <a href="https://bootstrapmade.com/">Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>


	
	  <!-- jQuery -->
    <script src="./admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./admin/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>

    

</body>
</html>