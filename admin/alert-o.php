<?php
$is_maintenance = 1;
include("../core.php");

$page['id'] = "Invia Notifica";
$page['rank'] = 4;

include("header.php");
?>	
<section id="main" class="column">
	<?php
		if(isset($_POST['add'])){
		$name = isset($_POST['name']) ? $input->EscapeString($_POST['name']) : '';
		$desc = isset($_POST['text']) ? $_POST['text'] : '';
		$desc = strpos($desc, "'") ? addslashes($desc) : $desc;

		if($name == '' || $desc == '')
			$error = 'Tutti i campi contrassegnati con <b>*</b> sono obbligatori!';
		else{
			if($name == "(tutti)")
				$exits = mysql_query("SELECT id FROM users") or die();
			elseif($name == "(online)")
				$exits = mysql_query("SELECT id FROM users WHERE online = '1'") or die();
			elseif($name == "(staff)")
				$exits = mysql_query("SELECT id FROM users WHERE rank > 3") or die();
			else
				$exits = mysql_query("SELECT id FROM users WHERE username = '".$name."' LIMIT 1") or die();
				
			if(mysql_num_rows($exits) > 0){
				while($row = mysql_fetch_array($exits)){
					$userid = $row[0];
					mysql_query("INSERT INTO cms_alert (user_id, text) VALUES (".$userid.",'".$desc."');");
				}
			}
			$ok = "La Notifica &egrave; stata inviata correttamente!";
		}
	}
	
		if(isset($error))
			echo '<h4 class="alert_error">'.$error.'</h4>';
		else if(isset($ok))
			echo '<h4 class="alert_success">'.$ok.'</h4>';
		?>
		<script type="text/javascript" src="<?php echo PATH."admin/"; ?>js/autocomplete.js"></script> 
		<script type="text/javascript">
		// è la classe provider
function StateSuggestions() {

    this.states = [
	<?php
	$sql = mysql_query("SELECT username FROM users");
	$text = '';
	while($row = mysql_fetch_array($sql))
		$text .= '"'.$row[0].'",';
	$text = substr($text, 0, -1);
	echo $text;
	?>
    ];
}

// funzione che richiede i suggerimenti passandogli un AutoSuggestControl
StateSuggestions.prototype.requestSuggestions = function (oAutoSuggestControl /*:AutoSuggestControl*/,  bTypeAhead) {
    var aSuggestions = [];
    var sTextboxValue = oAutoSuggestControl.textbox.value;
    
    if (sTextboxValue.length > 0){
    
	// trasformo tutto in minuscolo
	var sTextboxValueLC = sTextboxValue.toLowerCase();
    
        //search for matching states
        for (var i=0; i < this.states.length; i++) { 
	   
	   // trasformo anche i suggerimenti in minuscolo
	   var sStateLC = this.states[i].toLowerCase();
	    
            if (sStateLC.indexOf(sTextboxValueLC) == 0) {
                
		//aSuggestions.push(this.states[i]);
		//suggerisco la stringa già presente, quindi con i caratteri maiuscoli e minuscoli, più la stringa rimanente suggerita
		aSuggestions.push(sTextboxValue + this.states[i].substring(sTextboxValue.length));
            } 
        }
    }

    //provide suggestions to the control
    //oAutoSuggestControl.autosuggest(aSuggestions);
    oAutoSuggestControl.autosuggest(aSuggestions, bTypeAhead);
};

window.onload = function () {
                var oTextbox = new AutoSuggestControl(document.getElementById("txt1"), new StateSuggestions());        
            }
		</script>
		<style>
		div.suggestions {
			position: absolute;
			width:500px;
			background: #F6F6F6;
			border-bottom: 1px solid #ccc;
			border-left: 1px solid #ccc;
			border-right: 1px solid #ccc;
		}
		div.suggestions div {
			cursor: pointer;
			padding: 0px 3px;
			background-color: #F6F6F6;
			font-size:15px;
		}
		div.suggestions div.current {
			background-color: #ccc;
			color: white;
		}
		</style>
		<article id="newarticle" class="module width_full">
			<form action="" method="post" autocomplete="off">
			<header><h3>Invia Notifica</h3></header>
				<div class="module_content">
						<fieldset>
							<label>Username*</label>
							<input id="txt1" name="name" type="text"><br><br><br><br>
							 - "<b>(tutti)</b>" per darlo a tutti gli utenti<br>
							 - "<b>(online)</b>" per darlo a tutti gli utenti in hotel<br>
							 - "<b>(staff)</b>" per darlo a tutto lo staff
						</fieldset>
						
						<fieldset>
							<label>Testo*</label>
							<textarea name="text" rows="10" cols="10"></textarea>
						</fieldset>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="add" value="Invia Notifica" class="alt_btn">
				</div>
			</footer>
			</form>
		</article>
		<div class="spacer"></div>
	</section>
	<br>

</body>

</html>