<?php
include('core.php');


$resp = null;
$unicname = "";
$error1 = false;
$error2 = false;
$error3 = false;
$error4 = false;
$error5 = false;
$error6 = false;
$error7 = false;
$ok = false;
$guiset = 2;

if(isset($_POST["next"]) && $_POST["next"] == 1){
	
	//Gestione informazioni segnalatore
	$currentname = isset($_POST['Name']) ? $input->EscapeString($_POST['Name']) : '';
	$currentsurname = isset($_POST['Surname']) ? $input->EscapeString($_POST['Surname']) : '';
	$currentaddresshome = isset($_POST['AddressHome']) ? $input->EscapeString($_POST['AddressHome']) : '';
	
	//Gestione informazioni segnalazione
	$reportaddress = isset($_POST['ReportAddress']) ? $input->EscapeString($_POST['ReportAddress']) : '';
	$reporttitle = isset($_POST['ReportTitle']) ? $input->EscapeString($_POST['ReportTitle']) : '';
	
	
	//Gestione disposizioni legislative inerenti alla privacy
	$visibility = isset($_POST['visibility']) ? $input->EscapeString($_POST['visibility']) : 1;
	
	$challange = isset($_POST['recaptcha_challenge_field']) ? $input->EscapeString($_POST['recaptcha_challenge_field']) : '';
	$response = isset($_POST['recaptcha_response_field']) ? $input->EscapeString($_POST['recaptcha_response_field']) : '';
	
	$response = isset($_POST['captchaResponse']) ? $_POST['captchaResponse'] : '';
	$captcha = isset($_SESSION['register-captcha-bubble']) ? $_SESSION['register-captcha-bubble'] : '';
	
	if($currentname == '' || $currentname == 'sconosciuto'){
		$error1 = true;
	}
	
	if($currentsurname == '' || $currentsurname == 'sconosciuto' || $currentsurname == $currentname){
		$error5 = true;
	}
	
	if($currentaddresshome == ''){
		$error6 = true;
	}
	
	if($reportaddress == '' ){
		$error2 = true;
	}
	else if($reporttitle == ''){
		$error3 = true;
	}
	else if ($_SESSION['register-captcha-bubble'] != strtolower($response) || empty($captcha)) {
        $error4 = true;
    }
	
	if($visibility != 'agree' ){
		$error7 = true;
	}
	if(!$error1 && !$error2 && !$error3 && !$error4 && !$error5 && !$error6 && !$error7){
		//mysql_query("UPDATE accounts SET password = '".$input->HoloHash($newpsws)."' WHERE id = '".$user->row['account']."'");
		//mysql_query("UPDATE accounts SET name = '".$newpsw."' WHERE id = '".$user->row['account']."'");
		//mysql_query("INSERT INTO city_report (id,name,surname,phone,email,homeaddress,reportaddress,reporttype,reporttitle,reportdesc) VALUES ('".$userid."','".$currentname."','".$userid."','".$userid."','".$userid."','".$userid."','".$userid."','".$userid."','".$userid."','".$bdg."')") or die(mysql_error());

		//$user->Refresh($user->row['username']);
		$ok = true;
	}
}
include('gui/header.php');


