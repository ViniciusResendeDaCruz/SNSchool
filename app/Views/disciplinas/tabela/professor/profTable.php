<table id="atribuidos" class="myTable stripe display dt-responsive nowrap" style="width: 100%;">
	<thead>
		<tr>
			<th>Código</th>
			<th>Nome</th>
			<th>Descrição</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($disciplinas as $disciplina) : ?>
			<tr>
				<td><?php echo $disciplina['codigo'] ?></td>
				<td><?php echo $disciplina['nome'] ?></td>
				<td><?php echo strlen($disciplina['descricao']) > 50 ? substr($disciplina['descricao'],0,50)."..." : $disciplina['descricao']; ?></td>
				<td><button class="btn btn-outline-danger" id="botaoDisciplina" onclick="<?php echo 'removerBtn('.$disciplina['codigo'].')' ?>"> Remover</button></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
	});

	
</script> -->