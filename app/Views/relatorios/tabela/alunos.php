<?php if (isset($alunos)) : ?>

	<table id="alunosTable" class="myTable stripe display dt-responsive nowrap" style="width:100%;">
		<thead>
			<tr>
				<th>Matrícula</th>
				<th>Nome</th>
				<th>Data de Nascimento</th>
				<th>Email</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($alunos as $aluno) : ?>
				<tr>
					<td><?php echo $aluno['matricula'] ?></td>
					<td><?php echo $aluno['nome'] ?></td>
					<td><?php echo $aluno['data_nascimento'] ?></td>
					<td><?php echo $aluno['email'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

<?php else : ?>
	<h2>Nenhum dado encontrado</h2>
<?php endif ?>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
	});
</script> -->