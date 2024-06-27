<?php							
	$applicant_info =$application->applicant_info;							
	$nep_dob = explode("-",$applicant_info->dob_bs);  
	$eng_dob = explode("-",$applicant_info->dob_ad);
?>

<?php if($enable_edit==true): ?>


	<div class="kt-section">
		<h3 class="kt-section__title kt-section__title-lg">Student Info:</h3>
		<div class="kt-section__body">
			<div class="form-group row">
				<label class="col-3 col-form-label">Name</label>
				<div class="col-9 form-group-sub">
					<input name="first_name" class="form-control" type="text" value="<?=$applicant_info->first_name?>" placeholder="First Name">
					
				</div>
												
			</div>
			
		</div>
	</div>


<?php endif; ?>


<?php if($enable_edit==false): ?>
	<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
	<h3 class="kt-section__title kt-section__title-lg">Student Info:</h3>
	
		<div class="col-12">
			<div class="row">
				<label class="col-3 col-form-label">Name</label>									
				<label class="col-9 col-data-label"><?=$applicant_info->first_name?> <?=$applicant_info->middle_name?> <?=$applicant_info->last_name?></label>																						
			</div>
			<div class="row">										
				<label class="col-3 col-form-label">Date of Birth</label>
				<div class="col-9">								
					<div class="row">
						<label class="col-xl-12 col-data-label"><?=$applicant_info->dob_bs?> (वि.सं.)</label>																																																				
					</div>										
				</div>
			</div>
			<div class="row">
				<label class="col-3 col-form-label">Gender</label>
				<label class="col-9 col-data-label"><?=$applicant_info->gender?></label>																																																									
			</div>
		</div>
	
<?php endif; ?>
