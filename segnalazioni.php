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
            <form class=" mt-4 mw-800 center-block animated fadeInUp" method="get" action="./segnalazioni.php">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group label-floating input-group display-block">
                    <label class="control-label color-white" for="ms-class-zip">
                      <i class="zmdi zmdi-pin mr-1"></i> Via/C.da...</label>
                    <input type="text" id="ms-class-zip" name="via" class="form-control color-white"> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating input-group display-block">
                    <label class="control-label color-white" for="ms-class-search">
                      <i class="zmdi zmdi-local-offer mr-1"></i> Cerca segnalazione...</label>
                    <input type="text" id="ms-class-search" name="info" class="form-control color-white"> </div>
                </div>
              </div>
              <button type="submit" class="btn btn-raised btn-primary btn-block">
                <i class="zmdi zmdi-search"></i> Cerca</button>
            </form>
          </div>
        </div>
      </div>

      <div class="container">
          <div class="row">
        <div class="table-responsive">

            <?php if(isset($_GET['via']) || isset($_GET['info'])){

            echo ' <header>

                <center>
                    <ul class="pagination pagination-sm">';

            $page = isset($_GET['p']) ? $input->EscapeString($_GET['p']) : 1;
            $via = isset($_GET['via']) ? $input->EscapeString($_GET['via']) : "";
            $info = isset($_GET['info']) ? $input->EscapeString($_GET['info']) : "";

            $flag1 = "WHERE report_address LIKE '%".$via."%'";
            $flag2 = "AND report_title LIKE '%".$info."%'";

            $sql = mysql_query("SELECT * FROM city_report ".$flag1." ".$flag2." AND hide LIKE 0 ORDER BY id DESC") or die();
            if(mysql_num_rows($sql) > 0) {
            //$sql = mysql_query("SELECT * FROM city_report ".$flag." ORDER BY id DESC") or die();
            $count = mysql_num_rows($sql);
            $pages = ceil($count / 15);
            $limit = 15;
            $offset = $page - 1;
            $offset = $offset * 15;
            //$sql = mysql_query("SELECT * FROM city_report ".$flag." ORDER BY username ASC LIMIT $limit OFFSET $offset") or die();
            $sql = mysql_query("SELECT * FROM city_report  ".$flag1." ".$flag2." AND hide LIKE 0 ORDER BY id DESC LIMIT $limit OFFSET $offset") or die();


            if($page > 1) { ?><li><a href="?via=<?php echo $via; ?>&info=<?php echo $info; ?>&p=<?php echo ($page-1); ?>">&laquo;</a></li><?php } else { ?><li class="disabled"><a href="">&laquo;</a></li><?php }

            $i = 0;
            $n = $pages;
            while ($i <> $n){
                $i++;
                if ($i < $page + 8){
                    if($i == $page){ echo "<li class=\"active\"><a href=\"#\">".$i."</a></li>\n";
                    } else {
                        if ($i + 4 >= $page && $page + 4 >= $i){
                            echo "<li><a href=\"?via=".$via."&info=".$info."&p=".$i."  \">".$i."</a></li>\n";
                        }
                    }
                }
            }
            ?>


            <?php if($page < $pages) { ?><li><a href="?via=<?php echo $via; ?>&info=<?php echo $info; ?>&p=<?php echo ($page+1); ?>">&raquo;</a></li><?php }else{ ?><li class="disabled"><a href="">&raquo;</a></li><?php } ?>
            </center>
            </ul>
            </header>



            <div class="tab_container">
                <div id="tab1" class="tab_content">


                    <table class="table table-striped" data-effect="fade">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Tipologia</th>
                            <th>Indirizzo</th>
                            <th>Data</th>
                            <th>Segnalato da</th>
                            <th>Status </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if(mysql_num_rows($sql) > 0)

                            while($row = mysql_fetch_assoc($sql)){
                                $report = mysql_fetch_assoc(mysql_query("SELECT * FROM city_report WHERE id = '".$row['id']."' AND hide LIKE 0"));

                                $typology = mysql_query("SELECT * FROM typology WHERE id = ".$report['report_type']);
                                $typo = mysql_fetch_assoc($typology);

                                $messtype = "default";
                                switch($report['status']){

                                        case "ATTESA":
                                            $messtype = "warning"; // grigio
                                            $progresslevel = "20%";
                                        break;
                                        case "APPROVATA":
                                            $messtype = "success"; //verde
                                            $progresslevel = "50%";
                                        break;
                                        case "RIGETTATA":
                                            $messtype = "danger"; //rosso
                                            $progresslevel = "100%";
                                        break;
                                        case "RISOLTA":
                                            $messtype = "info"; //blu
                                            $progresslevel = "100%";
                                        break;
                                }

                                if($report['visibility'] == 0) $longname = "Utente ignoto";
                                else $longname = ''.$report['name'].' '.$report['surname'].'';

                                echo '
				<tr>
   					<td><a data-toggle="modal" data-target="#info'.$report['id'].'">'.$report['id'].'</a></td>
    				<td><a data-toggle="modal" data-target="#info'.$report['id'].'">'.$input->cutString($report['report_title'],25).'</a></td>
    				<td>'.$typo['content'].'</td>
					<td>'.$report['report_address'].'</td>
    				<td>'.$report['report_insertdate'].'</td>
					<td>'.$longname.'</td>
    				<td>
						<span class="label label-'.$messtype.' pull-left" data-effect="pop">'.$report['status'].'</span>
					</td>
				</tr>

				 <div class="modal" id="info'.$report['id'].'" tabindex="-1" role="dialog" aria-labelledby="info'.$report['id'].'">
                    <div class="modal-dialog modal-lg animated zoomIn animated-3x" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                              <i class="zmdi zmdi-close"></i>
                            </span>
                          </button>
                          <h3 class="modal-title" id="myModalLabel2">'.$report['report_title'].'</h3>
                        </div>
                        <div class="modal-body">
                 <div class="row">
                   <div class="col-md-6">
					<div class="card-block">
						<h3 class="color-primary">Dettagli</h3>
						<ul class="list-unstyled">
							<li>
								<strong>Oggetto:</strong> '.$report['report_title'].' </li>
							<li>
								<strong>Tipologia:</strong> '.$typo['content'].'</li>
							<li>
								<strong>Indirizzo:</strong> '.$report['report_address'].'</li>
							<li>
							<li>
								<strong>Segnalato da:</strong> '.$longname.'</li>
							<li>
								<strong>Data:</strong> '. $report['report_insertdate'].'</li>
							<li>
								<strong>Stato:</strong>
								<a href="come-funziona" class="ms-tag ms-tag-'.$messtype.'"> '.$report['status'].'</a>
							</li>
						</ul>

								<h4 class="color-primary"> Progressione</h4>
								<div class="progress progress-striped active">
					<div class="progress-bar progress-bar-'.$messtype.'" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: '.$progresslevel.';">
						<span class="sr-only">70% Complete</span>
					</div>
				</div>

					</div>
				</div>
				<div class="col-md-6">
					<div class="card-block">
					<h3 class="color-primary"> Descrizione segnalazione</h3 >
						<p> '.$report['report_desc'].'

						<h4 class="color-primary"> Descrizione status</h4 >
						<p> '.$status_set[''.$report['status'].''].' </p >



					</div>
					</div>
						<div class="row">

				<div class="col-lg-12 col-md-8 col-sm-12">

					<iframe width="100%" height="340" src="https://www.google.com/maps/embed/v1/place?q=Alcamo&key=AIzaSyAQXt8aeCYIFpKwqa8qwcX17jLOBXN0Zqc"></iframe>
					<!-- -->
				</div>
			</div>
				</div>
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>

                        </div>
                      </div>
                    </div>
                  </div>';


                                //}
                            }

                        ?>

                </div>
                </tbody>
                </table>
                <p>Clicca su <b>ID</b> o su <b>Titolo</b> per visualizzare ulteriori dettagli inerenti la segnalazione.</p>
            </div>
        </div>

<?php
              } else echo "Nessuna richiesta trovata in base ai parametri inseriti.";
    }


              include('select11.php'); ?>

                    </div>
              </div>
          </div>
        
        <br>

<?php include('gui/footer.php'); ?>