<?php
/*
© by alemoppo (Moroni Alessandro)
*/
require("config.php");
if( mysql_query("
CREATE TABLE IF NOT EXISTS utenti (   
id MEDIUMINT(8) NOT NULL AUTO_INCREMENT,
username VARCHAR(25) NOT NULL default '',
password VARCHAR(32) NOT NULL default '',
email VARCHAR(255) NOT NULL default '',
pass VARCHAR(32) default '',
attivazione VARCHAR(32) default '',
PRIMARY KEY (id)
);
"))
echo 'Installazione riuscita!';
else echo 'Errore durante l\'installazione!';
mysql_close($db);
?>
