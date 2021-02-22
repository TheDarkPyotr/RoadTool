<?php  

/**************************************************
     #       #
    # #      #
   #   #     #
  #######    #
 #       #   # 
#         #  #######
TO DO:
-Sistemare inserimento tipologia segnalazione - FATTO
-Selettori su Google Maps
-Inserimento priorità - (DA ULTIMARE IN ADMIN & FLAG GOOGLE)
-Inserimento visibilità nome -FATTO
-Controllo elementi responsive (problema intera pagina (?))
INDEFINITO:
-Inserimento quartieri (statistiche) 


#PROBLEMI IDENTIFICATI
-Impaginazione responsive design: Carousel -> NON USARE

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
	if($rulesagree != 'agree') $error8 = true;
	//Codice di sicurezza non valido
	else if ($_SESSION['register-captcha-bubble'] != strtolower($response) || empty($captcha)) $error9 = true;
    
	
	/*if($visibility != 'agree' ){
		$error7 = true;
	}*///WORK ON IT
	if(!$error1 && !$error2 && !$error3 && !$error4 && !$error5 && !$error6 && !$error7){
		//mysql_query("UPDATE accounts SET password = '".$input->HoloHash($newpsws)."' WHERE id = '".$user->row['account']."'");
		//mysql_query("UPDATE accounts SET name = '".$newpsw."' WHERE id = '".$user->row['account']."'");
		mysql_query("INSERT INTO city_report (name,surname,phone,email,home_address,report_address,report_type,report_title,report_desc,report_insertdate,status,visibility) VALUES ('".$currentname."','".$currentsurname."','".$currentphone."','".$currentemail."','".$currentaddresshome."','".$reportaddress."','".$reporttype."','".$reporttitle."','".$reportdesc."','".date('d/m/Y H:i:s')."','1','".$visibility."')") or die(mysql_error());

		//$user->Refresh($user->row['username']);
		$ok = true;
	}
}

include('gui/header.php');


