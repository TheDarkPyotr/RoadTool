<?php
$UC_PATH = PATH. "segnalazioni/";

?>






<?php if(!isset($_GET['all']) && !isset($_GET['via'])  && !isset($_GET['info'])){

	echo'<nav aria-label="Page navigation" align="center">
    <ul class="pagination">';
			
		$page = isset($_GET['p']) ? $input->EscapeString($_GET['p']) : 1;
		//$flag = isset($_GET['name']) ? "WHERE username LIKE '%".$input->EscapeString($_GET['name'])."%'" : "";
		$sql = mysql_query("SELECT * FROM city_report WHERE hide LIKE 0 ORDER BY id DESC") or die();
		if(mysql_num_rows($sql) > 0) {
		//$sql = mysql_query("SELECT * FROM city_report ".$flag." ORDER BY id DESC") or die();
		$count = mysql_num_rows($sql);
		$pages = ceil($count / 15);
		$limit = 15;
		$offset = $page - 1;
		$offset = $offset * 15;
		//$sql = mysql_query("SELECT * FROM city_report ".$flag." ORDER BY username ASC LIMIT $limit OFFSET $offset") or die();
		$sql = mysql_query("SELECT * FROM city_report WHERE hide LIKE 0 ORDER BY id DESC LIMIT $limit OFFSET $offset") or die();
		
		if($page > 1) { ?>

		 <li>
            <a href="?p=<?php echo ($page-1); ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
		<?php } else { ?>
		<li class="disabled">
		 <a href="" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
		<?php }
		
		$i = 0;
		$n = $pages;
		while ($i <> $n){
			$i++;
			if ($i < $page + 8){
				if($i == $page){ echo "<li class=\"active\"><a href=\"#\">".$i."</a></li>\n";
				} else {
					if ($i + 4 >= $page && $page + 4 >= $i){
						echo "<li><a href=\"?p=".$i."  \">".$i."</a></li>\n";
					}
				}
			}
		}
		?>
		<?php if($page < $pages) { ?><li><a href="?p=<?php echo ($page+1); ?>">&raquo;</a></li>
		<?php }else{ ?>
		<li class="disabled"><a href="">&raquo;</a></li><?php } ?>

			</ul>
		</nav>
				<div class="card">
					<div class="table-responsive">
						<table class="table table-no-border table-striped table-hover table-condensed table-responsive">
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
				
				if($report['visibility'] == 0) $longname = "Utente ignoto";
						else $longname = ''.$report['name'].' '.$report['surname'].'';
					
				echo '
				<tr> 
   					<td><a href="'.PATH."segnalazioni".'?all='.$report['id'].'">'.$report['id'].'</a></td>
    				<td><a href="'.PATH."segnalazioni".'?all='.$report['id'].'">'.$input->cutString($report['report_title'],25).'</a></td>
    				<td>'.$typo['content'].'</td>
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
			

				</tbody>
			</table>
			<p>Clicca su <b>ID</b> o su <b>Titolo</b> per visualizzare ulteriori dettagli inerenti la segnalazione.</p>
					</div>
		</div>

			
	<?php
	} else echo "Nessuna richiesta in questa categoria."; 
			} else if(isset($_GET['all'])){
				
	//Controllo validità ID 
	$id = isset($_GET['all']) ? $input->EscapeString($_GET['all']) : '';
	$sql = mysql_query("SELECT * FROM city_report WHERE id = ".$id) or die();
	$row = mysql_fetch_assoc($sql);
	
	if(mysql_num_rows($sql) > 0 && $row['hide'] == 0){

		$typology = mysql_query("SELECT * FROM typology WHERE id = ".$row['report_type']);
		$typo = mysql_fetch_assoc($typology);
	
	
	$messtype = "default";
	$progresslevel = "20%";
				switch($row['status']){
					
					case "ATTESA":
						$messtype = "royal"; // grigio
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
				if($row['visibility'] == 0) $longname = "Utente ignoto";
						else $longname = ''.$row['name'].' '.$row['surname'].'';
	?>
<div class="container">

		<div class="card card-primary">
			<div class="row">
			<h1 class="color-success" align="center">Dettagli segnalazione ID <?php echo $row['id']; ?></h1>
				<div class="col-md-6">
					<div class="card-block">
						<h3 class="color-primary">Dettagli</h3>
						<ul class="list-unstyled">
							<li>
								<strong>Oggetto:</strong> <?php echo $row['report_title']; ?></li>
							<li>
								<strong>Tipologia:</strong> <?php echo $typo['content']; ?></li>
							<li>
								<strong>Indirizzo:</strong> <?php echo $row['report_address']; ?></li>
							<li>
							<li>
								<strong>Segnalato da:</strong> <?php echo $longname; ?></li>
							<li>
								<strong>Data:</strong> <?php echo $row['report_insertdate']; ?></li>
							<li>
								<strong>Stato:</strong>
								<a href="come-funziona" class="ms-tag ms-tag-<?php echo $messtype; ?>"><?php echo $row['status']; ?></a>
							</li>
						</ul>

								<h4 class="color-primary"> Progressione</h4>
								<div class="progress progress-striped active">
					<div class="progress-bar progress-bar-<?php echo $messtype; ?>" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progresslevel; ?>;">
						<span class="sr-only">70% Complete</span>
					</div>
				</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card-block">
					<h3 class="color-primary"> Descrizione segnalazione</h3 >
						<p> <?php echo $row['report_desc']; ?>

					<?php if($row['answer'] == "") { ?>
						<h4 class="color-primary"> Descrizione status</h4 >
						<p> <?php echo $status_set[''.$row['status'].'']; ?>
						<?php } else { ?>
						<h4 class="color-primary"> Risposta dell'amministrazione</h4>
						<p><?php echo $row['answer']; ?> </p >
				<?php } ?>


					</div>
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


<?php  

	} else echo "Richiesta inesistente o non visibile!";
		} ?>
