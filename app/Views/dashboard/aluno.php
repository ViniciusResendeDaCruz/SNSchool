<?php $this->extend('_common/layout_aluno') ?>
<?php $this->section('content') ?>
<style>
	.dash {
		height: 500px;
	}

	.highlight-blue {
		color: #fff;
		/* background-color: var; */
		padding: 50px 0;
		transition-duration: 0.2s;
		transition-delay: 0s;
	}

	.highlight-blue:hover {
		transform: scale(1.1);
	}

	.gradient-custom {
		/* fallback for old browsers */
		background: #1337d8;
		/* Chrome 10-25, Safari 5.1-6 */
		background: -webkit-linear-gradient(to right, rgba(19, 55, 216, 1), rgba(158, 95, 221, 1));
		/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		background: linear-gradient(to right, rgba(19, 55, 216, 1), rgba(158, 95, 221, 1))
	}

	.nolink {
		text-decoration: none;
	}

	.highlight-blue p {
		color: #c4d5ef;
		line-height: 1.5;
	}

	.highlight-blue h2 {
		font-weight: normal;
		margin-bottom: 25px;
		line-height: 1.5;
		padding-top: 0;
		margin-top: 0;
		color: inherit;
	}

	.highlight-blue .intro {
		font-size: 16px;
		max-width: 500px;
		margin: 0 auto 25px;
	}

	.highlight-blue .buttons {
		text-align: center;
	}

	.highlight-blue .buttons .btn {
		padding: 16px 32px;
		margin: 6px;
		border: none;
		background: none;
		box-shadow: none;
		text-shadow: none;
		opacity: 0.9;
		text-transform: uppercase;
		font-weight: bold;
		font-size: 13px;
		letter-spacing: 0.4px;
		line-height: 1;
	}

	.highlight-blue .buttons .btn:hover {
		opacity: 1;
	}

	.highlight-blue .buttons .btn:active {
		transform: translateY(1px);
	}

	.highlight-blue .buttons .btn-primary,
	.highlight-blue .buttons .btn-primary:active {
		border: 2px solid rgba(255, 255, 255, 0.7);
		border-radius: 6px;
		color: #ebeff1;
		box-shadow: none;
		text-shadow: none;
		padding: 14px 24px;
		background: transparent;
		transition: background-color 0.25s;
	}
</style>
<div>
	<h2 class="p-3 text-center">O que você deseja fazer hoje professor?</h2>

	<div class="container dash">
		<div class="row">
			<div class="col-md-4">
				<a href="<?php echo base_url('disciplinas') ?>" class="nolink">
					<section class="text-center border rounded shadow-lg highlight-blue gradient-custom" style="padding-top: 50px;"><svg class="bi bi-card-list" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="transform: scale(4.62);">
							<path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"></path>
							<path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path>
						</svg>
						<div class="container">
							<div class="intro"></div>
							<div class="buttons"></div>
						</div>
						<h1>Disciplinas</h1><small>Gerencie as suas disciplians</small>
					</section>
				</a>
			</div>
			<div class="col-md-4">
				<a href="<?php echo base_url('perfil') ?>" class="nolink">
					<section class="gradient-custom text-center border rounded shadow-lg highlight-blue" style="padding-top: 50px;"><svg class="bi bi-person" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="transform: scale(4.62);">
							<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
						</svg>
						<div class="container">
							<div class="intro"></div>
							<div class="buttons"></div>
						</div>
						<h1>Meus Dados</h1><small>Gerencie os seus dados</small>
					</section>
				</a>
			</div>
			<div class="col-md-4">
				<a href="<?php echo base_url('relatorios') ?>" class="nolink">
					<section class="gradient-custom text-center border rounded shadow-lg highlight-blue" style="padding-top: 50px;"><svg class="bi bi-paperclip" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="transform: scale(4.62);">
							<path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"></path>
						</svg>
						<div class="container">
							<div class="intro"></div>
							<div class="buttons"></div>
						</div>
						<h1>Relatórios</h1><small>Gerencia seus relatórios</small>
					</section>
				</a>
			</div>
		</div>

	</div>

</div>

<?php $this->endsection() ?>