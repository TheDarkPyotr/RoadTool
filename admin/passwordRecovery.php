<?php
include("../core.php");
$token = $input->EscapeString($_GET['token']);

$sql = mysql_query("SELECT * FROM cms_reset WHERE token = '".$token."'");

if(mysql_num_rows($sql) > 0){
    $row = mysql_fetch_assoc($sql);

    if(isset($_POST['next']) && $_POST['next'] == 1){
        $pass = $_POST['Password'];
        $pass2 = $_POST['retypedPassword'];
        
        if($pass == '')
            $error = "Digita la tua nuova Password ";
        else if(strlen($pass) < 6 && strlen($pass) > 23)
            $error = "La Password deve comprendere tra i 6 e i 23 caratteri";
        else if($pass != $pass2)
            $error = "Le Password non corrispondono";
        else{
            mysql_query("UPDATE accounts SET password = '".$input->HoloHash($pass)."' WHERE email = '".$row['mail']."'");
			mysql_query("UPDATE users SET password = '".$input->HoloHash($pass)."' WHERE mail = '".$row['mail']."'");
            mysql_query("DELETE FROM cms_reset WHERE mail = '".$row['mail']."'");
            header("location: ".PATH."admin/");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<style>
.admin-logo {
	
	height: 60px;
	margin-top: 50px;
}
</style>


	
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
			
			<div class="admin-logo"><center><img src="../dist/img/logo-city.png"></center></div>
		
                <div class="login-panel panel panel-default">
				
                    <div class="panel-heading">
                        <h3 class="panel-title">Area Riservata - Recupero Password</h3>
                    </div>
                    <div class="panel-body">
                      
				
						<?php
										if(isset($error)){
											echo ' <div class="alert alert-danger">'.$error.'</div>';
										} ?>
						
                     
                            <fieldset>
							<form method="post" action="" id="pwreset-form">
                                <div class="form-group">
                                    <input class="form-control" id="email-address" value="<?php echo $row['mail']; ?>" autocomplete="off" disabled> <? // ?>
                                </div>
								
                                <div class="form-group">
                                    <input class="form-control" type="password" name="Password" id="register-password" placeholder="Nuova password">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="retypedPassword" id="register-password2" placeholder="Ripeti nuova password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
								
								<input type="hidden" name="token" value="<?php echo $token; ?>">
									<input type="hidden" name="next" value="1">
				
                                <input type="submit" name="commit" class="btn btn-lg btn-info btn-block" value="Salva">
								
								
								</form>
                            </fieldset>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	

	
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

	<?php
}
?>
</body>