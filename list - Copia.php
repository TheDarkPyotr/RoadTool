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
$newpsws = "loll1234";

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



?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
  
  <title>Techie - Bootstrap 3 modern skin</title>
  
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,900' rel='stylesheet' type='text/css'>


  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="Techie Bootstrap 3 skin">
  <meta name="keywords" content="bootstrap 3, skin, flat">
  <meta name="author" content="bootstraptaste">
  
  <!-- Bootstrap css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  
  <link href="assets/css/bootstrap.techie.css" rel="stylesheet">


</head>

<body>
          <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex3-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#"><img src="./assets/img/logo-city.png" style="height: 60px"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex3-collapse">
                  <ul class="nav navbar-nav">
                    <li><a href="./report.php">Segnala</a></li>
                    <li class="active"><a href="./list.php">Elenco</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Iter burocratico <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                      </ul>
                    </li>
					 <li><a href="#">Area riservata</a></li>
                  </ul>
                  <form class="navbar-form navbar-right" role="search">
                 
                  </form>
                </div><!-- /.navbar-collapse -->
              </nav>

	
    <!-- Header Carousel -->
<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=Alcamo&key=AIzaSyAQXt8aeCYIFpKwqa8qwcX17jLOBXN0Zqc" allowfullscreen></iframe>

	
  <div class="container">

  
		<h2>Lista segnalazioni</h2>
 
            <div class="tabbable">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab11" data-toggle="tab">Tutte</a></li>
                <li><a href="#tab12" data-toggle="tab">Prioritarie</a></li>
				<li><a href="#tab12" data-toggle="tab">Attesa</a></li>
				<li><a href="#tab12" data-toggle="tab">Approvate</a></li>
				<li><a href="#tab12" data-toggle="tab">Rigettate</a></li>
				
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab11">
				
				
				
	
		<header>
	
		<ul class="tabs2"><center><ul class="pagination pagination-sm">
		<?php if(!isset($_GET['view'])){ ?>
			<?php
		$page = isset($_GET['page']) ? $input->EscapeString($_GET['page']) : 1;
		//$flag = isset($_GET['name']) ? "WHERE username LIKE '%".$input->EscapeString($_GET['name'])."%'" : "";
		$sql = mysql_query("SELECT * FROM city_report ORDER BY id DESC") or die();
		//$sql = mysql_query("SELECT * FROM city_report ".$flag." ORDER BY id DESC") or die();
		$count = mysql_num_rows($sql);
		$pages = ceil($count / 15);
		$limit = 15;
		$offset = $page - 1;
		$offset = $offset * 15;
		//$sql = mysql_query("SELECT * FROM city_report ".$flag." ORDER BY username ASC LIMIT $limit OFFSET $offset") or die();
		$sql = mysql_query("SELECT * FROM city_report ORDER BY id DESC LIMIT $limit OFFSET $offset") or die();
		
		if($page > 1) { ?><li><a href="?page=<?php echo ($page-1); ?>">&laquo;</a></li><?php } else { ?><li><a href="">&laquo;</a></li><?php }
		
		$i = 0;
		$n = $pages;
		while ($i <> $n){
			$i++;
			if ($i < $page + 8){
				if($i == $page){ echo "<li class=\"active\"><a href=\"#\">".$i."</a></li>\n";
				} else {
					if ($i + 4 >= $page && $page + 4 >= $i){
						echo "<li><a href=\"?page=".$i."  \">".$i."</a></li>\n";
					}
				}
			}
		}
		?>
		<?php if($page < $pages) { ?><li><a href="?page=<?php echo ($page+1); ?>">&raquo;</a></li><?php }else{ ?><li><a href="">&raquo;</a></li><?php } ?>
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
			
			/*
			'IN ATTESA','IN CORSO','RIGETTATA','RISOLTA'
			
			$sql = mysql_query("SELECT * FROM cms_news ORDER BY id DESC");
				
				while($row = mysql_fetch_assoc($sql)){
			
			*/
			if(mysql_num_rows($sql) > 0)
				
			
			/*
			$report1 = mysql_query("SELECT * FROM users ORDER BY id DESC");
			
			while($report = mysql_fetch_assoc($report1)){
				*/
				while($row = mysql_fetch_assoc($sql)){
					$report = mysql_fetch_assoc(mysql_query("SELECT * FROM city_report WHERE id = '".$row['id']."'"));
				
				
				$messtype = "default";
				switch($report['status']){
					
					case "ATTESA":
						$messtype = "warning"; // grigio
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
				
				if($report['visibility'] == 0) $longname = "Utente ignoto";
						else $longname = ''.$report['name'].' '.$report['surname'].'';
				echo '
				<tr> 
   					<td><a href="?view='.$report['id'].'">'.$report['id'].'</a></td> 
    				<td><a href="?view='.$report['id'].'">'.$report['report_title'].'</a></td> 
    				<td>'.$report['report_type'].'</td>
					<td>'.$report['report_address'].'</td> 
    				<td>'.$report['report_insertdate'].'</td> 
					<td>'.$longname.'</td> 
    				<td>   
						<span class="label label-'.$messtype.' pull-left" data-effect="pop">'.$report['status'].'</span>                
					</td> 
				</tr>';
				
			
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
			} else if(isset($_GET['view'])){
	$id = isset($_GET['view']) ? $input->EscapeString($_GET['view']) : '';
	

	
	$sql = mysql_query("SELECT * FROM city_report WHERE id = ".$id) or die();
	$row = mysql_fetch_assoc($sql);
	
	$messtype = "default";
	$progresslevel = "20%";
				switch($row['status']){
					
					case "ATTESA":
						$messtype = "default"; // grigio
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
	?>
		
		    <h1>Dati Segnalazione <small> #<?php echo $row['id']; ?> </small></h1>
    <hr>
	   <div class="row">
          <div class="col-sm-6 col-lg-6" align="left">
            
			
     
          <b>Titolo: </b><?php echo $row['report_title']; ?></br>
		  <b>Tipologia: </b><?php echo $row['report_type']; ?></br>
		  <b>Indirizzo: </b><?php echo $row['report_address']; ?></br>
		  <b>Descrizione: </b><?php echo $row['report_desc']; ?></br>
		  <b>Data: </b><?php echo $row['report_insertdate']; ?></br>
		  <b>Status: </b><span class="label label-<?php echo $messtype; ?> pull-center" data-effect="pop"> <?php echo $row['status'];  ?></span></br>
		  <b>Progressione richiesta </b><div class="progress ">
         <div class="progress-bar progress-bar-<?php echo $messtype; ?>" style="width: <?php echo $progresslevel; ?>"><span>  <?php echo $row['status'];  ?></span></div>
        </div>  
      
	  
		  <hr>
		  <?php if($row['answer'] != ""){ ?>
		  <b>Comunicazione dall'Amministrazione: </b><?php echo $row['answer']; ?></br>
		  <?php } else { 
		  
		  	switch($row['status']){
					
					case "ATTESA":
						echo "<b>Descrizione status: </b> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. "; // grigio
					break;
					case "APPROVATA":
						echo "<b>Descrizione status: </b> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. "; // grigio
					break;
					case "RIGETTATA":
						echo "<b>Descrizione status: </b> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. "; // grigio
					break;
					case "RISOLTA":
						echo "<b>Descrizione status: </b> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. "; // grigio
					break;
					
				}
		  }
		  ?>
		  
			
			
			
          </div>
		  
		  
          <div class="col-sm-6 col-lg-6">
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
        </div>

		<div class="spacer"></div>
	<?php  } ?>
   
		
			
                 
                </div>
                <div class="tab-pane" id="tab12">
                  <p>Howdy, I'm in Section 2.Morbi vel nibh et arcu pretium adipiscing. Ut vestibulum est eget justo facilisis ullamcorper.  </p>
                </div>
              </div>
            </div>
          
  
  <script>
function refreshCaptcha(){
	var img = document.images['captcha'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
  
                <?php
					if($error1)
						echo '<div class="alert alert-danger">
									<strong>Errore: </strong> Inserisci un nome valido!
								</div>';
					if($error2)
						echo '<div class="alert alert-danger">
									<strong>Errore: </strong> Inserisci un indirizzo di segnalazione valido!
								</div>';
					if($error3)
						echo '<div class="alert alert-danger">
									<strong>Errore: </strong> Inserisci un titolo segnalazione valido!
								</div>';
					else if($error4)
						echo '<div class="alert alert-warning">
								<strong>Attenzione:</strong> Codice di sicurezza non valido! '.$_SESSION['register-captcha-bubble'].' e '.$response.'
								</div>';
					if($error5)
						echo '<div class="alert alert-danger">
									<strong>Errore: </strong> Inserisci un cognome valido!
								</div>';
					
					if($error6)
						echo '<div class="alert alert-danger">
									<strong>Errore: </strong> Inserisci un indirizzo di residenza valido!
								</div>';
								
					if($error7)
						echo '<div class="alert alert-danger">
									<strong>Attenzione: </strong> Se non accetti informativa sulla privacy non potremo inoltrare la tua richiesta!
								</div>';
				?>
				
  <?php if($ok == true){ ?>
   <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>La tua segnalazione è stata inoltrata con successo!</strong> 
        </div>
			
		<?php } ?>
	
    
	
	
	

  <!-- Controls -->
      <div class="col-sm-12 col-lg-12">
        <h2>Dati segnalazione</h2>
		   <form id="change-password" method="post" action="">

        <div class="row">
          <div class="col-sm-4 col-lg-3">
            <p class="lead text-muted">1. Dati segnalatore</p>
          
			  <input type="hidden" name="next" value="1" />
			   <input type="text" id="name" name="Name" class="form-control" placeholder="Nome*"> <!--  <input type="password" id="current-password" size="35" name="currentPassword" value="" class="password-field" maxlength="32"/>-->
			<br>
			
            <input type="text" id="surname" name="Surname" class="form-control" placeholder="Cognome*">
            <br>
	
			
			<input type="text" id="cellphonenumber" name="CellPhoneNumber" class="form-control" placeholder="Telefono/Cellulare">
            <br>
			
			<input type="text" id="emailaddress" name="EmailAddress" class="form-control" placeholder="Indirizzo email">
            <br>
			
			<input type="text" id="addresshome" name="AddressHome" class="form-control" placeholder="Indirizzo residenza*">
            <br>
			
		
            
          </div>
          <div class="col-sm-4 col-lg-3">
		  
		  <p class="lead text-muted">2. Dettagli segnalazione</p>
            <input type="text" id="reportaddress" name="ReportAddress" class="form-control" placeholder="Indirizzo segnalazione*">
            <br>
			
              <select class="form-control">
              <option>Tipologia segnalazione* - DA SISTEMARE DESCRIZ</option>
              <option>Urbana</option>
              <option>Insegnistica</option>
              <option>Energetica</option>
              <option>Sanitaria</option>
            </select>
            <br>
			
			<input type="text" id="reporttitle" name="ReportTitle" class="form-control" placeholder="Titolo segnalazione*">
            <br>
			
			<textarea class="form-control" placeholder="Descrizione segnalazione*" rows="4"></textarea>
            <br>
			
                   
          </div>
          <div class="col-sm-4 col-lg-3">
            <p class="lead text-muted">3. Disposizioni di legge</p>
            <div class="radio">
              <label>
                <input type="radio" name="visibility" id="optionsRadios1" value="agree">
                Il titolo III della parte I del D.Lgs. 196/03 ("Codice della privacy") detta le regole generali per il trattamento dei dati, distinguendo tra regole per tutti i trattamenti (capo I), regole ulteriori per i soggetti pubblici (capo II), regole ulteriori per privati ed enti pubblici economici (capo III).
              </label>
            </div>
           
          </div>
          <div class="clearfix visible-sm visible-md"></div>
          <div class="col-sm-6 col-lg-3">
            <p class="lead text-muted">4. Controllo di sicurezza</p>
			
			
			
			<div id="register-fieldset-captcha" class="field field-captcha">
           <b>Digita qui sotto il codice di sicurezza.</b>
           <!--     <input type="text" name="captchaResponse" id="recaptcha_response_field" value="" autocomplete="off" class="text-field"/> -->
				<input type="text" name="captchaResponse" id="recaptcha_response_field" value="" autocomplete="off" class="form-control" placeholder="Codice">
            <br>

		<div id="recaptcha_image"><img id="captcha" src="<?php echo PATH; ?>/captcha/captcha.php?rand=<?php echo rand(); ?>" width="300" height="60"></div>
		<p><a href="javascript:refreshCaptcha();">Prova ad usare altre parole</a></p>
            </div>

			</br>
			
				   <div style="overflow: hidden">
				   <!-- <input type="submit" id="next" value="Cambia" /> -->
             	<input class="btn btn-success btn-block" type="submit" id="next" value="Segnala" />
		
            </div>
			
			
			</form>
			
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