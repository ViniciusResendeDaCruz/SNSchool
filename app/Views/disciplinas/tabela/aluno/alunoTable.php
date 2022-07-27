<table id="atribuidos" class="myTable stripe display dt-responsive nowrap stripe" style="width: 100%;">
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
				<td><button class="btn btn-outline-danger" id="botaoDisciplina" onclick="<?php echo 'desmatricularBtn('.$disciplina['codigo'].')' ?>"> Desmatricular</button></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>