?>
	
  <div class="container">
  
     <?php if($maintenance == 1){ ?>
   
	<div class="alert alert-danger">
          <strong>ATTENZIONE: </strong> Il servizio è attualmente in manutenzione! Al fine di evitare perdita di dati è <b>necessario</b> abbandonare l'utilizzo del servizio.<br>
										Ci scusiamo per il disagio.
        </div>

   
   <?php } ?>	

  
		<h2>Lista segnalazioni</h2>
 
            <div class="tabbable">
			
			<?php if(!isset($_GET['all']) && !isset($_GET['allp']) && !isset($_GET['priority']) && !isset($_GET['priorityp']) 
				  && !isset($_GET['wait']) && !isset($_GET['waitp']) && !isset($_GET['approved']) && !isset($_GET['approvedp'])
				  && !isset($_GET['rejected']) && !isset($_GET['rejectedp'])){  ?>
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab11" data-toggle="tab">Tutte</a></li>
                <li class=""><a href="#tab12" data-toggle="tab">Prioritarie</a></li>
				<li class=""><a href="#tab13" data-toggle="tab">Attesa</a></li>
				<li class=""><a href="#tab14" data-toggle="tab">Approvate</a></li>
				<li class=""><a href="#tab15" data-toggle="tab">Rigettate</a></li>
				<li class=""><a href="#tab16" data-toggle="tab">Ricerca</a></li>
				
              </ul>
              <div class="tab-content">
			
                <div class="tab-pane active" id="tab11">
					<?php include('select1.php'); ?>
			</div>
	
                <div class="tab-pane" id="tab12">		
						<?php include('select2.php'); ?>
                </div>
				
				<div class="tab-pane" id="tab13">
						<?php include('select3.php'); ?>
				</div>
				
               <div class="tab-pane" id="tab14">
						<?php include('select4.php'); ?>
				</div>
				
               <div class="tab-pane" id="tab15">
						<?php include('select5.php'); ?>
				</div>
				
				 <div class="tab-pane" id="tab16">
							<form class="header-search-form" method="get"  action="./list">
							<input type="text" id="cellphonenumber" name="all%26id" class="form-control" placeholder="Inserire ID richiesta da ricercare">
							
				</div>
              </div>
			  
			<?php } elseif(isset($_GET['all']) || isset($_GET['allp'])){ ?>
		
			        <ul class="nav nav-tabs">
                <li class="active"><a href="#tab11" data-toggle="tab">Tutte</a></li>
                <li class=""><a href="#tab12" data-toggle="tab">Prioritarie</a></li>
				<li class=""><a href="#tab13" data-toggle="tab">Attesa</a></li>
				<li class=""><a href="#tab14" data-toggle="tab">Approvate</a></li>
				<li class=""><a href="#tab15" data-toggle="tab">Rigettate</a></li>
				<li class=""><a href="#tab16" data-toggle="tab">Ricerca</a></li>
				
              </ul>
              <div class="tab-content">
			
                <div class="tab-pane active" id="tab11">
						<?php include('select1.php'); ?>
				</div>
		
               <div class="tab-pane" id="tab12">
						<?php include('select2.php'); ?>
				</div>
				
               <div class="tab-pane" id="tab13">
						<?php include('select3.php'); ?>
				</div>
				
               <div class="tab-pane" id="tab14">
						<?php include('select4.php'); ?>
				</div>
				
               <div class="tab-pane" id="tab15">
						<?php include('select5.php'); ?>
				</div>
              </div>
			
			<?php } elseif(isset($_GET['priority']) || isset($_GET['priorityp'])){ ?>
			
			
			        <ul class="nav nav-tabs">
                <li class=""><a href="#tab11" data-toggle="tab">Tutte</a></li>
                <li class="active"><a href="#tab12" data-toggle="tab">Prioritarie</a></li>
				<li class=""><a href="#tab13" data-toggle="tab">Attesa</a></li>
				<li class=""><a href="#tab14" data-toggle="tab">Approvate</a></li>
				<li class=""><a href="#tab15" data-toggle="tab">Rigettate</a></li>
				<li class=""><a href="#tab16" data-toggle="tab">Ricerca</a></li>
				
              </ul>
              <div class="tab-content">
			
                <div class="tab-pane" id="tab11">
						<?php include('select1.php'); ?>
			</div>

                <div class="tab-pane active" id="tab12">	
						<?php include('select2.php'); ?>
            </div>
			
				<div class="tab-pane" id="tab13">
						<?php include('select3.php'); ?>
				</div>
				
               <div class="tab-pane" id="tab14">
						<?php include('select4.php'); ?>
				</div>
				
               <div class="tab-pane" id="tab15">
						<?php include('select5.php'); ?>
				</div>
              </div>
			
			<?php } elseif(isset($_GET['wait']) || isset($_GET['waitp'])){ ?>
			
			
			        <ul class="nav nav-tabs">
                <li class=""><a href="#tab11" data-toggle="tab">Tutte</a></li>
                <li class=""><a href="#tab12" data-toggle="tab">Prioritarie</a></li>
				<li class="active"><a href="#tab13" data-toggle="tab">Attesa</a></li>
				<li class=""><a href="#tab14" data-toggle="tab">Approvate</a></li>
				<li class=""><a href="#tab15" data-toggle="tab">Rigettate</a></li>
				<li class=""><a href="#tab16" data-toggle="tab">Ricerca</a></li>
				
              </ul>
              <div class="tab-content">
			
                <div class="tab-pane" id="tab11">
						<?php include('select1.php'); ?>
			</div>

                <div class="tab-pane" id="tab12">	
						<?php include('select2.php'); ?>
            </div>
			
				<div class="tab-pane active" id="tab13">
						<?php include('select3.php'); ?>
				</div>
				
               <div class="tab-pane" id="tab14">
						<?php include('select4.php'); ?>
				</div>
				
               <div class="tab-pane" id="tab15">
						<?php include('select5.php'); ?>
				</div>
              </div>
			
			<?php } elseif(isset($_GET['approved']) || isset($_GET['approvedp'])){ ?>
			
			
			        <ul class="nav nav-tabs">
                <li class=""><a href="#tab11" data-toggle="tab">Tutte</a></li>
                <li class=""><a href="#tab12" data-toggle="tab">Prioritarie</a></li>
				<li class=""><a href="#tab13" data-toggle="tab">Attesa</a></li>
				<li class="active"><a href="#tab14" data-toggle="tab">Approvate</a></li>
				<li class=""><a href="#tab15" data-toggle="tab">Rigettate</a></li>
				<li class=""><a href="#tab16" data-toggle="tab">Ricerca</a></li>
				
              </ul>
              <div class="tab-content">
			
                <div class="tab-pane" id="tab11">
						<?php include('select1.php'); ?>
			</div>

                <div class="tab-pane" id="tab12">	
						<?php include('select2.php'); ?>
            </div>
			
				<div class="tab-pane" id="tab13">
						<?php include('select3.php'); ?>
				</div>
				
               <div class="tab-pane active" id="tab14">
						<?php include('select4.php'); ?>
				</div>
				
               <div class="tab-pane" id="tab15">
						<?php include('select5.php'); ?>
				</div>
              </div>
			
			<?php } elseif(isset($_GET['rejected']) || isset($_GET['rejectedp'])){ ?>
			
			
			        <ul class="nav nav-tabs">
                <li class=""><a href="#tab11" data-toggle="tab">Tutte</a></li>
                <li class=""><a href="#tab12" data-toggle="tab">Prioritarie</a></li>
				<li class=""><a href="#tab13" data-toggle="tab">Attesa</a></li>
				<li class=""><a href="#tab14" data-toggle="tab">Approvate</a></li>
				<li class="active"><a href="#tab15" data-toggle="tab">Rigettate</a></li>
				<li class=""><a href="#tab16" data-toggle="tab">Ricerca</a></li>
				
              </ul>
              <div class="tab-content">
			
                <div class="tab-pane" id="tab11">
						<?php include('select1.php'); ?>
			</div>

                <div class="tab-pane" id="tab12">	
						<?php include('select2.php'); ?>
            </div>
			
				<div class="tab-pane" id="tab13">
						<?php include('select3.php'); ?>
				</div>
				
               <div class="tab-pane" id="tab14">
						<?php include('select4.php'); ?>
				</div>
				
               <div class="tab-pane active" id="tab15">
						<?php include('select5.php'); ?>
				</div>
              </div>
			
			<?php } ?>
            </div>
          
  

    <!-- Tables -->

    <div class="row">
      <div class="col-sm-12 col-lg-12">
        <h2>Tables</h2>
        <div class="row">
          <div class="col-sm-6 col-lg-6">
            <p class="lead text-muted">Striped</p>
            <table class="table table-striped" data-effect="fade">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>          
          </div>
          <div class="col-sm-6 col-lg-6">
            <p class="lead text-muted">Bordered</p>
            <table class="table table-bordered" data-effect="fade">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="2">1</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@TwBootstrap</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>            
          </div>
        </div>
      </div>
	  
	  
	     
        <h2>Labels</h2>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Label</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                Default
              </td>
              <td class="cleafix">
                  <span class="label label-default pull-left" data-effect="pop">Default</span>
              </td>
            </tr>
            <tr>
              <td>
                Success
              </td>
              <td class="cleafix">
                  <span class="label label-success pull-left" data-effect="pop">Success</span>
              </td>
            </tr>
            <tr>
              <td>
                Warning
              </td>
              <td class="cleafix">
                  <span class="label label-warning pull-left" data-effect="pop">Warning</span>
              </td>
            </tr>
            <tr>
              <td>
                Info
              </td>
              <td class="cleafix">
                  <span class="label label-info pull-left" data-effect="pop">Info</span>
              </td>
            </tr>
            <tr>
              <td>
                Danger
              </td>
              <td class="cleafix">
                  <span class="label label-danger pull-left" data-effect="pop">Danger</span>                
              </td>
            </tr>
          </tbody>
        </table>
      
	  
	           <p class="lead text-muted">Left Tabs</p>
            <div class="tabbable tabs-left">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab21" data-toggle="tab">Section 1</a></li>
                <li><a href="#tab22" data-toggle="tab">Section 2</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab21">
                  <p>I'm in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.</p>
                </div>
                <div class="tab-pane" id="tab22">
                  <p>Howdy, I'm in Section 2. Aenean tempor luctus sem quis euismod. Praesent nec metus eu urna tempor varius id quis mauris. Quisque interdum sollicitudin sollicitudin. </p>
                </div>
              </div>
            </div>
			
    </div>




    
  </div> <!-- /container -->

  <footer class="text-center">
    <p>&copy; Techie Skin</p>
    <div class="credits">
        <!-- 
            All the links in the footer should remain intact. 
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=Techie
        -->
        <a href="https://bootstrapmade.com/">Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>

  <!-- Main Scripts-->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  
    <!-- Bootstrap 3 has typeahead optionally -->
    <script src="assets/js/typeahead.min.js"></script>
    

</body>
</html>