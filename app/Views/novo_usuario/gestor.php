<?php $this->extend('_common/layout_gestor') ?>
<?php $this->section('content') ?>


<style>
	.minH {
		min-height: 600px;
		padding-top: 5rem;
		padding-bottom: 5rem;
		/* align-content: center; */
		/* position: absolute; */
		/* top: 0; bottom: 0;
	left: 0; right: 0;
	margin: auto;
	padding: auto; */
	}

	.alert {
		text-align: center;
		max-width: 300px;
		max-height: 100px;
	}
</style>
<div class="container">
	<div class="card shadow-lg o-hidden border-0 my-5  ">
		<div class="card-body p-0 position-relative">


			<div class="row">
				<div class="col-lg-5 d-none d-lg-flex minH" style="padding-left: 50px;">
					<div class="flex-grow-1 bg-register-image" style="background: url('https://portal.lumoshive.com/assets/icons/Register.svg') center / contain no-repeat;"></div>
				</div>
				<div class="col-lg-7">


					<div class="p-5">
						<div class="text-center">
							<h4 class="text-dark mb-4">Insira os dados do usuário</h4>
						</div>
						<?php if (isset($mensagem) and $mensagem != 'Sucesso') : ?>
							<div class="alert alert-danger">
								<p><?php echo $mensagem ?></p>
							</div>
						<?php elseif (isset($mensagem) and $mensagem == 'Sucesso') : ?>
							<div class="alert alert-success">
								<p>Usuário cadastrado com sucesso!</p>
							</div>
						<?php endif; ?>
						<?php echo form_open('cadastro/novoCadastro', ['class' => 'user']) ?>
						<div class="row mb-3">
							<div class=" mb-3 mb-sm-0"><input id="exampleFirstName" class="form-control form-control-user" type="text" placeholder="Nome" name="nome" required/></div>
							<!-- <div class="col-sm-6"><input id="exampleFirstName" class="form-control form-control-user" type="text" placeholder="Last Name" name="last_name" /></div> -->
						</div>

						<div class="mb-3">
							<input id="exampleInputEmail" class="form-control form-control-user" type="email" aria-describedby="emailHelp" placeholder="Email" name="email" required/>
						</div>

						<!-- <div class="row mb-3">
							<div class="col-sm-6 mb-3 mb-sm-0"><input id="examplePasswordInput" class="form-control form-control-user" type="password" placeholder="Senha" name="senha" /></div>
							<div class="col-sm-6"><input id="exampleRepeatPasswordInput" class="form-control form-control-user" type="password" placeholder="Repita a senha" name="repita_senha" /></div>
						</div> -->
						<button class="btn btn-primary d-block btn-user w-100" type="submit">Registrar</button>
						<hr />
						<div class="aluno" id="aluno" style="display: none;">
							<label for="nascimento">Data de Nascimento</label>
							<input type="date" name="nascimento" id="nascimento" class="rounded">
							<hr>
						</div>

						<div class="form-check">

							<input type="radio" class="form-check-input" name="tipo" id="radioAluno" value="Aluno" required onclick="changeTo('Aluno')">
							<label for="radioAluno" class="form-check-label">Aluno</label>

							<br>
							<input type="radio" class="form-check-input" name="tipo" id="radioProfessor" value="Professor" onclick="changeTo('Professor')">
							<label for="radioProfessor" class="form-check-label">Professor</label>

							<br>

							<input type="radio" class="form-check-input" name="tipo" id="radioGestor" value="Gestor" onclick="changeTo('Gestor')">
							<label for="radioGestor" class="form-check-label">Gestor</label>

						</div>
						<?php echo form_close() ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	function changeTo(tipo) {
		var x = document.getElementById("aluno");
		if (tipo == 'Aluno') {
			x.style.display = "block";
			document.getElementById("nascimento").required = true;
		} else {
			x.style.display = "none";
			document.getElementById("nascimento").required = false;
		}
	}
</script>

<!-- <style>
	.form-container {
		max-width: 900px;
	}
</style> -->
<!-- <div class="position-absolute top-50 start-50 translate-middle">
	<div class="form-container m-3">
		
		<input type="text" name="nome" class="form-control" placeholder="Insira o Nome">
		<input type="email" name="email" class="form-control" id="" placeholder="Insira o email">
		<div class="form-check">
			<div class="row">
				<input type="radio" class="form-check-input" name="tipo" id="radioGestor" value="Gestor">
				<label for="radioGestor" class="form-check-label">Gestor</label>
			

			
				<input type="radio" class="form-check-input" name="tipo" id="radioProfessor" value="Professor">
				<label for="radioProfessor" class="form-check-label">Professor</label>
			
			
				<input type="radio" class="form-check-input" name="tipo" id="radioAluno" value="Aluno">
				<label for="radioAluno" class="form-check-label">Aluno</label>
			</div>
		</div>
		
	</div>
</div> -->

<?php $this->endsection() ?>