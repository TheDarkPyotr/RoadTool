<?php
$is_maintenance = 1;

include("../core.php");


if(isset($user->row) && isset($_SESSION['adm_log']))
	header("Location: home");

if(isset($_POST['email'])){
	$email = isset($_POST['email']) ? $input->EscapeString($_POST['email']) : '';
	$pass = isset($_POST['password']) ? $input->EscapeString($_POST['password']) : '';
	
	
	if($user->login($email, $input->HoloHash($pass), "off", false, 'true')){
		
		$input->logSession($email, "Accesso Area Riservata", "Accesso eseguito", date('d/m/Y H:i:s'), "Accesso Area Riservata", 0, 0);
		
		if($user->login_error == ''){
			$_SESSION['adm_log'] = PANEL_KEY;
			
			header("location: home");
		}
	}
}

if(isset($_POST['emailAddress'])){
		$forgot_email = $input->EscapeString($_POST['emailAddress']);
		$input->SendMail($forgot_email, 0, true);
}

?>











<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>RimborsiAerei.com - Area Riservata | Login</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Rimborsi<b>Aerei</b>.com</a>
            <small>Facile, veloce, gratuito</small>
        </div>
        <div class="card">
            <div class="body">
                <form method="POST">
                    <div class="msg">Sign in to start your session</div>
					<p><?php echo $user->login_error; ?></p>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                      
                        <div class="col-xs-4">
						<input name="commit" class="btn btn-block bg-pink waves-effect" type="submit" value="Accedi">
                            <!-- <button name="commit" class="btn btn-block bg-pink waves-effect" type="submit">Accedi</button>-->
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html"></a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Recupera Password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>