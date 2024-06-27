<?php							
	$applicant_info =$application->applicant_info;		
	$open_grades = $application->open_grades;

	$faculties = array("Science", "Management");
					
?>
<?php if($enable_edit==true): ?>
<div class="form-group row">
	<label class="col-3 col-form-label">Seeking Admission In</label>
	<div class="col-9">								
		
		<div class="row">
			<div class="col-lg-4 form-group-sub">
				
				<select class="form-control" name="admission_grade" >
					<option value="">Select</option>
					<?php 
						
						foreach($open_grades  as $grade):
					?>
						<option value="<?=$grade->grade_name?>" <?=$applicant_info->admission_grade==$grade->grade_name?"selected":""?>><?=$grade->grade_name?></option>
					<?php endforeach; ?>
					
				</select>
				<span class="form-text text-muted">* Grade/Level:</span>
			</div>		


			<div class="col-lg-4 form-group-sub">				
				<select class="form-control" name="admission_faculty" >
					<option value="">Select</option>
					<?php  foreach($faculties  as $faculty):  ?>
						<option value="<?=$faculty?>" <?=$faculty==$applicant_info->faculty?"selected":""?>><?=$faculty?></option>
					<?php endforeach; ?>
					
				</select>
				<span class="form-text text-muted">Group/Stream</span>
			</div>				
			
		</div>

	</div>									
	
</div>

<?php endif; ?>
<?php if($enable_edit==false): ?>

	<h3 class="kt-section__title kt-section__title-lg">Seeking Admission In</h3>
	<div class="col-12">
		<div class="row">
			<label class=" col-3 col-form-label">Grade/Level:</label>		
			<label class="col-9 col-data-label"><?=$applicant_info->admission_grade?></label>
		</div>

		<div class="row">
			<label class=" col-3 col-form-label">Faculty:</label>		
			<label class="col-9 col-data-label"><?=$applicant_info->faculty?></label>
		</div>
	</div>

<?php endif; ?>
