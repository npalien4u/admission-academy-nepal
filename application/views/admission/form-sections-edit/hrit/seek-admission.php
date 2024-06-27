<?php							
	$applicant_info =$application->applicant_info;		
	$open_grades = $application->open_grades;	
	$faculties =array("Law",  
		"Management (Computer Science)",
		"Management (Hotel Management)",
		"Management (Travel & Tourism)",
		"Management (Business Studies)",
		"Humanities (English)",
		"Humanities (Pshychology)",
		"Humanities (Sociology)",
		"Humanities (Rural Development)",
		"Humanities (Journalism)"
	);
						
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
						<option value="<?=$grade->grade_name?>" <?=$applicant_info->admission_grade==$grade->grade_name?"selected":""?> ><?=$grade->grade_name?></option>
					<?php endforeach; ?>
					
				</select>
			</div>
			<div class="col-lg-5 form-group-sub">
				<label class="form-control-label">* Admission sought for:</label>
				<select class="form-control" name="admission_faculty" >
					<option value="">Select</option>
					<?php 
						
						foreach($faculties  as $faculty):
					?>
						<option value="<?=$faculty?>" <?=$applicant_info->faculty==$faculty?"selected":""?> ><?=$faculty?></option>
					<?php endforeach; ?>
					
				</select>
			</div>

		
		</div>
	</div>									
	
</div>

<?php endif; ?>
<?php if($enable_edit==false): ?>
	<div class="form-group row">
		<label class=" col-3 col-form-label">* Grade/Faculty:</label>		
		<label class="col-9 col-data-label"><?=$applicant_info->admission_grade?><br/><?=$applicant_info->faculty?></label>
	</div>

<?php endif; ?>
