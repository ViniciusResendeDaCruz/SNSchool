<?php $this->extend('_common/layout_professor') ?>
<?php $this->section('content') ?>

<h2 class="p-3 text-center">Professor, cadastre-se aqui nas disciplinas que deseja ministrar</h2>
<div class="container">
	<!-- <div class="row"> -->
	<div class="card">

		<ul class="nav nav-tabs text-center card-header" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">
					Disciplinas sem professor <span id="countLivres" class="badge bg-primary"><?php echo count($disciplinasLivres) ?></span>
				</a>
			</li>
			<li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2">Minhas Disciplinas<span id="countAll" class="badge bg-primary"><?php echo count($disciplinasProfessor) ?></span></a></li>
		</ul>

		<div class="tab-content card-body">
			<!--Legacy <div id="tab-1" class="tab-pane active" role="tabpanel">
				<div>
					<?php //foreach (array_chunk($disciplinasLivres, 2) as $chunk) : 
					?>
						<div class="cards text-light">
							<?php //foreach ($chunk as $key => $disciplina) : 
							?>
								<div class="card-disciplina card-3 <?php //echo 'cards' . ($key + 1) 
																	?>">
									<a href="#" class="card__exit"><i class="fas fa-times" hidden></i></a>

									<a href="#" class="card__exit" hidden><i class="fas fa-times"></i></a>
									<h2 class="card__title"><?php //echo $disciplina['nome'] 
															?></h2>
									<div class="card-content">
										<p>
											<?php //echo $disciplina['descricao'] 
											?>
										</p>
									</div>
									<div class="card-professor">
										<p class="text-light"><?php //echo isset($professor) and is_null($professor) ? 'Nenhum professor' : $professor 
																?></p>
									</div>
									<p class="card__apply">
										<hr>
										<a class="card__link" href="<?php //echo base_url('disciplinas/atribuiProfessor/' . $disciplina['codigo']) 
																	?>">Aplicar-se <i class="fas fa-arrow-right"></i></a>
									</p>
								</div>
							<?php //endforeach 
							?>
						</div>

					<?php //endforeach 
					?>
				</div>
			</div> -->
			<div id="tab-1" class="tab-pane active" role="tabpanel">


			</div>

			<div id="tab-2" class="tab-pane" role="tabpanel">
				<!--Legacy <div>
					<?php //foreach (array_chunk($disciplinasProfessor, 2) as $chunk) : 
					?>
						<div class="cards text-light">
							<?php //foreach ($chunk as $key => $disciplina) : 
							?>
								<div class="card-disciplina card-3 <?php //echo 'cards' . ($key + 1) 
																	?>">
									
									<a href="<?php //echo base_url('disciplinas/desatribuiProfessor/'.$disciplina['codigo']) 
												?>" class="card__exit" data-bs-toggle="tooltip" title="Remover Disciplina"><i class="fas fa-times"></i></a>

									<a href="#" class="card__exit" hidden><i class="fas fa-times"></i></a>
									<h2 class="card__title"><?php //echo $disciplina['nome'] 
															?></h2>
									
									<div class="card-content">
										<p>
											<?php //echo $disciplina['descricao'] 
											?>
										</p>
										<hr>
									</div>
									<div class="card-professor">
										<p class="text-light"><?php //echo isset($professor) and is_null($professor) ? 'Nenhum professor' : $professor 
																?></p>
									</div>
									
								</div>
							<?php //endforeach 
							?>
						</div>

					<?php //endforeach 
					?>
				</div> -->


			</div>


		</div>
	</div>



</div>

<script>
	function clickado() {

	}

	function initTables() {
		$.ajax({
			method: 'post',
			url: baseUrl + "/ajax/disciplinas/disciplinasProfessor/livres",
			dataType: "html",
			success: function(response1) {
				$("#tab-1").html(response1)
				let datatable = $("#livres").DataTable({
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
			}
		})

		$.ajax({
			method: 'post',
			url: baseUrl + "/ajax/disciplinas/disciplinasProfessor/atribuido",
			dataType: "html",
			success: function(response2) {
				$("#tab-2").html(response2)
				let datatable2 = $("#atribuidos").DataTable({
					responsive: true
				})
				datatable2.on('draw', function() {
					let elements = document.getElementsByClassName("tooltipDesc")

					for (const element of elements) {
						let tooltip = new bootstrap.Tooltip(element)
					}
				})
				let elements = document.getElementsByClassName("tooltipDesc")

				for (const element of elements) {
					let tooltip = new bootstrap.Tooltip(element)
				}
			}
		})
	}


	$(document).ready(function() {
		initTables()
		// console.log('a');

	})

	function aplicarBtn(codigo) {
		$.ajax({
			method: 'post',
			url: baseUrl + "/ajax/disciplinas/atribuiProfessor/" + codigo,
			success: function(response) {
				console.log(response);
				initTables();
				let livres = parseInt($("#countLivres").html())
				let all = parseInt($("#countAll").html())
				$("#countLivres").html(livres - 1)
				$("#countAll").html(all + 1)
			}
		});
	}

	function removerBtn(codigo) {
		$.ajax({
			method: 'post',
			url: baseUrl + "/ajax/disciplinas/desatribuiProfessor/" + codigo,
			success: function(response) {
				console.log(response);
				initTables();
				let livres = parseInt($("#countLivres").html())
				let all = parseInt($("#countAll").html())
				$("#countLivres").html(livres + 1)
				$("#countAll").html(all - 1)
			}
		});
	}
</script>

<?php $this->endsection() ?>