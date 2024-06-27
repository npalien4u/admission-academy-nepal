<?php							
	$applicant_info =$application->applicant_info;		
?>
<?php if($enable_edit==true): ?>
<div class="form-group form-group row">
	<label class="col-3 col-form-label">Expectation</label>
	<div class="col-9">
		<div class="input-group">
			<textarea name="expectation" type="text" class="form-control" placeholder=""><?=$applicant_info->expectation?></textarea>									
		</div>
		<span class="form-text text-muted">Mention your expectation from this college</span>
	</div>
	
</div>



<?php endif; ?>
<?php if($enable_edit==false): ?>
	<div class="form-group form-group row">
	<label class="col-3 col-form-label">Expectation</label>
	<label class="col-9 col-data-label"><?=$applicant_info->expectation?></label>	
	
</div>
<?php endif; ?>
