<table id="myTable" class="display dt-responsive nowrap stripe" style="width: 100%;">
	<thead>
		<tr>
			<th>Código</th>
			<th>Nome</th>
			<th>Descrição</th>
			<th>Professor</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($disciplinas as $disciplina) : ?>
			<tr>
				<td><?php echo $disciplina['codigo'] ?></td>
				<td><?php echo $disciplina['nome'] ?></td>
				<td><?php echo strlen($disciplina['descricao']) > 50 ? substr($disciplina['descricao'], 0, 50) . "..." : $disciplina['descricao']; ?></td>
				<td><?php echo is_null($disciplina['profNome']) ? 'Nenhum professor' : $disciplina['profNome'] ?></td>
				<td><button class="btn btn-outline-dark" id="botaoDisciplina" onclick="<?php echo 'alterarBtn(' . $disciplina['codigo'] . ')' ?>"> Alterar</button></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/r-2.3.0/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


<script>
	$(document).ready(function() {
		$('#myTable').DataTable({
			responsive: true
		});
	});
</script>