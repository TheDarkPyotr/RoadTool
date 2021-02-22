<?php
$is_maintenance = 1;
include("../core.php");

$setgui = 2;
$page['name'] = "Elenco Segnalazioni";
$page['rank'] = 5;

include("header.php");

if(isset($_GET['id'])){

$id = isset($_GET['id']) ? $input->EscapeString($_GET['id']) : '';

/*
if(isset($_POST['edit'])){
    $report_type = isset($_POST['ReportType']) ? $_POST['ReportType'] : '';
    $report_status = isset($_POST['ReportStatus']) ? $_POST['ReportStatus'] : '';
    $report_hide = isset($_POST['ReportHide']) ? 1 : 0;
    $report_priority = isset($_POST['ReportPriority']) ? 1 : 0;
    $report_answer  = isset($_POST['ReportAnswer']) ? $_POST['ReportAnswer'] : '';


    if($report_status == 3 && $report_answer == '' || $report_status == 4 && $report_answer == '')
        $error = 'L\'inserimento dello stato di <b>RISOLUZIONE</b> o <b>RIGETTO</b> necessita di una <b>motivazione</b> da parte dell\'Amministrazione!';
    else{
        mysql_query("UPDATE city_report SET report_type = '".$report_type."',status = '".$report_status."', hide = '".$report_hide."',priority = '".$report_priority."',answer = '".$report_answer."',report_setdate = '".date('d/m/Y H:i:s')."' WHERE id = ".$id);
        $input->logSession($user->row['mail'], "Modifica", "Modifica segnalazione ID ".$id, date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);
        $input->systemNotify($id,'1');

    //  mysql_query("INSERT INTO report_log (report_type = '".$report_type."',status = '".$report_status."', hide = '".$report_hide."',priority = '".$report_priority."',answer = '".$report_answer."',report_setdate = '".date('d/m/Y H:i:s')."' WHERE id = ".$id);
        $ok = "La segnalazione è stata correttamente aggiornata!";
    }
}*/

$check = mysql_query("SELECT * FROM sector_refer WHERE sector_id = ".$id." AND user_id = ".$user->row['id']) or die();
$check_l2 = mysql_query("SELECT * FROM sector_refer WHERE sector_id = ".$id." AND user_id = ".$user->row['id']."  AND rank_id > 5") or die();
$sector = mysql_query("SELECT * FROM sector WHERE id = ".$id) or die();

if(mysql_num_rows($check) > 0 && mysql_num_rows($sector) > 0 || mysql_num_rows($sector) > 0 && $user->row['rank'] >= 7){



$row = mysql_fetch_assoc($sector);
?>



<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $row['content']; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Elenco segnalazioni
                </div>

                <?php if(!isset($_GET['edit']) && !isset($_GET['add']) && !isset($_GET['delete']) && mysql_num_rows($check_l2) > 0 || !isset($_GET['edit']) && !isset($_GET['add']) && !isset($_GET['delete']) && $user->row['rank'] > 6){ ?>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Tipologia</th>
                            <th>Indirizzo</th>
                            <th>Data</th>
                            <th>Segnalato da</th>
                            <th>Status </th>
                            <th>Priorità</th>
                            <th>Visibile</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //$input->logSession($user->row['mail'], "Visualizza", "Visualizzazione elenco generale segnalazioni", date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);

                        $typed = mysql_query("SELECT * FROM type_refer WHERE sector_id = ".$id);

                        $priorityset = "Non definito";
                        $hideset = "Non definito";

                        while($data = mysql_fetch_assoc($typed)){

                            $report = mysql_query("SELECT * FROM city_report WHERE report_type = ".$data['type_id']." AND status = 'RIGETTATA'");

                            while($row = mysql_fetch_assoc($report)){


                                $typology = mysql_query("SELECT * FROM typology WHERE id = ".$row['report_type']);
                                $typo = mysql_fetch_assoc($typology);



                                if($row['priority'] == 1) $priorityset = "Si";
                                else $priorityset = "No";

                                if($row['hide'] == 1) $hideset = "No";
                                else $hideset = "Si";

                                $messtype = "default";
                                switch($row['status']){

                                    case "ATTESA":
                                        $messtype = "warning"; // giallo
                                        break;
                                    case "APPROVATA":
                                        $messtype = "info"; //verde
                                        break;
                                    case "RIGETTATA":
                                        $messtype = "danger"; //rosso
                                        break;
                                    case "RISOLTA":
                                        $messtype = "success"; //blu
                                        break;
                                    /*case "IN ATTESA":
                                        $messtype = "danger"; //rosso
                                    break;*/
                                }
                                echo '
				<tr class="'.$messtype.'">
   					<td><a href="?id='.$id.'&edit='.$row['id'].'">'.$row['id'].'</a></td>
    				<td><a href="?id='.$id.'&edit='.$row['id'].'">'.$row['report_title'].'</a></td>
    				<td>'.$typo['content'].'</td>
					<td>'.$row['report_address'].'</td>
					<td>'.$row['report_insertdate'].'</td>
					<td>'.$row['surname'].' '.$row['name'].'</td>
					<td>'.$row['status'].'</td>
					<td>'.$priorityset.'</td>
					<td>'.$hideset.'</td>
				</tr>';
                            }
                        }
                        ?>


                        </tbody>
                    </table>


                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>



    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">


            <?php }  elseif(isset($_GET['edit'])){


            $idr = isset($_GET['edit']) ? $input->EscapeString($_GET['edit']) : '';

            /******************************************/
            if(isset($_POST['edit'])){
                $report_type = isset($_POST['ReportType']) ? $_POST['ReportType'] : '';
                $report_status = isset($_POST['ReportStatus']) ? $_POST['ReportStatus'] : '';
                $report_hide = isset($_POST['ReportHide']) ? 1 : 0;
                $report_priority = isset($_POST['ReportPriority']) ? 1 : 0;
                $report_answer  = isset($_POST['ReportAnswer']) ? $_POST['ReportAnswer'] : '';


                if($report_status == 3 && $report_answer == '' || $report_status == 4 && $report_answer == '')
                    $error = 'L\'inserimento dello stato di <b>RISOLUZIONE</b> o <b>RIGETTO</b> necessita di una <b>motivazione</b> da parte dell\'Amministrazione!';
                else{

                    $sql1 = mysql_query("SELECT * FROM city_report WHERE id = ".$idr." AND status = 'RIGETTATA'") or die();
                    $inside = mysql_fetch_assoc($sql1);

                    if($user->row['rank'] > 6) $modify = 0;
                    else $modify = 1;

                    if($report_type != $sql1['report_type']) $modify = 1;

                    if(!empty($_POST['refer_list'])) {

                        $checked_count = count($_POST['refer_list']);
                        foreach($_POST['refer_list'] as $selected) {

                            mysql_query("INSERT INTO sector_refer (user_id, sector_id, rank_id) VALUES ('".$selected."','".$id."','5')");
                            mysql_query("INSERT INTO request_refer (user_id, request_id) VALUES ('".$selected."','".$idr."')");
                        }
                    }

                    mysql_query("UPDATE city_report SET report_type = '".$report_type."',status = '".$report_status."', hide = '".$report_hide."',priority = '".$report_priority."',answer = '".$report_answer."',report_setdate = '".date('d/m/Y H:i:s')."', view = '".$modify."' WHERE id = ".$idr);
                    //$input->logSession($user->row['mail'], "Modifica", "Modifica segnalazione ID ".$id, date('d/m/Y H:i:s'), $page['name'], $page['rank'], $user->row['rank']);
                    //$input->systemNotify($id,'1');

                    //  mysql_query("INSERT INTO report_log (report_type = '".$report_type."',status = '".$report_status."', hide = '".$report_hide."',priority = '".$report_priority."',answer = '".$report_answer."',report_setdate = '".date('d/m/Y H:i:s')."' WHERE id = ".$id);
                    $ok = "La segnalazione è stata correttamente aggiornata!";
                }
            }

            /***************************/

            $sql = mysql_query("SELECT * FROM city_report WHERE id = ".$idr." AND status = 'RIGETTATA'") or die();
            $sql1 = mysql_query("SELECT * FROM city_report WHERE id = ".$idr." AND status = 'RIGETTATA'") or die();
            $inside = mysql_fetch_assoc($sql1);

            $sql_ck1 = mysql_query("SELECT * FROM type_refer WHERE type_id = ".$inside['report_type']) or die();
            $inside_ck1 = mysql_fetch_assoc($sql_ck1);

            $sql_check = mysql_query("SELECT * FROM sector_refer WHERE sector_id = ".$id." AND user_id = ".$user->row['id']." AND rank_id > 5") or die();
            $check_r = mysql_query("SELECT * FROM request_refer WHERE request_id = ".$idr." AND user_id = ".$user->row['id']) or die();


            if($inside_ck1['sector_id'] == $id && mysql_num_rows($sql) > 0 && mysql_num_rows($sql_check) > 0 ||
            $inside_ck1['sector_id'] == $id && mysql_num_rows($sql) > 0 && $user->row['rank'] > 6 ||
            $inside_ck1['sector_id'] == $id && mysql_num_rows($sql) > 0 && mysql_num_rows($check_r) > 0){
            $row = mysql_fetch_assoc($sql);
            ?>
            <script>
                function del(id){
                    var sei_sicuro = confirm('Sei sicuro di voler rimuovere questo amministratore dalla seguente richiesta?');
                    if (sei_sicuro)
                    {
                        location.href = '?id='+<?php echo $id; ?>+'&delete='+id+'&request='+<?php echo $idr; ?>;
                    }
                }
            </script>

            <div class="panel-body">
                <a href="./all?id=<?php echo $id; ?>" type="button" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-triangle-left"></i>
                </a>  Torna all'elenco<br><br>

                <?php
                if(isset($error))
                    echo '<div class="alert alert-danger">
                                '.$error.'
                            </div>';
                else if(isset($ok))
                    echo '<div class="alert alert-success">
                                '.$ok.'
                            </div>';
                ?>

                <div class="row">
                    <form action="" method="post">
                        <div class="col-lg-6">
                            <h1>Dettagli Segnalazione</h1>


                            <div class="form-group">
                                <label for="disabledSelect">ID</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['id']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="disabledSelect">Titolo</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['report_title']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label>Tipologia</label>
                                <select class="form-control" name="ReportType">
                                    <?php
                                    $typology = mysql_query("SELECT * FROM typology ORDER BY id ASC");
                                    while($typed = mysql_fetch_assoc($typology)){

                                        $sqlc = mysql_query("SELECT * FROM city_report WHERE report_type = ".$typed['id']." AND id = ".$idr) or die();

                                        if(mysql_num_rows($sqlc) > 0) $check = "selected";
                                        else $check = "";

                                        ?> <option value="<?php echo $typed['id']; ?>"<?php echo $check; ?>><?php echo $typed['content']; ?></option><?php	}  ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Descrizione</label>
                                <textarea class="form-control" rows="3" disabled><?php echo $row['report_desc']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="disabledSelect">Data inoltro</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['report_insertdate']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="disabledSelect">Indirizzo segnalazione</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['report_address']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label>Stato</label>
                                <select class="form-control" name="ReportStatus">
                                    <?php if($row['status'] == 'ATTESA') { ?> <option value="1" selected>In attesa</option> <?php } else { ?><option value="1">In attesa</option><?php } ?>
                                    <?php if($row['status'] == 'RIGETTATA') { ?> <option value="2" selected>Approvata</option> <?php } else { ?><option value="2">Approvata</option><?php } ?>
                                    <?php if($row['status'] == 'RIGETTATA') { ?> <option value="3" selected>Rigettata</option> <?php } else { ?><option value="3">Rigettata</option><?php } ?>
                                    <?php if($row['status'] == 'RISOLTA') { ?> <option value="4" selected>Risolta</option> <?php } else { ?><option value="4">Risolta</option><?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="disabledSelect">Data ultima modifica</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['report_setdate']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label>Impostazioni segnalazioni</label>
                                <div class="checkbox">
                                    <label>
                                        <?php if($row['priority'] == 0) { ?> <input name="ReportPriority" type="checkbox" value="0">Prioritaria</option> <?php } else { ?><input name="ReportPriority" type="checkbox" value="1" checked>Prioritaria<?php } ?>
                                    </label>
                                </div>
                            </div>
                            <?php if($user->row['rank'] > 5){ ?>
                                <div class="form-group">
                                <label>Account riferimento</label>
                                <?php

                                $sql = mysql_query("SELECT * FROM users WHERE rank = '5' ORDER BY id");

                                while($row_data = mysql_fetch_assoc($sql)){

                                    $sqlm = mysql_query("SELECT * FROM request_refer WHERE user_id = ".$row_data['id']." AND request_id = ".$idr) or die();

                                    if(mysql_num_rows($sqlm) > 0) $check = "checked disabled";
                                    else $check = "";

                                    ?>                  <div class="checkbox">
                                        <label>

                                            <input type="checkbox" name="refer_list[]" value="<?php echo $row_data['id'] ?>" <?php echo $check ?>><?php echo $row_data['surname'].' '.$row_data['name'] ?>
                                        </label>
                                        <?php if($check != ""){?><button onclick="javascript:del(<?php echo $row_data['id'] ?>)" type="button" class="btn btn-danger btn-xs">X</button><?php } ?>

                                    </div>
                                    </div>

                                <?php } }   ?>


                            <div class="form-group">
                                <label>Risposta dell'amministrazione alla segnalazione</label>
                                <textarea class="form-control" rows="7" name="ReportAnswer"><?php echo $row['answer']; ?></textarea>
                            </div>


                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            <h1>Dettagli Segnalatore</h1>

                            <div class="form-group">
                                <label for="disabledSelect">Segnalato da</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['surname'],' ',$row['name']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="disabledSelect">Indirizzo residenza</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['home_address']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="disabledSelect">Indirizzo email</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['email']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="disabledSelect">Cellulare/Telefono</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['phone']; ?>" disabled>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <?php if($row['visibility'] == 1) { ?><input type="checkbox" checked disabled>Nominativo Visibile  <?php } else { ?><input type="checkbox" disabled>Nominativo Visibile <?php } ?>
                                </label>
                            </div>


                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    Contenuti Inopportuni
                                </div>
                                <div class="panel-body">
                                    <p>Una richiesta <b>inopportuna, offensiva, trattante contenuti non inerenti allo scopo del servizio</b> è oscurabile dall'elenco sia pubblico che privato delle segnalazioni. I meccanismi di sicurezza tuttavia impediscono una cancellazione totale della richiesta che permarrà in memoria, nella sezione "Eliminate".</p>

                                    <div class="checkbox">
                                        <label>
                                            <?php if($row['hide'] == 0) { ?> <input name="ReportHide" type="checkbox" value="0">Oscura</option> <?php } else { ?><input name="ReportHide" type="checkbox" value="1" checked>Oscura<?php } ?>
                                        </label>
                                    </div>

                                </div>

                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Descrizione status segnalazione
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills">
                                        <li class="active"><a href="#home-pills" data-toggle="tab">In attesa</a>
                                        </li>
                                        <li><a href="#profile-pills" data-toggle="tab">Approvata</a>
                                        </li>
                                        <li><a href="#messages-pills" data-toggle="tab">Rigettata</a>
                                        </li>
                                        <li><a href="#settings-pills" data-toggle="tab">Risolta</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="home-pills">
                                            <h4>Status: In attesa </h4>
                                            <p><?php echo $status_set['ATTESA']; ?>:
                                                </br><span class="label label-warning pull-left" data-effect="pop">In attesa</span></p>
                                        </div>
                                        <div class="tab-pane fade" id="profile-pills">
                                            <h4>Status: Approvata</h4>
                                            <p><?php echo $status_set['RIGETTATA']; ?>
                                                </br><span class="label label-info pull-left" data-effect="pop">Approvata</span></p>
                                        </div>
                                        <div class="tab-pane fade" id="messages-pills">
                                            <h4>Status: Rigettata</h4>
                                            <p><?php echo $status_set['RIGETTATA']; ?>
                                                </br><span class="label label-danger pull-left" data-effect="pop">Rigettata</span></p>
                                        </div>
                                        <div class="tab-pane fade" id="settings-pills">
                                            <h4>Status: Risolta</h4>
                                            <p><?php echo $status_set['RISOLTA']; ?>
                                                </br><span class="label label-success pull-left" data-effect="pop">Risolta</span></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <input type="submit" name="edit" value="Aggiorna" class="btn btn-primary btn-lg btn-block" />
                            <a href="./all" value="Annulla" class="btn btn-danger btn-lg btn-block">Annulla</a></br>
                    </form>

                    </form>
                </div>
                <!-- /.col-lg-6 (nested) -->
                </br>
                <center><iframe width="98%" height="500px" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=Alcamo&key=AIzaSyAQXt8aeCYIFpKwqa8qwcX17jLOBXN0Zqc" allowfullscreen></iframe>
                </center>
            </div>


            <!-- /.row (nested) -->
        </div>
        <?php }

        } else if(isset($_GET['delete']) && isset($_GET['request'])){

            $uid = isset($_GET['delete']) ? $input->EscapeString($_GET['delete']) : '';
            $rid = isset($_GET['request']) ? $input->EscapeString($_GET['request']) : '';

            //$uid = $input->EscapeString($_GET['delete']);
            //$id = $input->EscapeString($_GET['sector']);
            mysql_query("DELETE FROM sector_refer WHERE user_id = ".$uid."  AND sector_id = ".$id) or die();
            mysql_query("DELETE FROM request_refer WHERE user_id = ".$uid."  AND request_id = ".$rid) or die();
            echo '<meta http-equiv="refresh" content="0; url=all?id='.$id.'&edit='.$rid.'" />';

        }

        } } ?>
        <!-- /.panel -->
    </div>

    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="./vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="./vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="./vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="./vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="./dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>
