


	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h1><?php echo $plan_title ?></h1>
					<div class="table-responsive">
						<table class="table table-striped table-sm">
							<thead>
							<tr>
								<th>Lp</th>
								<th>Poniedziałek</th>
								<th>Wtorek</th>
								<th>Środa</th>
								<th>Czwartek</th>
								<th>Piątek</th>
								<th>Sobota</th>
								<th>Niedziela</th>
							</tr>
							</thead>
							<tbody>
								<?php echo $trainings_table; ?>
							

							</tbody>
						</table>
					</div>
					
					<form class="form-signin" method="POST" action="index.php?module=trainingplan&page=add_training">
					  <h1 class="h3 mb-3 font-weight-normal">Dodaj nowe ćwiczenie</h1>
					  <select name="training_day" id="inputState" class="form-control">
						<option value="default" selected>Wybierz dzień tygodnia..</option>
						<option value="monday">Poniedziałek</option>	
						<option value="tuesday">Wtorek</option>	
						<option value="wednesday">Środa</option>	
						<option value="thursday">Czwartek</option>	
						<option value="friday">Piątek</option>		
						<option value="saturday">Sobota</option>		
						<option value="sunday">Niedziela</option>	
						
					  </select>
					  <input name="training_title" type="text" class="form-control" placeholder="Nazwa ćwiczenia.." />
					  <input name="series" type="number" class="form-control" placeholder="Ilość serii.." />
					  <input name="repeats" type="number" class="form-control" placeholder="Ilość powtórzeń.." />
					  <input name="plan_id" type="hidden" value="<?php echo $plan_id ?>" />

					  <button class="btn btn-lg btn-primary btn-block" type="submit">Zapisz w bazie danych</button>
					</form>

				</div>
			</div>
		</div>
	</div>

