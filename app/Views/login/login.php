<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Login - Brand</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?> ">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome5-overrides.min.css') ?>">
</head>

<body class="bg-gradient-primary" style="margin-top: 20vh;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-9 col-lg-12 col-xl-10">
				<div class="card shadow-lg o-hidden border-0 my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-6 d-none d-lg-flex">
								<div class="flex-grow-1 bg-login-image" style="background: url(&quot;https://img.freepik.com/vetores-gratis/ilustracao-do-conceito-de-login_114360-757.jpg?w=2000&quot;) center / contain no-repeat;"></div>
							</div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h4 class="text-dark mb-4">Faça seu login!</h4>
									</div>
									<div class="alert alert-danger" <?php echo (isset($error) and $error == 'error') ? '' : 'hidden'?> >Os dados informados não estão corretos</div>
									<?php echo form_open('login/login',['class'=>'user']) ?>
										<div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Insira o seu e-mail" name="email"></div>
										<div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Insira sua senha" name="senha"></div>
										<div class="mb-3">
											<!-- <div class="custom-control custom-checkbox small"></div> -->
										</div><button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
									<?php echo form_close() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url('assets/js/script.min.js') ?>"></script>
</body>

</html>