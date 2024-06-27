<div class="form-group form-group row">
	<label class="col-3 col-form-label">Source of Information</label>
	<div class="col-9">
		
			<?php $source_of_information=array(
				array("id"=>1, "code"=>"radio", "name"=>"Radio"),
				array("id"=>2, "code"=>"newspaper", "name"=>"Newspaper"),
				array("id"=>3, "code"=>"prospectus", "name"=>"Borchure/Prospectus"),
			)
			?>

			<div class="kt-checkbox-inline">
				<?php foreach($source_of_information as $sc){ ?>
					<label class="kt-checkbox">
						<input type="checkbox" name="information_source[]" value="<?=$sc["code"]?>"> <?=$sc["name"]?>
						<span></span>
					</label>
				<?php } ?>	
			</div>
			<span class="form-text text-muted">Tick the source of information you got about this college</span>
	</div>		
</div>

<div class="form-group form-group row">
	<div class="col-6 offset-3">
		<div class="col-12">Specify, if other</div>
		<div class="col-12"><input type="text" name="information_source_other" class="form-control"></text></div>			
	</div>
</div>
