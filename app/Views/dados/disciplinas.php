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
				<a href="<?php echo base_url('dados/tabelaProfessores') ?>" class="nav-link">Professores</a>
			</li>
			<li class="nav-item">
				<a href="<?php echo base_url('dados/tabelaDisciplinas') ?>" class="nav-link active">Disciplinas</a>
			</li>
		</ul>
	</div>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th><a href="<?php echo base_url('dados/tabelaDisciplinas/codigo/' .  ($sort_by == 'codigo' ? ($sort_order == 'ASC' ? 'DESC':'ASC') :'ASC') ) ?>">Codigo</a></th>
				<th><a href="<?php echo base_url('dados/tabelaDisciplinas/nome/' .  ($sort_by == 'nome' ? ($sort_order == 'ASC' ? 'DESC':'ASC') :'ASC') ) ?>">Nome</a></th>
				<!-- <th><a href="<?php //echo base_url('dados/tabelaAlunos/data_nascimento/' .  ($sort_by == 'data_nascimento' ? ($sort_order == 'ASC' ? 'DESC':'ASC') :'ASC') ) ?>">Data de Nascimento</a> </th> -->
				<th><a href="<?php echo base_url('dados/tabelaDisciplinas/profNome/' .  ($sort_by == 'profNome' ? ($sort_order == 'ASC' ? 'DESC':'ASC') :'ASC') ) ?>">Professor</a> </th>
				<!-- <th><a href="<?php //echo base_url('dados/tabelaDisciplinas/data_matricula/' .  ($sort_by == 'data_matricula' ? ($sort_order == 'ASC' ? 'DESC':'ASC') :'ASC') ) ?>">Data Matrícula</a> </th> -->
			</tr>
		</thead>

		<tbody>
			<?php foreach ($disciplinas as $disciplina) : ?>
				<tr>
					<td><?php echo $disciplina['codigo'] ?></td>
					<td><?php echo $disciplina['nome'] ?></td>
					<!-- <td><?php //echo $aluno['data_nascimento'] ?></td> -->
					<td><?php echo $disciplina['profNome'] ? $disciplina['profNome'] : 'Nenhum professor'?></td>
					<!-- <td><?php //echo $disciplina['data_matricula'] ?></td> -->
				</tr>
			<?php endforeach ?>

		</tbody>
	</table>
</div>
<?php $this->endsection() ?>