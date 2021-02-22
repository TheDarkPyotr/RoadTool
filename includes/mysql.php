<?php
mysql_connect($sql['hostname'], $sql['username'], $sql['password']) or die ("<br><font size='2' face='Tahoma'><b>Errore del CMS:</b><br><em>Non Riesco a connettermi al database MySQL!</em></font>");
mysql_select_db($sql['database'])or die("

	
		<font size=6> Manutenzione Straordinaria </font>
		<br><font size='2' face='Tahoma'><b>Dettagli Tecnici: </b>Non connesso al Database MywSQL</font>

<br><font size='2' face='Tahoma'>Non connesso al Database MyeeQL</font>


");

unset($sql['hostname']);
unset($sql['username']);
unset($sql['password']);
unset($sql['database']);
?>