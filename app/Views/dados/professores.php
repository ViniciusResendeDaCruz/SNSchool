<?php $this->extend('_common\layout_gestor') ?>
<?php $this->section('content') ?>
<h2 class="p-3 text-center">Dados</h2>
<div class="container">
	<div class="center text-center">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a href="<?php echo base_url('dados/tabelaAlunos') ?>" class="nav-link "> Alunos</a>
			</li>
			<li class="nav-item">
				<a href="<?php echo base_url('dados/tabelaProfessores') ?>" class="nav-link active">Professores</a>
			</li>
			<li class="nav-item">
				<a href="<?php echo base_url('dados/tabelaDisciplinas') ?>" class="nav-link">Disciplinas</a>
			</li>
		</ul>
	</div>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th><a href="<?php echo base_url('dados/tabelaProfessores/matricula/' .  ($sort_by == 'matricula' ? ($sort_order == 'ASC' ? 'DESC':'ASC') :'ASC') ) ?>">Matrícula</a></th>
				<th><a href="<?php echo base_url('dados/tabelaProfessores/nome/' .  ($sort_by == 'nome' ? ($sort_order == 'ASC' ? 'DESC':'ASC') :'ASC') ) ?>">Nome</a></th>
				<!-- <th><a href="<?php //echo base_url('dados/tabelaAlunos/data_nascimento/' .  ($sort_by == 'data_nascimento' ? ($sort_order == 'ASC' ? 'DESC':'ASC') :'ASC') ) ?>">Data de Nascimento</a> </th> -->
				<th><a href="<?php echo base_url('dados/tabelaProfessores/email/' .  ($sort_by == 'email' ? ($sort_order == 'ASC' ? 'DESC':'ASC') :'ASC') ) ?>">Email</a> </th>
				<th><a href="<?php echo base_url('dados/tabelaProfessores/data_matricula/' .  ($sort_by == 'data_matricula' ? ($sort_order == 'ASC' ? 'DESC':'ASC') :'ASC') ) ?>">Data Matrícula</a> </th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($professores as $professor) : ?>
				<tr>
					<td><?php echo $professor['nome'] ?></td>
					<td><?php echo $professor['matricula'] ?></td>
					<!-- <td><?php //echo $aluno['data_nascimento'] ?></td> -->
					<td><?php echo $professor['email'] ?></td>
					<td><?php echo $professor['data_matricula'] ?></td>
				</tr>
			<?php endforeach ?>

		</tbody>
	</table>
</div>
<?php $this->endsection() ?>