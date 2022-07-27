<?php $this->extend('_common/layout_aluno') ?>
<?php $this->section('content') ?>

<!-- <h2 class="p-3">Alunos, estas são suas disciplinas</h2> -->
<div class="container">
	<!-- <div class="row"> -->
	<div class="card">
		<ul class="nav nav-tabs text-center card-header" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">
					Disciplinas <span class="badge bg-primary"><?php echo $countLivres ?></span>
				</a>
			</li>
			<li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2">Minhas Disciplinas<span class="badge bg-primary"><?php echo $countAll - 1 ?></span></a></li>
		</ul>

		<div class="tab-content card-body">
			<div id="tab-1" class="tab-pane active" role="tabpanel">

				<!--Legacy <div>
					<?php //foreach (array_chunk($disciplinasLivres, 2) as $chunk) : 
					?>
						<div class="row text-light">
							<?php //foreach ($chunk as $key => $disciplina) : 
							?>
								<div class="card-disciplina card-3 <?php //echo 'cards' . ($key + 1) 
																	?> col">
									
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
									<hr>

									<div class="card-professor">

										<p class="text-light"><?php //echo !$disciplina['profNome'] ? 'Nenhum professor' : $disciplina['profNome'] 
																?></p>
									</div>

									<p class="card__apply">
										<hr>
										<a class="card__link" href="<?php //echo base_url('disciplinas/atribuiAluno/' . $disciplina['codigo']) 
																	?>">Aplicar-se <i class="fas fa-arrow-right"></i></a>
									</p>
								</div>
							<?php //endforeach 
							?>
						</div>

					<?php //endforeach 
					?>
				</div>

				<divLegacy pager class="">
					<div class="">
						<?php //echo $pager->links('alunosLivre', 'pagination') 
						?>
					</div>
				</divLegacy> -->

				<div id="tabelaLivres"></div>
			</div>

			<div id="tab-2" class="tab-pane" role="tabpanel">
				<!--Legacy <div>

					<?php //foreach (array_chunk($disciplinasAluno, 2) as $chunk) : 
					?>
						<div class="row text-light">
							<?php //foreach ($chunk as $key => $disciplina) : 
							?>
								<div class="card-disciplina card-3 <?php //echo 'cards' . ($key + 1) 
																	?> col">
									
									<a href="<?php //echo base_url('disciplinas/desatribuiAluno/' . $disciplina['codigo']) 
												?>" class="card__exit" data-bs-toggle="tooltip" title="Remover Disciplina"><i class="fas fa-times"></i></a>

									<a href="#" class="card__exit" hidden><i class="fas fa-times"></i></a>
									<h2 class="card__title"><?php //echo $disciplina['nome'] 
															?></h2>

									<div class="card-content">
										<p>
											<?php //echo $disciplina['descricao'] 
											?>
										</p>

									</div>
									<hr>
									<div class="card-professor">

										<p class="text-light"><?php //echo !$disciplina['profNome'] ? 'Nenhum professor' : $disciplina['profNome'] 
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


	<!-- </div> -->
</div>

<script>
	function initTables() {
		$.ajax({
			method: 'post',
			url: baseUrl + "/ajax/disciplinas/disciplinasAluno/livres",
			dataType: "html",
			success: function(response) {
				$("#tab-1").html(response);
			}
		});
		$.ajax({
			method: 'post',
			url: baseUrl + "/ajax/disciplinas/disciplinasAluno/atribuidas",
			dataType: "html",
			success: function(response) {
				$("#tab-2").html(response);
				$(".myTable").dataTable({responsive:true})
			}
		});
	}

	function matricularBtn(codigo){
		$.ajax({
			method: 'post',
			url: baseUrl + "/ajax/disciplinas/atribuiAluno/"+codigo,
			success: function(response) {
				initTables()
			}
		});
	}

	function desmatricularBtn(codigo) {
		$.ajax({
			method: 'post',
			url: baseUrl + "/ajax/disciplinas/desatribuiAluno/"+codigo,
			success: function(response) {
				initTables()
			}
		});
	}

	$(document).ready(function() {
		initTables()
	})
</script>

<?php $this->endsection() ?>