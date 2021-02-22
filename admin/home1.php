<?php
$is_maintenance = 1;
include("../core.php");

$setgui = 2;
$page['name'] = "Dashboard";
$page['rank'] = 4;


if(isset($_POST['insert'])){
	$text = isset($_POST['adm_note']) ? utf8_encode($_POST['adm_note']) : '';
	$username = "".$user->row['name']." ".$user->row['surname']."";
	if($text != $admin['content']) mysql_query("INSERT INTO notes (content, admin, date) VALUES ('".$text."','".$username."','".date('d/m/Y H:i:s')."')") or die(mysql_error());;	
}

include("header.php");
?>
	

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				
                    <h1 class="page-header">Bacheca <small></small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">	
			<?php if($maintenance == 1){ ?>
				<div class="alert alert-danger">
          <strong>ATTENZIONE: </strong> Modalità manutenzione attiva - il servizio è attualmente non disponibile al pubblico.
        </div>
			<?php } ?>
			          <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-time fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $input->mysql_evaluate("SELECT COUNT(*) FROM city_report WHERE status = 'ATTESA'"); ?></div>
                                    <div>In attesa</div>
                                </div>
                            </div>
                        </div>
                        <a href="./waiting">
                            <div class="panel-footer">
                                <span class="pull-left">Visualizza</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bell fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $input->mysql_evaluate("SELECT COUNT(*) FROM city_report WHERE status = 'APPROVATA'"); ?></div>
                                    <div>Approvate</div>
                                </div>
                            </div>
                        </div>
                        <a href="./approved">
                            <div class="panel-footer">
                                <span class="pull-left">Visualizza</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-times fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $input->mysql_evaluate("SELECT COUNT(*) FROM city_report WHERE status = 'RIGETTATA'"); ?></div>
                                    <div>Rigettate</div>
                                </div>
                            </div>
                        </div>
                        <a href="./rejected">
                            <div class="panel-footer">
                                <span class="pull-left">Visualizza</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				     <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $input->mysql_evaluate("SELECT COUNT(*) FROM city_report WHERE status = 'RISOLTA'"); ?></div>
                                    <div>Risolte</div>
                                </div>
                            </div>
                        </div>
                        <a href="./resolved">
                            <div class="panel-footer">
                                <span class="pull-left">Visualizza</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
			
			
			  <div class="row">
                <div class="col-lg-8">
					<div class="panel panel-default">
                        <div class="panel-heading">
                           Ultime segnalazioni inoltrate
                        </div>
                        <!-- /.panel-heading -->
						
                        <div class="panel-body">				
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Titolo</th>
                                            <th>Tipologia</th>
                                            <th>Indirizzo</th>
											<th>Data</th>
                                            <th>Segnalato da</th>
                                            <th>Stato</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        						<?php
				$sql = mysql_query("SELECT * FROM city_report ORDER BY id DESC LIMIT 4");
				while($row = mysql_fetch_assoc($sql)){						
				echo '
				<tr>
   					<td><a href="./all?edit='.$row['id'].'">'.$row['id'].'</a></td> 
    				<td><a href="./all?edit='.$row['id'].'">'.$input->cutString($row['report_title'],10).'</a></td> 
    				<td>'.$row['report_type'].'</td> 
					<td>'.$row['report_address'].'</td> 
					<td>'.$row['report_insertdate'].'</td> 
					<td>'.$row['surname'].' '.$row['name'].'</td> 
					<td>'.$row['status'].'</td> 
					
				</tr>';
				}
			?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
            
							
								<a href="#" class="btn btn-default btn-block">Visualizza tutte</a>
							 <!-- /.table-responsive -->
                        </div>
					
                        <!-- /.panel-body -->
                    </div>


                </div>
				
				
				
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
				
				<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-pencil fa-fw"></i> Annotazioni Amministrazione
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="" method="post"> 
						  
							<div class="form-group">
                                            <label>Promemoria</label>
                                            <textarea class="form-control" rows="4" name="adm_note"><?php echo utf8_decode($admin['content']); ?></textarea>
                                        </div>
                                <input type="submit" class="btn btn-primary" name="insert" value="Salva">
								
								
								<button type="button" class="btn btn-info"><i class="fa fa-eye"></i></button>
								
								</form>
						
		
						
						
						
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
		
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
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

    <!-- Morris Charts JavaScript -->
    <script src="./vendor/raphael/raphael.min.js"></script>
    <script src="./vendor/morrisjs/morris.min.js"></script>
    
	<script>
	$(function() {

    Morris.Area({
		lineColors: ['#337AB7', '#5CB85C', '#F0AD4E', '#D9534F'],
        element: 'morris-area-chart',
        data: [{
            period: '2010 Q1',
            approvate: 266,
            risolte: null,
            attesa: 247,
			rigettate: 300
        }, {
            period: '2010 Q2',
            approvate: 278,
            risolte: 224,
            attesa: 241,
			rigettate: 300
        }, {
            period: '2010 Q3',
            approvate: 412,
            risolte: 199,
            attesa: 251,
			rigettate: 300
        }, {
            period: '2010 Q4',
            approvate: 377,
            risolte: 37,
            attesa: 569,
			rigettate: 300
        }, {
            period: '2011 Q1',
            approvate:	810,
            risolte: 194,
            attesa: 223,
			rigettate: 300
        }, {
            period: '2011 Q2',
            approvate: 570,
            risolte: 423,
            attesa: 181,
			rigettate: 300
        }, {
            period: '2011 Q3',
            approvate: 482,
            risolte: 379,
            attesa: 158,
			rigettate: 300
        }, {
            period: '2011 Q4',
            approvate: 1503,
            risolte: 597,
            attesa: 75,
			rigettate: 300
        }, {
            period: '2012 Q1',
            approvate: 1087,
            risolte: 440,
            attesa: 208,
			rigettate: 300
        }, {
            period: '2013 Q2',
            approvate: 842,
            risolte: 573,
            attesa: 191,
			rigettate: 300
        }],
        xkey: 'period',
        ykeys: ['approvate', 'risolte', 'attesa', 'rigettate' ],
        labels: ['Approvate', 'Risolte', 'Rigettate', 'Rigettate'],
        pointSize: 8,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12
        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });
    
});

	</script>
    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

</body>

</html>
