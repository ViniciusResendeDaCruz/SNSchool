<?php $this->extend('_common/layout_professor') ?>
<?php $this->section('content') ?>

<?php $mensagem = "Iniciando" ?>

<!-- <h2 class="p-3">Gestor, acesse aqui seus relatórios</h2> -->
<style>
	.cont {
		margin: auto 3rem auto 3rem;
	}
</style>

<div class="container" style="height: 90vh;">
	<div class="card">
		<h2 class="card-header">Relatórios</h2>

		<div class="tab-content">
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item" role="presentation">
					<a class="nav-link active" role="tab" data-bs-toggle="tab" href="#disciplinasProfessor">
						Disciplinas por Professor
					</a>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" role="tab" data-bs-toggle="tab" href="#alunosDisciplina">
						Alunos por Disciplina
					</a>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" role="tab" data-bs-toggle="tab" href="#alunosProfessor">
						Alunos por Professor
					</a>
				</li>
			</ul>


			<div id="disciplinasProfessor" class="tab-pane border border-top-0 rounded-bottom p-3 active" role="tabpanel">

				<select name="professor" id="professorSelect" class="form-select js-example-responsive " style="width: 20%;">
					<!-- <option selected value="null">Selecione um professor</option> -->

					<?php foreach ($professores as $professor) : ?>
						<option value="<?php echo $professor['matricula'] ?>"><?php echo $professor['nome'] ?></option>
					<?php endforeach ?>
				</select>
				<hr>
				<!-- <div id="mensagem" class="alert alert-danger" style="display: none;"></div> -->
				<div id="tabelaDisciplinaProfessor"></div>

			</div>

			<div id="alunosDisciplina" class="tab-pane border border-top-0 rounded-bottom p-3" role="tabpanel">

				<select name="disciplina" id="alunosDisciplinaSelect" class="form-select js-example-responsive" style="width: 20%;">
					<!-- <option selected value="null">Selecione uma disciplina</option> -->

					<?php foreach ($disciplinas as $disciplina) : ?>
						<option value="<?php echo $disciplina['codigo'] ?>"><?php echo $disciplina['nome'] ?></option>
					<?php endforeach ?>
				</select>
				<hr>
				<!-- <div id="mensagem" class="alert alert-danger" style="display: none;"></div> -->
				<div id="tabelaAlunosDisciplina"></div>
			</div>

			<div id="alunosProfessor" class="tab-pane border border-top-0 rounded-bottom p-3" role="tabpanel">
				<!-- <select name="professor" id="alunosProfessorSelect" class="form-select js-example-responsive" style="width: 20%;">
					

					<?php //foreach ($professores as $professor) : ?>
						<option value="<?php //echo $professor['matricula'] ?>"><?php echo $professor['nome'] ?></option>
					<?php //endforeach ?>
				</select> -->
				<hr>
				<div id="tabelaAlunosProfessor"></div>

			</div>

		</div>
	</div>
</div>





<!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->


<script>
	function initDisciplinasTable() {
		$.ajax({
			url: baseUrl + "/ajax/relatorios/disciplinasProfessor/" + $('#professorSelect').val(),
			method: "post",
			dataType: "html",
			success: function(msg) {
				$('#tabelaDisciplinaProfessor').html(msg)
				let datatable = $('#disciplinasTable').DataTable({
					responsive: true
				})
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

				// console.log('tabela iniciada');
			}

		})
	}

	function initAlunosTable() {
		$.ajax({
			url: baseUrl + "/ajax/relatorios/alunosDisciplina/" + $('#alunosDisciplinaSelect').val(),
			method: "post",
			dataType: "html",
			success: function(msg) {
				$('#tabelaAlunosDisciplina').html(msg)
				$('#alunosTable').DataTable({
					responsive: true
				})

			}

		})
	}


	function initAlunosProfessorTable() {
		$.ajax({
			url: baseUrl + "/ajax/relatorios/alunosProfessor/" + <?php echo $myId ?>,
			method: "post",
			dataType: "html",
			success: function(msg) {
				$('#tabelaAlunosProfessor').html(msg)
				return $("#alunosProfessorTable").dataTable({
					responsive: true
				})

			}
		})
	}




	$(document).ready(function() {
		$("#professorSelect").select2();
		$("#alunosDisciplinaSelect").select2();
		// $("#alunosProfessorSelect").select2();

		initDisciplinasTable();
		initAlunosTable();
		initAlunosProfessorTable();


		$('#professorSelect').change(function() {
			// console.log("Alterei para " + $('#professorSelect').val());
			initDisciplinasTable()
			// $.ajax({
			// 	url: baseUrl + "/ajax/relatorios/disciplinasProfessor/" + $('#professorSelect').val(),
			// 	method: "post",
			// 	dataType: "html",
			// 	success: function(msg) {
			// 		console.log('dentro do primeiro ajax');
			// 		$('#tabelaDisciplinaProfessor').html(msg)

			// 		// tabelaDisciplinas.destroy();

			// 	}

			// })

		})
		// console.log('primeiro ajax');
		$('#alunosDisciplinaSelect').change(function() {
			initAlunosTable()

			// $.ajax({
			// 	url: baseUrl + "/ajax/relatorios/alunosDisciplina/" + $('#alunosDisciplinaSelect').val(),
			// 	method: "post",
			// 	dataType: "html",
			// 	success: function(msg) {
			// 		$('#tabelaAlunosDisciplina').html(msg)
			// 		// tabelaAlunos.destroy()
			// 		initAlunosTable()


			// 		// }
			// 	}

			// })
		})
		// console.log('segundo');

		$('#alunosProfessorSelect').change(function() {
			initAlunosProfessorTable()
			// 	$.ajax({
			// 		url: baseUrl + "/ajax/relatorios/alunosProfessor/" + $('#alunosProfessorSelect').val(),
			// 		method: "post",
			// 		dataType: "html",
			// 		success: function(msg) {
			// 			$('#tabelaAlunosProfessor').html(msg)
			// 			// tabelaAlunosProfessor.destroy()
			// 			initAlunosProfessorTable()
			// 		}
			// 	})
		})
	});
</script>

<?php $this->endsection() ?>