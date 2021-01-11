
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kalo Pos | Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="icon" href="<?php echo base_url() ?>assets/dist/img/logo.png" type="image/png" sizes="32x32">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/login/app.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/login/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        
        <div class="login-box-body">

			<div class="login-logo">
                <img src="<?php echo base_url() ?>assets/dist/img/logo.png" width="200px">
			</div>

            <form id="login-form"  method="post" action="<?php echo base_url() ?>Login/auth">
                <div id="respon1"><?php echo $this->session->flashdata('msg');?></div>
				<!--div class="login-title">
					Login Admin
				</div-->
                <div class="form-group has-feedback">
                    <input type="text" name="username_txt" id="username" class="form-control" placeholder="Username">
                    <!--span class="ion ion-ios-email form-control-feedback"></span-->
                </div>
                <div class="form-group has-feedback">
                    <input type="password" autocomplete="off" id="password" name="password_txt" class="form-control" placeholder="Password">
                    <!--span class="ion ion-ios-locked form-control-feedback"></span-->
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="text-center">
                        <button id="submit-form" type="submit" class="btn btn-primary btn-action-login">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    
    <script src="<?php echo base_url() ?>assets/login/app.js"></script>
    </boDy>
</html>
