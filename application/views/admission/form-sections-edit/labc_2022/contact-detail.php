<?php							
	$applicant_info =$application->applicant_info;								
?>


<?php if($enable_edit==true): ?>

<div class="kt-section">
	<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg">Contact Details of Student:</h3>
		<div class="form-group row">
			<label class="col-3 col-form-label">Phone Number</label>
			<div class="col-9">
				<div class="input-group">
					<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
					<input name="phone_number" type="text" class="form-control" value="<?=$applicant_info->phone_number?>" placeholder="Phone number" aria-describedby="basic-addon1">
				</div>
				<span class="form-text text-muted">Separate with a comma ( , ) if multiple numbers are listed</span>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3 col-form-label">Mobile Number</label>
			<div class="col-9">
				<div class="input-group">
					<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
					<input name="mobile_number" type="text" class="form-control" value="<?=$applicant_info->mobile_number?>" placeholder="Mobile number *" aria-describedby="basic-addon1">
				</div>
				<span class="form-text text-muted">Separate with a comma ( , ) if multiple numbers are listed</span>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-3 col-form-label">Email Address</label>
			<div class="col-9">
				<div class="input-group">
					<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
					<input name="email_address" type="text" class="form-control" value="<?=$applicant_info->email_address?>" placeholder="Email address" aria-describedby="basic-addon1">
				</div>
				<span class="form-text text-muted">Separate with a comma ( , ) if multiple email addresses are listed</span>
			</div>
		</div>
		
	</div>
</div>




<?php endif; ?>


<?php if($enable_edit==false): ?>			

	<div class="form-group row">
		<label class="col-3 col-form-label">Contact detail:</label>									
		<label class="col-9 col-data-label"><strong>Phone: </strong><?=$applicant_info->phone_number?> </label>																						
		<label class="col-9 offset-3 col-data-label"><strong>Mobile: </strong><?=$applicant_info->mobile_number?> </label>																						
		<label class="col-9 offset-3 col-data-label"><strong>Email: </strong><?=$applicant_info->email_address?> </label>																					
																							
	</div>
	
<?php endif; ?>
