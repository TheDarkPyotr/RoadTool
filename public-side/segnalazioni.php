<?php
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


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>Segnalazioni | Comune di Alcamo</title>
    <meta name="description" content="Segnala gli inteventi di piccola manutenzione">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="assets/css/preload.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/style.green-500.min.css" />
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="ms-preload" class="ms-preload">
      <div id="status">
        <div class="spinner">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>
      </div>
    </div>
    <div class="sb-site-container">
      <!-- Modal -->
      <div class="modal modal-primary" id="ms-account-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog animated zoomIn animated-3x" role="document">
          <div class="modal-content">
            <div class="modal-header shadow-2dp no-pb">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  <i class="zmdi zmdi-close"></i>
                </span>
              </button>
              <div class="modal-title text-center">
                <span class="ms-logo ms-logo-white ms-logo-sm mr-1"><i class="glyphicon glyphicon-cog fa-spin"></i></span>
                <h3 class="no-m ms-site-title">Comune di 
                  <span>Alcamo</span>
                </h3>
              </div>
              <div class="modal-header-tabs">
                <ul class="nav nav-tabs nav-tabs-full nav-tabs-3 nav-tabs-primary" role="tablist">
                  <li role="presentation" class="active">
                    <a href="#ms-login-tab" aria-controls="ms-login-tab" role="tab" data-toggle="tab" class="withoutripple">
                      <i class="zmdi zmdi-account"></i> Accedi</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="modal-body">
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="ms-login-tab">
                  <form autocomplete="off">
                    <fieldset>
                      <div class="form-group label-floating">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-account"></i>
                          </span>
                          <label class="control-label" for="ms-form-user">Username</label>
                          <input type="text" id="ms-form-user" class="form-control"> </div>
                      </div>
                      <div class="form-group label-floating">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-lock"></i>
                          </span>
                          <label class="control-label" for="ms-form-pass">Password</label>
                          <input type="password" id="ms-form-pass" class="form-control"> </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-6">
                          <div class="form-group no-mt">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> Ricordami </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <button class="btn btn-raised btn-primary pull-right">Accedi</button>
                        </div>
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <header class="ms-header ms-header-white">
        <div class="container container-full">
          <div class="ms-title">
            <a href="index.php">
              <!-- <img src="assets/img/demo/logo-header.png" alt=""> -->
              <span class="ms-logo animated zoomInDown animation-delay-5"><i class="glyphicon glyphicon-cog fa-spin"></i></span>
              <h1 class="animated fadeInRight animation-delay-6">Comune di 
                <span>Alcamo</span>
              </h1>
            </a>
          </div>
          <div class="header-right">
            <div class="share-menu">
              <ul class="share-menu-list">
                <li class="animated fadeInRight animation-delay-3">
                  <a href="javascript:void(0)" class="btn-circle btn-google">
                    <i class="zmdi zmdi-google"></i>
                  </a>
                </li>
                <li class="animated fadeInRight animation-delay-2">
                  <a href="javascript:void(0)" class="btn-circle btn-facebook">
                    <i class="zmdi zmdi-facebook"></i>
                  </a>
                </li>
                <li class="animated fadeInRight animation-delay-1">
                  <a href="javascript:void(0)" class="btn-circle btn-twitter">
                    <i class="zmdi zmdi-twitter"></i>
                  </a>
                </li>
              </ul>
              <a href="javascript:void(0)" class="btn-circle btn-circle-primary animated zoomInDown animation-delay-7">
                <i class="zmdi zmdi-share"></i>
              </a>
            </div>
            <a href="javascript:void(0)" class="btn-circle btn-circle-primary no-focus animated zoomInDown animation-delay-8" data-toggle="modal" data-target="#ms-account-modal">
              <i class="zmdi zmdi-account"></i>
            </a>
            <form class="search-form animated zoomInDown animation-delay-9">
              <input id="search-box" type="text" class="search-input" placeholder="Cerca segnalazione..." name="q" />
              <label for="search-box">
                <i class="zmdi zmdi-search"></i>
              </label>
            </form>
            <a href="javascript:void(0)" class="btn-ms-menu btn-circle btn-circle-primary sb-toggle-left animated zoomInDown animation-delay-10">
              <i class="zmdi zmdi-menu"></i>
            </a>
          </div>
        </div>
      </header>
      <nav class="navbar navbar-static-top yamm ms-navbar ms-navbar-white">
        <div class="container container-full">
          <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
              <!-- <img src="assets/img/demo/logo-navbar.png" alt=""> -->
                <span class="ms-logo ms-logo-sm"><i class="glyphicon glyphicon-cog fa-spin"></i></span>
              <span class="ms-title">Comune di 
                <strong>Alcamo</strong>
              </span>
            </a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php">Invia Segnalazione</a>
                </li>
                <li class="active">
                    <a href="segnalazioni.php">Segnalazioni</a>
                </li>
                <li>
                    <a href="come-funziona.php">Come funziona?</a>
                </li>
              <!-- <li class="btn-navbar-menu"><a href="javascript:void(0)" class="sb-toggle-left"><i class="zmdi zmdi-menu"></i></a></li> -->
            </ul>
          </div>
          <!-- navbar-collapse collapse -->
          <a href="javascript:void(0)" class="sb-toggle-left btn-navbar-menu">
            <i class="zmdi zmdi-menu"></i>
          </a>
        </div>
        <!-- container -->
      </nav>

        <div class="ms-hero-page ms-hero-img-city2 ms-hero-bg-info">
        <div class="container">
          <div class="text-center">
            <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">Tutte le segnalazioni</span>
            </h1>
            <form class=" mt-4 mw-800 center-block animated fadeInUp">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group label-floating input-group display-block">
                    <label class="control-label color-white" for="ms-class-zip">
                      <i class="zmdi zmdi-pin mr-1"></i> Via/C.da...</label>
                    <input type="text" id="ms-class-zip" class="form-control color-white"> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating input-group display-block">
                    <label class="control-label color-white" for="ms-class-search">
                      <i class="zmdi zmdi-local-offer mr-1"></i> Cerca segnalazione...</label>
                    <input type="text" id="ms-class-search" class="form-control color-white"> </div>
                </div>
              </div>
              <button type="button" class="btn btn-raised btn-primary btn-block">
                <i class="zmdi zmdi-search"></i> Cerca</button>
            </form>
          </div>
        </div>
      </div>
        
      <br><br>
      
        <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Segnalazione</th>
                            <th>Tipologia</th>
                            <th>Descrizione</th>
                            <th>Luogo</th>
                            <th>Autore segnalazione</th>
                            <th>Data</th>
                            <th>Stato</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Perdita acqua</td>
                            <td>Strade (buche,dissesti)</td>
                            <td>Vi è una grossa perdita di acqua all'altezza della concessionaria di automobili. La perdita sta allagando parte della strada ed esce moltissima acqua.</td>
                            <td>Via Santissimo Salvatore</td>
                            <td>Paolo Monteleone</td>
                            <td>21/04/2017 ore 12:42</td>
                              <td></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Grossa buca in mezzo la strada</td>
                            <td>Strade (buche,dissesti)</td>
                            <td>In Via Ugo Foscolo c'è una buca profonda circa 20 cm che rischia di provocare incidenti o danni alle automobili.</td>
                            <td>Via Ugo Foscolo</td>
                            <td>Leonardo Di Giovanni</td>
                            <td>20/04/2017 ore 15:42</td>
                            <td></td>
                          </tr>
                          <tr class="success">
                            <td>3</td>
                            <td>Rifiuti vicino il ponte</td>
                            <td>Rifiuti e cassonetti</td>
                            <td>Lungo la strada delle Pigna di Don Fabrizio ci sono più di un sacchetto di rifiuti in sacchi neri. Si trovano all'altezza del Ponte dei Ricchi.</td>
                            <td>C.da Ponte dei Ricchi</td>
                            <td>(nome nascosto)</td>
                            <td>18/04/2017 ore 08:24</td>
                            <td><div class="alert alert-success alert-dismissible" role="alert"><strong>
                                    <i class="zmdi zmdi-check"></i>Risolto</strong>
                                </div></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
        
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