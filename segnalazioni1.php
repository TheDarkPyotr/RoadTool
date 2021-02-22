<?php
include('core.php');

$guiset = 2;

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
    <div class="container">
      <div class="row">
           <!-- <div class="table-responsive">-->

          <?php include('select1.php'); ?>

            </div>
        </div>
    </div>


        
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
        <script src="assets/js/app.min.js"></script>
      <script src="assets/js/index.js"></script>
    <script src="assets/js/plugins.min.js"></script>



  </body>
</html>