<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Altere a disciplina abaixo</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<label for="nome" class="form-label">Nome</label>
			<input type="text" name="nome" id="nome" class="form-control" value="<?php echo $nome ?>">

			<br>

			<label for="descricao" class="form-label">Descrição</label> <br>
			<textarea name="descricao" id="descricao" cols="40" rows="3"><?php echo $descricao ?></textarea>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
			<button type="button" class="btn btn-danger" onclick="<?php echo 'excluirDisciplina(' . $codigo . ')' ?>">Excluir</button>
			<button type="button" class="btn btn-primary" onclick="<?php echo 'salvarAlteracao(' . $codigo . ')' ?>">Salvar</button>
		</div>
	</div>
</div>