?>

  <div class="container">
  
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
		   <form id="change-password" method="post" action="">

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
			
				   <div style="overflow: hidden">
				   <!-- <input type="submit" id="next" value="Cambia" /> -->
             	<input class="btn btn-success btn-block" type="submit" id="next" value="Segnala" />
		
            </div>
			
			
			</form>
			
          </div>
       
        </div>
      


   
      <!-- Toggle -->
      <!-- Toogle are the same as accordion by without data-parent attribute. It allows to have all boxes opened at the same time. -->
	  
	  <div class="col-sm-6 col-lg-6">
        <h2>Accordion</h2>
        <div class="accordion" id="accordion2">
          <div class="accordion-group">
            <div class="accordion-heading">

              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                <em class="fa fa-minus fa-fw"></em>Collapsible Group Item #1
              </a>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
              <div class="accordion-inner">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                <em class="fa fa-plus fa-fw"></em>Collapsible Group Item #2
              </a>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
              <div class="accordion-inner">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                <em class="fa fa-plus fa-fw"></em>Collapsible Group Item #3
              </a>
            </div>
            <div id="collapseThree" class="accordion-body collapse">
              <div class="accordion-inner">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
        </div>
      </div>
	  
      <div class="col-sm-6 col-lg-6">
        <h2>Toggle</h2>
        <div class="accordion" id="accordion3">
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="" href="#toggleOne">
                <em class="fa fa-minus fa-fw"></em>Toggle Box Item #1
              </a>
            </div>
            <div id="toggleOne" class="accordion-body collapse in">
              <div class="accordion-inner">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
              </div>
            </div>
          </div>
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="" href="#toggleTwo">
                <em class="fa fa-minus fa-fw"></em>Toggle Box Item #2
              </a>
            </div>
            <div id="toggleTwo" class="accordion-body collapse in">
              <div class="accordion-inner">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. 
              </div>
            </div>
          </div>
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="" href="#toggleThree">
                <em class="fa fa-plus fa-fw"></em>Toggle Box Item #3
              </a>
            </div>
            <div id="toggleThree" class="accordion-body collapse">
              <div class="accordion-inner">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>



    <div class="row">
      <!-- Modal -->
      <div class="col-sm-8 col-lg-8">
        <h2>Modal</h2>
        <div class="row">
          <div class="col-sm-4 col-lg-4">
            <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-lg">Launch modal</a>
          </div>
          <div class="col-sm-8 col-lg-8">

            <div class="modal" style="position: relative; display: block; overflow: auto">
              <div class="modal-dialog" style="padding-top: 0; width: auto">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    <p>One fine body…</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>

             <!-- sample modal content -->
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                  </div>
                  <div class="modal-body">
                    <h4>Text in a modal</h4>
                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>

                    <h4>Popover in a modal</h4>
                    <p>This <a href="#" role="button" class="btn btn-default" data-toggle="popover" title="A Title" data-content="And here's some amazing content. It's very engaging. right?">button</a> should trigger a popover on click.</p>

                    <h4>Tooltips in a modal</h4>
                    <p><a href="#" data-toggle="tooltip" title="Tooltip">This link</a> and <a href="#" data-toggle="tooltip" title="Tooltip">that link</a> should have tooltips on hover.</p>

                    <hr>

                    <h4>Overflowing text to show scroll behavior</h4>
                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div>
        </div>
      </div>
      <!-- Typeahead -->
      <div class="col-sm-4 col-lg-4">
        <h2>Typeahead</h2>
        <input type="text" class="form-control" data-provide="typeahead">
      </div>      
    </div>
    <h1>Typography <small>A small text</small></h1>
    <hr>
      <!-- Headings & Paragraph Copy -->
      <div class="row">
        <div class="col-sm-6 col-lg-3" data-effect="slide-left">
            <h1>h1. Heading 1</h1>
            <h2>h2. Heading 2</h2>
            <h3>h3. Heading 3</h3>
            <h4>h4. Heading 4</h4>
            <h5>h5. Heading 5</h5>
            <h6>h6. Heading 6</h6>
        </div>
        <div class="col-sm-6 col-lg-5" data-effect="slide-bottom">
          <h3>Paragraph</h3>
          <p>Lorem ipsum dolor sit amet, <mark>a mark here</mark> adipisicing elit. Atque, iusto, minus sequi natus nesciunt rerum tenetur corrupti autem officiis fugiat expedita laudantium ea aspernatur</p>
          <p><b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, velit, facere eos molestias rerum nesciunt consequatur voluptate minus quod</b></p>
          <p><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, vitae, dolore, ratione, neque deleniti officia atque dignissimos porro.</i></p>
          <p><strong class="text-success">Consectetur adipisicing elit</strong>. Corrupti, aliquam, voluptates, nulla, blanditiis totam voluptatem <strong class="text-danger">voluptatum quod ipsa debitis non</strong> ab odio natus.</p>
        </div>
        <div class="col-sm-12 col-lg-4" data-effect="slide-right">
          <h3>Lead text</h3>
          <p class="lead">Quisquam, dolorum, iusto iste voluptates rerum ea quas expedita. </p>
          <h3>Small text</h3>
          <p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et ullam libero repellendus voluptatibus obcaecati magni id nulla dolores nesciunt. Quasi quisquam facilis nobis ullam rem deleniti vero consectetur earum.</small></p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-6 col-lg-6" data-effect="slide-left">
          <blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
          </blockquote>
        </div>
        <div class="col-sm-6 col-lg-6">
          <blockquote class="pull-right" data-effect="slide-right">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
          </blockquote>
        </div>
      </div>
	  
      <!-- Panels -->

      <h2>Panels</h2>
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="panel panel-primary" id="panels" data-effect="helix">
            <div class="panel-heading">This is a header
            </div>
            <div class="panel-body">
              <p>This is a panel paragraph</p>
              <p>This is a panel paragraph</p>
            </div>
            <div class="panel-footer">This is a footer
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="panel panel-info" data-effect="helix">
            <div class="panel-heading">This is a header
            </div>
            <div class="panel-body">
              <p>This is a panel paragraph</p>
              <p>This is a panel paragraph</p>
            </div>
            <div class="panel-footer">This is a footer
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="panel panel-danger" data-effect="helix">
            <div class="panel-heading">This is a header
            </div>
            <div class="panel-body">
              <p>This is a panel paragraph</p>
              <p>This is a panel paragraph</p>
            </div>
            <div class="panel-footer">This is a footer
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="panel panel-warning" data-effect="helix">
            <div class="panel-heading">This is a header
            </div>
            <div class="panel-body">
              <p>This is a panel paragraph</p>
              <p>This is a panel paragraph</p>
            </div>
            <div class="panel-footer">This is a footer
            </div>
          </div>
        </div>
      </div>  

      <!-- List Groups -->
    
      <h2>List Groups</h2>
      <div class="row">
        <div class="col-sm-6 col-lg-4">
            <ul class="list-group">
              <li class="list-group-item">Cras justo odio</li>
              <li class="list-group-item">Dapibus ac facilisis in</li>
              <li class="list-group-item">Morbi leo risus</li>
              <li class="list-group-item">Porta ac consectetur ac</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="list-group">
              <a href="#" class="list-group-item active"> <span class="badge">100</span> Cras justo odio</a>
              <a href="#" class="list-group-item"><span class="badge">21</span>Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item"><span class="badge">22</span>Morbi leo risus</a>
              <a href="#" class="list-group-item"><span class="badge">51</span>Porta ac consectetur ac</a>
              <a href="#" class="list-group-item"><span class="badge">99</span>Vestibulum at eros</a>
            </div>
        </div>
        <div class="clearfix visible-md visible-sm"></div>
        <div class="col-sm-12 col-lg-4">
            <div class="list-group">
              <a href="#" class="list-group-item active">
                <h4 class="list-group-item-heading">List group item heading</h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">List group item heading</h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">List group item heading</h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </a>
            </div>
        </div>
      </div>

    
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

  <!-- Main Scripts-->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  
    <!-- Bootstrap 3 has typeahead optionally -->
    <script src="assets/js/typeahead.min.js"></script>
    

</body>
</html>