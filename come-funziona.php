<?php
include('core.php');
$guiset = 3;

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
include('gui/header.php');
?>

      </nav>
      
        <div class="ms-hero-page-override ms-hero-img-city ms-hero-bg-dark-light">
        <div class="container">
          <div class="text-center">
            <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">Come funziona</h1>
            <p class="lead lead-lg color-white text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">Leggi le istruzioni della
              <span class="color-success">piattaforma segnalazioni</span>.</p>
          </div>
        </div>
      </div>
        
        
        
        <div class="container">
        <h1 class="right-line">Istruzioni</h1>
        <div class="row">
          <div class="col-sm-6">
            <ol class="service-list list-unstyled">
              <li>Compila la richiesta inserendo i tuoi dati anagrafici e quelli relativi alla segnalazione. I campi che possiedono l'asterisco (*) sono obbligatori. Dopo aver cliccato su "Invia segnalazione" verrà chiesto di verificare la correttezza dei dati inseriti.</li>
              <li>La segnalazione che hai effettuato verrà presa in carico dagli uffici comunali addetti alla specifica problematica. Gli uffici si occuperanno di seguire lo stato della richiesta e di aggiornarne pubblicamente il suo stato in modo da comunicarne il processo di risoluzione al segnalatore e a tutti i cittadini.</li>
              <li>Attraverso l'elenco delle segnalazioni i cittadini potranno essere informati riguardo a quelle che sono le richieste che il Comune sta attualmente prendendo in carico e quante richieste sono ancora da effettuare prima della risoluzione di  una specifica problematica in modo da garantire la massima trasparenza e il rispetto cronologico delle priorità.</li>
            </ol>
          </div>
          <div class="col-md-6">
            <div class="card wow zoomInUp animation-delay-2">
              <div class="ms-hero-bg-success ms-hero-img-coffee">
                <h3 class="color-white index-1 text-center pb-4 pt-4 no-mb">Domande frequenti</h3>
              </div>
              <div class="panel-group ms-collapse no-margin" id="accordion3" role="tablist" aria-multiselectable="true">
                <div class="panel panel-success">
                  <div class="panel-heading" role="tab" id="headingOne3">
                    <h4 class="panel-title ms-rotate-icon">
                      <a class="withripple" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
                        <i class="zmdi zmdi-attachment-alt"></i> Ordine di risoluzione </a>
                    </h4>
                  </div>
                  <div id="collapseOne3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne3">
                    <div class="panel-body">
                      <p>Questa piattaforma garantisce il pieno rispetto della risoluzione per ordine di tempo delle problematiche affrontate dai cittadini, senza interferenze di alcun tipo sulla tempistica di risoluzione. Se la richiesta verrà riconosciuta come <strong>prioritaria</strong> (per ragioni di sicurezza o di tempi di risoluzione ristretti tali da non poter seguire l'iter cronologico delle altre segnalazioni) questa verrà messa in coda alle richieste prioritarie che avranno massima esigenza di risoluzione e verranno affrontate e risolte nel più breve tempo possibile.</p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-success">
                  <div class="panel-heading" role="tab" id="headingTwo3">
                    <h4 class="panel-title ms-rotate-icon">
                      <a class="collapsed withripple" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseTwo3" aria-expanded="false" aria-controls="collapseTwo3">
                        <i class="zmdi zmdi-attachment-alt"></i> Visibilità segnalatore </a>
                    </h4>
                  </div>
                  <div id="collapseTwo3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo3">
                    <div class="panel-body">
                      <p>È possibile rendere non visibile il nome del segnalatore nell'elenco pubblico delle segnalazioni commutando, in fase di invio della segnalazione, il campo "Nome segnalatore pubblico".</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include('gui/footer.php'); ?>