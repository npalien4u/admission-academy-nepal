<div class="kt-section">
	<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg">Parent/Guardian Info:</h3>
		
				
				<?php 
					$relations = array("Parent");
					foreach($relations as $relation):  
				?>
			<input type="hidden" name="relation[]" value="<?=$relation?>"/>
						

						<div class="form-group row">
			
							<label class="col-3 col-form-label">Name</label>
							<div class="col-9 col-md-6 form-group-sub">
							<input name="relative_name[]" type="text" class="form-control" value="" placeholder="<?=$relation?> name" >		
							</div>
						
						</div>

						<div class="form-group row">
			
							<label class="col-3 col-form-label">Phone</label>
							<div class="col-9 col-md-6 form-group-sub">
							<input name="phone[]" class="form-control" placeholder="Mobile number"  />
							</div>
						
						</div>

						<div class="form-group row">
			
							<label class="col-3 col-form-label">Email</label>
							<div class="col-9 col-md-6 form-group-sub">
							<input name="occupation[]" class="form-control" placeholder="Occupation" />		
							</div>
						
						</div>
					
				<?php endforeach; ?>


		
	</div>
</div>
