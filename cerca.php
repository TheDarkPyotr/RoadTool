<header>

	<center>
		<ul class="pagination pagination-sm">

<?php if(!isset($_GET['all'])){ 
			
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
		
		if($page > 1) { ?><li><a href="?p=<?php echo ($page-1); ?>">&laquo;</a></li><?php } else { ?><li class="disabled"><a href="">&laquo;</a></li><?php }
		
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
		<?php if($page < $pages) { ?><li><a href="?p=<?php echo ($page+1); ?>">&raquo;</a></li><?php }else{ ?><li class="disabled"><a href="">&raquo;</a></li><?php } ?>
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
   					<td><a href="?all='.$report['id'].'">'.$report['id'].'</a></td> 
    				<td><a href="?all='.$report['id'].'">'.$input->cutString($report['report_title'],25).'</a></td> 
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
			
	 </div>
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
		  <b>Tipologia: </b><?php echo $typo['content']; ?></br>
		  <b>Indirizzo: </b><?php echo $row['report_address']; ?></br>
		  <b>Descrizione: </b><?php echo $row['report_desc']; ?></br>
		  <b>Data: </b><?php echo $row['report_insertdate']; ?></br>
		  <b>Status: </b><span class="label label-<?php echo $load_set[$row['status']]; ?> pull-center" data-effect="pop"> <?php echo $row['status'];  ?></span></br>
		  <b>Progressione richiesta </b><div class="progress ">
         <div class="progress-bar progress-bar-<?php echo $load_set[$row['status']]; ?>" style="width: <?php echo $load_set[$row['status'].'-perc']; ?>"><span>  <?php echo $row['status'];  ?></span></div>
        </div>  
      
	  
		  <hr>
		  <?php if($row['answer'] != ""){ ?>
		  <b>Comunicazione dall'Amministrazione: </b><?php echo $row['answer']; ?></br>
		  <?php } else { 
		  
		  	switch($row['status']){
					
				case "ATTESA":
						echo $status_set['ATTESA'];
					break;
					case "APPROVATA":
						echo $status_set['APPROVATA'];
					break;
					case "RIGETTATA":
						$status_set['RIGETTATA'];
					break;
					case "RISOLTA":
						$status_set['RISOLTA'];
					break;
					
				}
		  }
		  ?>
		  
			
			
			
          </div>
		  
		  
          <div class="col-sm-6 col-lg-6">
    
	<iframe width="500" height="350" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=Alcamo&key=AIzaSyAQXt8aeCYIFpKwqa8qwcX17jLOBXN0Zqc" allowfullscreen></iframe>

          </div>
        </div>

		<div class="spacer"></div>
<?php  

	} else echo "Richiesta inesistente o non visibile!";
		} ?>
