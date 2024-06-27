<div class="kt-section kt-section--first">
	<div class="kt-section__body">

		<div class="form-group form-group row">
			<label class="col-3 col-form-label">Class Shift</label>
			<div class="col-9">
				
					<?php $source_of_information=array(
						array("id"=>1, "code"=>"morning", "name"=>"Morning"),
						array("id"=>2, "code"=>"day", "name"=>"Day")
					)
					?>

					<div class="kt-radio-inline">
						<?php foreach($source_of_information as $sc){ ?>
							<label class="kt-radio">
								<input type="radio" name="class_shift" value="<?=$sc["code"]?>"> <?=$sc["name"]?>
								<span></span>
							</label>
						<?php } ?>	
					</div>
				
			</div>		
		</div>
		
	</div>
</div>
