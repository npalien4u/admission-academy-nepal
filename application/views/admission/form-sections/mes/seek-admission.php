<?php 
	$faculties = array("Management", "Law");
	$elective_subjects=array("Hotel Management", "Travel & Tourism", "Computer Science", "Business Studies");	
?>
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
						<option value="<?=$grade->grade_name?>" ><?=$grade->grade_name?></option>
					<?php endforeach; ?>
					
				</select>
				<span class="form-text text-muted">Grade</span>
			</div>

			
		</div>
	</div>									
	
</div>



<div class="form-group row">
	<label class="col-3 col-form-label">Elective Subject for Management</label>
	<div class="col-9">								
		<div class="kt-radio-inline">
			<?php 
			
				foreach($elective_subjects as $es){ ?>
				<label class="kt-radio">
					<input type="radio" name="elective_subject" value="<?=$es?>" <?=in_array($es, $elective_subjects)?"checked":""?>> <?=$es?>
					<span></span>
				</label>
			<?php } ?>	
		</div>	
	</div>	
</div>
