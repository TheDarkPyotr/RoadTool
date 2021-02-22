<?
// Creo una variabile dove imposto il numero di record 
// da mostrare in ogni pagina
$x_pag = 5;

// Recupero il numero di pagina corrente.
// Generalmente si utilizza una querystring
$pag = isset($_GET['pag']) ? $_GET['pag'] : 1;

// Controllo se $pag è valorizzato e se è numerico
// ...in caso contrario gli assegno valore 1
if (!$pag || !is_numeric($pag)) $pag = 1; 

// Mi connetto al database
$conn = mysql_connect("localhost","rooter","admin");
mysql_select_db("alcamoreport", $conn);

// Uso mysql_num_rows per contare il totale delle righe presenti all'interno della tabella agenda
$all_rows = mysql_num_rows(mysql_query("SELECT id FROM agenda"));

// Tramite una semplice operazione matematica definisco il numero totale di pagine
$all_pages = ceil($all_rows / $x_pag);

// Calcolo da quale record iniziare
$first = ($pag - 1) * $x_pag;

// Recupero i record per la pagina corrente...
// utilizzando LIMIT per partire da $first e contare fino a $x_pag
$rs = mysql_query("SELECT * FROM cms_system LIMIT ".$first.", ".$x_pag."");
$nr = mysql_num_rows($rs);
if ($nr != 0){
  for($x = 0; $x < $nr; $x++){
    $row = mysql_fetch_assoc($rs);
    echo "ww<table><tr>";
    echo "<td>" . $row['id'] . "</td></br>";
    echo "<td>" . $row['username'] . "</td></br>";
    echo "<td>" . $row['motto'] . "</td></br>";
    echo "</tr></table>";
  }
}else{
  echo "Nessun record trovato!";
}

// Se le pagine totali sono più di 1...
// stampo i link per andare avanti e indietro tra le diverse pagine!
if ($all_pages > 1){
  if ($pag > 1){
    echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag - 1) . "\">";
    echo "Pagina Indietro</a>&nbsp;";
  }
  // faccio un ciclo di tutte le pagine
  for ($p=1; $p<=$all_pages; $p++) {
    echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . $p . "\">";
    echo $p . "</a>&nbsp;";    
  }
  if ($all_pages > $pag){
    echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag + 1) . "\">";
    echo "Pagina Avanti</a>";
  } 
}

// Chiudo la connessione ad DB
mysql_close($conn);
?>