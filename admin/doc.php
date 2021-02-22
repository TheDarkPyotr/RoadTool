<?php
$is_maintenance = 1;
include("../core.php");

$setgui = 2;
$page['name'] = "Istruzioni d'uso";
$page['rank'] = 4;

include("header.php");
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Istruzioni d'uso</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php if(!isset($_GET['id'])) { ?>
    <div class="row">

        <?php


        $faq = mysql_query("SELECT * FROM faq_theme LIMIT 6");
        while($row = mysql_fetch_assoc($faq)){

        echo '
        <div class="col-lg-4">
            <div class="well" onclick="document.location = \'?id='.$row['id'].'\';">
                <h4>'.$row['content'].'</h4>
                <p>'.$row['description'].'</p>
            </div>
        </div>';


        //}
        }

        ?>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Domande frequenti
                </div>
                <!-- .panel-heading -->
                <div class="panel-body">
                    <div class="panel-group" id="accordion">
                        <?php


                        $faq = mysql_query("SELECT * FROM faq LIMIT 6");
                        while($row = mysql_fetch_assoc($faq)){

                            if($row['id'] == 1) $open = "in";
                                else $open = "";
                            echo '

                         <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row['id'].'">'.$row['question'].'</a>
                                </h4>
                            </div>
                            <div id="collapse'.$row['id'].'" class="panel-collapse collapse '.$open.'">
                                <div class="panel-body">
                                    '.$row['answer'].'
                                </div>
                            </div>
                        </div>
                        ';


                            //}
                        }

                        ?>

                    </div>
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php } else if(isset($_GET['id'])) {
       echo '<div class="row">';

        $id = isset($_GET['id']) ? $input->EscapeString($_GET['id']) : '';

        $faq = mysql_query("SELECT * FROM faq WHERE theme_id = '".$id."'");
        while($row = mysql_fetch_assoc($faq)){

            echo '

                         <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row['id'].'">'.$row['question'].'</a>
                                </h4>
                            </div>
                            <div id="collapse'.$row['id'].'" class="panel-collapse collapse">
                                <div class="panel-body">
                                    '.nl2br($row['answer']).'
                                </div>
                            </div>
                        </div>
                        ';


            //}
        }
        ?>
        </div>

    <?php } ?>

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

<!-- Custom Theme JavaScript -->
<script src="./dist/js/sb-admin-2.js"></script>

</body>

</html>
