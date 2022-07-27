<?php $this->extend('_common\layout_gestor') ?>
<?php $this->section('content') ?>


<div class="container">
	<div class="tab-content card">
		<h2 class="card-header">Dados</h2>
		<br>
		<ul class="nav nav-tabs text-center justify-content-center" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="nav-link active" role="tab" data-bs-toggle="tab" href="#alunos">
					Alunos
				</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" role="tab" data-bs-toggle="tab" href="#professores">
					Professores
				</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" role="tab" data-bs-toggle="tab" href="#disciplinas">
					Disciplinas
				</a>
			</li>
		</ul>

		<div id="alunos" class="tab-pane fade  border border-top-0 rounded-bottom p-3" role="tabpanel">
			<br>
			<table id="mytable" class="table stripe table-bordered display dt-responsive nowrap" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Matrícula</th>
						<th>Nome</th>
						<th>Data de nascimento</th>
						<th>Email</th>
						<th>Data Matrícula</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($alunos as $aluno) : ?>
						<tr>
							<td><?php echo $aluno['matricula'] ?></td>
							<td><?php echo $aluno['nome'] ?></td>
							<td><?php echo $aluno['data_nascimento'] ?></td>
							<td><?php echo $aluno['email'] ?></td>
							<td><?php echo $aluno['data_matricula'] ?></td>
						</tr>
					<?php endforeach ?>

				</tbody>
			</table>
		</div>

		<div id="professores" class="container tab-pane fade border border-top-0 rounded-bottom p-3" role="tabpanel">
			<br>
			<table id="mytable2" class="table stripe table-bordered display dt-responsive nowrap" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Matrícula</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Data Matrícula</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($professores as $professor) : ?>
						<tr>
							<td><?php echo $professor['matricula'] ?></td>
							<td><?php echo $professor['nome'] ?></td>
							<td><?php echo $professor['email'] ?></td>
							<td><?php echo $professor['data_matricula'] ?></td>
						</tr>
					<?php endforeach ?>

				</tbody>
			</table>
		</div>

		<div id="disciplinas" class="container tab-pane fade border border-top-0 rounded-bottom p-3" role="tabpanel">
			<br>
			<table id="mytable3" class="table stripe table-bordered display dt-responsive nowrap" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Professor</th>

					</tr>
				</thead>

				<tbody>
					<?php foreach ($disciplinas as $disciplina) : ?>
						<tr>
							<td><?php echo $disciplina['codigo'] ?></td>
							<td><?php echo $disciplina['nome'] ?></td>
							<td><?php echo $disciplina['profNome'] ? $disciplina['profNome'] : '-' ?></td>

						</tr>
					<?php endforeach ?>

				</tbody>
			</table>
		</div>
	</div>

</div>



<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script>
	$(document).ready(function() {
		$('#mytable').DataTable();
		$('#mytable2').DataTable();
		$('#mytable3').DataTable();

		$("#alunos").addClass('active show')
	});
</script>
<?php $this->endsection() ?>