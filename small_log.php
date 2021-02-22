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

  //Gestione visibilità nominativo
  $visibility = isset($_POST['Visibility']) ? $input->EscapeString($_POST['Visibility']) : 1;

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



  /*if($visibility != 'agree' ){
      $error7 = true;
  }*///WORK ON IT
  if(!$error1 && !$error2 && !$error3 && !$error4 && !$error5 && !$error6 && !$error7 ){
    mysql_query("INSERT INTO city_report (name,surname,phone,email,home_address,report_address,report_type,report_title,report_desc,report_insertdate,status,visibility) VALUES ('".$currentname."','".$currentsurname."','".$currentphone."','".$currentemail."','".$currentaddresshome."','".$reportaddress."','".$reporttype."','".$reporttitle."','".$reportdesc."','".date('d/m/Y H:i:s')."','1','".$visibility."')") or die(mysql_error());
    //$input->systemNotify($reporttitle, $reportdesc, "report", date('d/m/Y H:i:s'), $currentname, $currentsurname, $reportaddress);
    //$input->systemNotify("Modifica indirizzo email", "Hai modificato lindirizzo email associata al tuo account", "account", date('d/m/Y H:i:s'), "Disabled", "Disabled", "Disabled");

    //$input->SendMail("lucapinta@live.it", date('d/m/Y H:i:s'), false);

    $ok = true;
      echo '<meta http-equiv="refresh" content="0; url=#ok" />';
  } else echo '<meta content="0; url=#error" />';
}

include('gui/header.php');

						function isMobile(){
							$array_mobile = array(
										'iphone',
										'ipod',
										'ipad',
										'android',
										'blackberry',
										'opera mobi',
										'windows ce',
										'windows phone os',
										'symbian'
										);
							$UA = isset($_SERVER['HTTP_USER_AGENT']) ? (string) $_SERVER['HTTP_USER_AGENT'] : '';
							$regex = "/(" . implode("|", $array_mobile) . ")/i";
							return preg_match($regex, $UA);
						}
						
						if(!isMobile()){
							
						}
?>



      </nav>
      <div class="ms-hero ms-hero-material">
        <span class="ms-hero-bg"></span>
        <div class="container">
          <div class="col-lg-6 col-md-7">
            <div id="carousel-hero" class="carousel slide carousel-fade" data-ride="carousel" data-interval="8000">
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <div class="carousel-caption">
                    <div class="ms-hero-material-text-container">
                      <header class="ms-hero-material-title animated slideInLeft animation-delay-5">
                        <h1 class="animated fadeInLeft animation-delay-15 font-smoothing">Piattaforma
                          <strong>segnalazioni</strong></h1>
                        <h2 class="animated fadeInLeft animation-delay-18">Inviaci la tua segnalazione di disservizio.</h2>
                      </header>
                      <ul class="ms-hero-material-list">
                        <li class="">
                          <div class="ms-list-icon animated zoomInUp animation-delay-18">
                            <span class="ms-icon ms-icon-circle ms-icon-xlg color-warning shadow-3dp">
                              <i class="zmdi zmdi-flash"></i>
                            </span>
                          </div>
                          <div class="ms-list-text animated fadeInRight animation-delay-19">Velocizza gli interventi di manutenzione inviandoci prontamente la segnalazione di disservizio.</div>
                        </li>
                        <li class="">
                          <div class="ms-list-icon animated zoomInUp animation-delay-20">
                            <span class="ms-icon ms-icon-circle ms-icon-xlg color-success shadow-3dp">
                              <i class="zmdi zmdi-bike"></i>
                            </span>
                          </div>
                          <div class="ms-list-text animated fadeInRight animation-delay-21">Contribuisci ad abbassare gli sprechi del Comune segnalandoci i punti critici.</div>
                        </li>
                        <li class="">
                          <div class="ms-list-icon animated zoomInUp animation-delay-22">
                            <span class="ms-icon ms-icon-circle ms-icon-xlg color-danger shadow-3dp">
                              <i class="zmdi zmdi-album"></i>
                            </span>
                          </div>
                          <div class="ms-list-text animated fadeInRight animation-delay-23">Segui il processo di risoluzione degli interventi in tempo reale.</div>
                        </li>
                      </ul>
                      <div class="ms-hero-material-buttons text-right">
                        <div class="ms-hero-material-buttons text-right">
                          <a href="#segnala" class="btn btn-warning btn-raised animated fadeInLeft animation-delay-24 mr-2">
                            <i class="zmdi zmdi-settings"></i> Segnala</a>
                          <a href="#" class="btn btn-success btn-raised animated fadeInRight animation-delay-24">
                            <i class="zmdi zmdi-download"></i> Segnalazioni</a>
                        </div>
                      </div>
                        
                        
                        
                    </div>
                    <!-- ms-hero-material-text-container -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-5">
            <div class="ms-hero-img animated zoomInUp animation-delay-30">
              <img src="assets/img/demo/mock-imac-material2.png" alt="" class="img-responsive">
              <div id="carousel-hero-img" class="carousel carousel-fade slide" data-ride="carousel" data-interval="5000">
                <!-- Indicators -->
                <ol class="carousel-indicators carousel-indicators-hero-img">
                  <li data-target="#carousel-hero-img" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-hero-img" data-slide-to="1"></li>
                  <li data-target="#carousel-hero-img" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="ms-hero-img-slider item active">
                    <img src="assets/img/demo/hero1.png" alt="" class="img-responsive"> </div>
                  <div class="ms-hero-img-slider item">
                    <img src="assets/img/demo/hero3.png" alt="" class="img-responsive"> </div>
                  <div class="ms-hero-img-slider item">
                    <img src="assets/img/demo/hero2.png" alt="" class="img-responsive"> </div>
                </div>
              </div>
            </div>
          </div>            
        </div>
        <!-- container -->
      </div>

