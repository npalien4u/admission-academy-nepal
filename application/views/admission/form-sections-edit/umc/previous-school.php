<?php							
	$applicant_info =$application->applicant_info;								
?>
<?php if($enable_edit==true): ?>
<div class="form-group form-group row">
	<label class="col-3 col-form-label">Previous School</label>
	<div class="col-9">
		<div class="input-group">
			<input name="previous_school_name" type="text"  value="<?=$applicant_info->previous_school_name?>" class="form-control" placeholder="Previous School Name" >									
		</div>
	</div>
</div>

<div class="form-group form-group row">						
	<div class="col-9 offset-3">
		<div class="row">
			<div class="col-6">
				<div class="input-group">
					<input name="previous_school_address" type="text" value="<?=$applicant_info->previous_school_address?>" class="form-control" placeholder="Previous School Address" >
														
				</div>
				<span class="form-text text-muted">Previous School Address</span>
			</div>

			<div class="col-6">
				<div class="input-group">
					<input name="previous_school_phone" type="text" value="<?=$applicant_info->previous_school_phone?>" class="form-control" placeholder="Previous School Phone" >		
											
				</div>
				<span class="form-text text-muted">Previous School Phone</span>	
			</div>

			
		</div>
	</div>	
</div>



<?php endif; ?>
<?php if($enable_edit==false): ?>

	<div class="form-group row">
		<label class="col-3 col-form-label">Previous School</label>							
		<label class="col-9 col-data-label"><?=$applicant_info->previous_school_name?></label>																						
	
							
		<label class="col-9 offset-3 col-data-label"><strong>Addresss: </strong><?=$applicant_info->previous_school_address?></label>																						
	
								
		<label class="col-9 offset-3 col-data-label"><strong>Phone: </strong><?=$applicant_info->previous_school_phone?></label>																						
	</div>
<?php endif; ?>

