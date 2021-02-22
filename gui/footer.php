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
                    <a href="javascript:void(0)" class="withripple" data-toggle="modal" data-target="#ms-account-modal">
                    <i class="zmdi zmdi-account"></i> Accedi</a>
            </div>
            <div class="ms-slidebar-title">
                <form class="search-form animated zoomInDown animation-delay-9" method="get" action="./segnalazioni.php?via=">
                    <input id="search-box-slidebar" type="text" class="search-input" placeholder="Cerca segnalazione" name="info" />
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
                <a href="https://www.facebook.com/comunedialcamo/" class="btn-circle btn-circle-raised btn-facebook">
                    <i class="zmdi zmdi-facebook"></i>
                    <span class="badge badge-pink"></span>
                    <div class="ripple-container"></div>
                </a>
                <a href="https://twitter.com/comunedialcamo" class="btn-circle btn-circle-raised btn-twitter">
                    <i class="zmdi zmdi-twitter"></i>
                    <span class="badge badge-pink"></span>
                    <div class="ripple-container"></div>
                </a>
                <a href="http://www.comune.alcamo.tp.it/" class="btn-circle btn-circle-raised btn-wordpress">
                    <i class="zmdi zmdi-globe-alt"></i>
                    <div class="ripple-container"></div>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo PATH; ?>assets/js/plugins.min.js"></script>
<script src="<?php echo PATH; ?>assets/js/app.min.js"></script>
<script src="<?php echo PATH; ?>assets/js/index.js"></script>
</body>
</html>