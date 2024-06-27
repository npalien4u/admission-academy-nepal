<?php 
	$faculties = array("Science", "Management");
	//$elective_subjects=array("Hotel Management", "Travel & Tourism", "Computer Science", "Business Studies");	
?>
<div class="form-group row">
	<label class="col-3 col-form-label">Grade</label>
	<div class="col-9">	
		<div class="row">			
			<div class="col-6 col-lg-4 form-group-sub">				
				<select class="form-control" name="admission_grade" >
					<?php if(sizeof($open_grades)>1){?>
						<option value="">Select</option>
					<?php } ?>
					<?php  foreach($open_grades  as $grade): ?>
						<option value="<?=$grade->grade_name?>"><?=$grade->grade_name?></option>
					<?php endforeach; ?>					
				</select>
				
			</div>
		</div>
	</div>
</div>
