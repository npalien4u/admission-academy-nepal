<?php							
	$applicant_info =$application->applicant_info;		
	$open_grades = $application->open_grades;						
?>
<?php if($enable_edit==true): ?>
<div class="form-group row">
	<label class="col-3 col-form-label">Seeking Admission In</label>
	<div class="col-9">								
		
		<div class="row">
		<div class="col-lg-4 form-group-sub">
				<label class="form-control-label">* Grade/Level:</label>
				<select class="form-control" name="admission_grade" >
					<option value="">Select</option>
					<?php 
						
						foreach($open_grades  as $grade):
					?>
						<option value="<?=$grade->grade_name?>" <?=$applicant_info->admission_grade==$grade->grade_name?"selected":""?>><?=$grade->grade_name?></option>
					<?php endforeach; ?>
					
				</select>
			</div>
			
			
		
		</div>
	</div>									
	
</div>
<?php endif; ?>
<?php if($enable_edit==false): ?>
	<div class="form-group row">
		<label class=" col-3 col-form-label">* Grade/Level:</label>		
		<label class="col-9 col-data-label"><?=$applicant_info->admission_grade?></label>
	</div>

<?php endif; ?>
