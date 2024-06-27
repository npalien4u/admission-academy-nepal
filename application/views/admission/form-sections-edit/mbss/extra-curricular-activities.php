<?php							
	$applicant_info =$application->applicant_info;								
?>
<?php if($enable_edit==true): ?>
<div class="form-group row">
	<label class="col-3 col-form-label">Extra Curricular Activities</label>
	<div class="col-9">
		<div class="input-group">
			<textarea name="interests" type="text" class="form-control" placeholder="Mention the extra activities you are instersted in"><?=$applicant_info->interests?></textarea>									
		</div>
		<span class="form-text text-muted">Mention the extra activities you are instersted in</span>
	</div>
	
	
</div>
<div class="form-group  row">	
	<label class="col-6 col-form-label">Do you want to take special ECA class beside regular classes?</label>
	<div class="col-6">	
		<div class="kt-radio-inline">
			<label class="kt-radio">
				<input type="radio" name="take_eca_class" <?=$applicant_info->take_eca_class==1?"checked":""?>> Yes
				<span></span>
			</label>
			<label class="kt-radio">
				<input type="radio" name="take_eca_class" <?=$applicant_info->take_eca_class==0?"checked":""?>> No
				<span></span>
			</label>		
		</div>		
	</div>
</div>



<?php endif; ?>
<?php if($enable_edit==false): ?>
	<div class="form-group form-group row">
		<label class="col-3 col-form-label">Extra Curricular Activities</label>
		<p class="col-9 col-data-label"><?=$applicant_info->interests?></p>
	</div>
	<div class="form-group  row">	
		<label class="col-3 col-form-label">Take extra ECA class? </label>
		<label class="col-3 col-data-label"><?=$applicant_info->take_eca_class==1?"Yes":"No"?></label>
	</div>
<?php endif; ?>
