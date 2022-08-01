<?php $this->extend('_common/layout_gestor')
?>
<?php $this->section('content')
?>


<h2 class="p-3 text-center">Gestor, cadastre as novas disciplinas aqui</h2>
<!-- <button onclick="clickado()">Clicke aqui</button> -->
<!-- Modal------------------------------------------------------------------------- -->
<div class="modal fade" tabindex="-1" id="mymodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p>Modal body text goes here.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- Toast-------------------------------------------------------------------------- -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11" id="toast">
	<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header">
			<!-- <img src="..." class="rounded me-2" alt="..."> -->
			<strong class="me-auto" id="header">Sucesso</strong>
			<small>Agora</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body alert m-3">
		</div>
	</div>
</div>
<!-- content------------------------------------------------------------------------ -->
<div class=" card" style="margin: 0 10vw;">

	<div class=" card-header pt-3">
		<div class="col-6">
			<!-- <div class="col-md-6"> -->
			<?php //echo form_open('disciplinas/novaDisciplina') ?>
			
			<label for="nome" class="form-label" >Nome</label>
			<input class="form-control" type="text" name="nome" id="novoNome" required/>

			<label for="descricao" class="form-label">Descrição</label>
			<textarea class="form-control" type="text" name="descricao" id="novaDescricao" required></textarea>
			<br>

			<button class="btn btn-outline-primary" onclick="novaDisciplina()">Cadastrar Nova Disciplina</button>
			<?php //echo form_close() ?>
			<!-- </div> -->
		</div>
	</div>
	<hr>

	<div id="tabelaDisciplinas" class="card-body"></div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

<script>
	// var baseUrl = "<?php //echo base_url() 
						?>"

						

	function tableInit() {
		$.ajax({
			url: baseUrl + "/ajax/disciplinas/disciplinasGestor",
			method: 'post',
			dataType: 'html',
			success: function(msg) {
				// console.log(msg);
				let datatable = $("#tabelaDisciplinas").html(msg)
				datatable.on('draw', function() {
						let elements = document.getElementsByClassName("tooltipDesc")

						for (const element of elements) {
							let tooltip = new bootstrap.Tooltip(element)
						}
				})
				let elements = document.getElementsByClassName("tooltipDesc")

				for (const element of elements) {
					let tooltip = new bootstrap.Tooltip(element)
				}
				
			},
			error: function(e) {
				console.log(e);
			}
		})
	}

	var myModal = new bootstrap.Modal(document.getElementById('mymodal'), {
		keyboard: false
	})
	var toast = new bootstrap.Toast(document.getElementById('liveToast'))


	function clickado() {
		toast.show()

	}



	function alterarBtn(codigo) {
		// console.log(codigo);
		// var myModal = new bootstrap.Modal(document.getElementById('myModal'))
		// $("#modalAlterarTeste").modal('show');
		$.ajax({
			url: baseUrl + '/ajax/disciplinas/modalDisciplina/' + codigo,
			method: 'post',
			dataType: "html",
			success: function(response) {
				$("#mymodal").html(response);
				// $("#modalAlterarTeste").modal('show');
				myModal.show()

			}
		});

	}

	function salvarAlteracao(codigo) {
		// console.log(codigo);
		nome = $("#nome").val()
		descricao = $("#descricao").val()
		// console.log(descricao);

		$.ajax({
			url: baseUrl + `/ajax/disciplinas/alteraDisciplina/${codigo}/${nome}/${descricao}`,
			method: 'post',
			dataType: 'text',
			success: function(e) {
				console.log(e);
				tableInit()
				myModal.hide();
				$("#header").text('Sucesso')
				$(".toast-body").addClass('alert-success').removeClass('alert-danger').text("Disciplina alterada com sucesso")
				toast.show()
			},
			error: function (e) {
				myModal.hide();
				$("#header").text('Erro')
				$(".toast-body").addClass('alert-danger').removeClass('alert-success').text("Algo deu errado")
				toast.show()
			}
		})

	}

	function novaDisciplina() {
		novoNome = $("#novoNome").val();
		novaDesc = $("#novaDescricao").val();
		if (novoNome == '' || novaDesc == '') {
			$("#header").text('Erro')
			$(".toast-body").removeClass('alert-success').addClass('alert-danger').text("Preencha todos os campos!")
			toast.show()
			return
		}

		$.ajax({
			method:'post',
			url: baseUrl + `/ajax/disciplinas/novaDisciplina/${novoNome}/${novaDesc}`,
			success: function (response) {
				tableInit()
				$("#header").text('Sucesso')
				$(".toast-body").addClass('alert-success').removeClass('alert-danger').text("Disciplina inserida com sucesso")
				toast.show();
				$("#novoNome").val('');
				$("#novaDescricao").val('');
			}
		});
	}

	function excluirDisciplina(codigo) {
		$.ajax({
			url: baseUrl + `/ajax/disciplinas/removeDisciplina/${codigo}`,
			method: 'post',
			dataType: 'text',
			success: function(e) {
				console.log(e);
				tableInit()
				myModal.hide();
				$("#header").text('Sucesso')
				$(".toast-body").addClass('alert-success').removeClass('alert-danger').text("Disciplina removida com sucesso")
				toast.show()
			},
			error: function (e) {
				myModal.hide();
				$("#header").text('Erro')
				$(".toast-body").removeClass('alert-success').addClass('alert-danger').text("Algo deu errado")
				toast.show()
			}
		})
	}

	$(document).ready(function() {
		tableInit()

	})
</script>

<?php $this->endsection()
?>


</html>