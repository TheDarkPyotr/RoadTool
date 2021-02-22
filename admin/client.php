<?php
$is_maintenance = 1;
include("../core.php");

$page['id'] = "Gestione Client";
$page['rank'] = 7;

include("header.php");

if(isset($_POST['next'])){
	$ip = isset($_POST['ip']) ? $input->EscapeString($_POST['ip']) : '';
	$game = isset($_POST['game']) ? $_POST['game'] : 0;
	$mus = isset($_POST['mus']) ? $_POST['mus'] : 0;
	$text = isset($_POST['text']) ? $input->EscapeString($_POST['text']) : '';
	$vars = isset($_POST['vars']) ? $input->EscapeString($_POST['vars']) : '';
	$product = isset($_POST['product']) ? $input->EscapeString($_POST['product']) : '';
	$furni = isset($_POST['furni']) ? $input->EscapeString($_POST['furni']) : '';
	$load = isset($_POST['load']) ? $input->EscapeString($_POST['load']) : '';
	$fcurl = isset($_POST['fcurl']) ? $input->EscapeString($_POST['fcurl']) : '';
	$base = isset($_POST['base']) ? $input->EscapeString($_POST['base']) : '';
	$habbo = isset($_POST['habbo']) ? $input->EscapeString($_POST['habbo']) : '';
	
	if($ip == '' || $game == '' || $mus == '' || $text == '' || $vars == '' || $load == '' || $fcurl == '' || $base == '' || $habbo == '' || $product == '' || $furni == '')
		$error = 'Tutti i campi contrassegnati con <b>*</b> sono obbligatori!';
	else{
		mysql_query("UPDATE cms_system SET ip = '".$ip."',port = '".$game."',fport = '".$mus."',texts = '".$text."',variables = '".$vars."',productdata = '".$product."',furnidata = '".$furni."',clienturl = '".$fcurl."',base = '".$base."',habboswf = '".$habbo."',clientext = '".$load."'");
		$ok = "Le modifiche sono state salvate correttamente!";
		$configsql = mysql_query('SELECT * FROM cms_system LIMIT 1') or die(mysql_error()); 
		$config = mysql_fetch_assoc($configsql);
		$client = array(
			'ip'          => $config['ip'],
			'port'        => $config['port'],
			'fport'       => $config['fport'],
			'texts'       => $config['texts'],
			'vars'        => $config['variables'],
			'productdata' => $config['productdata'],
			'furnidata'   => $config['furnidata'],
			'clienturl'   => $config['clienturl'],
			'base'        => $config['base'],
			'habboswf'    => $config['habboswf'],
			'clientext'   => $config['clientext']
		);
	}
}
?>	
	<section id="main" class="column">
		
		<?php
		if(isset($error))
			echo '<h4 class="alert_error">'.$error.'</h4>';
		else if(isset($ok))
			echo '<h4 class="alert_success">'.$ok.'</h4>';
		?>
		
		<article class="module width_full">
			<form action="" method="post">
			<header><h3>Gestione Client</h3></header>
				<div class="module_content">
						<fieldset>
							<label>INDIRIZZO IP*</label>
							<input type="text" name="ip" value="<?php echo $client['ip']; ?>">
						</fieldset>
						<fieldset>
							<label>PORTA GAME*</label>
							<input type="text" name="game" value="<?php echo $client['port']; ?>">
						</fieldset>
						<fieldset>
							<label>PORTA MUS*</label>
							<input type="text" name="mus" value="<?php echo $client['fport']; ?>">
						</fieldset>
						<fieldset>
							<label>External Flash Text*</label>
							<input type="text" name="text" value="<?php echo $client['texts']; ?>">
						</fieldset>
						<fieldset>
							<label>External Variables*</label>
							<input type="text" name="vars" value="<?php echo $client['vars']; ?>">
						</fieldset>
						<fieldset>
							<label>Productdata*</label>
							<input type="text" name="product" value="<?php echo $client['productdata']; ?>">
						</fieldset>
						<fieldset>
							<label>Furnidata*</label>
							<input type="text" name="furni" value="<?php echo $client['furnidata']; ?>">
						</fieldset>
						<fieldset>
							<label>Testo di Caricamento*</label>
							<input type="text" name="load" value="<?php echo $client['clientext']; ?>">
						</fieldset>
						<fieldset>
							<label>Flash client url*</label>
							<input type="text" name="fcurl" value="<?php echo $client['clienturl']; ?>">
						</fieldset>
						<fieldset>
							<label>Swf Base*</label>
							<input type="text" name="base" value="<?php echo $client['base']; ?>">
						</fieldset>
						<fieldset>
							<label>Habbo.swf*</label>
							<input type="text" name="habbo" value="<?php echo $client['habboswf']; ?>">
						</fieldset>

						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="next" value="Salva modifiche" class="alt_btn">
				</div>
			</footer>
			</form>
		</article>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>
		<div class="spacer"></div>

	</section>
	<br>

</body>

</html>