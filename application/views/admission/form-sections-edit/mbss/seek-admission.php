<?php							
	$applicant_info =$application->applicant_info;		
	$open_grades = $application->open_grades;	
	$faculties = array("Management", "Law");
	$elective_subjects=array("Hotel Management", "Travel & Tourism", "Computer Science", "Business Studies");					
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
				<span class="form-text text-muted">Grade</span>
			</div>

			<div class="col-lg-4 form-group-sub">
				
				<select class="form-control" name="admission_faculty" >
					<option value="">Select</option>
					<?php 
						
						foreach($faculties  as $faculty):
					?>
						<option value="<?=$faculty?>" <?=$applicant_info->faculty==$faculty?"selected":""?>><?=$faculty?></option>
					<?php endforeach; ?>
					
				</select>
				<span class="form-text text-muted">Faculty</span>
			</div>			
		</div>
	</div>									
	
</div>

<div class="form-group row">
	<label class="col-3 col-form-label">Elective Subject for Management</label>
	<div class="col-9">								
		<div class="kt-radio-inline">
			<?php 
				$selected_es = $applicant_info->elective_subject;
				foreach($elective_subjects as $es){ ?>
				<label class="kt-radio">
					<input type="radio" name="elective_subject" value="<?=$es?>" <?=in_array($selected_es, $elective_subjects)?"checked":""?>> <?=$es?>
					<span></span>
				</label>
			<?php } ?>	
		</div>	
	</div>	
</div>


<?php endif; ?>
<?php if($enable_edit==false): ?>
	<div class="form-group row">
		<label class=" col-3 col-form-label">* Grade/Level:</label>		
		<label class="col-9 col-data-label"><?=$applicant_info->admission_grade?> <?=$applicant_info->faculty?> (<?=$applicant_info->elective_subject?>)</label>
	</div>

<?php endif; ?>
