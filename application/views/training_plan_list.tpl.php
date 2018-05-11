


	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h1>Twoje plany treningowe</h1>
					<?php echo $plans_list; ?>
					
					<br /><br />
					<form class="form-signin" method="POST" action="index.php?module=trainingplan&page=add_training_plan_submit">
					  <h1 class="h3 mb-3 font-weight-normal">Dodaj nowy plan treningowy</h1>
					  <label for="title" class="sr-only">Tytuł planu..</label>
					  <input name="title" type="text" class="form-control" placeholder="Tytuł planu.." required autofocus>
					  <button class="btn btn-lg btn-primary btn-block" type="submit">Zapisz w bazie danych</button>
					</form>
				</div>
			</div>
		</div>
	</div>

