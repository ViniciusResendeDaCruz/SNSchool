<?php $this->extend('_common/layout_professor') ?>
<?php $this->section('content') ?>

<h2 class="p-3 text-center">Altere aqui o seu perfil, professor</h2>

<div class="container">
	<div class="card shadow mb-3">
		<div class="card-header py-3">
			<p class="text-primary m-0 fw-bold">Seus Dados</p>
		</div>

		<div class="card-body">

			<?php if ($mensagem) : ?>
				<div class="row m-3">
					<div class="col alert alert-<?php echo $mensagem == 'sucesso' ? 'success' : 'danger' ?>">
						<div class="mb-3"><?php echo $mensagem == 'sucesso' ? 'Seus dados foram alterados com sucesso!' : $mensagem ?></div>
					</div>

					<div class="col"></div>
					<div class="col"></div>
				</div>
			<?php endif ?>
			<?php echo form_open('perfil/alteraDados') ?>

			<div class="row">
				<div class="col">
					<div class="mb-3"><label class="form-label" for="username"><strong>Nome</strong></label><input id="nome" class="form-control" type="text" value="<?php echo $user['nome'] ?>" name="nome" required /></div>
				</div>

				<div class="col">
					<div class="mb-3"><label class="form-label" for="email"><strong>Email</strong></label><input id="email" class="form-control" type="email" value="<?php echo $user_login['email'] ?>" name="email" required /></div>
				</div>

			</div>

			<div class="row">

				<div class="col">
					<div class="mb-3"><label class="form-label" for="senha"><strong>Senha</strong></label><input id="senha" class="form-control" type="password" placeholder="Insira a nova senha" name="senha" />
						<p class="fs-6 fst-italic">*deixe em branco caso não queira alterar</p>
					</div>
				</div>
				<div class="col">
					<div class="mb-3"><label class="form-label" for="repete_senha"><strong>Repita a senha</strong></label><input id="repete_senha" class="form-control" type="password" placeholder="repita a nova senha" name="repete_senha" /></div>
				</div>


			</div>
			<!-- <div class="row">
                <div class="col">

                    <label for="nascimento">Data de nascimento</label>
                    <input type="date" name="nascimento" id="nascimento" value="<?php //echo $user['data_nascimento'] 
																				?>">
                </div>
            </div> -->

			<div class="mb-3"><button class="btn gradient-custom text-light btn-sm" type="submit">Alterar</button></div>
			<?php form_close() ?>

		</div>
	</div>
</div>


<?php $this->endsection() ?>