<div class="kt-section">
	<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg">Parent/Guardian Details:</h3>
		
				
				<?php 
					$relations = array("Father", "Mother", "Local Guardian");
					foreach($relations as $relation):  
				?>
			
						<div class="form-group  row">
							<div class="col-12 col-md-3 "><div class="input-group">	<strong><?=$relation?></strong><input type="hidden" name="relation[]" value="<?=$relation?>"/></div></div>
							<div class="col-12 col-md-3"><div class="input-group">	<input name="relative_name[]" type="text" class="form-control" value="" placeholder="<?=$relation?> name" ></div></div>
							<div class="col-12 col-md-3"><div class="input-group">	<input name="phone[]" class="form-control" placeholder="Mobile number"  /></div></div>
							<div class="col-12 col-md-3"><div class="input-group">	<input name="occupation[]" class="form-control" placeholder="Occupation" /></div></div>
						</div>
					
				<?php endforeach; ?>


		
	</div>
</div>
