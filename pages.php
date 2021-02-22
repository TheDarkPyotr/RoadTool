	<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>ID</th> 
    				<th>Username</th> 
    				<th>Email</th> 
    				<th>Creazione</th> 
    				<th>Azioni</th>
				</tr> 
			</thead> 
			<tbody>
			
				<ul class="pagination pagination-sm">
	<?php
			if(mysql_num_rows($sql) > 0)
				while($row = mysql_fetch_assoc($sql)){
				$account = mysql_fetch_assoc(mysql_query("SELECT * FROM achievements"));
				echo '
				<tr> 
   					<td>'.$row['id'].'</td> 
    				<td>'.(isset($_GET['group_name']) ? str_replace($input->EscapeString($_GET['group_name']), "<b>".$input->EscapeString($_GET['group_name'])."</b>", $row['group_name']) : $row['group_name']).'</td> 
    				<td>'.$account['id'].'</td> 
    				<td>'.date('d F Y', $row['id']).'</td> 
    				<td><a href="?edit='.$row['id'].'"><img src="'.PATH.'admin/images/icn_edit.png"></a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:del('.$row['id'].')"><img src="'.PATH.'admin/images/icn_trash.png"></a></td> 
				</tr>';
				}
				
				
				
				if($page > 1) { ?>
			
				
				<li><a href="?page=<?php echo ($page-1).(isset($_GET['group_name']) ? "&name=".$input->EscapeString($_GET['group_name']) : ""); ?>">&laquo;</a></li><?php } else { ?><li><a href="">&laquo;</a></li><?php }
		
		$i = 0;
		$n = $pages;
		while ($i <> $n){
			$i++;
			if ($i < $page + 8){
				if($i == $page){ echo "<li class=\"active\"><a href=\"#\">".$i."</a></li> ";
				} else {
					if ($i + 4 >= $page && $page + 4 >= $i){
						echo "<li><a href=\"?page=".$i."".(isset($_GET['group_name']) ? "&name=".$input->EscapeString($_GET['group_name']) : "")."\">".$i."</a></li>  ";
					}
				}
			}
		}
		?>
		<?php if($page < $pages) { ?><li><a href="?page=<?php echo ($page+1).(isset($_GET['group_name']) ? "&name=".$input->EscapeString($_GET['group_name']) : ""); ?>">&raquo;</a></li><?php }else{ ?><li><a href="">&raquo;</a></li><?php } ?>
		
				
	</ul>
    </div>
			</tbody> 
			</table>
			</div>