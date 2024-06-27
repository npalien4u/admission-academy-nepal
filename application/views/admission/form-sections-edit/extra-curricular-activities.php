<?php							
	$applicant_info =$application->applicant_info;								
?>
<?php if($enable_edit==true): ?>
<div class="form-group form-group row">
	<label class="col-3 col-form-label">Extra Curricular Activities</label>
	<div class="col-9">
		<div class="input-group">
			<textarea name="interests" type="text" class="form-control" placeholder="Mention the extra activities you are instersted in"><?=$applicant_info->interests?></textarea>									
		</div>
		<span class="form-text text-muted">Mention the extra activities you are instersted in</span>
	</div>
	
</div>



<?php endif; ?>
<?php if($enable_edit==false): ?>
	<div class="form-group form-group row">
		<label class="col-3 col-form-label">Extra Curricular Activities</label>
		<p class="col-9 col-data-label"><?=$applicant_info->interests?></p>
	</div>
<?php endif; ?>
