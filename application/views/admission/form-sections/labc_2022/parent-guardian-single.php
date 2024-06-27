<div class="kt-section">
	<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg">Parent/Guardian Info:</h3>


		<?php
		$relations = array("Parent");
		foreach ($relations as $relation) :
		?>
			<input type="hidden" name="relation[]" value="<?= $relation ?>" />


			<div class="form-group row">

				<label class="col-3 col-form-label">Name</label>
				<div class="col-9 form-group-sub">
					<input name="relative_name[]" type="text" class="form-control" value="" placeholder="<?= $relation ?> name">
				</div>

			</div>

			<div class="form-group row">

				<label class="col-3 col-form-label">Phone/Mobile</label>
				<div class="col-9  form-group-sub">

					<div class="input-group">
						<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
						<input name="phone[]" type="text" class="form-control" value="" placeholder="Phone/Mobile" aria-describedby="basic-addon1">
					</div>

				</div>

			</div>

			<div class="form-group row">

				<label class="col-3 col-form-label">Email</label>
				<div class="col-9  form-group-sub">
					<div class="input-group">
						<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
						<input name="occupation[]" class="form-control" placeholder="Email" />
					</div>
					</div>

				</div>

			<?php endforeach; ?>



			</div>
	</div>