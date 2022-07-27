<?php //$this->extend('_common/layout_gestor') 
?>
<?php if (isset($disciplinas)) : ?>

	<table id="disciplinasTable" class="myTable stripe dt-responsive nowrap stripe" style="width: 100%;">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nome</th>
				<th>Discrição</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($disciplinas as $disciplina) : ?>
				<tr>
					<td><?php echo $disciplina['codigo'] ?></td>
					<td><?php echo $disciplina['nome'] ?></td>
					<td><?php echo strlen($disciplina['descricao']) > 50 ? substr($disciplina['descricao'],0,50)."..." : $disciplina['descricao']; ?></td>
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