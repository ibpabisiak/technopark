



	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h1>Twoje pomiary ciała</h1>
					<div class="table-responsive">
						<table class="table table-striped table-sm">
							<thead>
							<tr>
								<th>Data</th>
								<th>Łydka</th>
								<th>Udo</th>
								<th>Biodra</th>
								<th>Talia</th>
								<th>Klatka</th>
								<th>Kark</th>
								<th>Biceps</th>
								<th>Przedramie</th>
								<th>Waga</th>
								<th>Pas</th>
							</tr>
							</thead>
							<tbody>
								<?php echo $body_list; ?>

							</tbody>
						</table>
					</div>
					
					<form class="form-signin" method="POST" action="index.php?module=body&page=add_body">
					  <h1 class="h3 mb-3 font-weight-normal">Dodaj nowy pomiar ciała</h1>

					  <input name="lydka" type="number" class="form-control" placeholder="Pomiar łydki.." />
					  <input name="udo" type="number" class="form-control" placeholder="Pomiar uda.." />
					  <input name="biodra" type="number" class="form-control" placeholder="Pomiar biodra.." />
					  <input name="talia" type="number" class="form-control" placeholder="Pomiar talii.." />
					  <input name="klatka" type="number" class="form-control" placeholder="Pomiar klatki.." />
					  <input name="kark" type="number" class="form-control" placeholder="Pomiar karku.." />
					  <input name="biceps" type="number" class="form-control" placeholder="Pomiar bicepsu.." />
					  <input name="przedramie" type="number" class="form-control" placeholder="Pomiar przedramienia.." />
					  <input name="waga" type="number" class="form-control" placeholder="Pomiar wagi.." />
					  <input name="pas" type="number" class="form-control" placeholder="Pomiar pasa.." />

					  <button class="btn btn-lg btn-primary btn-block" type="submit">Zapisz w bazie danych</button>
					</form>

				</div>
			</div>
		</div>
	</div>