<div id="error"></div>
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

?>

<?php if($ok == true){ ?>
    <div id="ok"></div>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>La tua segnalazione è stata inoltrata con successo!</strong>
    </div>

<?php } ?>
        <div id="segnala"></div>
        <br><br><br><br>
        
        <div class="container">
        <div class="row">
          
            <div class="card card-primary animated fadeInUp animation-delay-7">
              <div class="ms-hero-bg-primary ms-hero-img-mountain">
                <h2 class="text-center no-m pt-4 pb-4 color-white index-1">Compila segnalazione</h2>
              </div>
   
              <div class="card-block">
                    <form  method="post" action="" class="form-horizontal">
                  <fieldset>
                      <input type="hidden" name="next" value="1" />
                    <div class="form-group">
                      <label for="inputName" class="col-md-2 control-label">Nome*</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="inputName" name="Name" placeholder="Scrivi il tuo nome..."> </div>
                    </div>
                      
                    <div class="form-group">
                      <label for="inputName" class="col-md-2 control-label">Cognome*</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="inputName" name="Surname" placeholder="Scrivi il tuo cognome..."> </div>
                    </div>  
                      
                    <div class="form-group">
                      <label for="inputName" class="col-md-2 control-label">N. Telefono</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="inputName" name="CellPhoneNumber" placeholder="Scrivi il tuo numero di telefono..."> </div>
                    </div>  
                    
                    <div class="form-group">
                      <label for="inputEmail" class="col-md-2 control-label">Email</label>
                      <div class="col-md-9">
                        <input type="email" class="form-control" id="inputEmail" name="EmailAddress" placeholder="Scrivi il tuo indirizzo email"> </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputName" class="col-md-2 control-label">Residenza</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="inputName" name="AddressHome" placeholder="Scrivi il tuo indirizzo di residenza..."> </div>
                    </div>
                      
                    <div class="form-group">
                      <label for="inputName" class="col-md-2 control-label">Indirizzo segnalazione*</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="inputName" name="ReportAddress" placeholder="Scrivi l'indirizzo della segnalazione..."> </div>
                    </div>
                      
                    <div class="form-group">
                        <label for="select111" class="col-md-2 control-label">Tipologia di problema*</label>
                        <div class="col-md-10">
                          <select id="select111" name="ReportType" class="form-control selectpicker">
                            <option value="null"> </option>
                            <?php
                              $sql = mysql_query("SELECT * FROM typology ORDER BY id DESC");

                            while($row = mysql_fetch_assoc($sql)){

                              echo ' <option value="'.$row['id'].'">'.$row['content'].'</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>  
                      
                    <div class="form-group">
                      <label for="inputSubject" class="col-md-2 control-label">Oggetto segnalazione*</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="inputSubject" name="ReportTitle" placeholder="Scrivi il titolo della segnalazione..."> </div>
                    </div>
                      
                    <div class="form-group">
                      <label for="textArea" class="col-md-2 control-label">Descrizione</label>
                      <div class="col-md-9">
                        <textarea class="form-control" rows="5" id="textArea" name="ReportDesc" placeholder="Scrivi una descrizione per la segnalazione..."></textarea>
                      </div>
                    </div>
                      
                  
                    <br><p class="well well-lg">Le informazioni fornite verranno utilizzati esclusivamente ai fini di evasione della richiesta, rispettando il trattamento dei dati personali decretato dal titolo III della parte I del D.Lgs. 196/03 ("Codice della privacy").</p> 
                      
                      
                    <div class="form-group">
                      <div class="col-md-9">
                        
                          <div class="togglebutton">
                            <label>
                                <input type="checkbox" name="Visibility" value="1" checked> Nome segnalatore pubblico </label>
                          </div>
                          
                      </div>
                    </div>      
                      
                <br>
                      
                  <div class="form-group">
                      <div class="col-md-9 col-md-offset-2">
                          <input class="btn btn-raised btn-primary" type="submit" id="next" value="Invia segnalazione" />
                      </div>
                  </div>
                  </fieldset>
                </form>
              </div>
            </div>
        </div>
      </div>
        
<!--    <div class="material-background"></div>-->
      <div class="container">
        <div class="card card-block card-block-big">
          <h3 class="text-center fw-500 mb-6">Segnalazioni recenti</h3>
          <ul class="ms-timeline-left">
              <?php
              $sql = mysql_query("SELECT * FROM city_report WHERE hide LIKE 0 ORDER BY id DESC LIMIT 3");

              while($row = mysql_fetch_assoc($sql)){

                if($row['visibility'] == 0) $longname = "Utente ignoto";
                else $longname = ''.$row['surname'].' '.$row['name'].'';

                  echo '
                <li class="ms-timeline-left-item wow fadeInUp">
              <h4>'.$longname.'</h4>
              <div class="ms-timeline-left-left">
                <h4 class="color-primary">'.$input->cutString($row['report_title'],35).'</h4>
                <time class="ms-timeline-left-time">'.$row['report_insertdate'].'</time>
              </div>
              <span class="ms-timeline-left-city">'.$row['report_address'].'</span>
              <p>'.$input->cutString($row['report_desc'],60).'</p>
            </li>';

              }
              ?>

          </ul>
        </div>
      </div>
        
    <a href="segnalazioni" class="btn btn-block btn-raised btn-primary"><i class="fa fa-flag"></i>Visualizza tutte le segnalazioni</a>
        
        <br>
        
      <footer class="ms-footer">
        <div class="container">
          <p>&copy; Piattaforma segnalazioni 2017 | Comune di Alcamo | <a href="#">Credits</a></p>
        </div>
      </footer>
      <div class="btn-back-top">
        <a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised ">
          <i class="zmdi zmdi-long-arrow-up"></i>
        </a>
      </div>
    </div>
    <!-- sb-site-container -->
    <div class="ms-slidebar sb-slidebar sb-left sb-style-overlay" id="ms-slidebar">
      <div class="sb-slidebar-container">
        <header class="ms-slidebar-header">
          <div class="ms-slidebar-login">
            <a href="javascript:void(0)" class="withripple">
              <i class="zmdi zmdi-account"></i> Accedi</a>
          </div>
          <div class="ms-slidebar-title">
            <form class="search-form">
              <input id="search-box-slidebar" type="text" class="search-input" placeholder="Cerca segnalazioni..." name="q" />
              <label for="search-box-slidebar">
                <i class="zmdi zmdi-search"></i>
              </label>
            </form>
            <div class="ms-slidebar-t">
              <span class="ms-logo ms-logo-sm"><i class="glyphicon glyphicon-cog fa-spin"></i></span>
              <h3>Comune di 
                <span>Alcamo</span>
              </h3>
            </div>
          </div>
        </header>
        <ul class="ms-slidebar-menu" id="slidebar-menu" role="tablist" aria-multiselectable="true">
          <li>
            <a href="index.php">Invia segnalazione</a>
          </li>
          <li>
            <a href="segnalazioni.php">Segnalazioni</a>
          </li>
          <li>
            <a href="come-funziona.php">Come funziona?</a>
          </li>
        </ul>
        <div class="ms-slidebar-social ms-slidebar-block">
          <h4 class="ms-slidebar-block-title">Link del Comune</h4>
          <div class="ms-slidebar-social">
            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-facebook">
              <i class="zmdi zmdi-facebook"></i>
              <span class="badge badge-pink"></span>
              <div class="ripple-container"></div>
            </a>
            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-twitter">
              <i class="zmdi zmdi-twitter"></i>
              <span class="badge badge-pink"></span>
              <div class="ripple-container"></div>
            </a>
            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-google">
              <i class="zmdi zmdi-google"></i>
              <div class="ripple-container"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/index.js"></script>
  </body>
</html>