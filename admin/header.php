<?php
if(!isset($user->row) || !isset($_SESSION['adm_log']) || $_SESSION['adm_log'] != PANEL_KEY)
	header("Location: ".PATH."admin");
	
if(isset($_GET['logout'])){
	unset($_SESSION['adm_log']);
	header("Location: ".PATH."");
}

if($page['rank'] > $user->row['rank'])
	header("Location: ".PATH."admin/stop");



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Comune di Alcamo - Gestione Segnalazioni | <?php echo $page['name']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	 <!-- Morris Charts CSS -->
    <link href="./vendor/morrisjs/morris.css" rel="stylesheet">
	
    <!-- DataTables CSS -->
    <link href="./vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="./vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

		
	<script>
	function logout(){
		
			location.href = '?logout=1';
	}
	</script>
	
	
</head>

<body style="background: #EEEEEE;">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./home"><b>Gestione Segnalazioni</b> - Area Riservata</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <?php  if($user->row['rank'] >= 5)  { ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
    
    <?php 
    
    if($user->row['rank'] == 6){
        
    $sql_l1 = mysql_query("SELECT * FROM sector_refer WHERE user_id = ".$user->row['id']) or die();
					while($row_l1 = mysql_fetch_assoc($sql_l1)){
                        
                         $sql_l2 = mysql_query("SELECT * FROM type_refer WHERE sector_id = ".$row_l1['sector_id']) or die();
					while($row_l2 = mysql_fetch_assoc($sql_l2)){
    
			$sql = mysql_query("SELECT * FROM city_report WHERE report_type = ".$row_l2['type_id']." AND view LIKE 0 AND status != 'RIGETTATA' AND status != 'RISOLTA' ORDER BY id DESC LIMIT 6") or die();
					while($row = mysql_fetch_assoc($sql)){
			
							$report = mysql_fetch_assoc(mysql_query("SELECT * FROM city_report WHERE id = '".$row['id']."' AND status != 'RIGETTATA' AND status != 'RISOLTA' ORDER BY id DESC LIMIT 6")); 
                        
                        $sec = mysql_fetch_assoc(mysql_query("SELECT * FROM type_refer WHERE type_id = '".$report['report_type']."'")); 
							
							
				$messtype = "default";
			switch($report['status']){
					
					case "ATTESA":
						$messtype = "warning"; // grigio
						$progresslevel = "20%";
					break;
					case "APPROVATA":
						$messtype = "info"; //verde
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
					
				echo '
				      <li>
                            <a href="./all?id='.$sec['sector_id'].'&edit='.$report['id'].'">
                                <div>
                                    <p>
                                        <strong>ID: '.$report['id'].' - '.$input->cutString($report['report_title'],45).'</strong>
                                        <span class="pull-right text-muted">'.$progresslevel.' Completato</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-'.$messtype.'" role="progressbar" aria-valuenow="'.$progresslevel.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$progresslevel.'">
                                            <span class="sr-only">'.$progresslevel.' Completato</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
				';
			} } } } elseif($user->row['rank'] == 7) { 
        
        $sql = mysql_query("SELECT * FROM city_report WHERE view LIKE 0 AND status != 'RIGETTATA' AND status != 'RISOLTA' ORDER BY id DESC LIMIT 6") or die();
					while($row = mysql_fetch_assoc($sql)){
			
							$report = mysql_fetch_assoc(mysql_query("SELECT * FROM city_report WHERE id = '".$row['id']."' AND status != 'RIGETTATA' AND status != 'RISOLTA' ORDER BY id DESC LIMIT 6")); 
                        
                        $sec = mysql_fetch_assoc(mysql_query("SELECT * FROM type_refer WHERE type_id = '".$report['report_type']."'")); 
							
							
				$messtype = "default";
			switch($report['status']){
					
					case "ATTESA":
						$messtype = "warning"; // grigio
						$progresslevel = "20%";
					break;
					case "APPROVATA":
						$messtype = "info"; //verde
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
					
				echo '
				      <li>
                            <a href="./all?id='.$sec['sector_id'].'&edit='.$report['id'].'">
                                <div>
                                    <p>
                                        <strong>ID: '.$report['id'].' - '.$input->cutString($report['report_title'],35).'</strong>
                                        <span class="pull-right text-muted">'.$progresslevel.' Completato</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-'.$messtype.'" role="progressbar" aria-valuenow="'.$progresslevel.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$progresslevel.'">
                                            <span class="sr-only">'.$progresslevel.' Completato</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
				';
			} } else {  
        
                $sql_l1 = mysql_query("SELECT * FROM request_refer WHERE user_id = ".$user->row['id']) or die();
					while($row_l1 = mysql_fetch_assoc($sql_l1)){
    
			
			
							$report = mysql_fetch_assoc(mysql_query("SELECT * FROM city_report WHERE id = '".$row_l1['request_id']."' ORDER BY id DESC LIMIT 6")); 
                        
                        $sec = mysql_fetch_assoc(mysql_query("SELECT * FROM type_refer WHERE type_id = '".$report['report_type']."'")); 
							
							
				$messtype = "default";
			switch($report['status']){
					
					case "ATTESA":
						$messtype = "warning"; // grigio
						$progresslevel = "20%";
					break;
					case "APPROVATA":
						$messtype = "info"; //verde
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
					
				echo '
				      <li>
                            <a href="./all?id='.$sec['sector_id'].'&edit='.$report['id'].'">
                                <div>
                                    <p>
                                        <strong>ID: '.$report['id'].' - '.$input->cutString($report['report_title'],45).'</strong>
                                        <span class="pull-right text-muted">'.$progresslevel.' Completato</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-'.$messtype.'" role="progressbar" aria-valuenow="'.$progresslevel.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$progresslevel.'">
                                            <span class="sr-only">'.$progresslevel.' Completato</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
				';
			} }
?> 
                      <!--  <li>
                            <a class="text-center" href="./all">
                                <strong>Visualizza tutte</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>-->
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
				<?php } ?>
  
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="./profile"><i class="fa fa-gear fa-fw"></i> Impostazioni</a>
                        </li>
                        <li class="divider"></li>
                        <li><a class="logout_user" href="javascript:logout();" title="Logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
					<li>
					<center><a href="./home"><img src="./dist/img/logo-city.png"></a></center>
					</li>
                     
                        <li>
                            <a href="./home"><i class="fa fa-home fa-fw"></i> Bacheca</a>
                        </li>
						<?php  if($user->row['rank'] >= 6)  { ?>
						<li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Settori<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                         
			
			 <?php
				
				if($user->row['rank'] < 7){
					
					$typed = mysql_query("SELECT * FROM sector_refer WHERE user_id = ".$user->row['id']) or die();
				
				while($data = mysql_fetch_assoc($typed)){
					
						$det = mysql_query("SELECT * FROM sector WHERE id = ".$data['sector_id']." ORDER BY content ASC");
					
						while($row = mysql_fetch_assoc($det)){
							
				echo '
								<li>
                                    <a href="#">'.$row['content'].'<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                           <li>
												<a href="./all?id='.$row['id'].'">Elenco</a>
											</li>
											<li>
												<a href="./approved?id='.$row['id'].'">Approvate</a>
											</li>
											<li>
												<a href="./resolved?id='.$row['id'].'">Risolte</a>
											</li>
											<li>
												<a href="./waiting?id='.$row['id'].'">In attesa</a>
											</li>
											<li>
												<a href="./rejected?id='.$row['id'].'">Rigettate</a>
											</li>
											<li>
												<a href="./deleted?id='.$row['id'].'">Eliminate</a>
											</li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>';
				}
			}
			
		} else {
					$det = mysql_query("SELECT * FROM sector ORDER BY content ASC");
					
						while($row = mysql_fetch_assoc($det)){
							
						
				echo '
				
				      <li>
                                    <a href="#">'.$row['content'].'<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                           <li>
												<a href="./all?id='.$row['id'].'">Elenco</a>
											</li>
											<li>
												<a href="./approved?id='.$row['id'].'">Approvate</a>
											</li>
											<li>
												<a href="./resolved?id='.$row['id'].'">Risolte</a>
											</li>
											<li>
												<a href="./waiting?id='.$row['id'].'">In attesa</a>
											</li>
											<li>
												<a href="./rejected?id='.$row['id'].'">Rigettate</a>
											</li>
											<li>
												<a href="./deleted?id='.$row['id'].'">Eliminate</a>
											</li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>';
				}
			
		}	
			?>
                             
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    
                        <li>
                            <a href="./logsys"><i class="fa fa-th-list fa-fw"></i> Cronologia operazioni</a>
                        </li>
						<?php  } ?>
						<?php if($user->row['rank'] >= 7)  { ?> 
                        <li>
                            <a href="./general"><i class="fa fa-gears fa-fw"></i> Impostazioni Generali <span class="fa arrow"></span> <i class="fa fa-lock fa-fw"></i></a>
							<ul class="nav nav-second-level">
							   <li>
                                    <a href="./sector">Gestione Settori</a>
                                </li>
								<li>
                                    <a href="./type">Gestione Tipologia</a>
                                </li>
                                <li>
                                    <a href="./closed">Modalità manutenzione</a>
                                </li>
                                <li>
                                    <a href="#">Gestione FAQ admin <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="themes">Gestione tematiche</a>
                                        </li>
                                        <li>
                                            <a href="questions">Gestione domande</a>
                                        </li>

                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
								<!--
								<li>
                                    <a href="./iplock">Blocco IP</a>
                                </li>
								<li>
                                    <a href="./statswork">Statistiche Produttività</a>
                                </li>
								<li>
                                    <a href="./faq">Gestione F.A.Q.</a>
                                </li>-->
								<li>
                                    <a href="./administrator">Gestione Amministratori (coming soon)</a>
                                </li>
								<li>
                                    <a href="./mail">Gestione mail (coming soon)</a>
                                </li>
                            </ul>
                        </li>
						
					
						<li>
                            <a href="./stats"><i class="fa fa-bar-chart-o fa-fw"></i> Statistiche (soon)<i class="fa fa-lock fa-fw"></i></a>
                        </li>
						<?php } ?>
						<?php  if($user->row['rank'] >= 6)  { ?>
						  <li>
                            <a href="./alert"><i class="fa fa-envelope   fa-fw"></i> Comunicazioni</a>
                        </li>
						<?php } ?>
						<li>
                            <a href="./doc"><i class="fa fa-book fa-fw"></i> Istruzioni d'uso</a>
                        </li>
						 <li>
                            <a href="./report"><i class="fa fa-flag fa-fw"></i> Segnala Errore</a>
                        </li>
	
					</ul>
				
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
